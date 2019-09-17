<?php
/**
 * Representa los datos de los gastos
 * almacenados en la base de datos
 */

require '../../data/DatabaseConnection.php';


class tblCitas
{
    //nombre de la tabla y atributos asociados a la clase
    const TABLE_NAME="tblcitas";
    const ID_CITA = "idcita";
    const FECHA = "fecha";
    const HORA_INICIAL = "horai";
    const HORA_FINAL = "horaf";
    const ESTADO = "estado";
    const CODIGO_USUARIO = "codusuario";
    const CODIGO_FUNCIONARIO = "codfuncionario";

    function __construct()
    {

    }    

    /**
     * Insertar un nuevo dato en la tabla citas
     *
     */
    public static function insertcitas($fecha,$horainicial,$horafinal,$codusuario){
        try{
            $pdo = DatabaseConnection::getInstance()->getDb();
            // Sentencia INSERT
            $consulta = "INSERT INTO tblcitas(fecha, horai, horaf, estado, codusuario) VALUES(?,?,?,?,?);";
            // Preparar la sentencia
            $sentencia = $pdo->prepare($consulta);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
                array($fecha,
                    $horainicial,
                    $horafinal,
                    '1',
                    $codusuario
                )
            );

            // Retornar en el último id insertado
            return $pdo->lastInsertId();

        }catch (PDOException $e) {
            return false;
        }
    
    }

    /**
     * Insertar un detalle de citas tabla gestion de citas
     *
     */
    public static function insertGestionCitas($codcita,$fechareal,$horareali,$horarealf,$notificacion,$coddependencia,$codtema){
        try{

            // Sentencia INSERT
            $consulta = "INSERT INTO tblgestioncitas(codcita, fechareal, horareali, horarealf, notificacion, coddependencia, codtema) VALUES(?,?,?,?,?,?,?);";
            // Preparar la sentencia
            $sentencia = DatabaseConnection::getInstance()->getDb()->prepare($consulta);

            return $sentencia->execute(
                array(
                    $codcita,
                    $fechareal,
                    $horareali,
                    $horarealf,
                    $notificacion,
                    $coddependencia,
                    $codtema
                )
            );

        }catch (PDOException $e) {
            return false;
        }
    
    }

}
?>