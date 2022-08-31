<?php

namespace Model;

class Vendedor extends ActiveRecord{
 protected static $tabla = 'vendedor';
    //Para poder buscar los elementos traidos de la bd o los que se agregan
 //Por eso deben tener el mismo nombre
 //columans de la bd
 protected static $columnasDb =['id', 'nombre', 'apellido', 'telefono'];

public $id;
public $nombre;
public $apellido;
public $telefono;

public function __construct($args = []) //valor por default
{
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->apellido = $args['apellido'] ?? '';
    $this->telefono = $args['telefono'] ?? '';
    

}
//Verificar si todos los campos han sido agregados correctamente
public function validarErrores(){
    
    if(!$this->nombre) {
        self::$errores[] = "Debes añadir un nombre";
    }

    if(!$this->apellido) {
        self::$errores[] = 'Debes añadir el apellido del vendedor';
    }

    if(!$this->telefono) {
        self::$errores[] = 'El número de teléfono es obligatorio';
    }   

    if( !preg_match( '/[0-9]{10}/' , $this->telefono) ) {
        self::$errores[] = 'Formato no valido';
    }   
    
    return self::$errores;
}
}