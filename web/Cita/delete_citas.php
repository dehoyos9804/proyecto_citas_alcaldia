<?php
/**
 * Actualiza una meta especificada por su identificador
 */
const ESTADO="estado";
const DATOS="tblcitas";
const MENSAJE="mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;

require '../../boards/tblCitas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	// Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar
    $retorno = tblCitas::delete($body['idcita']);

    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                ESTADO => CODIGO_EXITO,
                MENSAJE => 'La cita se elimino exitosamente')
        );
    } else {
        // Código de falla
        print json_encode(
            array(
                ESTADO => CODIGO_FALLO,
                MENSAJE => 'Error: No se pudo eliminar la cita')
        );
    }
}