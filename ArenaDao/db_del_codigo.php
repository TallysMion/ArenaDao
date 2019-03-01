<?php

$response = array();

if(isset($_POST["id"])){
	
	$id_cod = $_POST["id"];
	
	require_once __DIR__ .'/db_connect.php';
	
	$db = new DB_CONNECT();
	
	$result = mysql_query("DELETE FROM codigo WHERE id='$id_cod'");
	
	if(!empty($result)){
		$response["success"] = 1;
		$response["mensage"] = "Codigo Deletado";
		echo json_encode($response);			
	}else{
		$response["success"] = 0;
		$response["mensage"] = "Erro de Delecao do codigo";
		echo json_encode($response);			
	}
}else{
	$response["success"] = 0;
	$response["mensage"] = "Campo nao encontrado";
	echo json_encode($response);			
}


?>