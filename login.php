<?php session_start();

    if (isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }
    else {
        header('Location: login.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
		$password = $_POST['password'];

		try {
			$conexion = new PDO('mysql:host=localhost;dbname=cryptochange','root','omar');
		} catch (PDOException $e) {
			echo "Error" . $e->getMessage();
		}

		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password');
		$statement->execute(array(':usuario' => $usuario, ':password' => $password));

		$resultado = $statement->fetch();

		$stmnt = $conexion-> prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND intentos > 2');
		$stmnt->execute(array(':usuario' => $usuario));

		$resul = $stmnt->fetch();

		if ($resultado != false && $resul == false) {
			$statement = $conexion->prepare('UPDATE usuarios SET intentos = 0 WHERE usuario = :usuario');
			$statement->execute(array(':usuario' => $usuario));
			$_SESSION['usuario'] = $usuario;
			header('Location: index.php');
		}

		else {
			$_SESSION['intentos'] += 1;
			//echo $_SESSION['intentos'];
			$statement = $conexion->prepare('UPDATE usuarios SET intentos = intentos+1 WHERE usuario = :usuario');
			$statement->execute(array(':usuario' => $usuario));
			$errores .= '<li> Datos Incorrectos o el usuario no existe. Intente Nuevamente </li>';
		}

		if ($resul != false && $_SESSION['intentos'] > 2) {
			header("Location: error.php");
		}

		if ($resul != false) {
			echo"<script>alert('Este usuario esta bloqueado')</script>";
		}
	}

	require 'vista/login.view.php';

?>