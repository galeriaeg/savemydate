<?php
	
	function extraiUrlMapa($mapa){
		
		$html = $mapa;
		$dom = new DOMDocument();
		@$dom->loadHTML($html);
		$iframe = $dom->getElementsByTagName('iframe')->item(0);
		
		if ($iframe) {
			$src_value = $iframe->getAttribute('src');
			$src_value; // src extraido
		}
		else{
			echo "Nenhuma tag iframe encontrada.";
		}
		
	}
?>