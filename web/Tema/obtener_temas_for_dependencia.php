<?php
/**
 * Obtiene todos los temas de la base de datos
 */

//constantes para la construcción de respuestas 
const ESTADO="estado";
const DATOS="tbltemas";
const MENSAJE="mensaje";
const CODIGO_DEPENDENCIA = "coddependencia";

const CODIGO_EXITO=1;
const CODIGO_FALLO=2;

require '../../boards/tblTemas.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(isset($_GET[CODIGO_DEPENDENCIA])){

		$codigodependencia = $_GET[CODIGO_DEPENDENCIA];

		//obtener temas de la base de datos
		$temas=tblTemas::getAllTemasId($codigodependencia);

		//Definir tipo de respuesta 
		header('Content-Type: application/json');

		if ($temas) {
			$datos[ESTADO]=CODIGO_EXITO;
			$datos[DATOS]=$temas;
			print json_encode($datos);
		}else{
			json_encode(array(
				ESTADO=>CODIGO_FALLO,
				MENSAJE=>"Ha Ocurrido un error..."
			));
		}

	}

}