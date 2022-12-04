<?php
include("../Conexion/conexion.php");
include('../Class/class_servicio.php');
include('../Class/class_estacion.php');


$ing = new Servicio();
$ing2 = new Estacion();


$reg = $ing->buscarservicio($_GET['id_servicio']);
$reg2 = $ing2->buscarEstacion($reg[0]['id_estacion_fk']);

$pire = $reg[0]['ganancia'] + $reg[0]['potencia'];

$distanciap = 0;
$distanciao = 0;
$radiopublico = 0;
$radioocupacional = 0;


switch ($reg[0]['frecuencia']) {

    case ($reg[0]['frecuencia'] > 1 && $reg[0]['frecuencia'] <= 10):
        $radiopublico = 0.10 * sqrt($pire * $reg[0]['frecuencia']);
        $radioocupacional = 0.0144 * $reg[0]['frecuencia'] * sqrt($pire);
        break;
    case ($reg[0]['frecuencia'] > 10 && $reg[0]['frecuencia'] <= 400):
        $radiopublico = 0.319 * sqrt($pire);
        $radioocupacional = 0.143 * sqrt($pire);
        break;
    case ($reg[0]['frecuencia'] > 400 && $reg[0]['frecuencia'] <= 2000):
        $radiopublico = 6.38 * sqrt($pire / $reg[0]['frecuencia']);
        $radioocupacional = 2.92 * sqrt($pire / $reg[0]['frecuencia']);
        break;
    case ($reg[0]['frecuencia'] > 2000 && $reg[0]['frecuencia'] <= 300000):
        $radiopublico = 0.143 * sqrt($pire);
        $radioocupacional = 0.0638 * sqrt($pire);
        break;
}

if ($reg2[0]['altura'] > $radiopublico) {
    $distanciap = "Zona segura, la persona puede estar debajo de la antena";
} else {
    $distanciap = "Zona segura a " . sqrt(pow($radiopublico, 2) - pow($reg2[0]['altura'], 2)) . " metros de distancia";
}

if ($reg2[0]['altura'] > $radioocupacional) {
    $distanciao = "Zona segura, la persona puede estar debajo de la antena";
} else {
    $distanciao = "Zona segura a " . sqrt(pow($radioocupacional, 2) - pow($reg2[0]['altura'], 2)) . " metros de distancia";
}


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
                <h2 class="Centrar">Calculo simplificado</h2>
                <hr>
                <form action="../Home/servicio.php?id=<?php echo $reg[0]['id_estacion_fk']; ?>" method="POST">
                    <input type="hidden" name="grabar" value="si">
                    <div class="form-group">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label>Servicio</label>
                                <input class="form-control" type="number" name="id" value="<?php echo $_GET['id_servicio'] ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="">Frecuencia</label>
                                <input class="form-control" type="text" name="frecuencia" value="<?php echo $reg[0]['frecuencia'] ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="">PIRE</label>
                                <input class="form-control" type="text" name="frecuencia" value="<?php echo $pire ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="">Potencia del Transmisor</label>
                                <input class="form-control" type="text" name="potencia" value="<?php echo $reg[0]['potencia'] ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Ganancia</label>
                                <input class="form-control" type="text" name="ganancia" value="<?php echo $reg[0]['ganancia'] ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="">Radio (publico general)</label>
                                <input class="form-control" type="text" name="potencia" value="<?php echo $radiopublico ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Radio (exposición ocupacional)</label>
                                <input class="form-control" type="text" name="potencia" value="<?php echo $radioocupacional ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <label for="">Distancia Publico General</label>
                    <input class="form-control" type="text" name="distanciap" value="<?php echo $distanciap ?>" readonly>

                    <label for="">Distancia Ocupacional</label>
                    <input class="form-control" type="text" name="distancio" value="<?php echo $distanciao ?>" readonly>

                    </br>
                    <div class="form-group">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input class="form-control" type="hidden" name="id" value="<?php echo $_GET['id_servicio'] ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class=" form-control btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Agregar servicio">Volver</button>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="hidden" name="frecuencia" value="<?php echo $pire ?>" readonly>
                            </div>
                        </div>
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