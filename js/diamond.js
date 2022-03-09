//zajimavost v js 

	function add_diamond(element, event= true){   //create diamonds and past it before and after element 

		if (element.id == 'active' && event == true){
			return;
		}

		var diamond= document.createElement ('i');

		if (event == false){

			diamond.id= 'diamond-active';

		}

		diamond.className= "fa fa-diamond";
		diamond.setAttribute('aria-hidden', "true");
		var diamond1= diamond.cloneNode(true);

		element.parentElement.insertBefore(diamond, element); 
		element.parentElement.insertBefore(diamond1, element.nextSibling);	 	


	}


	function remove_diamond(element){  //remove diamonds

		if (element.id == 'active'){
			return;
		}
		
		var diamonds= document.querySelectorAll('.fa-diamond');	

			for (var j=0; j<diamonds.length;j++){
				if (diamonds[j].id != 'diamond-active') {
					diamonds[j].remove();
				}

				
			}	

	}
	$(document).ready(function(){ 

		var active = document.getElementById('active');

		var items = document.querySelectorAll('.menu-item');

		if (active) {

			add_diamond(active, false);
		}

		items.forEach(function(element){

			element.addEventListener('mouseover', function () {
				add_diamond(this);
			});

			element.addEventListener('mouseout', function () {
				remove_diamond(this);
			});


		});

	});