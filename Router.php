<?php
namespace MVC;
class Router{

    public $rutasPOST = [];
    public $rutasGET = [];

 #urls que tienen get, la url y la funcion asociada
    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    //Va a comprobar que la ruta exista
   public function comprobarRutas(){
       session_start();

       $aute = $_SESSION['login'] ?? null;
//Rutas protegidas
$rutasProtegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar',
                    '/propiedades/eliminar', '/vendedores/crear',  '/vendedores/actualizar',
                    '/vendedores/eliminar'];


    //obterner la url que se ejecuta y ver si es valida
    $urlActual = $_SERVER['PATH_INFO'] ?? '/';
    $metodo = $_SERVER['REQUEST_METHOD'];

    if($metodo === 'GET'){
        $fn = $this->rutasGET[$urlActual] ?? null;
    }
    else{
        $fn = $this->rutasPOST[$urlActual] ?? null;
    }

    //Proteger las rutas
    if( in_array($urlActual, $rutasProtegidas) && !$aute){
        header('Location: /public/');
    }

   if($fn){
       #La url existe y hay una funcion asociada
       call_user_func($fn, $this); //Se le pasa todo el objeto  
   }

   }
   //Mostrar una vista
   public function render($view, $datos = []){

    foreach($datos as $key => $value){
        //Doble signo de dolar significa variable de variable
        //mantiene el nombre pero no pierde el valor
        //de la llace se crea una variable para que se inyecten
        $$key = $value;
    }

//Inicamos almacenamineto en memoria
    ob_start();
    //Esto se almacena
       include __DIR__ . "/views/$view.php";
       //Limpiamos la memoeria y ademas obtenemos eso que limpio
       $contenido = ob_get_clean();
       //$contendio se inyecta directamenta en el layout
       include __DIR__ . '/views/layout.php';
   }
} 