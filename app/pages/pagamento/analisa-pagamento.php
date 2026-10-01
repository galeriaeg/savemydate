<?php

$id_usuario_logado = $_SESSION['id'] ?? null;

require_once "../../../config/conecta.php";

$sql = "SELECT data,status
	FROM tab_pagamento 
	WHERE id_usuario = $id_usuario_logado ";
$res = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($res)) {
	$status	=	$row['status'];
	$data	=	$row['data'];
}

if (($status == 0) || (empty($data))) {
	echo "<script>window.location.href='home?block=true'</script>";
	exit();
}
