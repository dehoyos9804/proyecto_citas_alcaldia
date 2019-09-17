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

    /*permite saber si el horario se encuentra con horas disponibles o horas ya seleccionadas*/
    public static function exiteHorario($fecha){
        //consulta
        $consulta = "SELECT sf_existen_horas(?) as existe;";
        // Preparar sentencia
        $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
        // Ejecutar sentencia preparada
        $comando->execute(array($fecha));
        // Capturar primera fila del resultado
        $row = $comando->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    /*permite saber si la fecha es un dia de trabajo para el funcionario o la dependencia*/
    public static function diaTrabaja($fecha, $idfuncionario){
        //consulta
        $consulta = "SELECT sf_get_dia_semana(?,?) AS diatrabaja";
        // Preparar sentencia
        $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
        // Ejecutar sentencia preparada
        $comando->execute(array($fecha, $idfuncionario));
        // Capturar primera fila del resultado
        $row = $comando->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    /*permite mostrar los horarios disponibles que tiene el funcionario con respecto al tiempo de duracion de cada tema*/
    public static function sumarHora($fecha, $horainicial, $duracion){
        try {
            //consulta
            $consulta = "SELECT sf_sumar_hora(?,?,?) as horasuma;";
            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($fecha,$horainicial, $duracion));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
        return $row;
        } catch (PDOException $e) {
            return false;
        }
    }

    /*permite mostrar las horas escojidas por los usuarios @horarios ya escojidos*/
    public static function allHorarioFecha($fecha){
        try {
            //consulta
            /*$consulta = "SELECT tbldetallehorario.horainicial, tbldetallehorario.horafinal
             FROM tbldetallehorario WHERE tbldetallehorario.fecha = ?";*/
             $consulta = "SELECT tblgestioncitas.horareali, tblgestioncitas.horarealf 
                          FROM tblgestioncitas WHERE tblgestioncitas.fechareal = ?;";
            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($fecha));
            // Capturar primera fila del resultado
            $row = $comando->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            return false;
        }
    }
}
?>