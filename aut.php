<?php
	session_start();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$login = htmlspecialchars($_POST['login'], ENT_QUOTES, 'UTF-8');
		$senha = htmlspecialchars($_POST['senha'], ENT_QUOTES, 'UTF-8');
		
		if((empty($login)) || (empty($senha))){
			echo "<script>window.location.href='home?aut=false'</script>";
			exit();
		}
		else{
			
			$senha = sha1($senha); //codifica senha
			
			require_once "config/conecta.php";
			
			$login_seguro = mysqli_real_escape_string($conexao, $login);
			$senha_segura = mysqli_real_escape_string($conexao, $senha);
			
			//Seleciona usuario tipo admin
			$sql = "SELECT id,nome,email,tipo
			FROM tab_usuario 
			WHERE email='$login_seguro' 
			AND senha='$senha_segura'
			AND tipo=1 LIMIT 1";
			$result = mysqli_query($conexao, $sql);
			if(mysqli_num_rows($result) > 0){
					
				$row = mysqli_fetch_assoc($result);
				$_SESSION["id"] = $row["id"];
				$_SESSION["nome"] = $row["nome"];
				$_SESSION["email"] = $row["email"];
				$_SESSION["tipo"] = $row["tipo"];
					
				echo "<script>window.location.href='adm/home'</script>"; // entra no painel admin
				exit();
			}
			else{

				$sql = "SELECT u.id,u.nome,u.email,u.tipo
				FROM tab_usuario AS u, tab_pagamento AS p 
				WHERE u.email = '$login_seguro' 
				AND u.senha = '$senha_segura' 
				AND p.id_usuario = u.id
				AND p.id_evento > 0
				AND u.status = 1
				LIMIT 1";
				$result = mysqli_query($conexao, $sql);
				if(mysqli_num_rows($result) > 0){
					
					$row = mysqli_fetch_assoc($result);
					$_SESSION["id"] = $row["id"];
					$_SESSION["nome"] = $row["nome"];
					$_SESSION["email"] = $row["email"];
					$_SESSION["tipo"] = $row["tipo"];
					
					echo "<script>window.location.href='app/home'</script>"; // entra no painel cliente
					exit();
				}
				else{
					echo "<script>window.location.href='home?aut=false'</script>";
					exit();
				}
				
			}
			
		}
		
		
	}
	else{
		echo "<script>window.location.href='home?aut=false'</script>";
		exit();	
	}
	
	mysqli_close($conexao);
?>	