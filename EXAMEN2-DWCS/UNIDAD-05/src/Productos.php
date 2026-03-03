<?php

namespace Clases;

use PDO;
use PDOException;

class Productos extends ConexionBD {

    public function __construct()
    {
        parent::__construct();
    }

    public function generarListaProductos() {
        $consulta = "select id, nombre from productos order by nombre";

        $stmt = $this->conProyecto->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar los productos " . $ex->getMessage());
        }
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }

    /**
     * Crea la combobox con las tiendas que tengan stock del producto
     * 
     * @param int $id Identificador del producto
     */
    function crearCombo(int $id): string {       
        $consulta = 'select t.nombre as tienda, t.id as id, s.unidades as unidades from tiendas as t join stocks as s on t.id=s.tienda where s.unidades > 0 and s.producto = :id';
        $stmt = $this->conProyecto->prepare($consulta);
        $stmt->execute([':id' => $id]);

        $combo = sprintf('<select name="tienda" id="tienda">', $id);
        foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $r) {
            $color = ($r->unidades <=2)? 'red' : 'black';
            $combo .= sprintf('<option value="%d" style="color : %s">%s</option>', $r->id, $color, $r->tienda);
        }
        $combo .= '</select>';

        return $combo;
    }

}
