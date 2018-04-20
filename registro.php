<?php session_start();

	if (isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$intentos = 0;

		$errores = '';

		if (empty($usuario) or empty($password) or empty($password2)) {
			$errores .= '<li>Por favor llena los campos correctamente</li>';
		} else {
			try {
				$conexion = new PDO('mysql:host=localhost;dbname=loginseguridad','root','omar');
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
			$statement->execute(array(':usuario' => $usuario));
			$resultado = $statement->fetch();

			if ($resultado != false) {
				$errores .= '<li> El nombre de usuario ya existe </li>';
			}

			if ($password != $password2) {
				$errores .= '<li> Las contraseñas no coinciden </li>';
			}
		}

		if ($errores == '') {
			$statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass, intentos) VALUES (null, :usuario, :pass, :intentos)');
			$statement->execute(array(':usuario' => $usuario, ':pass' => $password, ':intentos' => $intentos));
			echo "<script>alert('Usuario registrado correctamente');window.location.href='login.php';</script>";
		}
	}

	require 'vista/registro.view.php';

?>