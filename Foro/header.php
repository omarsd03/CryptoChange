<!DOCTYPE html>
<html lang="es">
    <head>
        <link href='../images/logo/logo.png' rel='shortcut icon' type='image/png'>
        <title>FORO | CRYPTO CHANGE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/estilo.css" />
        <link rel="stylesheet" href="css/bootstrap.css">

    </head>
    <body>
        <div id="CajaPrincipal">
            <div class="cajaHeader">
                <div class="cajaBuscar">
                    <form action='buscar.php' method='post'>
                        <input type='text' name='busqueda' required="required">
                        <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </form>
                </div>

                <div class="cajaRegistro">
                    BIENVENIDO: 
                    <?php
                    // checamos si existe la session
                    if (isset($_SESSION["id"])) {
                        ?>
                        <a href="perfil.php"><?php echo $_SESSION["nombre"]; ?></a> | 
                        <?php
                        if ($_SESSION["nombre"] == "admin") {
                            ?>
                            <a href="panel.php">PANEL</a> | <a href="usuarios.php">LISTADO DE USUARIOS</a> | 
                            <?php
                        }
                        ?>
                        <a href="salir.php">SALIR</a>
                        <?php
                    } else {
                        ?><a href="Foro/registrarse.php">registrarse</a> - o - <a href="Foro/entrar.php">ingresar</a><?php
                    }
                    ?>
                </div>

                <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
            </div>

            <div class="cajaBanner">

            </div>

            <div class="cajaTitulo">
                <h2><a href="<?php echo Conexion::ruta(); ?>">Crypto Change</a></h2>
                <h4>Bienvenidos al foro de Crypto Change.</h4>
            </div>