<?php
	include "../../session.php";
	include_once "../pagamento/analisa-pagamento.php";
?>
<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8" />
		<meta name="robots" content="noindex, nofollow">
		<meta name="description" content="Save My Date Digital">
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
	
	
		<header class="topo">
			<?php require_once "../../components/topo.php"; ?>
		</header>

		<?php
						
			$id_usuario_logado = $_SESSION['id'];
			
			$ide  = $_GET["e"];
			$file = $_GET["f"];
			$flegConfirma = $_GET["c"];
			
			if((empty($ide)) || (empty($file))){
				
				echo "<script>window.location='logout'</script>";
				exit();
			}
			else{
				
				
				if( $flegConfirma < 1 ){
					
					
					echo "<div class='alertCenter'>";
					echo "<h5><a href='evento'><img src='img/icon-erro-dark.png' alt='icone fechar'></a></h5>";
					echo "<h4 class='c-dark box-top-alert'>Deseja realmente excluir este registro?</h4>"; 
					echo "<div class='box-botons'><a href='remove-anexo?e=$ide&f=$file&c=1' class='a-yes'>Sim</a>";
					echo "<a href='evento' class='a-no'>Não</a></div>";
					echo "</div>";
					exit();
					
				}
				else{

					$anexo = base64_decode($file);
					
					require_once "../../../config/conecta.php";
					
					$sql = "UPDATE tab_evento SET anexo ='' WHERE id_usuario = '$id_usuario_logado' ";
					$update = mysqli_query($conexao, $sql);	
					
					if($update>0){
						$uploadpath = '../../files/';
						unlink($uploadpath."$anexo");
						echo "<script>window.location='evento?removed=true'</script>";				
					}
					
				}
				
			}
			
		?>
	</body>
	
</html>