<?php


namespace Clases;

use PDO;
use PDOException;

abstract class ConexionBD {
    private $host;
    private $db;    
    private $user;
    private $pass;
    protected $conProyecto;

    public function __construct() {
        $host = "localhost";
        $db   = "examenud4ampliado";
        $user = "gestor";
        $pass = "secreto";
        $dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

        try {
            $this->conProyecto = new PDO($dsn, $user, $pass);
            $this->conProyecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex){
            die("Error en la conexión: mensaje: ".$ex->getMessage());
        }
    }
}