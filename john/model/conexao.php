<?php

	require_once'config.php';

	 class Conexao{
	 	#protected $tabela;
	 	public static $instancia;


		public static function  getInstancia(){
			if (!isset(self::$instancia)) {

				try {
					self::$instancia=new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
					self::$instancia->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					self::$instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
				} catch (PDOException $e) {
					echo $e->getMessage();
					//die();
					
				}
			}

			return self::$instancia;
		} 

		public static function prepare($sql){
		return self::getInstancia()->prepare($sql);

	}
		
		
	}

?>

	