<?php
/**
 * Representa los datos de los gastos
 * almacenados en la base de datos
 */
require 'data/DatabaseConnection.php';

/**
* 
*/
class tblAdministradores
{
	//nombre de la tabla y atributos asociados a la clase
	const TABLE_NAME="tbladministradores";
	const ID_ADMINISTRADOR = "idadministrador";
	const NOMBRES="nombre";
	const APELLIDOS="apellidos";
	const TELEFONOS="telefonos";
	const EMAIL = "email";
	const USUARIO = "usuario";
	const CLAVE = "clave";

	function __construct()
	{
	}


      /**
     * permite obtener el usuario si el logueo del usuario es el correcto
     */
    public static function getLogout($usuario, $clave){
        // Consulta
        $consulta = "CALL sp_iniciar_sesion_admin(?, ?);";

        try {

            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($usuario, $clave));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
            
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }


    public static function getAllDia(){
        $consulta = "SELECT * FROM tbldias";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllJornada(){
        $consulta = "SELECT * FROM tbljornadas";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function getAllDependencia(){
        $consulta = "SELECT * FROM tbldependencias";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllUsuarios(){
        $consulta = "SELECT * FROM tblusuarios";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            return false;
        }
    }


    public static function getAllTipoFuncionario(){
        $consulta = "SELECT * FROM tbltipofuncionario";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllFuncionario(){
        $consulta = "SELECT * FROM tblfuncionarios";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllCitas($depencia_id){
        $consulta = "SELECT tblgestioncitas.codcita, tblgestioncitas.fechareal, tblgestioncitas.horareali, tblgestioncitas.horarealf, tbltemas.tema, tblfuncionarios.nombres, tblfuncionarios.apellidos FROM tblgestioncitas
            INNER JOIN tbltemas_funcionarios ON tbltemas_funcionarios.idtemafuncionario = tblgestioncitas.codtema
            INNER JOIN tbltemas ON tbltemas.idtema = tbltemas_funcionarios.codtema
            INNER JOIN tblfuncionarios ON tblfuncionarios.numerocedula = tbltemas_funcionarios.codfuncionario
            WHERE tblgestioncitas.coddependencia = ?";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute(array($depencia_id));

            return $comando->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getFuncionario($funcionario_id){
        $consulta = "SELECT tblfuncionarios.numerocedula, tblfuncionarios.nombres, tblfuncionarios.apellidos, tblfuncionarios.direccion, tblfuncionarios.coddependencia, tblfuncionarios.codtipofuncionario, tblfuncionarios.correo, tblfuncionarios.telefono, tbldependencias.nombre, tbltipofuncionario.tipofuncionario FROM tblfuncionarios
            INNER JOIN tbldependencias ON tbldependencias.iddependencia = tblfuncionarios.coddependencia
            INNER JOIN tbltipofuncionario ON tbltipofuncionario.idtipofuncionario = tblfuncionarios.codtipofuncionario
            WHERE tblfuncionarios.numerocedula = ?";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute(array($funcionario_id));

            return $comando->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllFuncionario2(){
        $consulta = "SELECT tblfuncionarios.numerocedula, tblfuncionarios.nombres, tblfuncionarios.apellidos, tblfuncionarios.direccion, tblfuncionarios.coddependencia, tblfuncionarios.codtipofuncionario, tblfuncionarios.correo, tblfuncionarios.telefono, tbldependencias.nombre, tbltipofuncionario.tipofuncionario, tblfuncionarios.estado FROM tblfuncionarios
            INNER JOIN tbldependencias ON tbldependencias.iddependencia = tblfuncionarios.coddependencia
            INNER JOIN tbltipofuncionario ON tbltipofuncionario.idtipofuncionario = tblfuncionarios.codtipofuncionario";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute(array());

            return $comando->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getListaFuncionario(){
       $consulta = "SELECT * FROM tblfuncionarios
                    WHERE tblfuncionarios.estado = 'ACTIVO' OR tblfuncionarios.estado = 'INACTIVO';";
        try {
            //preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            //ejecutar secuencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        } 
    }


}
?>