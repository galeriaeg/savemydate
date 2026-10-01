<?php
	// Passo 1: Inicie a sessão no topo do seu script
	session_start();
	
	require_once "../config/conecta.php";
	$login = "tiago@terra.com";
	$senha = "321";
	
	$senha = sha1($senha); //codifica senha
	
	// Passo 2: O seu código está correto, mas vamos adicioná-lo a um bloco `if`
	// para garantir que a preparação da query foi bem-sucedida.
	$sql = "SELECT id, nome, email FROM tab_usuario WHERE email = ? AND senha = ?";
	
	if ($stmt = $conexao->prepare($sql)) {
		
		// Vincule os dados do usuário aos placeholders
		$stmt->bind_param("ss", $login, $senha);
		
		// Execute a declaração
		$stmt->execute();
		
		// Obtenha o conjunto de resultados
		$result = $stmt->get_result();
		
		// Passo 3: Verifique se a consulta retornou uma linha
		if ($row = $result->fetch_assoc()) {
			
			// Se a consulta encontrou um usuário, crie as variáveis de sessão
			$_SESSION["id"] = $row["id"];
			$_SESSION["nome"] = $row["nome"];
			$_SESSION["email"] = $row["email"];
			//$_SESSION["tipo"] = $row["tipo"];
			
			// Passo 4: Redirecione o usuário após o login
			//header("Location: pagina_restrita.php");
			echo $i =  $_SESSION["id"] = $row["id"];
			exit();
			
			} else {
			// Passo 5: Exiba uma mensagem de erro se o login falhar
			echo "Login ou senha incorretos.";
		}
		
		// Passo 6: Feche a declaração
		$stmt->close();
		
		} else {
		// Trate o erro de preparação da query
		echo "Erro ao preparar a query: " . $conexao->error;
	}
	
	// Passo 7: Feche a conexão com o banco de dados no final do script
	$conexao->close();
?>