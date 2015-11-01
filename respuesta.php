<?php 	
	require "user.php";

	$json = array('success'=> false);
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		$comentarios = $_POST['comentarios'];
		if ($nombre!= "" && $email != "") {
			$oUser = new User;
			$oUser->create($nombre, $email, $comentarios);
			$json['success'] = true;	
		}
	echo json_encode($json, JSON_FORCE_OBJECT);	