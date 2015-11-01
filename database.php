<?php
class Database
{
	private static $dbName = 'segundoparcial' ;
	private static $dbHost = 'localhost' ;
	private static $dbUsername = 'diegorg';
	private static $dbUserPassword = 'diegorgSDF';

	private static $cont  = null;

	public function __construct() {
		exit('Init function is not allowed');
	}

	public static function connect()
	{
	     // One connection through whole application
       if (self::$cont == null)
       {
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
        }
        catch(PDOException $e)
        {
          die($e->getMessage());
        }
       }
       return self::$cont;
	}

	public static function disconnect()
	{
		self::$cont = null;
	}
}
?>