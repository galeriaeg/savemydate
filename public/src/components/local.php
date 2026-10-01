<section class="box-recepcao">
	<div class="box-endereco">
		<!-- img src="img/icone-mapa.webp" alt="icone localização" class="icon-local" /-->
		<h6>
			<strong><?php echo $data . " às " . $hora; ?></strong>
			<br /><br /><strong><?php echo $local; ?></strong>
			<br /><?php echo $endereco; ?>
		</h6>
	</div>

	<?php

	if (empty($mapa)) {
		$src_value = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254788.95849337842!2d-38.68442830240414!3d-3.7932989520768774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7c74c3f464c783f%3A0x4661c60a0c6b37ca!2sFortaleza%20-%20CE!5e0!3m2!1spt-PT!2sbr!4v1756944192825!5m2!1spt-PT!2sbr";
	} else {
		//trata mapa, extrai valor do src
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
		//trata mapa, extrai valor do src			
	}
	?>

	<div class="box-mapa">
		<iframe src="<?php echo $src_value; ?>" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>


</section>