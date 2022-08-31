<?php
namespace Model;
class ActiveRecord{

    //Base de datos
 protected static $db; 
 //Para poder buscar los elementos traidos de la bd o los que se agregan
 //Por eso deben tener el mismo nombre
 //columans de la bd que se obtiene de cada clase hija
 protected static $columnasDb =[]; 
protected static $tabla = '';
//Errores
protected static $errores = [];



//Ver si estanmos actualizando o creando una propiedad
public function guardar(){
    $resultado = '';
    //si hay un id es pq se va a actualizar una propiedad
   if( !is_null($this->id) ){
      $resultado = $this->actualizar();
   }else{
     $resultado = $this->crear();
   }
   return $resultado;
}
//Insertar en la bd
public function crear(){

    //Snaitizar los datos
   $atributos = $this->sanitizarDatos(); //Llamar al método

   //hacer un string las llaves y sus valores para que todo se ponga de manera correcta y no tener un error
  
    $query = " INSERT INTO ";
    $query .= static::$tabla . " ( ";
    $query.= join(', ', array_keys($atributos));
    $query.= " ) VALUES ('";
    $query.= join( "', '", array_values($atributos));
    $query.= "') "; //la comilla sencilla es pq se trata de un string y para poder escaparlo
   $resultado = self::$db->query($query);

   return $resultado;

}
public function actualizar(){
      //Snaitizar los datos
   $atributos = $this->sanitizarDatos(); //Llamar al método
    //Juntar lo de la db con los valores para hacer el update
   $valores = [];

   foreach( $atributos as $key => $value ){
       $valores[] = "{$key} = '{$value}'";
   }

   $query = " UPDATE " . static::$tabla ." SET ";
   $query.= join( ', ', $valores);  //unir el arreglo como todo un string
   $query .= "WHERE id = '" . self::$db->escape_string( $this->id ) . "' ";

   $resultado = self::$db -> query( $query );
   return $resultado;
}

//Eliminar un registro
public function eliminar(){
    $this->id;
    //escapar el id pq se lee lo que trae desde el form
    $eliminar = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id);
    $resultado = self::$db->query($eliminar);
    return $resultado;
}

//Identificar y unir  los atributos de la bd
public function atributos(){
    $atributos = [];
    foreach (static::$columnasDb as $columna) {
        //Mapear con los datos traidos
        if($columna === 'id') continue; //   que pase al sig
       $atributos[$columna] = $this->$columna; //pq es una variaable del forEach
    }

    return $atributos;
}

//Subida de archivos e imagenes
public function setImagen($imagen){
    //Eliminar la imagen anterior, cuando creamos una prop no tenemos id 
    //pero cuando se actualiza si hay una id para la prop
    if( !is_null($this->id) ){
        //Verificar si existe el archivo a eliminar
        $this->eliminarImagen();
    }
   
    if($imagen){
        //Asignar el nombre de la imagen  para guardarlo
        $this->imagen = $imagen;
    }
}

//Eliminar un archivo
public function eliminarImagen(){
      //Elimino la imagen
      $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen); //imagen que tiene 
        if( $existeArchivo ){
            unlink( CARPETA_IMAGENES . $this->imagen ); //unlink sirve para eliminar
        }

}

public function sanitizarDatos(){
$atributos = $this->atributos();
$sanitizado = [];

//Para obtener tambien el indice y el valor
foreach ($atributos as $key => $value) {
    $sanitizado[$key] = self::$db->escape_string($value);
}

return $sanitizado;

}

//Verificar si todos los campos han sido agregados correctamente
public function validarErrores(){
    
    

    // Validar por tamaño (1mb máximo)
  /*
     $medida = 1000 * 1000;


    if($this->imagen['size'] > $medida ) {
       self::$errores[] = 'La Imagen es muy pesada';
    }  
  */
  //cada que vayamos a limpiar validamos el arreglo
    static::$errores = [];
    return static::$errores;
}

//Listar todas las propeidades
public static function all(){
    $query = "SELECT * FROM " . static::$tabla; //static para que ejecute el atributo del hijo, si es self agarra solo el de la clase y no el de las hijas
    $resultado = self::consultarSql($query);
    return $resultado;
}
//Traer solo unos cuantos elementos
public static function algunos($cantidad){
    $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
    $resultado = self::consultarSql($query);
    return $resultado;
}

//Buscar una propiedad epecifica por su id
public static function find($id){
    $consulta = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
    $resultado = self::consultarSql( $consulta); //hacerlo objeto
    return array_shift($resultado);
}
public static function consultarSql($consulta){
//Consultar la base de datos
$resultado = self::$db->query($consulta);

//Iterar los resultados
$array = [];
//pq AR solo trabaja con objetos
while($registro = $resultado->fetch_assoc()){
    $array[] = static::crearObjeto($registro);
}

//Liberar Memoria
$resultado->free();

//Retornar los resultados
return $array;

}

//Hacer el objeto
protected static function crearObjeto($registro){
   $objeto = new static; //para que ejecute lo de las clases hijas
    foreach ($registro as $key => $value) {
        if(property_exists($objeto, $key)){
            $objeto->$key = $value;
        }
    }
    return $objeto;
}

//Definir la conexion a la base de datos
public static function setDb($dataBase){
    self::$db = $dataBase;
}

//validacion de que no haya errores
public static function getErrores(){
    return static::$errores;
}

//POner los cambios de la actualización y guardarlos en la memoria
public function sincronizar($args = []){
   
    foreach($args as $key => $value){
        if(property_exists($this, $key) && !is_null($value)){
            //this hace referencia a todo el objeto actual
            $this->$key = $value;
        }
    }
 
}
}