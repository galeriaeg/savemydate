function dropdown(p){
	
	if(p>0){
		document.getElementById("dropdown").style.display = 'block';
	}
	else{
		document.getElementById("dropdown").style.display = 'none';
	}
	
}


/*
// 1. Declare uma variável para guardar a informação
let cliqueInfo;

// 2. Adicione o "ouvinte de evento" (event listener) no body
document.body.addEventListener('click', (evento) => {
  // A cada clique, a variável 'cliqueInfo' é atualizada
  cliqueInfo = evento;
  
  // Opcional: Para verificar o resultado, use o console.
  console.log('Informação do clique guardada:', cliqueInfo);
});
*/