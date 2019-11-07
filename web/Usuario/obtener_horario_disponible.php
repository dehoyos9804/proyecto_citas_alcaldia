<?php
/**
 * Obtiene todos los gastos de la base de datos
 */

//constantes para la construcción de respuestas 
const ESTADO="estado";
const DATOS="tblusuarios";
const MENSAJE="mensaje";
const FECHA_ESCOJIDA = "fecha";
const DURACION_TEMA = "duracion";
const COD_FUNCIONARIO = "codfuncionario";

const CODIGO_EXITO=1;
const CODIGO_FALLO=2;
const CODIGO_FALLO2 =3;

require '../../boards/tblUsuarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(isset($_GET[FECHA_ESCOJIDA]) && isset($_GET[DURACION_TEMA]) && isset($_GET[COD_FUNCIONARIO])){

	// Obtener parámetros
	$fecha = $_GET[FECHA_ESCOJIDA];	
	$idfuncionario = $_GET[COD_FUNCIONARIO];
	$duracion = $_GET[DURACION_TEMA];

	//obtener de la base de datos
	//$dependencia=tblUsuarios::horarioFuncionario($idfuncionario);
	$dependencia=tblUsuarios::horarioFuncionario($fecha, $idfuncionario);

	
	$existe = tblUsuarios::exiteHorario($fecha);
	$dia_trabaja = tblUsuarios::diaTrabaja($fecha, $idfuncionario);
	$isevento = tblusuarios::exiteeventos($fecha);
	//$horaentrada = $dependencia['horaentrada'];
	//$horafinal = $dependencia['horasalida'];
	//$sumarHora = tblUsuarios::sumarHora($fecha,$horaentrada, $duracion);
	
	if($dia_trabaja['diatrabaja'] > 0){

	switch ($existe['existe']) {
		case '0'://no se han seleccionado horarios en ese dia
			if($isevento['isevento']){
				print("HAY EVENTOS");
			}else{
				$array = array();
				$i = 0;
				foreach ($dependencia as $key) {
					$horaentrada= $key['horaentrada'];
					$horafinal = $key['horasalida'];
					$sumarHora = tblUsuarios::sumarHora($fecha,$horaentrada, $duracion);
					//$i = 0;
					$auxiliarhorainicial = $horaentrada;
					$auxiliarhorafinal = $sumarHora['horasuma'];
					//$array =  array();
					while(($auxiliarhorainicial != $horafinal)){
						$array[$i] = array("horai"=>$auxiliarhorainicial, "horaf"=>$auxiliarhorafinal);
						$auxiliarhorainicial = $auxiliarhorafinal;
						$suma = tblUsuarios::sumarHora($fecha,$auxiliarhorainicial, $duracion);
						$auxiliarhorafinal = $suma['horasuma'];
						$i++;
					}
				}
				if(count($array)>0){
					$datos[ESTADO]=CODIGO_EXITO;
					$datos[DATOS]=$array;
					print json_encode($datos);
				}else{
					json_encode(array(
						ESTADO=>CODIGO_FALLO,
						MENSAJE=>"No hay Horario Disponible para la fecha.."
					));
				}
			}
			break;
		case '1'://ya existen horas escojidas
				$matriz = array();
				$j = 0;
				$h_elegidos = tblUsuarios::allHorarioFecha($fecha);//horario elegidos, estas horas ya no estan disponibles
				foreach ($dependencia as $key) {
					$horaentrada= $key['horaentrada'];
					$horafinal = $key['horasalida'];
					$sumarHora = tblUsuarios::sumarHora($fecha,$horaentrada, $duracion);
							
					$auxhorainicial = $horaentrada;
					$auxhorafinal = $sumarHora['horasuma'];

					//genero los horarios disponibles
					while($auxhorainicial != $horafinal){
						foreach ($h_elegidos as $key) {
							//$hielegida = $key['horainicial'];
							//$hfelegida = $key['horafinal'];
							$hielegida = $key['horareali'];
							$hfelegida = $key['horarealf'];

							if($auxhorainicial == $hielegida || $auxhorafinal == $hfelegida){
								$auxhorainicial = $hfelegida;
								$sum_new_horaf = tblUsuarios::sumarHora($fecha,$hfelegida, $duracion);
								$auxhorafinal = $sum_new_horaf['horasuma'];
							}
						}

						if($auxhorainicial != $horafinal){
							$matriz[$j] = array("horai"=>$auxhorainicial, "horaf"=>$auxhorafinal);
							$auxhorainicial = $auxhorafinal;
							$sumar_add = tblUsuarios::sumarHora($fecha,$auxhorainicial, $duracion);
							$auxhorafinal = $sumar_add['horasuma'];
							$j++;
						}
					}

				}

				if(count($matriz)>0){
					$datos[ESTADO]=CODIGO_EXITO;
					$datos[DATOS]=$matriz;
					print json_encode($datos);
				}else{
					print json_encode(array(
						ESTADO=>CODIGO_FALLO2,
						MENSAJE=>"No hay Horario Disponible para la fecha.."
					));
				}
			break;		
		
	}

	}else{

		print json_encode(array(
					ESTADO=>CODIGO_FALLO2,
					MENSAJE=>"En este dia no se atiende, eliga otra fecha"
		));
	}

	}

}