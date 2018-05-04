<?php
require_once 'conexion.php';

class Categorias extends Conexion {

    public $mysqli;

    public function __construct() {
        $this->mysqli = parent::conectar();
    }
    //*****************************************************************
    // LISTAMOS TODAS LAS CATEGORIAS
    //*****************************************************************
    public function getCategorias() {
        $resultado = $this->mysqli->query("select id_forocategoria, categoria from foro_categoria");
        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }
        return $data;
    }

    //*****************************************************************
    // AGREGAMOS UNA CATEGORIA
    //*****************************************************************
    public function add() {
        $categoria = htmlentities($_POST['titulo']);
        $resultado = $this->mysqli->query("INSERT INTO foro_categoria(categoria) VALUES('$categoria')"); 
        echo "<script type='text/javascript'>window.location='panel.php';</script>";
    }
    
    //*****************************************************************
    // ELIMINAMOS UNA CATEGORIA
    //*****************************************************************
    public function del($id) {
        $resultado = $this->mysqli->query("DELETE FROM foro_categoria WHERE id_forocategoria = $id");
        header("Location: panel.php");
    }

}