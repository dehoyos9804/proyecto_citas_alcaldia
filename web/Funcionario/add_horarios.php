<?php
/**
 * Insertar un nuevo dato en la base de datos
 */
const ESTADO="estado";
const DATOS="tbltemas";
const MENSAJE="mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;
const CODIGO_FALLO2 = 3;

require '../../boards/tblFuncionarios.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar nuevo horario
    $retorno = tblFuncionarios::insertarHorario($body['codfuncionario']);
    header("Content-Type: application/json");

    if ($retorno > 0) {
        // Código de éxito
        print json_encode(
            array(
                ESTADO => CODIGO_EXITO,
                MENSAJE => $retorno 
            )
        );
    } else {
        // Código de falla
        print json_encode(
            array(
                ESTADO => CODIGO_FALLO,
                MENSAJE => "Error al guardar el nuevo horario")
        );
    }
}