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
}
?>