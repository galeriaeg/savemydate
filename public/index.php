<!doctype html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8" />
	<meta name="robots" content="noindex, nofollow">
	<link rel="shortcut icon" href="./img/favicon1616.png" />
	<link rel="shortcut icon" href="./img/favicon3232.png" />
	<link rel="stylesheet" href="./css/reset.css" />
	<link rel="stylesheet" href="./css/mob.css" />
	<link rel="stylesheet" href="./css/desk.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Save My Date</title>
</head>


<body>

	<?php

	@$chave = $_GET['k'];

	if (empty($chave)) {
		echo "<script>window.location.href='404.html'</script>";
		exit();
	} else {

		require_once "../config/conecta.php";

		//verifica se chave existe
		$sql = "SELECT chave FROM tab_evento WHERE chave='$chave' ";
		$res = mysqli_query($conexao, $sql);
		$total_chave = mysqli_num_rows($res);

		if ($total_chave < 1) {
			echo "<script>window.location.href='index.php'</script>";
			exit();
		} else {

			$sql = "SELECT e.*
					FROM tab_evento AS e, tab_pagamento AS p 
					WHERE chave='$chave' 
					AND e.id = p.id_evento
					AND p.data<>'' 
					AND p.status=1";
			$res = mysqli_query($conexao, $sql);
			$total = mysqli_num_rows($res);
			while ($row = mysqli_fetch_array($res)) {
				$id				= $row['id'];
				$chave			=	$row['chave'];
				$celebrante		=	$row['celebrante'];
				$data			=	$row['data'];
				$hora			=	$row['hora'];
				$comemoracao	=	$row['comemoracao'];
				$local			=	$row['local'];
				$endereco		=	$row['endereco'];
				$mapa			=	$row['mapa'];
				$anexo			=	$row['anexo'];
				$url_instagram	=	$row['url_instagram'];
				$url_facebook	=	$row['url_facebook'];
				$url_tiktok		=	$row['url_tiktok'];
			}


			if ($total < 1) {
				echo "<script>window.location.href='confirm'</script>";
				exit();
			}
		}
	}

	?>

	<main class="main">

		<header class="topo">
			<?php require_once "./src/components/topo.php"; ?>
		</header>

		<span>
			<?php require_once "./src/components/banner.php"; ?>
		</span>

		<div class="content">
			<?php require_once "./src/components/form.php"; ?>
			<?php require_once "./src/components/local.php"; ?>
		</div>

		<footer>
			<h6 class="">Copyright © 2025 - Save My Date<br />
				Todos os direitos reservados
			</h6>
		</footer>
	</main>



	<script src="js/mask_fone.js"></script>
	<?php mysqli_close($conexao); ?>
</body>

</html>