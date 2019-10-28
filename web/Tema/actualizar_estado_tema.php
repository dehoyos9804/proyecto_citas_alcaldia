<?php
/**
 * Actualiza una meta especificada por su identificador
 */
const ESTADO="estado";
const DATOS="tbltemas";
const MENSAJE="mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;

require '../../boards/tblTemas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar
    $retorno = tblTemas::update(
        $body['estado'],
        $body['idtema']
    );

    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                ESTADO => CODIGO_EXITO,
                MENSAJE => 'Actualización éxitosa')
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
