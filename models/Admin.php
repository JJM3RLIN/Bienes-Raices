<?php
namespace Model;
class Admin extends ActiveRecord{
protected static $tabla = 'usuarios';    
protected static $columnasDb = ['id', 'correo', 'contraseña'];    
public $id;
public $correo;
public $contra;


public function __construct($args = []) //valor por default
{
    $this->id = $args['id'] ?? null;
    $this->correo = $args['email'] ?? null;
    $this->contra = $args['contraseña'] ?? '';
 

}
//Verificar si todos los campos han sido agregados correctamente
public function validarErrores(){
    
    if(!$this->correo) {
        self::$errores[] = "El correo es  obligatoria";
    }

    if(!$this->contra) {
        self::$errores[] = 'La contra es obligatoria o no es valida';
    }


   
    return self::$errores;
}

public function existeUsuario(){
    //Revisar que exita
    $query = "SELECT * FROM " . self::$tabla . " WHERE correo = '" . $this->correo . "'";
    $resultado = self::$db->query($query);
//>num_rows para ver si nos trajo algo la db
    if(!$resultado->num_rows){
        self::$errores[] = 'El usuario no existe';
        return;
    }
    return $resultado;
}
public function comprobarContraseña($resultado){
    //Nos trae el resultado de lo que haya encontrado en la db como objeto
    //resultado sigue siendo una instancia de mysqli
    $user = $resultado->fetch_object();

  $autenticado =  password_verify($this->contra, $user->contraseña);

if(!$autenticado){
    self::$errores[] = 'La contraseña es incorrecta';
}

return $autenticado;

}

public function autenticar(){
    //Iniciamos la sesión
session_start();

//LLenar el arreglo de sesión
$_SESSION['usuario'] = $this->correo;
$_SESSION['login'] = true;

header('Location: /public/admin');


}

}