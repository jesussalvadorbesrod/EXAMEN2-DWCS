<?php

namespace Clases;

use PDO;
use PDOException;

class Empleados extends ConexionBD {

    public function __construct()
    {
        parent::__construct();
    }

    public function comprobarLogin (string $usuario, string $contrasenha): bool {
        $consulta = 'select * from empleados where usuario = :u  and pass = :p';
        $stmt = $this->conProyecto->prepare($consulta);
        $stmt->execute([':u' => $usuario, ':p' => hash('sha256', $contrasenha)]);

        return ($stmt->rowCount() == 0) ? false : true;
    }
}