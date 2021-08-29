<?php
require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

class auth extends conexion {


//Login

public function login($json){

$_respuestas = new respuestas;
$datos = json_decode($json,true);

if(!isset($datos['usuario'])||!isset($datos["password"])){
//error en los campos
return $_respuestas->error_400();

}else{

    // todo va bien
$usuario= $datos['usuario'];
$password=$datos['password'];

$datos = $this->obtenerDatosUsuario($usuario);
if($datos){
    // si existe usuario
}else{

    //sno existe usuario
    return $_respuestas->error_200("El usuario no existe");
}

}
    
}

private function obtenerDatosUsuario($correo){
$query = "SELECT UsuarioId, Password,Estado FROM usuarios WHERE Usuario = '$correo'";
$datos = parent::obtenerDatos($query);
if(isset($datos[0]["UsuarioId"])){
    return $datos;
}else{
    return 0;
}

}

}

?>