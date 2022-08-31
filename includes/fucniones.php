<?php 

//lo que se hace don DIR  es que php busca la direccion automaticamente del archivo.
// DIR es una superglobal para buscar archivos
define('TEMPLATES_URL', __DIR__.'/templates');
define('FUNCIONES_URL', __DIR__.'funciones.php');
define('CARPETA_IMAGENES',  '../public/imagenes/');
/*
Cuando tenemos puesto que public ya es la raiz en laragon
define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'] . '/imagenes');
*/

function incluirTemplates(string $nombre, bool $inicio = false){ //si no esta presente entra el parametro por default
    include TEMPLATES_URL."/${nombre}.php";
}
function usuarioAutenticado(){
    session_start(); //Se obtien la info de en donde sea que esten los datos de $_SESSION


if( !$_SESSION['login'] ){
    header('Location: ../../');
}


}

function debuguear($var){  //mostrarnos con formato nuestro objeto
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}
//Escapar/sanitizar HTML
function sanitizar($html): string{
 $s = htmlspecialchars($html);
 return $s;
}
function validarContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}
function validar_redireccionar(string $url){
    //Obtener el ID de la propiedad a editar
$id = $_GET['id'] ;
$id = filter_var($id, FILTER_VALIDATE_INT);

//validar que sea un numero
if(!$id){
   header("Location:/public/${url}");
}
return $id;
}