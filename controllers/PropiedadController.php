<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    //Administrador
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;
        //Lo que se le pasa a la vista
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' =>$vendedores
        ]);
    }
    //Insertar en la bd
    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            //Instanciar clase de Propiedad y ya tendra los datos
            $propiedad = new Propiedad($_POST['propiedad']); //Se manda POST ya que es un arreglo con lo que se envia

            /** SUBIDA DE ARCHIVOS */


            // Generar un nombre único para las imagenes
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //SETEAR LA IMAGEN
            //si existe

            if ($_FILES['propiedad']['tmp_name']['imagen']) {

                //Resize a la imagen con Intervetion; obtenemos la imagen y el temporal ala mismo tiempo
                //pq los name se envian en el arreglo propiedad y ahi se encuentra la imagen
                $img = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }


       
            //VALIDAR

            $errores = $propiedad->validarErrores();
      

            // Revisar que el array de errores este vacio

            if (empty($errores)) {

        
                //Crera la carpeta de imagenes
                if (!is_dir(CARPETA_IMAGENES)) { //si no existe la carpeta
                    mkdir(CARPETA_IMAGENES);  //creamos la carpeta
                }


                //Guardar la imagen en el servidor->en nuestra carpeta
                $img->save(CARPETA_IMAGENES . $nombreImagen);

                //guardar en la DB
                $resultado = $propiedad->guardar();
                 if($resultado){
                     header('Location: /public/admin?resultado=1');
                 }

               
            }
        }
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router)
    {
        
        $id = validar_redireccionar('admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            //Asignar los atributos y pasarle los valores del formulario del arreglo propiedad que contiene esos datos
            $args = $_POST['propiedad'];

            $propiedad->sincronizar( $args );
        
            
        //subida de archivos
        //Generar nombre unico para la imagen
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
        
          if( $_FILES['propiedad']['tmp_name']['imagen'] ){
        
            $img = Image::make( $_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
             $propiedad->setImagen($nombreImagen);
        
           }
           $errores = $propiedad->validarErrores();
        
            // Revisar que el array de errores este vacio
            if(empty($errores)) {
        
                
             //ALMACENAR LA IMAGEN EN EL SERVIDOR
             if($_FILES['propiedad']['tmp_name']['imagen']) {
                $img->save(CARPETA_IMAGENES . $nombreImagen);
            }
               $resultado = $propiedad ->guardar();
        
           
                if($resultado) {
                    // Redireccionar al usuario.
                    header('Location:/public/admin?resultado=2');
                }
            }
        }
        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores'=> $errores
        ]);
    }

    public static function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
     $eliminar = $_POST['id']; // se accede con el nombre del input
    $eliminar = filter_var($eliminar, FILTER_VALIDATE_INT); //NOS regresa un false si no es un numero
     
    if($eliminar){
          
    
    $tipo = $_POST['tipo'];
if( validarContenido($tipo) ){

       //Buscar la propiedad
       $propiedad = Propiedad::find($eliminar);
       $resultado = $propiedad->eliminar();
}

      
         //Una vez hecho la consulta para eliminar redireccionamos al usuario
         if($resultado){
            $propiedad->eliminarImagen();
            header("Location: /public/admin?resultado=3");
        }

    }
        }
    }
}
