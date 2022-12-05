<?php
include("../Conexion/conexion.php");
include('../Class/class_servicio.php');
include('../Class/class_estacion.php');
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resolucion 774</title>
    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" language="javascript" href="../bootstrap/css/bootstrap.min.css">

    <!-- Sweet alert-->
    <link rel="stylesheet" href="../sw/dist/sweetalert2.min.css">

    <!-- Iconos -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="../js/funciones.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&family=Outfit:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">


</head>

<body>
    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <div class="" style="color: white;">
                <div class="display-4">
                    Espectro Redes Inalámbricas
                </div>
                <br>
                <div class="">
                    Sergio Daniel Mejia Carvajal &nbsp; 20192578074
                </div>
                <div class="">
                    Danilo Esteban Sainea Romero &nbsp; 20192578065
                </div>
            </div>
            <div>
                <img src="../assets/Logo_UD.png" alt="Escudo UDistrital" width="180">
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h2 align="center">Datos Estacion</h2>
                <form action="../Servicio/insertar.php" method="POST">
                    <input type="hidden" name="id_fk" value="<?php echo $_GET['id'] ?>">

                    <div class="form-group">
                        <label for="">Frecuencia</label>
                        <input type="text" name="frecuencia" class="form-control dato1" required>
                    </div>

                    <div class="form-group">
                        <label for="">Potencia del Transmisor</label>
                        <input type="text" name="potencia" class="form-control dato1" required>
                    </div>

                    <div class="form-group">
                        <label for="">Ganancia</label>
                        <input type="text" name="ganancia" class="form-control dato1" required>
                        <input type="hidden" name="id_fk2" value="<?php echo $reg[0]['id_estacion_fk'] ?>">
                    </div>

                    </br>
                    <div class="form-group">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <button class=" form-control btn btn-danger" onclick=window.location="../Home/home.php">Volver</button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="form-control btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Agregar servicio">Agregar Servicio</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>


        <div class="row">
            <table class="table caption-top table-hover table-success">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Estacion</th>
                        <th scope="col">Frecuencia</th>
                        <th scope="col">Potencia</th>
                        <th scope="col">Ganancia</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ing = new Servicio();
                    $reg = $ing->Mostrar($_GET['id']);


                    for ($i = 0; $i < count($reg); $i++) {
                        echo "<tr>";
                        echo "<td>" . $reg[$i]['id_servicio'] . "</td>";
                        echo "<td>" . $reg[$i]['id_estacion_fk'] . "</td>";
                        echo "<td>" . $reg[$i]['frecuencia'] . "</td>";
                        echo "<td>" . $reg[$i]['potencia'] . "</td>";
                        echo "<td>" . $reg[$i]['ganancia'] . "</td>";
                    ?>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Agregar servicio" onclick=window.location="../Home/calculo.php?id_servicio=<?php echo $reg[$i]['id_servicio']; ?>">
                                <span class="material-icons">add_circle</span>
                            </button>
                            <button class="btn btn-warning" onclick=window.location="../Servicio/editar.php?id_servicio=<?php echo $reg[$i]['id_servicio']; ?>">
                                <span class="material-icons">mode_edit</span>
                            </button>
                            <button class="btn btn-danger" onclick="eliminar('../Servicio/eliminar.php?id_servicio=<?php echo $reg[$i]['id_servicio']; ?>&id_fk2=<?php echo $reg[$i]['id_estacion_fk']; ?>')">
                                <span class="material-icons">cancel</span>
                            </button>
                        </td>

                    <?php
                    }
                    ?>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>