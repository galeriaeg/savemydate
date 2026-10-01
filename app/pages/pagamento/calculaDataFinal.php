<?php
	
	function calculaDataFinal($data,$periodo){
		
		$data_pagamento = $data;
		$perido_contratado = $periodo;
		
		if($data_pagamento){
			
			$partes_data = explode('/', $data_pagamento);
			
			$dia = $partes_data[0];
			$mes = $partes_data[1];
			$ano = $partes_data[2];
			

			
			if(($mes + $perido_contratado) > 12){
				
				$novoMes = ($mes + $perido_contratado) - 12;
				$novoAno = $ano+1;
				
				if($novoMes<10)
				$novoMes="0".$novoMes;
			
				if(($novoMes==2)&&($dia>28))
					$dia = 28;
					

				$dataExpira = $dia."/".$novoMes."/".$novoAno;
				echo "<script>document.getElementById('dataExpira').textContent='$dataExpira'</script>";
			}
			else{
				
				$novoMes = $mes + $perido_contratado;
				
				if($novoMes<10)
				$novoMes="0".$novoMes;

				$dataExpira = $dia."/".$novoMes."/".$ano;
				echo "<script>document.getElementById('dataExpira').textContent='$dataExpira'</script>";
			}
		}
	}
?>