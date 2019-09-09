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
    const COD_FUNCIONARIO = 'codfuncionario'; 

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
            $consulta = "INSERT INTO ".self::TABLE_NAME." VALUES (?,?,?,?,?,?,MD5(?),?);";
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
                    $clave,
                    null
                )
            );

        }catch (PDOException $e) {
            return false;
        }
    
    }
    public static function getById($numerocedula){
        // Consulta
        $consulta = "SELECT ".self::NUMEROCEDULA.", ".self::NOMBRES.", ".self::APELLIDOS.", ".TELEFONOS.", ".self::DIRECCION.", ".self::USUARIO.", ".self::CONTRASEÑA.", ".self::ESTADO.", ".self::CODDEPARTAMENTO.", ".self::CODPROFESION.", ".self::IMAGEN.", ".self::TIPOUSUARIO.", ".self::TITULO.
                    " FROM ".self::TABLE_NAME.
                    " WHERE ".self::NUMEROCEDULA." = ?";

        try {


            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($numerocedula));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
            
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /*permite traer todo los datos del horario con respecto al codigo del funcionario*/
    public static function horarioFuncionario($codfuncionario){
        //consulta
        $consulta = "SELECT * FROM tblhorarios WHERE tblhorarios.codfuncionario = ?;";
        // Preparar sentencia
        $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
        // Ejecutar sentencia preparada
        $comando->execute(array($codfuncionario));
        // Capturar primera fila del resultado
        $row = $comando->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    /*permite mostrar los horarios disponibles que tiene el funcionario con respecto al tiempo de duracion de cada tema*/
    public static function horariosDisponibles($fecha, $horainicial, $duracion){
        try {
            
        } catch (PDOException $e) {
            return false;
        }
    }


}
?>