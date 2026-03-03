<?php

namespace Clases;

use PDO;
use PDOException;

class Clientes extends ConexionBD {

    public function __construct()
    {
        parent::__construct();
    }

    public function generarListaClientes() {
        $consulta = 'select id, nombre, apellido1, apellido2, direccion, telefono from clientes';
        $stmt = $this->conProyecto->prepare($consulta);
        $stmt->execute();

        $lista = '';
        while ($f=$stmt->fetch(PDO::FETCH_OBJ)) {
            $lista .= '<tr class="text-center">';
            $lista .= sprintf('<td>%s %s %s</td>', $f->nombre, $f->apellido1, $f->apellido2);
            $lista .= sprintf('<td>%s</td>', $f->direccion);
            $lista .= sprintf('<td>%s</td>', $f->telefono);
            $lista .= sprintf('<td><a href="actualizarCliente?id=%d" class="btn btn-warning">Actualizar</a></td>', $f->id);
            $lista .= sprintf('<td><a href="eliminarCliente?id=%d" class="btn btn-danger">Baja</a></td>', $f->id);
            $lista .= '<tr>';
        } 

        return $lista; 
    }
}