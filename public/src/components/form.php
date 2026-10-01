<h5 class="box-titulo">Olá, confirme sua presença informando os seus dados abaixo.</h5>

<section class="box-form">
	<form action="grava.php" method="POST">
		<input type="text" name="nome" required placeholder="Nome" />

		<input class="campo_g" type="text" id="telefone" maxlength="12" placeholder="Celular" name="celular" required="">

		<input type="submit" name="btnConfirma" value="Confirmar Presença" />
		<input type="hidden" name="chave" value="<?php echo $chave; ?>" />
	</form>
</section>