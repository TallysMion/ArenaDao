<?php

$response = array();

if(isset($_POST["nome"]) && isset($_POST["login"]) && isset($_POST["senha"]) && isset($_POST["email"]) && isset($_POST["dataNasc"]) && isset($_POST["telefone"]) && isset($_POST["codigo"])){
	
	$nome 		= $_POST["nome"];
	$login 		= $_POST["login"];
	$senha 		= $_POST["senha"];
	$email 		= $_POST["email"];
	$dataNasc	= $_POST["dataNasc"];
	$telefone	= $_POST["telefone"];
	$codigo		= $_POST["codigo"];
	$tipo 		= -1;
	
	require_once __DIR__ .'/db_connect.php';
	
	$db = new DB_CONNECT();
	
	$result = mysql_query("SELECT id FROM arena WHERE codigo='$codigo'");
	if(mysql_fetch_array($result)["id"] != null){
		$tipo = 0;
		$arena = $result["id"];
	}else{
		$result = mysql_query("SELECT id, arena FROM ga WHERE codigo='$codigo'");
		if(mysql_fetch_array($result)["id"] != null){
			$tipo = 1;
			$ga      = $result["id"];
			$arena   = $result["arena"];	
		}
	}
	
	$result = mysql_query("SELECT id FROM usuario WHERE login='$login'");
	if(mysql_fetch_array($result)["id"] == null){	
		if($tipo == 0 || $tipo == 1){
			$result = mysql_query("INSERT INTO `usuario`(tipo, extid, arena, nome, login, senha, email, dataNasc, telefone) 
							VALUES ('$tipo', -1, '$arena', '$nome', '$login', '$senha', '$email', '$dataNasc', '$telefone')");
			if($tipo == 0 && $result){
				$response["success"] = 1;
				$response["mensage"] = "Lider Cadastrado";
				echo json_encode($response);	
			}else{
				$result = mysql_query("SELECT id FROM usuario WHERE login='$login' AND senha='$senha'");
				if(!empty(mysql_fetch_array($result))){
					$userid = $result["id"];				
					$result = mysql_query("INSERT INTO teen(userId, ga, pontuacao) VALUES ('$userid', '$ga', 0)");
					if(!empty($result)){
						$result = mysql_query("SELECT id FROM teen WHERE userId='$userid'");
						if(!empty(mysql_fetch_array($result))){
							$teenid = $result["id"];
							$result = mysql_query("UPDATE `usuario` SET extid='$teenid' WHERE id='$userid'");
							if(!empty($result)){							
								$response["success"] = 1;			
								$response["mensage"] = "Arena Cadastrado";	
								echo json_encode($response);			
							}else{
								$response["success"] = 0;
								$response["mensage"] = "Erro de update";
								echo json_encode($response);			
							}						
						}else{
							$response["success"] = 0;			
							$response["mensage"] = "Erro no Select do Teen";
							echo json_encode($response);			
						}
					}else{
						$response["success"] = 0;
						$response["mensage"] = "Erro de Insert do Teen";
						echo json_encode($response);			
					}				
				}else{
					$response["success"] = 0;			
					$response["mensage"] = "Erro no Select";
					echo json_encode($response);			
				}
			}		
		}else{
			$response["success"] = 0;
			$response["mensage"] = "Codigo nao Encontrado";	
			echo json_encode($response);	
		}
	}else{
		$response["success"] = 0;
		$response["mensage"] = "Nome de Usuario indisponivel";	
		echo json_encode($response);	
	}		
}else{
	$response["success"] = 0;
	$response["mensage"] = "Campo nao encontrado";
	echo json_encode($response);	
}


?>