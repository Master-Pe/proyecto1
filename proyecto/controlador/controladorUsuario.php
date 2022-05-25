<?php
require_once('../modelo/crudUsuario.php');
require_once('../modelo/Usuario.php');

class controladorUsuario{

    public function __construct(){}

    public function crearUsuario($e_log,$e_pass,$e_nick,$e_email){
        $usuario = new Usuario();
        $usuario->setLoginUsuario($e_log);
        $usuario->setPassUsuario($e_pass);
        $usuario->setNickUsuario($e_nick);
        $usuario->setEmailUsuario($e_email);
   

        $crudUsuario = new crudUsuario();
        $mensaje = $crudUsuario->crearUsuario($usuario);
        echo $mensaje ;

    }

    public function leerUsuario(){
        $crudUsuario = new crudUsuario();
        $leerUsuario = $crudUsuario->leerUsuario();
        return $leerUsuario;
    }

    public function modificarUsuario($e_id,$e_login){
        $usuario = new Usuario();
        $usuario->setIdUsuario($e_id);
        $usuario->setLoginUsuario($e_login);

        $crudUsuario = new crudUsuario();
        $crudUsuario->modificarUsuario($usuario);
    }

    /////////////////////////////////////////////////
    //???????????????????????????????????????????????

    public function buscarUsuario($e_idUsuario){
        $usuario = new Usuario();
        $usuario->setIdUsuario($e_idUsuario);
  
        $crudUsuario = new crudUsuario();
        $datosUsuario = $crudUsuario->buscarUsuario($usuario);
        $usuario->setLoginUsuario($datosUsuario['login_usuario']);
        return $usuario;
     }

}
$controladorUsuario = new controladorUsuario();
if(isset($_POST['crear'])){
    $e_log = $_POST['login'];
    $e_pass = $_POST['pass'];
    $e_nick = $_POST['nick'];
    $e_email = $_POST['email'];

    $controladorUsuario->crearUsuario($e_log,$e_pass,$e_nick,$e_email);

}

elseif(isset($_POST['modificar'])){

    $e_idUsuario = $_POST['idUsuario'];
    $e_loginUsuario = $_POST['loginUsuario'];

    $controladorUsuario->modificarUsuario($e_idUsuario,$e_loginUsuario);

}   

elseif(isset($_POST['editar'])){

    $e_id=$_POST['id_usuario'];
    header("Location:../vista/modificarUsuario.php?id_usuario=$e_id");
} 

?>