<?php session_start();

    if (isset($_SESSION['usuario'])) {
		require 'view/crea_documento.view.php';
	} else {
		header('Location: login.php');
	}

?>