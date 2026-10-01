<?php 
	include "../../session.php";
	
	$id_usuario_logado = $_SESSION['id'];
	
	require_once "../../../config/conecta.php";
	
	$sql = "SELECT pg.status, pg.data, pg.id_plano, pl.nome, pl.preco, pl.periodo_mes, pl.link_produto_stripe
	FROM tab_pagamento AS pg JOIN tab_plano AS pl ON pg.id_plano = pl.id
	WHERE pg.id_usuario = $id_usuario_logado;";
	$res = mysqli_query($conexao, $sql);
	$total = mysqli_num_rows($res);
	while ($row = mysqli_fetch_array($res)){
		$status_pag		=	$row['status'];
		$data_pag		=	$row['data'];
		$id_usuario		=	$row['id_plano'];
		
		$nome_plano		=	$row['nome'];
		$preco_plano	=	$row['preco'];
		$periodo_plano	=	$row['periodo_mes'];
		$link_produto_stripe_plano =	$row['link_produto_stripe'];
	}
		
	if($status_pag>0){
		$statusLabel = "Pago";
		$tagcor = "background-color:#00a307";
	}
	else{
		$statusLabel = "Pendente";
		$tagcor = "background-color:#ffae00";
	}	
	
	

	
	/*
	if($periodo_mes==1)
		$payStripe = "https://buy.stripe.com/test_28E3cogyuaCI8U27Sk2oE00";
	else if($periodo_mes==2)
		$payStripe = "https://buy.stripe.com/test_eVqeV681Y3agb2a4G82oE03";
	else
		$payStripe = "https://buy.stripe.com/test_00weV64PMdOU7PY0pS2oE02";	
	*/
		
	


	
	
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
		<link rel="stylesheet" href="./css/reset.css" />
		<link rel="stylesheet" href="./css/desk.css" />
		<link rel="stylesheet" href="./css/mob.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Save My Date</title>
	</head>
	
	
	<body>
		
		
		
		<main class="main">

			
			<header class="topo">
				<?php require_once "../../components/topo.php"; ?>
			</header>
			
			
			<div class="content">
				
				<h2 class="c-dark">
					<img src="img/seta-right.webp" onclick="backPage()" alt="seta" class="seta-head" />Pagamento
				</h2>			
				
				
				<h5 class="c-dark box-margin-text">
					Dados sobre seu pagamento
				</h5>
				
				
				<div>
					
					<div class="card-convidado" style="line-height:20px;">
						<img src="./img/icon-pay.webp" class="icon-card" alt="Icone Pagamento" />
						
						<h6 class="c-silver-light">Plano:</h6>
						<h5><?php echo $nome_plano; ?></h5>
						
						<h6 class="c-silver-light">Preço:</h6>
						<h3>R$ <?php echo $preco_plano; ?></h3><br />

						
						Status: <div class="tag-status" style='<?php echo $tagcor; ?>'><?php echo $statusLabel; ?></div><br />
						Período: <?php echo $periodo_plano;?> mês(es)<br />
						Data de Pagamento: <?php echo $data_pag; ?><br />
						Data de expiração: <span id="dataExpira" style="color:red"></span><br />
					</div>
					
					
					<?php
						
						require_once "calculaDataFinal.php";

						calculaDataFinal($data_pag,$periodo_plano);
						
						if($status_pag<1){
							echo "<button class='boton_basic' style='background:#635aff;' onclick='abrirPopup(\"$link_produto_stripe_plano\", 325, 480);'>Pagar agora</button>";
							echo "<img src='./img/logo-stripe.webp' class='logo-stripe' alt='logo stripe' />";
						}
						
					?>
					
				</div>
				
			</div>
			
		</main>
		
		<script src="js/abrePopUpPagamento.js"></script>
		<script src="js/voltarPagina.js"></script>
		
	</body>
	
</html>		