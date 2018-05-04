<?php

require_once 'conexion.php';

class Sesion extends Conexion {

    private $login;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->login = array();
    }
    //****************************************
    // loguea al usuario
    //****************************************
    public function logueo() {
        $pass = sha1($_POST["password"]);
        $usuario = $_POST["usuario"];

        $resultado = $this->mysqli->query("SELECT id, nombre, tipo from usuarios where nick = '$usuario' and password = '$pass'");

        while ( $fila = $resultado->fetch_assoc() ) {
            $this->login[] = $fila;
        }

        if (sizeof($this->login) > 0) {
            foreach ($this->login as $key) {
                $_SESSION["id"] = $key["id"];
                $_SESSION["nombre"] = $key["nombre"];
                $_SESSION["tipo"] = $key["tipo"];
                switch ($_SESSION["tipo"]) {
                    case 1: header("Location: panel.php");
                    break;
                    case 2: header("Location: index.php");
                    break;
                }
            }
        } else {
            header("Location: entrar.php?m=1");
        }
    }

}