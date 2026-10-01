function googleMaps(){
	
	const fleg = document.getElementById("googlemaps").style.display;
	
	if(fleg=='none'){
		document.getElementById("googlemaps").style.display="block";
		document.getElementById('seta-maps').src="img/min-seta-down.png";
	}
	else{
		document.getElementById("googlemaps").style.display = 'none';
		document.getElementById('seta-maps').src="img/min-seta-up.png";
	}
	
}