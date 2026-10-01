<?php
	include "../../session.php";
	
	include_once "../pagamento/analisa-pagamento.php"; // Controle financeiro
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
		$celebrante = $_POST['celebrante']; // required
		$local = $_POST['local']; // required
		$endereco = $_POST['endereco']; // required
		$mapa = $_POST['mapa']; //optional
		$urlInstagram = $_POST['urlInstagram']; //optional
		$urlFacebook = $_POST['urlFacebook']; //optional
		$urlTiktok = $_POST['urlTiktok']; //optional
	
		if((empty($celebrante)) || (empty($local)) || (empty($endereco))){
		
			echo "<script>window.location.href='logout'</script>";
			exit();
			
		}
		else{
				
				require_once "../../../config/conecta.php";
				
				$sql = "UPDATE tab_evento SET 
				celebrante='$celebrante',
				local='$local',
				endereco='$endereco',
				mapa='$mapa',
				url_instagram='$urlInstagram',
				url_facebook='$urlFacebook',
				url_tiktok='$urlTiktok' 
				WHERE id_usuario = $id_usuario_logado "; //variavel de sessao pega de analisa-pagamento.php
				$update = mysqli_query($conexao, $sql);
				
				if($update>0){
					echo "<script>alert('Cadastro realizado com sucesso');</script>";
					echo "<script>window.location.href='evento'</script>";
					exit();
				}
			
		}
		
	}
	else{
		echo "<script>window.location.href='logout'</script>";
		exit();
	}
	
	mysqli_close($conexao);
?>