<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href='images/logo/logo.png' rel='shortcut icon' type='image/png'>
	<title>Crea Tu Documento</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="icomoon/style.css">
</head>
<body>

	<?php require 'extras/header.php'; ?>

	<section class="jumbotron">
		<div class="container">
			<h1 align = "center">Blockchain de acceso a la transparencia de información</h1>
			<p>Desarrolle su documento y cuando este listo, <a href="subir_documento.php">da clic aqui</a> para subirlo.</p>
		</div>
	</section>

	<section class="main container">
		<div class="row">

			<article class="post clearfix">
				<a href="#" class="thumb pull-left">
					<div class = "embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="https://docs.google.com/document/d/e/2PACX-1vRS4Vw9qT7OmTqZFoSRxDWR0LuzNPdX0NRd_a7UQkHmFVc5qMmRJx_j-tZmLyTWWgUo_TD0rdnV6uWL/pub?embedded=true" allowfullscreen></iframe>
					</div>
				</a>
				<h2 class="post-title">
					<a href="#">Contrato</a>
				</h2>
				<p>
					<span class="post-fecha">06 de Noviembre de 2016</span> 
					por 
					<span class="post-autor">
						<a href="#">OSDFAF</a>
					</span>
				</p>
				<p class="post-contenido text-justify">
					Lorem ipsum dolor sit amet consectetur adipisicing elit.
					Explicabo reiciendis maxime distinctio hic ipsa, ratione blanditiis ut corporis accusamus sapiente non aliquam ad sequi veniam deleniti ex,
					voluptate consequatur nobis?
				</p>
	
				<div class="contenedor-botones">
					<a href="#" class="btn btn-primary">Descargar Documento <span class="icon-download"></span></a>
					<a href="#" class="btn btn-info">Ver Documento Completo <span class="icon-file-text2"></span></a>
				</div>
			</article>
			
			<div class="embed-responsive embed-responsive-16by9">
				
			</div>

		</div>
	</section>

	<?php require 'extras/footer.php'; ?>
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>