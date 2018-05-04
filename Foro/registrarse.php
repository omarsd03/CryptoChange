<?php
//Include las clases
require_once 'class/categorias.php';
require_once 'class/foros.php';
require_once 'class/subforos.php';
require_once 'class/temas.php';
require_once 'class/usuarios.php';

include 'header.php';
?>
<div class="caja">
    <div class="categorias">
        Registro de usuarios
    </div>
    
    <?php 
        if(isset($_GET["m"])){
            if($_GET["m"]==1){
                echo 'Nick ya existe';
            }
        }
    ?>

    <div class="foro">
        <form action="registrar.php" method="post" class="formulario">
            <label>Nombre completo</label>
            <input type="text" name="nombre" placeholder="Nombre completo" required="required">
            <label>Email</label>
            <input type="email" name="correo" placeholder="Email" required="required">
            <label>Usuario</label>
            <input type="text" name="usuario" placeholder="Usuario" required="required">
            <label>Contraseña</label>
            <input type="password" name="clave" placeholder="Contraseña" required="required">
            <br/>
            <button type="submit" name="iniciar" class="btn">Iniciar</button>
        </form>

    </div>
</div>
<?php
include 'footer.php';