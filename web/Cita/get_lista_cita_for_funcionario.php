<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador
 */

//constantes para la construcción de respuestas 
const ESTADO="estado";
const DATOS="tblcitas";
const MENSAJE="mensaje";
const IDENTIFICADOR = "codfuncionario";
const FECHA = "fecha";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;
const CODIGO_FALLO2 = 3;

require '../../boards/tblCitas.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	if (isset($_GET[IDENTIFICADOR]) && isset($_GET[FECHA])){
		// Obtener parámetro idMeta
		$parametro1 = $_GET[IDENTIFICADOR];
		$parametro2 = $_GET[FECHA];
		// Tratar retorno
		$retorno = tblCitas::allListaCitasFuncionario($parametro1, $parametro2);

		//Definir tipo de respuesta 
	    header('Content-Type: application/json');

	    if ($retorno) {
	    	$datos[ESTADO] = CODIGO_EXITO;
	    	$datos[DATOS] = $retorno;
	    	// Enviar objeto json
            print json_encode($datos);
	    }else{
	    	// Enviar respuesta de error general
            print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => 'No se obtuvo el registro'
                )
            );
	    }

	}else{
		// Enviar respuesta de error
		print json_encode(
			array(
				ESTADO=>CODIGO_FALLO2,
				MENSAJE=>'Se necesita identificador y fecha'
			)
		);
	}
}

?>