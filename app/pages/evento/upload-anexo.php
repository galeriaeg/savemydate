<?php
	include "../../session.php";
	
	include_once "../pagamento/analisa-pagamento.php";// Controle financeiro
	
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		$arquivo = basename($_FILES['arquivo']['name']); 
		
		if(empty($arquivo)){
		
			echo "<script>window.location.href='logout'</script>";
			exit();
			
		}
		else{
		
			/*** testa tamanho da imagem ***/
			$tamanhoArquivo = getimagesize($_FILES['arquivo']['tmp_name']);
			if ($tamanhoArquivo){
				$largura	=	$tamanhoArquivo[0];
				$altura		=	$tamanhoArquivo[1];
				
				if(($largura != 768) || ($altura != 384)){
					echo "<script>window.location.href='logout'</script>";
					exit();	  
				}
			}			
			
			/*** testa tipo da imagem ***/
			$extension = pathinfo($arquivo, PATHINFO_EXTENSION);
			if (($extension<>"jpg") && ($extension<>"gif") && ($extension<>"png") && ($extension<>"jpeg")){
				echo "<script>alert('Erro! Permitido somente arquivos dos tipos .JPEG,.JPG,.PNG e .GIF!');</script>";
				echo "<script>window.location='evento'</script>";
				exit();
			}

			$rand = rand();
			$arquivo = $rand."-".$arquivo;
			$uploaddir = '../../files/';
			$uploadfile = $uploaddir.$arquivo;
			
			if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
				
				require_once "../../../config/conecta.php";
				
				$sql = "UPDATE tab_evento SET anexo='$arquivo' WHERE id_usuario = $id_usuario_logado "; //id_usuario pega de analisa-pagamento.php
				$update = mysqli_query($conexao, $sql);
				
				if($update>0){
					echo "<script>alert('Cadastro realizado com sucesso!');</script>";
					echo "<script>window.location.href='evento'</script>";
					exit();
				}
			}			
			
			
			
		}		
		
	}
	else{
		
		echo "<script>window.location.href='logout'</script>";
		exit();	
	
	}
	
	mysqli_close($conexao);
?>