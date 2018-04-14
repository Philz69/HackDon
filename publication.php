<?php
	session_start();
	include_once("php/loadProjects.php")
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
			<?php
				loadProjects();
			?> <!-- Charge les projets de l'organisme dans un <select> -->

		<textarea id="message"></textarea>
		<input type="submit" id="btnSubmit"/>
	</form>

	<script src="js/jquery.min.js"></script>
	<script>

		document.getElementById("btnSubmit").addEventListener("click",function(e){
			e.preventDefault();

			let selectedProject = document.getElementById("selectProject"); 
			let pid = selectedProject.options[selectedProject.selectedIndex].value;

			$.ajax({
				url: "php/postPublication.php",
				method: "POST",
				data: {
					projectID: pid,
					message: document.getElementById("message").value,
				},
				success: function(msg){
					alert(msg);
			}}); 
		},false);


	</script>
</body>
</html>