let btn = document.getElementsByClassName("btn");


for(let i =0;i < btn.length;i++)
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



document.getElementById("btnSubmit").addEventListener("click",function(e){
	e.preventDefault();

},false);



function connection(id){
	$.ajax({
		url: "php/"+id,
		method: "POST",
		data: {
			mail: document.getElementById("mail").value,
			pwd: document.getElementById("pwd").value,
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
		url: "php/"+id,
		method: "POST",
		data: {
			mail: document.getElementById("mail").value,
			name: document.getElementById("name").value,
			pwd: document.getElementById("pwd").value,
		},
		success: function(msg){
			if(msg != ""){
				alert(msg); //Gives an error if pwd/mail are wrong
			}
			else{
				alert("registered");
			}
		}
	});
}


