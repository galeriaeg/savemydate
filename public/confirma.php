<!doctype html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8" />
	<meta name="robots" content="noindex, nofollow">
	<link rel="shortcut icon" href="./img/favicon128128.png" />
	<link rel="shortcut icon" href="./img/favicon6464.png" />
	<link rel="shortcut icon" href="./img/favicon4848.png" />
	<link rel="shortcut icon" href="./img/favicon3232.png" />
	<link rel="stylesheet" href="./css/reset.css" />
	<link rel="stylesheet" href="./css/mob.css" />
	<link rel="stylesheet" href="./css/desk.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Save My Date</title>
</head>


<body>

	<?php
	$chave = $_GET['k'];
	if (empty($chave)) {
		echo "<script>window.location.href='404.html'</script>";
		exit();
	}
	?>

	<main class="main">
		<div class="content-static">
			<img src='img/icon-checado.gif' alt='checado' class="icon-checado" />
			<h4>Maravilha!</h4>
			<h5>Sua presença está confirmada.</h5>
			<h5><a href='../index.php' class="abtn">Fechar</a></h5>
		</div>
	</main>


</body>

</html>