<?php
/**
 * Representa los datos de los gastos
 * almacenados en la base de datos
 */

require '../../data/DatabaseConnection.php';


class tblUsuarios
{
    //nombre de la tabla y atributos asociados a la clase
    const TABLE_NAME="tblusuarios";
    const ID_USUARIO = "idusuario";
    const NOMBRES="nombres";
    const APELLIDOS="apellidos";
    const TELEFONOS="telefonos";
    const DIRECCION = "direccion";
    const CORREO = "correo";
    const CLAVE = "clave";

    function __construct()
    {

    }


    /**
     * Insertar un nuevo dato
     *
     */
    public static function insert($idusuario,$nombres,$apellidos,$telefonos,$direccion,$correo,$clave){
        try{

            // Sentencia INSERT
            $consulta = "INSERT INTO ".self::TABLE_NAME." VALUES (?,?,?,?,?,?,MD5(?));";
            // Preparar la sentencia
            $sentencia = DatabaseConnection::getInstance()->getDb()->prepare($consulta);

            return $sentencia->execute(
                array(
                    $idusuario,
                    $nombres,
                    $apellidos,
                    $telefonos,
                    $direccion,
                    $correo,
                    $clave
                )
            );

        }catch (PDOException $e) {
            return false;
        }
    
    }


}
?>