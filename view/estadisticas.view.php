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
			<h1 align = "center">Estadisticas de Obras Publicas</h1>
		</div>
	</section>

	<section class="main container">
		<div class="row">
			<section class="posts col-md-9">
				<div class="container">
					<script class="grafico" type="text/javascript">
						window.onload = function () {
							var dataLength = 0;
							var data = [];
							$.getJSON("js/data.php", function (result) {
								dataLength = result.length;
								for (var i = 0; i < dataLength; i++) {
									data.push({
										x: parseInt(result[i].valorx),
										y: parseInt(result[i].valory)
									});
								}
								;
								chart.render();
							});
							var chart = new CanvasJS.Chart("chart", {
								title: {
									text: "Graficacion de Gastos de Funcionarios"
								},
								axisX: {
									title: "Valores X",
								},
								axisY: {
									title: "Valores Y",
								},
								data: [{type: "line", dataPoints: data}],
							});
						}
				</script>

				<div id="chart">
				</div>
                </div>

			</section>

			<?php require 'extras/sidebar.php'; ?>

		</div>
	</section>

	<?php require 'extras/footer.php'; ?>
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/main.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/canvasjs.min.js"></script>
</body>
</html>