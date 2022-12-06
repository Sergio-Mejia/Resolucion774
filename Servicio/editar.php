<?php
include("../Conexion/conexion.php");
include('../Class/class_servicio.php');


$ing = new Servicio();

if (isset($_POST['grabar']) && $_POST['grabar'] == "si") {
    $ing->editar($_POST['id'], $_POST['ganancia'], $_POST['frecuencia'], $_POST['potencia'],$_POST['id_fk'], $_POST['tipo_servicio']);
    exit();
}

$reg = $ing->buscarservicio($_GET['id_servicio']);
// 
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

    <title>Editar Ingreso</title>
</head>

<body style="background-color: #8c9091;">
    <div class="container position-absolute top-50 start-50 translate-middle" style="width: 600px; margin:auto;border-radius: 5px;background:white;">
        <table class="table table-borderless">
            <div class="card-body">
                <h2 class="Centrar">Editar Servicio</h2>
                <hr>
                <form action="#" method="POST">
                    <input type="hidden" name="grabar" value="si">
                 
                    <label>Servicio</label>
                    <input class="form-control" type="number" name="id" value="<?php echo $_GET['id_servicio'] ?>" readonly>

                    <div class="form-group">
                        <label for="">Tipo de Servicio</label>
                        <select class="form-select" id="tipo_servicio" name="tipo_servicio" required>
                        <option value="<?php echo $reg[0]['tipo_servicio'] ?>"> <?php echo $reg[0]['tipo_servicio'] ?> </option>
                            <option value="">Seleccione una opción...</option>
                            <option value="Radio AM">Radiodifusión A.M</option>
                            <option value="Radio FM">Radiodifusión F.M</option>
                            <option value="TV Digital">Televisión Digital</option>
                            <option value="TV Analoga">Televisión Análoga</option>
                            <option value="Emisora FM">Emisora F.M comunitaria</option>
                        </select>
                    </div>

                    <label for="">Frecuencia</label>
                    <input class="form-control" type="text" name="frecuencia" value="<?php echo $reg[0]['frecuencia'] ?>" required>

                    <label for="">Potencia del Transmisor</label>
                    <input class="form-control" type="text" name="potencia" value="<?php echo $reg[0]['potencia'] ?>" required>

                    <label for="">Ganancia</label>
                    <input class="form-control" type="text" name="ganancia" value="<?php echo $reg[0]['ganancia'] ?>" required>
                    <input type="hidden" name="id_fk" value="<?php echo $reg[0]['id_estacion_fk'] ?>">
                    <div>
                        </br>
                        <button type="submit" class=" form-control btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Agregar servicio">Editar Servicio</button>
                    </div>
                </form>
        </table>

    </div>
    </div>
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>