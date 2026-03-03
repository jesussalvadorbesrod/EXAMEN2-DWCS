<?php
    $host = "localhost";
    $db   = "examenud4ampliado";
    $user = "gestor";
    $pass = "secreto";
    $dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

    try {
        $conProyecto = new PDO($dsn, $user, $pass);
        $conProyecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex){
        die("Error en la conexión: mensaje: ".$ex->getMessage());
    }