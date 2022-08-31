<?php 
//Archivo principal para llamar a todo
require 'fucniones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use Model\ActiveRecord;
$db = conectarDB();
//Conectarnos a la base de datos, conectarDB nos regresa la conexión
ActiveRecord::setDb($db);



