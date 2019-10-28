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

require '../../boards/tblTemas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar cita insertcitas($fecha,$horainicial,$horafinal,$codusuario)
    $retorno = tblTemas::insert(
                 $body['coddependencia'],
                 $body['tema'],
                 $body['duracion']
                );

    if($retorno > 0){
        //insertar en la tabla temas funcionarioss
        $detalle = tblTemas::insertTemaFuncionario(
                    $body['codfuncionario'],
                    $retorno
                );


        if ($detalle) {
            // Código de éxito
            print json_encode(
                array(
                    ESTADO => CODIGO_EXITO,
                    MENSAJE => 'Creacion exitosa')
            );

        } else {
            header("Content-Type: application/json");
            // Código de falla
            print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => "Error al guardar el detalle".$detalle)
            );
        }

    }else{
        // Código de falla
        print json_encode(
            array(
                ESTADO => CODIGO_FALLO2,
                MENSAJE => "Error al guardar el tema".$retorno)
        );
    }
}