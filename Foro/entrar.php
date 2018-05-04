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
    if (isset($_GET["m"])) {
        switch ($_GET["m"]) {
            case 1:
                echo "<div class='error'>Usuario o contraseña incorrectos</div>";
                break;
        }
    }
    ?>

    <div class="foro">
        <form method="post" action="login.php">
        <h2>Iniciar sesión</h2>
        <label>Usuario</label>
        <input type="text" name="usuario"  placeholder="Usuario" required autofocus>
        <label>Contraseña:</label>
        <input type="password" name="password"  placeholder="Contraseña" required>
        <br>
        <button class="btn" type="submit">Entrar</button>
      </form>

    </div>
</div>
<?php
include 'footer.php';