<?php
	if(empty($anexo))
		$anexo = "../app/img/sem-img.png";
	else
		$anexo = "../app/files/".$anexo;
?>
<div class="banner" style="background-image:url('<?php echo $anexo; ?>');"></div>
<div class="bar-sombra"></div>