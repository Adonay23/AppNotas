<?php 
define('DATABASE','notas');
define('HOSTNAME','localhost');
define('USERNAME','ah17010');
define('PASSWORD','root');
class Conexion
{

    private static $db = null;
    
  
    private static $pdo;

    final private function __construct()
    {
        try {
            // Crear nueva conexión PDO
            self::getDb();
        } catch (PDOException $e) {
            // Manejo de excepciones
        }


    }

    /**
     * Retorna en la única instancia de la clase
     * @return Database|null
     */
    public static function getInstance()
    {
        if (self::$db === null) {
            self::$db = new self();
        }
        return self::$db;
    }

    /**
     * Crear una nueva conexión PDO basada
     * en los datos de conexión
     * @return PDO Objeto PDO
     */
    public function getDb()
    {
        //  $c = new PDO( "sqlsrv:Server=(local) ; Database = AdventureWorks ", "", "", array(PDO::SQLSRV_ATTR_DIRECT_QUERY => true));
        //  
        //  
        if (self::$pdo == null) {
            self::$pdo = new PDO(
    'mysql:dbname='.DATABASE.
    ';host='.HOSTNAME.
    ';port=3306',
    USERNAME,
    PASSWORD
            );
            // Habilitar excepciones
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$pdo;
    }

    /**
     * Evita la clonación del objeto
     */
    final protected function __clone()
    {
    }

    function _destructor()
    {
        self::$pdo = null;
    }

}
?>
