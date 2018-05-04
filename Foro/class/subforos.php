<?php
require_once 'conexion.php';
class Subforos extends Conexion{
	public $mysqli;
	public $data;

	public function __construct() {
		$this->mysqli = parent::conectar();
		$this->data = array();
	}
	//*****************************************************************
	// LISTAMOS LOS SUBFOROS POR FORO
	//*****************************************************************
	public function getSubforo($foro){
		$resultado = $this->mysqli->query("SELECT
			id_subforo,
			id_foro,
			subforo,
			descripcion
			FROM
			foro_subforos
			WHERE
			id_foro = $foro");

        while ( $fila = $resultado->fetch_assoc() ) {
            $this->data[] = $fila;
        }
        
        return $this->data;
	}
    //*****************************************************************
	// LISTAMOS LOS SUBFOROS POR ID
	//*****************************************************************
	public function subforoporid($id){

		$resultado = $this->mysqli->query("SELECT * FROM foro_subforos WHERE id_subforo = $id");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        return $data;
	}

    //*****************************************************************
    // AGREGAR SUBFOROS
    //*****************************************************************
	public function add() {
		$foro = htmlentities($_POST['foro']);
		$titulo = htmlentities($_POST['titulo']);
        $resultado = $this->mysqli->query("INSERT INTO foro_subforos(id_foro, subforo, descripcion) VALUES($foro, '$titulo', '$titulo')"); 
        echo "<script type='text/javascript'>window.location='panel.php';</script>";
	}

    //*****************************************************************
    // ELIMINAMOS UN SUBFORO
    //*****************************************************************
	public function del($id) {
		$resultado = $this->mysqli->query("DELETE FROM foro_subforos WHERE id_subforo = $id");
        header("Location: panel.php");
	}
}
?>