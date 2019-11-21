<?php  	
require '../boards/tblController.php';

	//extraigo los datos del formulario
	       $numerocedula =$_POST['numerocedula'];
                $nombres =$_POST['nombres'];
                $apellidos =$_POST['apellidos'];
                $telefono =$_POST['telefono'];
                $direccion =$_POST['direccion'];
                $correo =$_POST['correo'];
                $clave =$_POST['clave'];
                $coddependencia =$_POST['coddependencia'];
                $estado ="ACTIVO";
                $tipousuario ="FUNCIONARIO";
                $codtipousuario =$_POST['codtipousuario'];
		
		//inserto la enfermedad desde php
		$retorno = tblController::insertarfuncionario(
		$numerocedula,
                $nombres,
                $apellidos,
                $telefono,
                $direccion,
                $correo,
                $clave,
                $coddependencia,
                $estado,
                $tipousuario,
                $codtipousuario
		);

		//evaluo si se la operacion de inserción fue exitosa
		if($retorno){
			echo "Funcionario Guardado Exitosamente";
			header("Location: ../registrofuncionario.php");
		}
	
?>
	