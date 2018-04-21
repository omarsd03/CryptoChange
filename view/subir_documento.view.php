<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href='images/logo/logo.png' rel='shortcut icon' type='image/png'>
	<title>Sube Tu Documento</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/estilos_sube_documento.css">
	<link rel="stylesheet" href="icomoon/style.css">
	<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
</head>
<body>

	<?php require 'extras/header.php'; ?>

	<section class="jumbotron">
		<div class="container">
			
            <h2 align = "center">Sube tu documento para validarlo</h2>
			<p align = "center">Los documentos deben ser legitimos y con una estructura definida. Ten en cuenta que el no cumplir con estos requisitos, puede traer consecuencias legales.
			O bien, <a href="crea_documento.php">Crea tu propio documento</a>, nosotros lo validamos
		</div>
	</section>

	<section class="main container">
		<div class="row">
			<section class="posts col-md-9">

				<form role="form" align="center" >
					<div class="form-group">
						<label for="name">Representante de Dependencia</label>
						<input type="text" class="form-control" id="name" />
						<label for="apellidos">Nombre de la Dependencia</label>
						<input type="text" class="form-control" id="apellidos" />
					</div>
					<label for="photo">Incluya su documento</label>
					<div class="drag-drop">
						<input type="file" multiple="multiple" id="photo" />
						<span class="fa-stack fa-2x">
						<i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
						<i class="fa fa-circle fa-stack-1x top medium"></i>
						<i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
						</span>
						<span class="desc">Pulse aquí para añadir archivos</span>
					</div>
					<button type="submit" class="btn btn-primary">Enviar</button>
					<button type="reset" class="btn btn-default">Cancelar</button>
				</form>

			</section>

			<?php require 'extras/sidebar.php'; ?>

		</div>
	</section>

	<?php require 'extras/footer.php'; ?>
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>