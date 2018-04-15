function setLoginOnClick(){
	$(".submit").click(function(){
		var form_id = this.parentNode.id;
		console.log(form_id);
		if(form_id == "signupOrg" || form_id == "signupUser"){
			register(form_id);
		}
		else{
			connection(form_id);
		}
	});
}

function connection(id){
	var mail = document.getElementById(id).getElementsByTagName("input")[0].value;
	var pwd = document.getElementById(id).getElementsByTagName("input")[1].value;

	servConnect(id, mail,pwd);
}

function servConnect(id, mail, pwd){
	if(mail !== "" && pwd !== ""){
		$.ajax({
			url: "php/"+id+".php",
			method: "POST",
			data: {
				"mail": mail,
				"pwd": pwd
			},
			success: function(msg){
				if(msg != ""){
					alert(msg); //Gives an error if pwd/mail are wrong
				}
				else{
					alert("connected");
					document.location.href = document.location.href;
				}
			}
		});
	}
}

function register(id){
	var name = document.getElementById(id).getElementsByTagName("input")[0].value;
	var mail = document.getElementById(id).getElementsByTagName("input")[1].value;
	var pwd = document.getElementById(id).getElementsByTagName("input")[2].value;

	if(name !== "" && mail !== "" && pwd !== ""){

		$.ajax({
			url: "php/"+id+".php",
			method: "POST",
			data: {
				"name": name,
				"mail": mail,
				"pwd": pwd
			},
			success: function(msg){
				if(msg != ""){
					alert(msg); //Gives an error if pwd/mail are wrong
				}else{
					//Log in
					servConnect((id.indexOf("Org") > -1 ? "connectOrg" : "connectUser"), mail, pwd);
				}
			}
		});
	}
}
