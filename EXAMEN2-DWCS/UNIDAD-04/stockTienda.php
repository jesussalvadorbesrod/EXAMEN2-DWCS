<?php

    if (isset ($_POST['tienda'])) {

        require_once 'conexion.php';

        $consulta = 'select nombre, tlf from tiendas where id = :id';
        $stmt = $conProyecto->prepare($consulta);
        $stmt->execute([':id' => $_POST['tienda']]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: listado.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
                        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
                        crossorigin="anonymous">
    <title>Stock del producto</title>
</head>
<body class="background: #4dd0e1">
    <div class="container">
        <div class="card bg-success text-white">
            <h5>Stock del producto</h5>
            <p>Nombre de la tienda: <?php echo $resultado['nombre']; ?></p>
            <p>Telefono: <?php echo $resultado['tlf']; ?></p>
        </div>
    </div>
</body>
</html>