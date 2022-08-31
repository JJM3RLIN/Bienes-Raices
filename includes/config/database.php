<?php
function conectarDB(): mysqli {
    $db = new mysqli('localhost', 'root', 'Merlin1709', 'bienes_raices');
    $db->set_charset('utf8');
    if(!$db){
        echo "No se pudo conectar al servidor";
        exit;
    }
   return $db;

}