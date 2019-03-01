<?php

$response = array();

if(isset($_POST["nome_proj"]) && isset($_POST["cod_proj"]) && isset($_POST["igreja_proj"]) && isset($_POST["endereco_proj"]) && isset($_POST["hr_proj"]) && isset($_POST["min_proj"]) && isset($_POST["dia_proj"])){
	
	$nome_proj   	= $_POST["nome_proj"];
	$cod_proj    	= $_POST["cod_proj"];
	$igreja_proj 	= $_POST["igreja_proj"];
	$endereco_proj 	= $_POST["endereco_proj"];
	$hr_proj 		= $_POST["hr_proj"];
	$min_proj 		= $_POST["min_proj"];
	$dia_proj 		= $_POST["dia_proj"];
	
	require_once __DIR__ .'/db_connect.php';
	
	$db = new DB_CONNECT();
	
	$result = mysql_query("INSERT INTO arena(nome, endereco, igrejaMae, diaDaSemana, horarioHr, horarioMin, codigo) 
								VALUES ('$nome_proj', '$endereco_proj', '$igreja_proj', '$dia_proj', '$hr_proj', '$min_proj', '$cod_proj')");
	
	
	if(!empty($result)){
		$response["success"] = 1;			
		$response["mensage"] = "Criação bem sucedida";
		echo json_encode($response);			
	}else{
		$response["success"] = 0;
		$response["mensage"] = "Erro de Insert";
		echo json_encode($response);			
	}
}else{
	$response["success"] = 0;
	$response["mensage"] = "Campo nao encontrado";
	echo json_encode($response);			
}

?>