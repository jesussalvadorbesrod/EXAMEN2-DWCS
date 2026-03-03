<?php
    require '../vendor/autoload.php';

    use Clases\Clientes;
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
                $clientes = new Clientes(); 
                echo $clientes->generarListaClientes();
            ?>
            </tbody>    
        </table>
    </div>
</body>
</html>