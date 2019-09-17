<?php
/**
*Permite mantener la sesion iniciada cuando un usuario se loguea
**/
session_start();

if(isset($_SESSION['user'])){
	//aqui debo incluir la clase cuando se loguea
	include_once 'other/views/home.php';
}elseif(isset($_POST['usuario']) && isset($_POST['clave'])){
	//usuario validado
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];

	require 'boards/tblAdministradores.php';

	$retorno = tblAdministradores::getLogout($usuario, $clave);
	if($retorno!= null){
		//guardo la sesion
		$_SESSION['user'] = $retorno['usuario'];//inicio sesion con el usuario logueado 
		header("Location: index.php");//me redirijo a index 
	}else{
		$error = "Usuario y/o Contraseña Incorrecta";
        include_once 'other/views/login.php';
	}

}else{
	include_once 'other/views/login.php';
}

?>