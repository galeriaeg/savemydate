function ocultaAlerta() {
  setTimeout(() => {
    document.getElementById("alerta").style.opacity = 0; fechaAlerta();
	}, 5000);
}


function fechaAlerta() {
  setTimeout(() => {
    document.getElementById("alerta").style.display = "none";
  }, 3000);
}
