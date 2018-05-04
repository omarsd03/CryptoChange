<?php

require_once 'conexion.php';

class Comentarios extends Conexion {

    public $mysqli;
    public $data;
    private $tComentarios;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }
    
    //*****************************************************************
    // ULTIMO COMENTARIO
    //*****************************************************************
    public function ultimo_comentario($id) {

        $resultado = $this->mysqli->query("SELECT
            comentario_foro.id_comentario,
            comentario_foro.id_tema,
            comentario_foro.comentario,
            comentario_foro.fecha,
            comentario_foro.activo,
            foro_temas.titulo,
            foro_foro.id_foro,
            usuarios.nick
            FROM
            comentario_foro
            INNER JOIN foro_temas ON foro_temas.id_tema = comentario_foro.id_tema
            INNER JOIN foro_foro ON foro_foro.id_foro = foro_temas.id_foro
            INNER JOIN usuarios ON comentario_foro.id_usuario = usuarios.id
            WHERE
            foro_foro.id_foro = $id
            ORDER BY
            comentario_foro.id_comentario DESC
            limit 1");

        while ( $fila = $resultado->fetch_assoc() ) {
            $this->data[] = $fila;
        }
        
        return $this->data;
    }

    //*****************************************************************
    // LISTA LOS COMENTARIOS
    //*****************************************************************
    public function comentarios($id) {

        $resultado = $this->mysqli->query("SELECT
            comentario_foro.id_comentario,
            comentario_foro.id_tema,
            comentario_foro.id_usuario,
            comentario_foro.comentario,
            comentario_foro.fecha,
            comentario_foro.activo,
            usuarios.nick,
            usuarios.avatar,
            usuarios.fechaderegistro,
            usuarios.firma
            FROM
            comentario_foro
            INNER JOIN usuarios ON comentario_foro.id_usuario = usuarios.id 
            WHERE id_tema = $id");

        while ( $fila = $resultado->fetch_assoc() ) {
            $this->data[] = $fila;
        }
        
        return $this->data;
    }

    //*****************************************************************
    // TOTAL DE COMENTARIOS POR TEMA
    //*****************************************************************
    public function TotalComentarios($tema) {

        $resultado = $this->mysqli->query("select count(*) as total from comentario_foro where id_tema = '$tema'"); 

        if ($reg = $resultado->fetch_array()) {
            $this->tComentarios = $reg["total"];
        }

        return $this->tComentarios;
    }
    //*****************************************************************
    // TOTAL DE COMENTARIOS POR TEMA
    //*****************************************************************
    public function TotalComentariosUsuario($id) {

        $resultado = $this->mysqli->query("select count(*) as total from comentario_foro where id_usuario = '$id'"); 

        if ($reg = $resultado->fetch_array()) {
            $this->tComentarios = $reg["total"];
        }

        return $this->tComentarios;
    }
    //*****************************************************************
    // TOTAL DE COMENTARIOS POR FORO
    //*****************************************************************
    public function TotalComentariosForo($foro) {
        $resultado = $this->mysqli->query("SELECT count(*) as total
            FROM
            comentario_foro
            INNER JOIN foro_temas ON comentario_foro.id_tema = foro_temas.id_tema
            INNER JOIN foro_foro ON foro_temas.id_foro = foro_foro.id_foro
            WHERE
            foro_foro.id_foro = '$foro'"); 

        if ($reg = $resultado->fetch_array()) {
            $this->tComentarios = $reg["total"];
        }

        return $this->tComentarios;
    }
    //*****************************************************************
    // AGREGAR COMENTARIO
    //*****************************************************************
    public function add($id, $foro, $sub) {

        $comentario = $_POST['comentario'];
        $activo = 0;
        $usuario = $_SESSION["id"];

        $resultado = $this->mysqli->query("INSERT INTO comentario_foro(id_tema, id_usuario, comentario, fecha, activo) 
            VALUES($id, $usuario, '$comentario', now(), $activo)"); 
        
        if($sub == 0){
            echo "<script type='text/javascript'>window.location='tema.php?id=$id&foro=$foro';</script>";
        }else{
            echo "<script type='text/javascript'>window.location='tema.php?id=$id&foro=$foro&sub=$sub';</script>";
        }
    }

    //*****************************************************************
    // ULTIMO COMENTARIO
    //*****************************************************************
    public function ultmoComentario($id) {

        $resultado = $this->mysqli->query("SELECT
            comentario_foro.id_comentario,
            comentario_foro.id_tema,
            comentario_foro.comentario,
            comentario_foro.fecha,
            comentario_foro.activo,
            usuarios.nick,
            usuarios.avatar,
            usuarios.fechaderegistro,
            usuarios.firma
            FROM
            comentario_foro
            INNER JOIN usuarios ON comentario_foro.id_usuario = usuarios.id
            where id_tema = $id
            ORDER BY
            comentario_foro.id_comentario DESC
            limit 1");

        while ( $fila = $resultado->fetch_assoc() ) {
            $this->data[] = $fila;
        }
        
        return $this->data;
    }

    //*****************************************************************
    // ELIMINA COMENTARIO
    //*****************************************************************
    public function del($id, $tema, $foro, $sub) {
        $resultado = $this->mysqli->query("DELETE FROM comentario_foro WHERE id_comentario = $id");

        if($sub == 0){
            header("Location: tema.php?id=$tema&foro=$foro");
        }else{
            header("Location: tema.php?id=$tema&foro=$foro&sub=$sub");
        }
        
    }
}
?>