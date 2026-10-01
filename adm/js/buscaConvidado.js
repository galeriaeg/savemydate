function buscaConvidado(){
	
	const chaveBusca = document.getElementById("campo_busca").value;
	
	if(chaveBusca){
		window.location.href='convidados?nome='+chaveBusca;
	}
	else{
		alert("Informe o nome do convidado!");
		document.getElementById("campo_busca").focus();
	}
	
}