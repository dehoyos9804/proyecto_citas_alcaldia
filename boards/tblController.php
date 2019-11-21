<?php
/**
 * Representa los datos de los gastos
 * almacenados en la base de datos
 */

require '../data/DatabaseConnection.php';


class tblController
{

    function __construct()
    {

    }    

    /**
     * Insertar un nuevo dato en la tabla citas
     *
     */
    public static function insertardependencia($nombre,$observacion){
        // Sentencia INSERT
        $consulta = "INSERT INTO tbldependencias(nombre,observacion) VALUES(?,?);";
        // Preparar la sentencia
        $sentencia = DatabaseConnection::getInstance()->getDb()->prepare($consulta);

        return $sentencia->execute(
            array(
                $nombre,
                $observacion
            )
        );
    }

    public static function updateEstadoFuncionario($estado, $numerocedula){
        $consulta = "UPDATE tblfuncionarios 
                    SET estado = ?
                    WHERE numerocedula = ?;";
        // Preparar la sentencia
        $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $comando->execute(array($estado, $numerocedula));

        return $comando;            
    }

    public static function insertarfuncionario($numerocedula,$nombres,$apellidos,$telefono,$direccion,$correo,$clave,$coddependencia,$estado,$tipousuario,$codtipousuario){
        // Sentencia INSERT
        $consulta = "INSERT INTO tblfuncionarios(numerocedula,nombres,apellidos,telefono,direccion,correo,clave,coddependencia,estado,tipousuario,codtipofuncionario) VALUES(?,?,?,?,?,?,SHA(?),?,?,?,?);";
        // Preparar la sentencia
        $sentencia = DatabaseConnection::getInstance()->getDb()->prepare($consulta);

        return $sentencia->execute(
            array(
                $numerocedula,
                $nombres,
                $apellidos,
                $telefono,
                $direccion,
                $correo,
                $clave,
                $coddependencia,
                $estado,
                $tipousuario,
                $codtipousuario
            )
        );
    }

    

    public static function insertarevento($nombreevento,$fechaevento,$horainicial,$horafinal,$descripcion,$coddia,$codjornada){
        // Sentencia INSERT
        $consulta = "INSERT INTO tbleventos(nombreevento,fechaevento,horainicial,horafinal,descripcion,coddia,codjornada) VALUES(?,?,?,?,?,?,?);";
        // Preparar la sentencia
        $sentencia = DatabaseConnection::getInstance()->getDb()->prepare($consulta);

        return $sentencia->execute(
            array(
                $nombreevento,
                $fechaevento,
                $horainicial,
                $horafinal,
                $descripcion,
                $coddia,
                $codjornada
            )
        );
    }

}
?>