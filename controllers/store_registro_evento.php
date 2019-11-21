<?php  	
require '../boards/tblController.php';

	//extraigo los datos del formulario
		$nombreevento =$_POST['nombreevento'];
                $fechaevento =$_POST['fechaevento'];
                $horainicial =$_POST['horainicial'];
                $horafinal =$_POST['horafinal'];
                $descripcion =$_POST['descripcion'];
                $coddia =$_POST['coddia'];
                $codjornada =$_POST['codjornada'];
                
		//inserto la enfermedad desde php
		$retorno = tblController::insertarevento(
		$nombreevento,
                $fechaevento,
                $horainicial,
                $horafinal,
                $descripcion,
                $coddia,
                $codjornada

		);

		//evaluo si se la operacion de inserción fue exitosa
		if($retorno){
			echo "Evento Guardado Exitosamente";
			header("Location: ../registroevento.php");
		}
	
?>