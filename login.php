<?php session_start();

	if (isset($_SESSION['usuario'])) {
		header('Location: subir_documento.php');
	}

	$errores = '';
	//$contador = 0;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
		$password = $_POST['password'];
		$password = hash('sha512', $password);

		try {
			$conexion = new PDO('mysql:host=localhost;dbname=cryptochange','root','omar');
		} catch (PDOException $e) {
			echo "Error" . $e->getMessage();
		}

		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password');
		$statement->execute(array(':usuario' => $usuario, ':password' => $password));

		$resultado = $statement->fetch();

		if ($resultado != false) {
			$_SESSION['usuario'] = $usuario;
			header('Location: subir_documento.php');
		}

		else {
			$errores .= '<li> Datos Incorrectos o el usuario no existe. Intente Nuevamente </li>';
		}

	}

	require 'view/login.view.php';

?>