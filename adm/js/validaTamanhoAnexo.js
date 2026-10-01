const inputImagem = document.getElementById('arquivo');

inputImagem.addEventListener('change', (e) => {
	const [file] = e.target.files;
	
	if (file) {
		const img = new Image();
		img.onload = () => {
			const largura = img.naturalWidth;
			const altura = img.naturalHeight;
			if((largura!=768)||(altura!=384)){
				alert('Erro! A imagem deve ter 768px de largura e 384px de altura!');
				document.getElementById('box-preview').style.display="none";
				document.getElementById('arquivo').value="";
			}
			else{
				//alert('tudo ok');
				previewAnexo(1);//chama funcao
			}
		};
		img.src = URL.createObjectURL(file);
	}
});