<?php session_start();

	if (isset($_SESSION['usuario'])) {
		require 'vista/home.view.php';
	} else {
		header('Location: login.php');
	}
	
?>