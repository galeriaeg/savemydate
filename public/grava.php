<?php
	
	if (isset($_POST['btnConfirma'])) {
		
		$nome	 = htmlspecialchars($_POST['nome']);
		$nome	 = strtoupper($nome);
		$celular = htmlspecialchars($_POST['celular']);
		$chave	 = htmlspecialchars($_POST['chave']);
		
		$nome = ltrim($nome);
		$nome = rtrim($nome);
		
		$celular = ltrim($celular);
		$celular = rtrim($celular);
		
		$tamNome = strlen($nome);
		$tamCelular = strlen($celular);
		
		if($tamNome<10){
			echo "<script>alert('Informe seu nome completo!')</script>";
			echo "<script>window.location.href='index.php?k=$chave'</script>";
			exit();
		}
		if($tamCelular<12){
			echo "<script>alert('Informe um número válido com DDD! ')</script>";
			echo "<script>window.location.href='index.php?k=$chave'</script>";
			exit();
		}
		
		
		if( (empty($nome)) || (empty($celular)) || (empty($chave)) ){
			echo "<script>window.location.href='index.php?k=$chave'</script>";
			exit();
		}
		else{
			
			require_once "../config/conecta.php";
			
			//Verifica se celular já existem no evento setado
			$sql = "SELECT chave,celular FROM tab_convidado WHERE celular='$celular' AND chave='$chave' ";
			$res = mysqli_query($conexao, $sql);
			$total = mysqli_num_rows($res);
			// se existir retorna erro
			if($total > 0){
				echo "<script>alert('Sua presença já foi confirmada.')</script>";
				echo "<script>window.location.href='index.php?k=$chave'</script>";
				exit();
			}
			else{
				
				
				$timezone = new DateTimeZone('America/Sao_Paulo');
				$hoje = date('d/m/Y');
				
				$sql="INSERT INTO tab_convidado (nome,celular,data_cadastro,chave)
				VALUES('$nome','$celular','$hoje',$chave)";
				$conf = $conexao->query($sql)or die ($conexao->error);
				
				if($conf){
					echo "<script>window.location='confirma.php?k=$chave'</script>";
					exit();
				}
				
			}
			
		}
		
	}
	else{
		echo "<script>window.location='index.php'</script>";
		exit();
	}
	
	mysqli_close($conexao);
?>