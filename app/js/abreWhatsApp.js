function abreWhatsApp(c){
	let tel = c;
	let telSemTraco = tel.replace('-', '');
	const linkContato ='https://wa.me/' + telSemTraco;
	
	window.open(linkContato, '_blank');
}