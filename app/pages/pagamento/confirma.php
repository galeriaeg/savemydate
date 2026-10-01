<?php 
	include "../../session.php";
	
	$id_usuario_logado = $_SESSION['id'];
	
	@$periodo_contratado = $_GET['m'];
	@$status_pagamento = $_GET['pag'];
	
	$timezone = new DateTimeZone('America/Sao_Paulo');
	$hoje = date('d/m/Y');
	
	if((!empty($periodo_contratado)) || (!empty($status_pagamento))){
		
		require_once "../../../config/conecta.php";
		
		$sql = "UPDATE tab_pagamento SET status=1,data='$hoje' WHERE id_usuario = $id_usuario_logado ";
		$update = mysqli_query($conexao, $sql);
		
		if($update>0){
			
			$confirmaAtualizacao = 1;
			
		}
		else{
			
			echo "<script>const componentes = document.querySelector('.content');
			if (componentes) { 
			componentes.remove();
			}<script>";
		}
	}
	
?>
<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8" />
		<meta name="robots" content="noindex, nofollow">
		<meta name="description" content="Save My Date">
		<meta name="keywords" content="save,date,festa,evento,convidados,lista,controle,convite,lembrete,confirmar,sitema,web,programa">
		<meta name="author" content="Galeria Design & Web">		
		<link rel="shortcut icon" href="./img/favicon3232.png" />
		<link rel="shortcut icon" href="./img/favicon4848.png" />
		<link rel="shortcut icon" href="./img/favicon6464.png" />
		<link rel="shortcut icon" href="./img/favicon128128.png" />
		<link rel="stylesheet" href="./css/reset.css">
		<link rel="stylesheet" href="./css/mob.css" />
		<link rel="stylesheet" href="./css/reset.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Save My Date</title>
	</head>
	
	
	<body style="background-position:top">
		
		<main class="main">
			
			<div class="content" id="content" style="padding:20px;font-family: calibri, arial, verdana;">
				<img src="img/icon-checado.gif" class="icone-checado" alt="icone checado" />	
				<h5 class="c-dark"><span style="font-size:1.6em">Pagamento feito</span>
					<br />O Pagamento foi realizado com sucesso.
					<br /><br />Período contratado: <?php echo $periodo_contratado; ?> mês(es)
				</h5>	
				<br /><img src="img/logo-stripe.webp" style="width:110px" alt="Logo Stripe" />
				
				<br /><br /><button class="boton_basic" onclick="fecharPopup()">Fechar Janela</button>
			</div>
			
			
		</main>
		
		<script>
			function fecharPopup() {
				
				if (window.opener && !window.opener.closed) {
					// Recarrega a página pai
					window.opener.location.reload();
				}
				window.close();
			}
		</script>
		
		<!-- setas &#8594;	&#8592;--> 
	</body>
	
</html>		