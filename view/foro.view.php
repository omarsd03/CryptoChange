<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href='images/logo/logo.png' rel='shortcut icon' type='image/png'>
	<title>Crypto Change</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="icomoon/style.css">
</head>
<body>

	<?php require 'extras/header.php'; ?>

	<section class="jumbotron">
		<div class="container">

			<h2 align = "center">Bienvenido Al Foro Crypto Change</h2>
		</div>
	</section>

	<section class="main container">
		<div class="row">
			<section class="posts">
				<div class="container">
                    <br/>
                    <h1>Crea un nuevo tema a debatir</h1>
                    <form action="" class="">

                        <div class="input-group col-lg-3">
                            <label for="nombre">Nombre Del Tema:</label>
                            <input class="form-control" id="nombre" type="text" placeholder="Nombre">
                        </div>
                        <br>
                        <div class="input-group col-lg-3">
                            <label for="option">Categoria del Tema:</label>
                            <select class="form-control" name="" id="option">
                                <option value="">-- Seleccione un tema --</option>
                                <option value="Politica">Politica</option>
                                <option value="Gastos">Gastos</option>
                                <option value="Queja">Queja</option>
                                <option value="Propuesta">Propuesta</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <br>
                        <div class="input-group col-lg-3">
                            <label for="mensaje">Descripcion del Tema:</label>
                            <textarea class="form-control" id="mensaje" placeholder="Escribe tu mensaje:"></textarea>
                        </div>
                        <br>
                        <button class="btn btn-primary">Crear Tema</button>
                    </form>
                </div>

			</section>
            

		</div>
	</section>

	<?php require 'extras/footer.php'; ?>
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>