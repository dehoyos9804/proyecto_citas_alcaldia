<?php
/**
 * Insertar un nuevo dato en la base de datos
 */
const ESTADO="estado";
const DATOS="tblfuncionario";
const MENSAJE="mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;

require '../../boards/tblFuncionarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	// Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar meta
    $retorno = tblFuncionarios::insertarHorarioSemanal(
    	         $body['coddia'],
                 $body['codhorario'],
                 $body['horaentrada'],
                 $body['horasalida'],
                 $body['codjornada']
                );

    header("Content-Type: application/json");

    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                ESTADO => CODIGO_EXITO,
                MENSAJE => 'Creacion exitosa')
        );

    } else {
        // Código de falla
        print json_encode(
            array(
                ESTADO => CODIGO_FALLO,
                MENSAJE => 'Error al insertar detalle horario')
        );
    }
}