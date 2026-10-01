document.getElementById('botaoCopiar').addEventListener('click', function() {
	const divParaCopiar = document.getElementById('conteudo');
	const textoParaCopiar = divParaCopiar.value;
	
	navigator.clipboard.writeText(textoParaCopiar);
	
	mostraAlertaCopy();
});

function mostraAlertaCopy(){
	alert("Link copiado com sucesso!");
}