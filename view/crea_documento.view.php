<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href='../../images/logo/logo.png' rel='shortcut icon' type='image/png'>
	<title>Crypto Change</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/estilos.css">
	<link rel="stylesheet" href="../../icomoon/style.css">
</head>
<body>

	<?php require '../../extras/header.php'; ?>

	<section class="jumbotron">
		<div class="container">
			<img class="img img-responsive" src="../../images/logo/light_logo_horizontal.jpg" alt="crypto change">
			<h3 align = "center">Blockchain de acceso a la transparencia de información</h3>
		</div>
	</section>

	<section class="main container">
		<div class="row">
			<section class="posts col-md-9">
                
                <form action="upload.php" method="post" enctype="multipart/form-data">
  
					<b>Enviar un nuevo archivo: </b>
					<br>
					<input name="userfile" type="file">
					<br>
					<input type="submit" value="Enviar">
				</form>

			</section>

			<?php require '../../extras/sidebar.php'; ?>

		</div>
	</section>

	<?php require '../../extras/footer.php'; ?>
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>