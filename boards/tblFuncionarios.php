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
}
?>