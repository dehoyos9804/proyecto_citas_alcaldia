<?php
/**
 * Representa los datos de los gastos
 * almacenados en la base de datos
 */

require '../../data/DatabaseConnection.php';


class tblDependencias
{
    //nombre de la tabla y atributos asociados a la clase
    const TABLE_NAME="tbldependencias";
    const ID_DEPENDENCIA = "iddependencia";
    const NOMBRE="nombre";
    const OBSERVACION="observacion";

    function __construct()
    {

    }

    /**
     * Obtiene todos los gastos de la base de datos
     * @return array|| bool  Arreglo con todos los gastos o false en caso de error
     */
 	public static function getAll(){
        $consulta = "SELECT tbldependencias.iddependencia, tbldependencias.nombre, tbldependencias.observacion FROM tblfuncionarios INNER JOIN tbldependencias ON tbldependencias.iddependencia = tblfuncionarios.coddependencia;";
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
     * Obtiene los campos de un funcionario con un identificador
     * de dependencia
     */
    public static function getByIdFuncionario($coddependencia){
        // Consulta
        $consulta = "CALL sp_funcionario_dependencia(?);";

        try {


            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($coddependencia));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
            
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
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