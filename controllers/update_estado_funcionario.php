<?php

	require '../boards/tblController.php';
	if(isset($_GET['numerocedula']) && isset($_GET['estado'])){

		$numerocedula = $_GET['numerocedula'];
		$estado = $_GET['estado'];
		$evaluar = tblController::updateEstadoFuncionario($estado, $numerocedula);

		if($evaluar){
			header("Location: ../listafuncionarios2.php");
		}

	}else{
		//redirijo a la pagina de error
		header("Location: ../views/page-error-500.php");	
	}
?>