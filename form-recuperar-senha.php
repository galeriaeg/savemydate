<?php
	@$erro = true; //$_GET['aut'];
	/*
		@$chave = $_GET['k'];
		if(!empty($chave)){
		echo "<script>window.location='public/index.php?k=$chave'</script>";
		exit();
		}
	*/
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
		<link rel="stylesheet" href="css/reset.css" />
		<!--link rel="stylesheet" href="css/mob.css" /-->
		<link rel="stylesheet" href="css/desk.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Save My Date</title>
	</head>
	
	
	<body>
		
		
		<main class="main">
			
			<div class="box-login">
				
				<img src="img/logomarca-smd.webp" alt="logomarca" class="logo" />
				<div class="box-margin-text">
					<h3>Recuperar senha</h3>
					<h5>Informe seu e-mail de acesso</h5>
				</div>
				<form action="recupera" method="POST">
					<label col="id">Email:</label>
					<input type="email" class="campo" name="login" placeholder="Email" required />
					<input type="submit" class="boton" value="Entrar" name="login" />
				</form>
				<?php
					if(!$erro){
						echo "<div class='alert-erro'><img src='img/icon-erro.png' alt='Icone erro'/>Login ou Senha incorreta</div>";
					}
				?>
				<h5 class="box-margin-text" style="margin-bottom:0"><a href="home" class="alink">Fazer Login</a></h5>
				
			</div>
			<h6 class="legenda box-margin-text">Copyright © 2025 - Save The Date <br /> Todos os direitos reservados</h6>
		</main>
		
		<a href="https://wa.me/558596870455" target="_blank">
			<img src="img/btn-whatsapp.png" class="btn-wpp" alt="botão whatsapp" />
		</a>
		
	</body>
</html>
