<?php
/**
 * Obtiene todos los gastos de la base de datos
 */

//constantes para la construcción de respuestas 
const ESTADO="estado";
const DATOS="tblfuncionarios";
const MENSAJE="mensaje";
const CODFUNCIONARIO = "codfuncionario";

const CODIGO_EXITO=1;
const CODIGO_FALLO=2;
const CODIGO_FALLO_2 = 3;

require '../../boards/tblFuncionarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	if(isset($_GET[CODFUNCIONARIO])){
		//obtener gastos de la base de datos
		$parametro = $_GET[CODFUNCIONARIO];
		$retorno=tblFuncionarios::getHorarioFuncionario($parametro);

		//Definir tipo de respuesta 
		header('Content-Type: application/json');

		if ($retorno) {
			$datos[ESTADO]=CODIGO_EXITO;
			$datos[DATOS]=$retorno;
			print json_encode($datos);
		}else{
			json_encode(array(
				ESTADO=>CODIGO_FALLO,
				MENSAJE=>"Ha Ocurrido un error..."
			));
		}
	}

}
