<?php  	
require '../boards/tblController.php';

	//extraigo los datos del formulario
		$nombre = $_POST['nombre'];
		$observacion = $_POST['observacion'];
		
		//inserto la enfermedad desde php
		$retorno = tblController::insertardependencia(
			$nombre,
			$observacion

		);

		//evaluo si se la operacion de inserción fue exitosa
		if($retorno){
			echo "Dependencia Guardada Exitosamente";
			header("Location: ../registrodependencia.php");
		}
	
?>
	