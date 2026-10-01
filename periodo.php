<?php
	
	//@$data_pagamento = $_GET['d']; //"28/11/2025";
	
	//$perido_contratado = 3; //meses
	
	function calculaDataFinal($data,$periodo){
		
		$data_pagamento = $data;
		$perido_contratado = $periodo;
		
		if($data_pagamento){
			
			$partes_data = explode('/', $data_pagamento);
			
			$dia = $partes_data[0];//dia
			$mes = $partes_data[1];//mes
			$ano = $partes_data[2];//ano
			
			
			if(($mes + $perido_contratado) > 12){
				
				$novoMes = ($mes + $perido_contratado) - 12;
				$novoAno = $ano+1;
				
				if($novoMes<10)
					$novoMes="0".$novoMes;
				
				echo "Contratado em:".$data_pagamento."<br />";
				echo "Periodo contratado:".$perido_contratado." meses<br />";
				echo "Expira em:".$dia."/".$novoMes."/".$novoAno;	
				
			}
			else{
				
				$novoMes = $mes + $perido_contratado;
				
				if($novoMes<10)
					$novoMes="0".$novoMes;
				
				echo "Contratado em:".$data_pagamento."<br />";
				echo "Periodo contratado:".$perido_contratado." meses<br />";
				echo "Expira em:".$dia."/".$novoMes."/".$ano;
			}
		}
	}
	
	//echo "<br/><br/><br/>";
	//echo "<input value='dd/mm/aaaa' id='data' name='data'><button onclick='data()'>OK</button>";
	
	
	
	calculaDataFinal('28/04/2025',3);
	
?>

<!-- script>
	function data(){
		let dt = document.getElementById('data').value;
		window.location.href="periodo.php?d="+dt;
	}
</script-->