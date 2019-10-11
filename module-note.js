document.addEventListener("DOMContentLoaded", function (){
	console.log("DOMContentLoaded");

	var nodes = document.querySelectorAll(".noteComponent a");
	
	for(var i=0; i < nodes.length; i++) {
		var node = nodes[i];

		node.addEventListener("click", function(event){
			event.preventDefault();
			var url = event.target.getAttribute("href");

			var request = new XMLHttpRequest();
			request.open('GET', url);
			request.setRequestHeader("is-from-ajax", "true");

			request.addEventListener("load", function(loadEvent){
				console.log("REQUETE LOADED !");
				event.target.parentNode.classList.remove("waiting");

				//clean previous
				var previous = event.target.parentNode.querySelector('a.selected');
				
				if (previous) {
					previous.classList.remove("selected");
				}
				
				//update selected
				event.target.classList.add("selected");

			});

			

			request.send();

			console.log("REQUETE SENT !");
			event.target.parentNode.classList.add("waiting");


		});

	}

	

});
