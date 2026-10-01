const imagens = [
    './img/banner-home-1.webp',
	'./img/banner-home-2.webp',
    './img/banner-home-3.webp'
];

function mudarImagem() {
    const indiceAleatorio = Math.floor(Math.random() * imagens.length);
    const imgElemento = document.getElementById('imagem-aleatoria').src = imagens[indiceAleatorio];
}