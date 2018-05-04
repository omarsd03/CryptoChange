<?php
require_once 'conexion.php';

class Foros extends Conexion{
	public $mysqli;

    public function __construct() {
        $this->mysqli = parent::conectar();
    }
    //*****************************************************************
	// LISTAMOS LOS FOROS POR CATEGORIAS
	//*****************************************************************
	public function getForo($categoria){
		$resultado = $this->mysqli->query("SELECT
			id_foro,
			id_forocategoria,
			foro,
			descripcion
			FROM
			foro_foro
			WHERE
			id_forocategoria = $categoria");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

       if(isset($data)){
        	return $data;
        }
	}
    //*****************************************************************
    // LISTAMOS LOS FOROS POR ID
    //*****************************************************************
	public function foroporid($id){
		$resultado = $this->mysqli->query("SELECT
			foro_foro.id_foro,
			foro_foro.foro,
			foro_foro.descripcion,
			foro_categoria.categoria
			FROM
			foro_foro
			INNER JOIN foro_categoria ON foro_foro.id_forocategoria = foro_categoria.id_forocategoria
			WHERE
			foro_foro.id_foro = $id");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        return $data;
	}
    //*****************************************************************
    // AGREGAMOS UN NUEVO FORO
    //*****************************************************************
	public function add() {
		$categoria = htmlentities($_POST['categoria']);
		$titulo = htmlentities($_POST['titulo']);
		// las cadenas llevan comillas simples y los numeros no :) y no se porque jeje
        $resultado = $this->mysqli->query("INSERT INTO foro_foro(id_forocategoria, foro, descripcion) VALUES($categoria, '$titulo', '$titulo')"); 
        echo "<script type='text/javascript'>window.location='panel.php';</script>";
	}
    //*****************************************************************
    // ELIMINA UN FORO
    //*****************************************************************
	public function del($id) {
		header("Location: panel.php");
		$resultado = $this->mysqli->query("DELETE FROM foro_foro WHERE id_foro = $id");
        header("Location: panel.php");
	}
}
?>