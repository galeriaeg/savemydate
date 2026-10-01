<?php 
	include "session.php";
	
	$id_usuario_logado = $_SESSION['id'];
	$nome_usuario_logado = $_SESSION['nome'];
	
	require_once "../config/conecta.php";
	
	$sql = "SELECT pg.status, pg.data, pl.periodo_mes
	FROM tab_pagamento AS pg,  tab_plano AS pl
	WHERE pg.id_plano = pl.id 
	AND pg.id_usuario = $id_usuario_logado";
	$res = mysqli_query($conexao, $sql);
	while ($row = mysqli_fetch_array($res)){
		$status				=	$row['status']; // status do pagamento
		$data				=	$row['data']; // data do pagamento
		$periodo_mes_plano	=	$row['periodo_mes']; // periodo do plano
	}
	
	
	if( ($status>0) || (!empty($data)) ){
		$statusLabel = "Pago";
		$textoPagina="
		<!-- Planejar um evento especial é um monento de realização, no entanto, 
		uma preocupação comum é o gasto desnecessário com convidados que confirmam presença, 
		mas não comparecem. Com isso, você acaba pagando por cadeiras e pratos vazios, uma vez 
		que a maioria dos buffets e espaços de festa cobra com base no número de pessoas confirmadas.-->
		
		O <strong>Save My Date</strong> oferece: Confirmação de presença online,
		Controle em tempo real da lista de convidados, Comunicação facilitada com os participantes e 
		Download da lista de confirmados.";
	}
	else{
		$statusLabel = "Pendente";
		$textoPagina="
		Bem-vindo(a) <strong>$nome_usuario_logado</strong>,
		<br />clique no botão abaixo e efetue o pagamento para começar a usar o <strong>Save My Date</strong>.
		<br /><br />
		<button class='boton_basic' onclick='window.location.href=\"pagamento\"'>Continuar</button>";
	}
	
	
	$sql = "SELECT c.nome,c.chave 
	FROM tab_convidado AS c, tab_evento AS e
	WHERE c.chave = e.chave
	AND e.id_usuario = $id_usuario_logado";
	$res = mysqli_query($conexao, $sql);
	$total_convidados = mysqli_num_rows($res);
	//while ($row = mysqli_fetch_array($res)){
	//	$nome	= $row['nome'];
	//	$chave	=	$row['chave'];
	//}	
	
	
?>
<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8" />
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
		<meta name="robots" content="noindex, nofollow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Save My Date</title>
	</head>
	
	
	<body>
		
		<main class="main">
			
			<header class="topo">
				<?php require_once "./components/topo.php"; ?>
			</header>
			
			<div class="content">
				
				<h2 class="c-dark">
					<img src="img/seta-left.webp" alt="seta" class="seta-head" />
					Dashboard
				</h2>
				
				<h5 class="c-dark box-margin-text">
					<?php echo $textoPagina; ?>
				</h5>
				
				<img src="" id="imagem-aleatoria" alt="banner-home" class="banner-home"/>
				
				<section class="col12">
					<div class="card-dados" onclick="window.location.href='evento'">
						<h6 class="c-silver-light">Evento</h6>
						<h4 class="c-dark">Criado</h4>
					</div>
					<div class="card-dados" onclick="window.location.href='pagamento'">
						<h6 class="c-silver-light">Financeiro</h6>
						<h4 class="c-dark"><?php echo $statusLabel; ?></h4>
					</div>
					<div class="card-dados" onclick="window.location.href='pagamento'">
						<h6 class="c-silver-light">Período</h6>
						<h4 class="c-dark"><?php echo $periodo_mes_plano; ?> mês(es)</h4>
					</div>
					<div class="card-dados" onclick="window.location.href='convidados'">
						<h6 class="c-silver-light">Convidados</h6>
						<h4 class="c-dark"><?php echo $total_convidados; ?></h4>
					</div>
				</section>
				
			</div>
			
			
		</main>
		<script src="js/banner-rand.js"></script>
		<script src="js/alerta.js"></script>
		<script>mudarImagem()</script>

		<?php
			@$block = $_GET['block'];
			
			if($block == "true"){
				echo "<section id='alerta' class='alert-erro'><img src='./img/icon-erro-red.png'> Pagamento pendente!</section>
				<script>ocultaAlerta();</script>";
			}
			
			mysqli_close($conexao);
		?>
		
		
	</body>
	
</html>		