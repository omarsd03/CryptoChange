<?php
//Include las clases
require_once 'class/categorias.php';
require_once 'class/foros.php';
require_once 'class/subforos.php';
require_once 'class/temas.php';
require_once 'class/comentarios.php';
require_once 'class/usuarios.php';
// creamos el objeto categorias
$objC = new Categorias();

include 'header.php';

$categorias = $objC->getCategorias();
foreach ($categorias as $cat) {
    $categoria = $cat["id_forocategoria"];
    ?>
    <div class="caja">
        <div class="categorias">
            <a name="<?php echo $cat["categoria"]; ?>"></a><?php echo $cat["categoria"]; ?>
        </div>
        <?php
        $objF = new Foros();
        $foros = $objF->getForo($categoria);
        if(sizeof($foros)>0){
        foreach ($foros as $foro) {
            ?>
            <div class="foro">
                <div class="foro_icono">
                    <img src="img/note.png">
                </div>
                <div class="foro_titulo">
                    <a href="temas.php?foro=<?php echo $foro["id_foro"]; ?>"><?php echo $foro["foro"]; ?></a><br>
                    <ul>
                        <?php
                        $objSF = new Subforos();
                        $subforos = $objSF->getSubforo($foro["id_foro"]);
                        foreach ($subforos as $sforo) {
                            ?>
                            <li><a href="temas.php?foro=<?php echo $sforo["id_foro"]; ?>&sub=<?php echo $sforo["id_subforo"]; ?>">
                                    <?php echo $sforo["subforo"]; ?></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="temas_mensajes">
                    <?php
                    $objTemas = new Temas();
                    $total = $objTemas->TotalTemas($foro["id_foro"]);
                    ?>
                    Temas: <?php echo $total; ?><br>

                    <?php
                    $objCom = new Comentarios();
                    $totalcom = $objCom->TotalComentariosForo($foro["id_foro"]);
                    ?>
                    Mensajes: <?php echo $totalcom; ?><br>
                </div>
                <div class="ultimocomentario">
                    <?php
                    $objMensajes = new Comentarios();
                    $mensaje = $objMensajes->ultimo_comentario($foro["id_foro"]);
                    if (sizeof($mensaje) > 0) {
                        echo "Titulo: " . $mensaje[0]["titulo"] . "<br/>";
                        echo "por: " . $mensaje[0]["nick"] . "<br/>";
                        echo "Fecha: " . $mensaje[0]["fecha"];
                    } else {
                        echo 'No hay comentarios';
                    }
                    ?>
                </div>
                <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
            </div>
            <?php
        }
        }
        ?>
    </div>

    <?php
}
?>
<div class="caja">
    <div class="categorias">Usuarios</div>
    <div class="foro">
        <?php
        // listo todos los usuarios cosa de niños
        $obju = new Usuarios();
        $usuarios = $obju->usuarios();
        foreach ($usuarios as $u) {
            ?>
            <a href="perfil.php?id=<?php echo $u["id"]; ?>"><?php echo $u["nick"]; ?></a>
            <?php
        }
        ?>
    </div>
</div>

<?php
include 'footer.php';