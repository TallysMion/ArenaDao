<?php

$response = array();

if(isset($_POST["nome_proj"]) && isset($_POST["cod_proj"])){
	
	$nome_proj = $_POST["nome_proj"];
	$cod_proj  = $_POST["cod_proj"];
	
	
	require_once __DIR__ .'/db_connect.php';
	
	$db = new DB_CONNECT();
	
	$result = mysql_query("SELECT * FROM codigo WHERE nome='$nome_proj' AND codigo='$cod_proj'");
	
	if(!empty($result)){
		if(mysql_num_rows($result) > 0){
			$result = mysql_fetch_array($result);
			
			$codigo = array();
			$codigo["id"]     = $result["id"];
			$codigo["nome"]   = $result["nome"];
			$codigo["igreja"] = $result["igreja"];
			$codigo["codigo"] = $result["codigo"];
			
			$response["success"] = 1;
			
			$response["codigo"] = $codigo;
			echo json_encode($response);			
		}else{
			$response["success"] = 0;
			$response["mensage"] = "Nenhum Codigo Encontrado";
			echo json_encode($response);			
		}
	}else{
		$response["success"] = 0;
		$response["mensage"] = "Nenhum Codigo Encontrado";
		echo json_encode($response);			
	}
}else{
	$response["success"] = 0;
	$response["mensage"] = "Campo nao encontrado";
	echo json_encode($response);			
}


?>