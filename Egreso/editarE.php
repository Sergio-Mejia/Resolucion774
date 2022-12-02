<?php
include("../Conexion/conexion.php");
include('../Class/class_egreso.php');


$eg = new Egresos();

if (isset($_POST['grabar']) && $_POST['grabar'] == "si") {
    $eg->editar($_POST['id'], $_POST['descripcion'], $_POST['valor']);
    exit();
}

$reg = $eg->buscarIngreso($_GET['id']);
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" language="javascript" href="../bootstrap/css/bootstrap.min.css">

    <!-- Sweet alert-->
    <link rel="stylesheet" href="../sw/dist/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&family=Outfit:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Iconos -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="../js/Funciones.js"></script>
    <link rel="stylesheet" href="../css/style.css">

    <title>Editar Egreso</title>
</head>

<body style="background-color: #8c9091;">
    <div class="container position-absolute top-50 start-50 translate-middle" style="width: 600px; margin:auto;border-radius: 5px;background:white;">
        <table class="table table-borderless">
            <div class="card-body">
                <h2 class="Centrar">Editar Egreso</h2>
                <hr>
                <form action="#" method="POST">
                    <input type="hidden" name="grabar" value="si">
                    <label for="id">Id</label>
                    <input class="form-control" type="number" name="id" value="<?php echo $_GET['id'] ?>" readonly>
                    <tr>
                        <td class="align-baseline">
                            <label for="desc">Descripción</label>
                            <input class="form-control" type="text" value="<?php echo $reg[0]['descripcion'] ?>" name="descripcion" Required>
                        </td>
                        <td class="align-baseline">
                            <label for="valor">Valor</label>
                            <input class="form-control" type="number" value="<?php echo $reg[0]['valor'] ?>" name="valor" Required>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-bottom">
                            <div class="col-md-4">
                                <a class="btn btn-success" name="correo" href="../Home/home.php">Volver</a>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-4">
                                <button class="btn btn-success" name="correo">Editar</button>
                            </div>
                        </td>
                    </tr>
                </form>
        </table>

    </div>
    </div>
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>