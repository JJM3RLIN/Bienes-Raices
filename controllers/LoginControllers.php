<?php
namespace Controllers;
use MVC\Router;
use Model\Admin;
class LoginControllers{
public static function login(Router $router){
$errores = Admin::getErrores();
$aute = new Admin;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
$aute = new Admin($_POST);

$errores = $aute->validarErrores();
   if(empty($errores)){

    //Verificar si el usuario existe
   $resultado = $aute ->existeUsuario();

   if(!$resultado) {
       $errores = Admin::getErrores();
   }  
   else{
       //Verificar el password
    $autenticado =   $aute -> comprobarContraseña($resultado);
    if($autenticado){
        //Autenticar al usuario
        $aute -> autenticar();
    }else{
        $errores = Admin::getErrores();
    }


   }

   }

}

$router->render('auth/login', [
    'errores' => $errores,
    'aute' => $aute
]);

}
public static function logout(Router $router){
    session_start();
    $_SESSION = [];
    header('Location: /public/');
}
}