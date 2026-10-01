<?php
include "../../session.php";

include_once "../pagamento/analisa-pagamento.php";

$id_usuario_logado = $_SESSION['id'];

require_once "../../../config/conecta.php";

$sql = "SELECT id,id_usuario,chave FROM tab_evento WHERE id_usuario = $id_usuario_logado ";
$res = mysqli_query($conexao, $sql);
$qtd_evento = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res)) {
	$id			= $row['id'];
	$id_usuario	=	$row['id_usuario'];
	$chave		=	$row['chave'];
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

			<img src="img/btn-lupa.webp" onclick="abreBusca(1);" class="btn-busca" alt="botão busca" />

			<h2 class="c-dark">
				<img src="img/seta-right.webp" onclick="backPage()" alt="seta" class="seta-head" />
				Lista de convidados
			</h2>

			<div id="box-busca" style="display:none;" data-box-busca="0" class="box-busca">
				<input type="text" class="campo_busca" id="campo_busca" placeholder="Busca por nome" style="margin-right: 5px;" />
				<button class="botao_busca" onclick="buscaConvidado();">Buscar</button>
			</div>


			<h5 class="c-dark box-margin-text">
				Nesta área você tem a lista de convidados que confirmaram presença no seu evento.*
			</h5>

			<div class="col12" style="display:flex;align-items:center;margin:0 0 25px 0;justify-content:space-between">
				<div class="tag-qtde" id="qtdeConfirmados">Total:</div>
				<img src="img/icon-clear.webp" id="icon-clear" class="btn-busca" width="27" onclick="window.location.href='convidados'" style="display:none;margin-left:15px;cursor:pointer;" alt="botão limpar busca" />
			</div>

			<div class="box-cards-convidados">


				<?php

				@$nomeBusca = $_GET['nome'];

				if (!empty($nomeBusca)) {

					$sql = "SELECT * FROM tab_convidado WHERE chave = '$chave' AND nome LIKE '%$nomeBusca%' ORDER BY id DESC";
					$res = mysqli_query($conexao, $sql);
					$qtdBusca = mysqli_num_rows($res);
					while ($row = mysqli_fetch_array($res)) {
						$id				= $row['id'];
						$nome			=	$row['nome'];
						$celular		=	$row['celular'];
						$data_cadastro	=	$row['data_cadastro'];

						echo "<div class='card-convidado'>
								<img src='img/icon-whatsapp.webp' onclick='abreWhatsApp(\"$celular\");' class='btn-whatsapp' alt='icone whatsapp' />
								<h4 style='font-weight:600'>$nome</h4>
								<h5>$celular</h5>
								<h6 class='c-silver-light'>Confirmou em: $data_cadastro</h6>
								</div>";
					}
					echo "<script>document.getElementById('qtdeConfirmados').innerHTML='Total: '+ $qtdBusca;</script>";

					if ($qtdBusca < 1)
						echo "<h5 class='c-dark'>Não há resultado para sua busca.<h5>";


					echo "<script>document.getElementById('icon-clear').style.display='flex';</script>";
				} else {

					$sql = "SELECT * FROM tab_convidado WHERE chave = '$chave' ORDER BY id DESC";
					$res = mysqli_query($conexao, $sql);
					$qtde = mysqli_num_rows($res);
					while ($row = mysqli_fetch_array($res)) {
						$id				= $row['id'];
						$nome			=	$row['nome'];
						$celular		=	$row['celular'];
						$data_cadastro	=	$row['data_cadastro'];

						echo "<div class='card-convidado'>
								<img src='img/icon-whatsapp.webp' onclick='abreWhatsApp(\"$celular\");' class='btn-whatsapp' alt='icone whatsapp' />
								<h4 style='font-weight:600'>$nome</h4>
								<h5>$celular</h5>
								<h6 class='c-silver-light'>Confirmou em: $data_cadastro</h6>
								</div>";
					}
					echo "<script>document.getElementById('qtdeConfirmados').innerHTML='Total: '+ $qtde;</script>";


					if ($qtde < 1)
						echo "<h5 class='c-dark'>Sem registros!</h5>";
				}





				?>
			</div>


		</div>

	</main>

	<script src="js/abreBusca.js"></script>
	<script src="js/buscaConvidado.js"></script>
	<script src="js/abreWhatsApp.js"></script>
	<script src="js/voltarPagina.js"></script>

</body>

</html>