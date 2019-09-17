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

}
?>t