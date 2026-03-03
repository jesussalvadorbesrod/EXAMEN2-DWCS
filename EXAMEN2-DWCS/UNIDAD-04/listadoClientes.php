<?php
    require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
                        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
                        crossorigin="anonymous">
    <title>Lista de clientes</title>
</head>
<body style="background: #4dd0e1">
   <h3 class="text-center mt-2 font-weight-bold">Lista de clientes</h3> 
    <div class="container mt-3">
        <div class="mb-3">
            <a href="altaCliente.php" class="btn btn-success">Alta Cliente</a>
            <a href="listado.php" class="btn btn-primary">Volver</a>
        </div>
        <table class="table table-striped table-dark">
            <thead>
                <tr class="text-center">
                    <th scope="col">Nombre y apellidos</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $consulta = 'select id, nombre, apellido1, apellido2, direccion, telefono from clientes';
                $stmt = $conProyecto->prepare($consulta);
                $stmt->execute();

                while ($f=$stmt->fetch(PDO::FETCH_OBJ)) {
                    echo '<tr class="text-center">';
                    printf('<td>%s %s %s</td>', $f->nombre, $f->apellido1, $f->apellido2);
                    printf('<td>%s</td>', $f->direccion);
                    printf('<td>%s</td>', $f->telefono);
                    printf('<td><a href="actualizarCliente?id=%d" class="btn btn-warning">Actualizar</a></td>', $f->id);
                    printf('<td><a href="eliminarCliente?id=%d" class="btn btn-danger">Baja</a></td>', $f->id);
                    echo '<tr>';
                }
            ?>
            </tbody>    
        </table>
    </div>
</body>
</html>