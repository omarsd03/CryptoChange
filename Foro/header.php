<!DOCTYPE html>
<html lang="es">
    <head>
        <title>FORO | CODEDRINKS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/estilo.css" />

    </head>
    <body>
        <div id="CajaPrincipal">
            <div class="cajaHeader">
                <div class="cajaBuscar">
                    <form action='buscar.php' method='post'>
                        <input type='text' name='busqueda' required="required">
                        <input type='submit' name='Buscar' value='Buscar' class="btn">
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
                        ?><a href="registrarse.php">registrarse</a> - o - <a href="entrar.php">ingresar</a><?php
                    }
                    ?>
                </div>

                <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
            </div>

            <div class="cajaBanner">

            </div>

            <div class="cajaTitulo">
                <h2><a href="<?php echo Conexion::ruta(); ?>">Codedrinks</a></h2>
                <h4>Bienvenidos a codedrinks.</h4>
            </div>