<?php
/**
 * Representa los datos de los gastos
 * almacenados en la base de datos
 */
require '../data/DatabaseConnection.php';

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
     * Obtiene todos los gastos de la base de datos
     * @return array|| bool  Arreglo con todos los gastos o false en caso de error
     */
 	public static function getAll(){
        $consulta = "SELECT * FROM ".self::TABLE_NAME;
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
     * Obtiene los campos de un administrador con un identificador
     * determinado
     */
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

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     */
    public static function update($numerocedula,$nombres,$apellidos,$telefonos,$direccion,$usuario,$contraseña,$estado,$coddepartamento,$codprofesion,$imagen,$tipousuario,$titulo){
        // Creando consulta UPDATE
        $consulta = "UPDATE ".self::TABLE_NAME.
                    " SET ".self::NOMBRES." = ?".self::APELLIDOS." = ?".self::TELEFONOS." = ?".self::DIRECCION." = ?".self::USUARIO." = ?".self::CONTRASEÑA." = ?".self::ESTADO." = ?".self::CODDEPARTAMENTO." = ?".self::CODPROFESION." = ?".self::IMAGEN." = ?".self::TIPOUSUARIO." = ?".self::TITULO." = ?".
                    " WHERE ".self::NUMEROCEDULA." = ?";
        // Preparar la sentencia
        $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
        // Relacionar y ejecutar la sentencia
        $comando->execute(array($nombres,$apellidos,$telefonos,$direccion,$usuario,$contraseña,$estado,$coddepartamento,$codprofesion,$imagen,$tipousuario, $titulo, $numerocedula));

        return $comando;
    }

    /**
     * Insertar un nuevo dato
     *
     */
    public static function insert($numerocedula,$nombres,$apellidos,$telefonos,$direccion,$usuario,$contraseña,$estado,$coddepartamento,$codprofesion,$imagen,$tipousuario, $titulo){
        // Sentencia INSERT
        $consulta = "INSERT INTO ".self::TABLE_NAME." VALUES(?,?,?,?,?,?,md5(?),?,?,?,?,?,?);";
        // Preparar la sentencia
        $sentencia = DatabaseConnection::getInstance()->getDb()->prepare($consulta);

        return $sentencia->execute(
            array(
                $numerocedula,
                $nombres,
                $apellidos,
                $telefonos,
                $direccion,
                $usuario,
                $contraseña,
                $estado,
                $coddepartamento,
                $codprofesion,
                $imagen,
                $tipousuario,
                $titulo
            )
        );
    }

    /**
     * Eliminar el registro con el identificador especificado
     */
    public static function delete($numerocedula){

        $comando = "DELETE FROM ".self::TABLE_NAME.
                   " WHERE ".self::numerocedula." = ?";

        // Preparar la sentencia
        $sentencia = DatabaseConnection::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($numerocedula));
    }


}
?>