<?php
include "../../session.php";

include_once "../pagamento/analisa-pagamento.php";

$id_usuario_logado = $_SESSION['id'];

require_once "../../../config/conecta.php";

$sql = "SELECT id,nome,cpf,email,telefone,tipo FROM tab_usuario WHERE id = $id_usuario_logado ";
$res = mysqli_query($conexao, $sql);
$total = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res)) {
	$id			= 	$row['id'];
	$nome		= 	$row['nome'];
	$cpf		=	$row['cpf'];
	$email		=	$row['email'];
	$telefone	=	$row['telefone'];
	$tipo		=	$row['tipo'];
}

if ($tipo == 1)
	$tipoLabel = "Administrador";


$parte_do_meio = substr($cpf, 3, 3);
$parte_final = substr($cpf, -2);
$cpf_mascarado = "***" . $parte_do_meio . "***" . $parte_final;


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
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/mob.css" />
	<link rel="stylesheet" href="css/desk.css" />
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
				<img src="img/seta-right.webp" onclick="backPage()" alt="seta" class="seta-head" />Perfil
			</h2>

			<h5 class="c-dark box-margin-text">
				Esta área mostra os dados pessoais do titular desta conta.
			</h5>

			<div>

				<div class="card-convidado" style="line-height:20px;">
					<img src="./img/icon-user-az.webp" class="icon-card" alt="Icone Usuario" />
					<h6 class="c-silver-light">Titular:</h6>
					<h3><?php echo $nome; ?></h3><br />
					ID: <?php echo $id; ?><br />
					Tipo: <?php echo $tipoLabel; ?><br />
					E-mail: <?php echo $email; ?><br />
					Celular: <?php echo $telefone; ?><br />
					CPF: <?php echo $cpf_mascarado; ?>
				</div>

			</div>

		</div>

	</main>

	<script src="js/voltarPagina.js"></script>

</body>

</html>