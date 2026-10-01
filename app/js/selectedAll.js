// Obtém o elemento textarea pelo seu ID
const textarea = document.getElementById('googlemaps');

// Adiciona um "escutador" de eventos para o evento 'focus'
textarea.addEventListener('focus', function() {
  // O método 'select()' seleciona todo o conteúdo do elemento
  this.select();
});