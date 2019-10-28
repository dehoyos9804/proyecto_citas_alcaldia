<?php
/**
 * Obtiene todos los gastos de la base de datos
 */

//constantes para la construcción de respuestas 
const ESTADO="estado";
const DATOS="tblfuncionarios";
const MENSAJE="mensaje";

const CODIGO_EXITO=1;
const CODIGO_FALLO=2;

require '../../boards/tblFuncionarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	//obtener gastos de la base de datos
	$usuarios=tblFuncionarios::getAllUsuarios();

	//Definir tipo de respuesta 

	header('Content-Type: application/json');

	if ($usuarios) {
		$datos[ESTADO]=CODIGO_EXITO;
		$datos[DATOS]=$usuarios;
		print json_encode($datos);
	}else{
		json_encode(array(
			ESTADO=>CODIGO_FALLO,
			MENSAJE=>"Ha Ocurrido un error..."
		));
	}

}