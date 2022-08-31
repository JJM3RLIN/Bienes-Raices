<?php
//namesapece dado en composer
namespace Model;
class Propiedad extends ActiveRecord{
protected static $tabla = 'propiedades';

//Para poder buscar los elementos traidos de la bd o los que se agregan
 //Por eso deben tener el mismo nombre
 //columans de la bd
 protected static $columnasDb =['id', 'titulo', 'precio', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'idVendedor', 'imagen', 'creado'];

public $id;
public $titulo;
public $precio;
public $descripcion;
public $habitaciones;
public $wc;
public $estacionamiento;    
public $idVendedor;
public $imagen;
public $creado;

public function __construct($args = []) //valor por default
{
    $this->id = $args['id'] ?? null;
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->idVendedor = $args['idVendedor'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->creado = date('y/m/m');

}
//Verificar si todos los campos han sido agregados correctamente
public function validarErrores(){
    
    if(!$this->titulo) {
        self::$errores[] = "Debes añadir un titulo";
    }

    if(!$this->precio) {
        self::$errores[] = 'El Precio es Obligatorio';
    }

    if( strlen( $this->descripcion ) < 50 ) {
        self::$errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
    }

    if(!$this->habitaciones) {
        $errores[] = 'El Número de habitaciones es obligatorio';
    }
    
    if(!$this->wc) {
        self::$errores[] = 'El Número de Baños es obligatorio';
    }

    if(!$this->estacionamiento) {
        self::$errores[] = 'El Número de lugares de Estacionamiento es obligatorio';
    }
    
    if(!$this->idVendedor) {
        self::$errores[] = 'Elige un vendedor';
    }

    if(!$this->imagen) {
        self::$errores[] = 'La Imagen es Obligatoria';
    }

    // Validar por tamaño (1mb máximo)
  /*
     $medida = 1000 * 1000;


    if($this->imagen['size'] > $medida ) {
       self::$errores[] = 'La Imagen es muy pesada';
    }  
  */
    return self::$errores;
}

}