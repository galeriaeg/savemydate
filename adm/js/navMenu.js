function myMenu(){
	
	const displayMenu = document.getElementById("nav").style.display;
	
	if(displayMenu=="block"){
		document.getElementById("nav").style.display = 'none';
		document.getElementById("btnMenu").src = 'img/btn-bars.webp';
	}
	else{
		document.getElementById("nav").style.display = 'block';
		document.getElementById("btnMenu").src = 'img/btn-close.webp';
	}
	
}