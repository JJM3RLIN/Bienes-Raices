<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;
class VendedorController{
public static function crear(Router $router){
  $vendedor = new Vendedor;
  $errores =Vendedor::getErrores();
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $vendedor = new Vendedor($_POST);

  $errores = $vendedor->validarErrores();

  if(empty($errores)){
      $resultado = $vendedor->guardar();

      if($resultado){
        header('Location: /public/admin?resultado=1');
    }
  }

  }
  $router->render('vendedores/crear', [
      'vendedor' => $vendedor,
      'errores' => $errores
  ]);
}
public static function actualizar(Router $router){
    $id = validar_redireccionar('admin');
    $vendedor = Vendedor::find($id);
    $errores = Vendedor::getErrores();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $vendedor->sincronizar($_POST);
        $errores = $vendedor->validarErrores();

        if(empty($errores)){
          $resultado =  $vendedor->guardar();
        }

        if($resultado) {
            // Redireccionar al usuario.
            header('Location:/public/admin?resultado=2');
        }
    }
    $router ->render('vendedores/actualizar', [
        'vendedor' => $vendedor,
        'errores' => $errores
    ]);
}
public static function delete(Router $router){
    $id = $_POST['id'];
    //Validar que exista el vendedor
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){
        $tipo = $_POST['tipo'];
        //Vsalidamos que exista el crud de vendedor
        if(validarContenido($tipo)){
            $vendedor = Vendedor::find($id);
            $resultado = $vendedor->eliminar();
        }

        if($resultado){
            header("Location: /public/admin?resultado=3");
        }
       
    }
    
}

}