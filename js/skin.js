//change style

//zajimavost v js 

function skin_change (){
	var skin= document.getElementById('skin');   
	var icon= document.getElementById('skin-icon') // current icon
	var path='';   // path  to style 
	var cookie=''; //save parametr
	if(skin.getAttribute('href')=='css/style.css'){
		
		path = 'css/skinovatelnost.css'; 
		cookie = 'dark';
		icon.className= 'fa fa-cloud fa-lg';
	}
	else{
		
		path = 'css/style.css';
		cookie = 'main';
		icon.className= 'fa fa-moon-o fa-lg';
	}
	skin.setAttribute('href',path);  //change style
	fetch('./data/skinsave.php?skin='+cookie);  //save style

}

$(document).ready(function(){ 
	var button= document.getElementById('skin-button');
	button.onclick= function(){ skin_change() };
	
});