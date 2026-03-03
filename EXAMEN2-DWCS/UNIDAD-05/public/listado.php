<?php
    // ob_end_flush();
    // ob_implicit_flush(true);

    require '../vendor/autoload.php';

    use Clases\Productos;
    use eftec\bladeone\BladeOne;

    $productos = new Productos();
    $tabla = '';
    foreach($productos->generarListaProductos() as $filas) {
        $tabla .= '<tr class="text-center">';
        $tabla .= sprintf('<th scope="row"><a href="detalle.php?id=%d" class="btn btn-info">Detalle</a></th>', $filas->id);                
        $tabla .= sprintf('<td>%d</td>',  $filas->id);
        $tabla .= sprintf('<td>%s</td>',  $filas->nombre);
        $tabla .= '<td>';
        $tabla .= '<div style="display: flex; flex-direction: row;">';                                
        $tabla .= '<form action="stockTienda.php" method="post" class="mx-3">';
        $tabla .= $productos->crearCombo($filas->id);
        $tabla .= '<input type="submit" name="stock" id="stock" value="Stock" class="btn btn-primary">';
        $tabla .= '</form>';
        $tabla .= '<form name="a" action="borrar.php" method="POST"  style="display:inline">';
        $tabla .= '<a href="update.php?id={$filas->id}" class="btn btn-warning mr2">Actualizar</a>';
        $tabla .= sprintf('<input type="hidden" name="id" value="%d">', $filas->id);
        $tabla .= '<input type="submit" onclick="return confirm("¿Borrar Producto?")" class="btn btn-danger" value="Borrar">';
        $tabla .= '</div></td></tr>';
    }

    $blade = new BladeOne('../views', '../cache');
    echo $blade->run('vlistado', [
        'titulo' => 'Lista de productos',
        'encabezado' => 'Lista de productos',
        'tabla' => $tabla
    ]);
