<?php
/**
 * Actualiza una meta especificada por su identificador
 */
const ESTADO="estado";
const DATOS="tblFuncionarios";
const MENSAJE="mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;

require '../../boards/tblFuncionarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar
    $retorno = tblFuncionarios::updateCita(
        $body['estado'],
        $body['codcita']
    );

    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                ESTADO => CODIGO_EXITO,
                MENSAJE => "Se actualizo el estado de la cita")
        );
    } else {
        // Código de falla
        print json_encode(
            array(
                ESTADO => CODIGO_FALLO,
                MENSAJE => 'Actualización fallida')
        );
    }
}