<?php
	session_start();
	set_time_limit(20);
	
	$tipoUsuarioLogado = $_SESSION['tipo'];
	
	if($tipoUsuarioLogado != 1){
		echo "<script>window.location.href='logout?opa'</script>";
		exit();
	}
	
	if (!isset($_SESSION["email"])) {
		header("Location:../index.php"); // Redireciona para o login se não estiver logado
		exit();
	}
	else{
		$logado = $_SESSION['email'];
		"sessão ativa";
	}
?>