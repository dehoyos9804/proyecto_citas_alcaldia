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

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     */
    public static function update($fechareal,$horarealinicial,$horarealfinal, $notificacion, $codcita){
        // Creando consulta UPDATE
        $consulta = "CALL sp_update_citas(?,?,?,?,?);";
        // Preparar la sentencia
        $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $comando->execute(array($fechareal,$horarealinicial, $horarealfinal,$notificacion, $codcita));

        return $comando;
    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idCita identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    
    public static function delete($idCita){
        // Sentencia DELETE
        $comando = "DELETE FROM tblcitas WHERE idcita = ?;";

        // Preparar la sentencia
        $sentencia = DatabaseConnection::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($idCita));
    }

    /*Permite traer toda las citas que le pertenece a cada funcionario en un dia especifico**/
    public static function allListaCitasFuncionario($codfuncionario, $fecha){
        try {
            $consulta = "CALL sp_consultar_citas_funcionarios(?,?);";
            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($codfuncionario, $fecha));
            // Capturar primera fila del resultado
            $row = $comando->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            return false;
        }
    }

}
?>