<?php
/**
 * Representa los datos de los gastos
 * almacenados en la base de datos
 */

require '../../data/DatabaseConnection.php';


class tblFuncionarios
{
    //nombre de la tabla y atributos asociados a la clase
    const TABLE_NAME="tblfuncionarios";
    const NUMERO_CEDULA = "numerocedula";
    const NOMBRES="nombres";
    const APELLIDOS="apellidos";
    const TELEFONO="telefono";
    const DIRECCION="direccion";
    const CORREO="correo";
    const CLAVE="clave";
    const CODIGO_DEPENDENCIA="coddependencia";
    const ESTADO="estado";
    const TIPO_USUARIO="tipousuario";
    const CODIGO_TIPO_FUNCIONARIO="codtipofuncionario";

    function __construct()
    {

    }

    /**
     * Obtiene todos los gastos de la base de datos
     * @return array|| bool  Arreglo con todos los gastos o false en caso de error
     */
 	public static function getHorarioFuncionario($codfuncionario){
        $consulta = "CALL sp_get_all_horario_for_funcionario(?);";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute(array($codfuncionario));

            return $comando->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Obtiene todos los gastos de la base de datos
     * @return array|| bool  Arreglo con todos los gastos o false en caso de error
     */
    public static function getAllUsuarios(){
        $consulta = "CALL sp_all_usuarios();";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            return false;
        }
    }
    /**
     * Obtiene todos los gastos de la base de datos
     * @return array|| bool  Arreglo con todos los gastos o false en caso de error
     */
    public static function getGestionCitaId($codcita){
        $consulta = "CALL sp_gestion_citas(?);";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute(array($codcita));

            return $comando->fetch(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     */
    public static function updateCita($estado,$codcita){
        // Creando consulta UPDATE
        $consulta = "UPDATE tblcitas SET tblcitas.estado = ? WHERE tblcitas.idcita = ?";
        // Preparar la sentencia
        $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $comando->execute(array($estado,$codcita));

        return $comando;
    }

    /**
     * Insertar un nuevo dato en la tabla temas
     *
     */
    public static function insertarHorario($codfuncionario){
        try{
            $pdo = DatabaseConnection::getInstance()->getDb();
            // Sentencia INSERT
            $consulta = "INSERT INTO tblhorarios(fechainicio, codfuncionario) VALUES (CURDATE(), ?);";
            // Preparar la sentencia
            $sentencia = $pdo->prepare($consulta);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
                array(
                    $codfuncionario
                )
            );

            // Retornar en el último id insertado
            return $pdo->lastInsertId();

        }catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Insertar un nuevo dato en la tabla temas
     *
     */
    public static function insertarHorarioSemanal($coddia, $codhorario, $horaentrada, $horasalida, $codjornada){
        try{
            $pdo = DatabaseConnection::getInstance()->getDb();
            // Sentencia INSERT
            $consulta = "INSERT INTO tbldiassemanas(coddia,codhorario,horaentrada,horasalida,codjornada) VALUES(?,?,?,?,?);";
            // Preparar la sentencia
            $sentencia = $pdo->prepare($consulta);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
                array(
                    $coddia,
                    $codhorario,
                    $horaentrada,
                    $horasalida,
                    $codjornada
                )
            );

            // Retornar en el último id insertado
            return $pdo->lastInsertId();

        }catch (PDOException $e) {
            return false;
        }
    }

}
?>