<?php
#EL PROYECTO SE SIRVE DESDE PUBLIC
require_once '../includes/app.php';


use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\LoginControllers;
use Controllers\PaginasController;
$router = new Router();

//NO SE REPITEN URLS

//se manda la url  y la funcion que ejecuta, con el ::class mandamos el namespace y la funcion a ejecutar
//que en PropiedadController busque el metodo y se manda como arreglo y $fn sera un
#arreglo en donde tenga la clase en donde encontrara el metodo

//SI SE VISITA UNA RUTA QUE NO SEAN ESTAS MANDA UN ERROR
$router->get('/admin', [PropiedadController::class, 'index']);

//Propiedades

$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
//Pq se envia la información del formulario
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'delete']);

//Vendedores

$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'delete']);

//Páginas-> Zona Pública
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

//Usuario autenticado
$router->get('/login', [LoginControllers::class, 'login']);
$router->post('/login', [LoginControllers::class, 'login']);
$router->get('/logout', [LoginControllers::class, 'logout']);

$router->comprobarRutas();