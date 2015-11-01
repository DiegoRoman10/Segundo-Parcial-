<!DOCTYPE html>
<html>
<head>
	<title>Roman Newsletter</title>
	<meta charset ="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

	<script src="sweetalert-master/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
</head>
<body>
	<form id="form-data" method="post">
		<div class="login-block">
		    <h1>¡Suscríbete a nuestro newsletter!</h1>
		    <input type="text"  placeholder="Nombre" id="nombre" name="nombre" />
		    <input type="text"  placeholder="Email" id="email" name="email" />
		    <input type="text" placeholder="¡Envia un comentario!" id="comentarios" name="comentarios" />
		    <input type="submit" style="padding:0;" id="send">
		</div>
	</form>    
</body>
<script>
	$('#form-data').submit(function(event){
		event.preventDefault();
		var nombre = $('#nombre').val();
		var email = $('#email').val();
		var comentarios = $('#comentarios').val();
		
		var sentdata = {"nombre": nombre, "email":email, "comentarios":comentarios};

		$.ajax({
			data: sentdata,
			dataType: 'json',
			method:'post',
			url:'respuesta.php',
			beforeSend(function(){
				if (nombre == "" ||email==""){
					sweetAlert("Oops...", "Verifica que hayas ingresado tu nombre e email", "error");
				};
			}),
			.done(function(data){
				if ($(data.success)) {
					swal("¡Listo!", "Pronto recibirás más noticias de nosotros :)", "success")
				}
				else{
					sweetAlert("Oops...", "Ocurrió algún error, intenta de nuevo más tarde", "error");
				}
			});
		});
	}
</script>
</html>