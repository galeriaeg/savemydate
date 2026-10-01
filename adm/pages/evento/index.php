<?php
include "../../session.php";

include_once "../pagamento/analisa-pagamento.php";

//$id_usuario_logado = $_SESSION['id'];

require_once "../../../config/conecta.php";

$sql = "SELECT * FROM tab_evento WHERE id_usuario = $id_usuario_logado";
$res = mysqli_query($conexao, $sql);
$total = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res)) {
	$id				= 	$row['id'];
	$id_usuario		=	$row['id_usuario'];
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
	echo "<script>window.location.href='logout'</script>";
	exit();
}

//trata mapa, extrai valor do src
if (!empty($mapa)) {
	$html = $mapa;
	$dom = new DOMDocument();
	@$dom->loadHTML($html);
	$iframe = $dom->getElementsByTagName('iframe')->item(0);

	if ($iframe) {
		$src_value = $iframe->getAttribute('src');
		$src_value; // src extraido
	} else {
		echo "Nenhuma tag iframe encontrada.";
	}
}
//trata mapa, extrai valor do src
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
				<img src="img/seta-right.webp" onclick="backPage()" alt="seta" class="seta-head" />Evento
			</h2>


			<div style="margin-bottom:80px;">

				<section class="c-dark box-margin-text">
					<h6 class="c-dark box-head">ID: <strong><?php echo $id; ?></strong>
						<div class="fio"></div> Chave: <strong><?php echo $chave; ?></strong>
					</h6>
					<h6 class="c-dark box-head">Comemoração: <strong><?php echo $comemoracao; ?></strong></h6>
					<h6 class="c-dark box-head">Data: <strong><?php echo $data; ?></strong></h6>
					<h6 class="c-dark box-head">Hora: <strong><?php echo $hora; ?></strong></h6>
					<br />

					<label>Link para confirmar presença:</label>
					<div class="box-url-convidado">
						<input id="conteudo" class="campo-url" value="https://www.savemydate.app.br/public/confirm?k=<?php echo $chave; ?>" />
						<img src="img/icon-copy.webp" id="botaoCopiar" class="icon-copy" title="Copiar" alt="icone copiar" />
					</div>

					<div class="box-anexo">
						<label>Banner do evento (768 x 384px):</label>
						<?php

						if (empty($anexo)) {
							echo "<form action='upload-anexo' method='POST' enctype='multipart/form-data' >";
							echo "<input type='file' required class='campo' name='arquivo' id='arquivo' accept='.jpg,.jpeg,.png' />";
							echo "<input type='hidden' name='MAX_FILE_SIZE' value='500000' />";
							echo "<span style='display:none' class='box-preview' id='box-preview'>";
							echo "<img id='previsao' src='' class='anexo' style='display:none'/>";
							echo "<div  class='box-botons-anexo'>";
							echo "<a class='a-excluir-anexo' onclick='previewAnexo(0)'><img src='img/icon-erro-white.png' alt='icone fechar'></a>";
							echo "<input class='input-upload-anexo' value='Fazer Upload' type='submit'>";
							echo "</div>";
							echo "</span>";
							echo "</form>";
							echo "<script src='js/previewAnexo.js'></script>";
							echo "<script src='js/validaTamanhoAnexo.js'></script>";
						} else {

							$anexohash = base64_encode($anexo);
							echo "<img src='files/$anexo' class='anexo' alt='Banner do evento' />";
							echo "<div  class='box-botons-anexo' style='margin-bottom:20px'>";
							echo "<a class='a-excluir-anexo' href='remove-anexo?e=$id&f=$anexohash&c=0'><img src='img/icon-erro-white.png' alt='icone fechar'>&nbsp;&nbsp;Remover</a>";
							echo "</div>";
						}
						?>
					</div>
				</section>


				<form action="edita" method="POST">
					<label>Nome do(s) celebrante(s):</label>
					<input class="campo" required name="celebrante" value="<?php echo $celebrante; ?>" /><br />

					<label>Local:</label>
					<input class="campo" required name="local" value="<?php echo $local; ?>" /><br />

					<label>Endereço:</label>
					<input class="campo" required name="endereco" value="<?php echo $endereco; ?>" /><br />

					<h6 class="c-dark btn-googlemaps" id="1" onclick="googleMaps(id);">Google Maps <img src="img/min-seta-up.png" id="seta-maps" alt="seta mapa" /></h6>
					<textarea style="display:none;" id="googlemaps" class="campo" rows="8" name="mapa"><?php echo $mapa; ?></textarea>

					<iframe src="<?php echo $src_value; ?>" style="width:100%;margin-bottom:15px;border:1px solid #DDD;" height="200" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

					<label>Link do Instagram:</label>
					<input class="campo" name="urlInstagram" value="<?php echo $url_instagram; ?>" /><br />

					<label>Link do Facebook</label>
					<input class="campo" name="urlFacebook" value="<?php echo $url_facebook; ?>" /><br />

					<label>Link do Tiktok</label>
					<input class="campo" name="urlTiktok" value="<?php echo $url_tiktok; ?>" /><br />
					<br />
					<input class="botao_busca" type="submit" value="Cadastrar" />
					<input type="hidden" value="<?php echo $id; ?>" name="id-evento" />
				</form>

				</div-->


			</div>

	</main>

	<script src="js/googleMaps.js"></script>
	<script src="js/voltarPagina.js"></script>
	<script src="js/copy.js"></script>
	<script src="js/selectedAll.js"></script>
	<script src="js/alerta.js"></script>

	<?php
	@$removed = $_GET['removed'];

	if ($removed == "true") {
		echo "<section id='alerta' class='alert-sucess'>&#10004; Anexo excluído com sucesso!</section>
				<script>ocultaAlerta();</script>";
	}

	mysqli_close($conexao);
	?>


</body>

</html>