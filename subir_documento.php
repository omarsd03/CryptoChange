<?php session_start();

    if (isset($_SESSION['usuario'])) {
		require 'view/subir_documento.view.php';
	} else {
		header('Location: login.php');
	}

?>