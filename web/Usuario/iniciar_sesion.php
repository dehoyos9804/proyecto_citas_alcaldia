<?php
/*
*Obtiene los datos necesarios que se necesitan en la consulta de inicio
*/
//constantes para la construcción de respuestas 
const ESTADO="estado";
const DATOS="tbliniciosesion";
const MENSAJE="mensaje";
const USUARIO = "usuario";
const UPASSWORD = "clave";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;
const CODIGO_FALLO2 = 3;
const CODIGO_FALLO3 = 4;

require '../../boards/tblUsuarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	if (isset($_GET[USUARIO]) && isset($_GET[UPASSWORD])){
		//obtener parámetro usuario
		$parametro1 = $_GET[USUARIO];
		$parametro2 = $_GET[UPASSWORD];

		// Tratar retorno
		$retorno = tblUsuarios::get_iniciar_sesion($parametro1, $parametro2);
		//Definir tipo de respuesta 
	    header('Content-Type: application/json');
	    if ($retorno){
	    	if($retorno == -1){
	    	// Enviar respuesta de error general
            	print json_encode(
                	array(
                    	ESTADO => CODIGO_FALLO3,
                    	MENSAJE => 'El usuario no Existe, Favor registrarse primero'
                	)
            	);
	    	}else{
	    		$datos[ESTADO] = CODIGO_EXITO;
	    		$datos[DATOS] = $retorno;
	    		// Enviar objeto json
            	print json_encode($datos);
        	}
	    }else{
	    	// Enviar respuesta de error general
            print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => 'Contraseña Incorrecta'
                )
            );
	    }

	}else{
		// Enviar respuesta de error
		print json_encode(
			array(
				ESTADO=>CODIGO_FALLO2,
				MENSAJE=>'usuario y/o contraseñas vacias'
			)
		);
	}
}

?>