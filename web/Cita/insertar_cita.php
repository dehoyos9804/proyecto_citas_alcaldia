<?php
/**
 * Insertar un nuevo dato en la base de datos
 */
const ESTADO="estado";
const DATOS="tblusuarios";
const MENSAJE="mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;
const CODIGO_FALLO2 = 3;

require '../../boards/tblCitas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	// Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar cita insertcitas($fecha,$horainicial,$horafinal,$codusuario)
    $retorno = tblCitas::insertcitas(
    	         $body['fecha'],
                 $body['horainicial'],
                 $body['horafinal'],
                 $body['codigousuario']
                );

    if($retorno > 0){
        //insertar el detalle de la cita insertGestionCitas($codcita,$fechareal,$horareali,$horarealf,$notificacion,$coddependencia,$codtema)
        $detalle = tblCitas::insertGestionCitas(
                    $retorno,
                    $body['fecha'],
                    $body['horainicial'],
                    $body['horafinal'],
                    $body['notificacion'],
                    $body['coddependencia'],
                    $body['codtema']
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
                MENSAJE => "Error al guardar la cita".$retorno)
        );
    }
}