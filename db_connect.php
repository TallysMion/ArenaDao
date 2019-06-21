<?php

class DB_CONNECT{

    public $conection;

	//constructor
	function __construct(){
		$this->conection = $this->connect();
	}
	
	//destructor
	function __destruct(){
		$this->close();
	}
	
	//connecta
	function connect(){
		require_once __DIR__ .'/db_config.php';
        $mysqli = new mysqli(DB_SERV, DB_USER, DB_PASS, DB_DATA);
		return $mysqli;
	}
	
	function close(){
		$this->conection->close();
	}
	
}

?>