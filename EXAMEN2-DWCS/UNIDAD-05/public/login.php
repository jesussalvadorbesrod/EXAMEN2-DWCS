<?php
    session_start();

    require '../vendor/autoload.php';

    use Clases\Empleados;


    if (isset($_POST['usuario']) && isset($_POST['contrasenha'])) {
        $empleados = new Empleados();
        if ($empleados->comprobarLogin($_POST['usuario'], $_POST['contrasenha'])) {
            $_SESSION['nombre'] = $_POST['usuario'];
            header('Location: listado.php');
        } else {
            $_SESSION['error'] = 'Usuario y/o contraseña incorrectos';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css para usar Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
                        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
                        crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container mt-3">
        <div class="card">
            <div class="card-title">Login</div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario">
                    <br>
                    <label for="contrasenha">Contraseña</label>
                    <input type="text" name="contrasenha" id="contrasenha">
                    <br>
                    <input type="submit"  class="btn btn-primary" value="Enviar">
                    <input type="reset"  class="btn btn-danger" value="Resetear">
                </form>
            </div>
            <div>
                <?php 
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                ?>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>