<?php @$aut = $_GET['aut']; ?>
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
		<link rel="stylesheet" href="css/mob.css" />
		<link rel="stylesheet" href="css/desk.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Save My Date</title>
	</head>
	
	
	<body>
		
		<main class="main">
			
			<div class="box-login">
				
				<img src="img/logomarca-smd.webp" alt="logomarca" class="logo" />
				
				<h5 class="box-margin-text">Informe seus dados para continuar</h5>
				<form action="authentic" method="POST" onSubmit="onSubmit();">
					<label col="id">Login:</label>
					<input id="login" type="email" class="campo" name="login" placeholder="Email" required />
					<label col="senha">Senha:</label>
					<input id="senha" type="password" class="campo" name="senha" placeholder="Senha" required />
					<span id="box-submit"><input type="submit" class="boton" value="Entrar" id="btnLogin" name="btnLogin" /></span>
				</form>
				<?php
					if($aut=='false'){
						echo "<div class='alert-erro'><img src='img/icon-erro.png' alt='Icone erro'/>Login ou Senha incorreta!</div>";
					}
				?>
				<h5 class="box-margin-text" style="margin-bottom:0"><a href="form-recover-pass" class="alink">Esqueci minha senha</a></h5>
				
			</div>
			
			<h6 class="legenda box-margin-text">
				<img src="img/logo-gdw.webp" width="70" style="margin:0 auto;margin-bottom:10px;" alt="Logo Galeria Design e Web" />
				Copyright © 2025 - Save The Date <br /> Todos os direitos reservados
			</h6>
			
		</main>
		
		
		<a href="https://wa.me/558596870455" target="_blank">
			<img src="img/btn-whatsapp.png" class="btn-wpp" alt="botão whatsapp" />
		</a>
		<script src="js/submit.js"></script>
	</body>
</html>
