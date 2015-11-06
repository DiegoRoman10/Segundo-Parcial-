<?php 
	require "user.php";
	$oUser = new User;
	$rows = $oUser->readAll();
	echo 'Los usuarios registrados hasta el momento: ';
	$user = 1;
	foreach ($rows as $value) {
		echo 'Usuario número: '.$user.'<td>';
		echo $rows->Nombre, '<td>';
		echo $rows->Correo, '<td>';
		echo $rows->Comentarios, '<td>';
		echo '<td>';
		$user++;
	}
?>
