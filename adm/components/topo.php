<?php
	$nome_usuario_logado = $_SESSION['nome'];
	$primeira_letra = substr($nome_usuario_logado, 0, 1);
?>

<a href="home"><img src="img/logomarca-smd.webp" alt="Logomarca" class="logo"/></a>

<img src="./img/btn-bars.webp" id="btnMenu" class="btn-menu-mob" alt="Botão menu" onclick="myMenu()"></a>


<nav class="nav" id="nav" style="">
	<ul class="ul-menu">
		<li><a href="home">Home</a></li>
		<li><a href="convidados">Clientes</a></li>
		<li><a href="pagamento">Pagamentos</a></li>
		<li><a href="evento">Eventos</a></li>
		<div onclick="dropdown(1)"  class="circle-user"><?php echo $primeira_letra; ?></div>
		<div onmouseover="dropdown(1)" onmouseout="dropdown(0)" style="display:none;"class="dropdown" id="dropdown">
			<a href="perfil">Perfil</a>
			<a href="logout">Sair</a>
		</div>
		<span class="part-menu-mob">
			<li><a href="perfil">Perfil</a></li>
			<li><a href="logout">Sair</a></li>
		</span>
	</ul>
</nav>

<script src="./js/dropDown.js"></script>
<script src="./js/navMenu.js"></script>