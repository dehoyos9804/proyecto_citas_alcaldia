<?php
/**
 * Representa los datos de los gastos
 * almacenados en la base de datos
 */

require '../../data/DatabaseConnection.php';


class tblTemas
{
    //nombre de la tabla y atributos asociados a la clase
    const TABLE_NAME="tbltemas";
    const ID_TEMA = "idtema";
    const CODIGO_DEPENDENCIA = "coddependencia";
    const TEMA = "tema";
    const DURACION = "duracion";
    const ESTADO = "estado";

    function __construct()
    {

    }    

    /*
    *permite traer todos los temas, dependiendo del id de la dependencia a la que pertenecen
    */
    public static function getAllTemasId($coddependencia){
        try {
            //consulta
            $consulta = "CALL sp_all_temas_dependencia(?);";
            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($coddependencia));
            // Capturar primera fila del resultado
            $row = $comando->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            return false;
        }
    }

    /*
    *permite traer todos los temas, dependiendo del id del funcionario al que pertenecen
    */
    public static function getAllTemasIdFuncionario($codfuncionario){
        try {
            //consulta
            $consulta = "CALL sp_all_temas_funcionarios(?);";
            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($codfuncionario));
            // Capturar primera fila del resultado
            $row = $comando->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Insertar un nuevo dato en la tabla temas
     *
     */
    public static function insert($coddependencia,$tema,$duracion){
        try{
            $pdo = DatabaseConnection::getInstance()->getDb();
            // Sentencia INSERT
            $consulta = "INSERT INTO tbltemas(coddependencia, tema, duracion, estado) VALUES (?,?,?,?);";
            // Preparar la sentencia
            $sentencia = $pdo->prepare($consulta);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
                array(
                    $coddependencia,
                    $tema,
                    $duracion,
                    'Activo'
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
    public static function insertTemaFuncionario($codfuncionario,$codtema){
        try{
            $pdo = DatabaseConnection::getInstance()->getDb();
            // Sentencia INSERT
            $consulta = "INSERT INTO tbltemas_funcionarios(codfuncionario, codtema) VALUES(?,?);";
            // Preparar la sentencia
            $sentencia = $pdo->prepare($consulta);

            /*Ejecuto la sentencia para insertar el valor*/
            $sentencia->execute(
                array(
                    $codfuncionario,
                    $codtema
                )
            );
            // Retornar en el último id insertado
            return $pdo->lastInsertId();

        }catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     */
    public static function update($estado, $idtema){
        // Creando consulta UPDATE
        $consulta = "UPDATE tbltemas SET estado = ? WHERE idtema = ?;";
        // Preparar la sentencia
        $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $comando->execute(
            array($estado,$idtema)
        );

        return $comando;
    }

}
?>