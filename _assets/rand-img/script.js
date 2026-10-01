// Array com os caminhos para as suas imagens.
// Substitua pelos caminhos reais das suas imagens.
const imagens = [
    'https://via.placeholder.com/500/FF5733',
    'https://via.placeholder.com/500/8D33FF'
];

// Função que muda a imagem quando chamada
function mudarImagem() {
    // 1. Gera um índice aleatório
    const indiceAleatorio = Math.floor(Math.random() * imagens.length);
    
    // 2. Seleciona a tag <img> pelo seu ID
    const imgElemento = document.getElementById('imagem-aleatoria');
    
    // 3. Altera o atributo 'src' da tag <img> para o caminho da imagem aleatória
    imgElemento.src = imagens[indiceAleatorio];
}