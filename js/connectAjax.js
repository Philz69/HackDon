$(document).ready(function(){
	let btn = document.getElementsByClassName("btn");


	for(let i = 0;i < btn.length;i++)
	{
	
		(function () {
	        var form_id = btn[i].parentNode.id;

	        btn[i].addEventListener("click", function(e) { 

	        	e.preventDefault();

	        	if(form_id == "signupOrg" || form_id == "signupUser"){
	        		register(form_id);
	        	} 
	        	else{
	        		connection(form_id);
	        	}

	        }, false);
	    }());
	}

	function connection(id){
		
		$.ajax({
			url: "php/"+id+".php",
			method: "POST",
			data: {
				mail: document.getElementById(id).getElementsByTagName("input")[0].value,
				pwd: document.getElementById(id).getElementsByTagName("input")[1].value,
			},
			success: function(msg){
				if(msg != ""){
					alert(msg); //Gives an error if pwd/mail are wrong
				}
				else{
					alert("connected");
				}
			}
		});
	}

	function register(id){

		$.ajax({
			url: "php/"+id+".php",
			method: "POST",
			data: {
				name: document.getElementById(id).getElementsByTagName("input")[0].value,
				mail: document.getElementById(id).getElementsByTagName("input")[1].value,
				pwd: document.getElementById(id).getElementsByTagName("input")[2].value,
			},
			success: function(msg){
				if(msg != ""){
					alert(msg); //Gives an error if pwd/mail are wrong
				}
				else{
					alert(msg);
				}
			}
		});
	}


});