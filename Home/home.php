<?php
include("../Conexion/conexion.php");
include('../Class/class_ingreso.php');
include('../Class/class_egreso.php');
include('../Class/control.php');
?>

<!doctype html>
<html lang="es">

<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    -->
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

    <title>Aplicación financiera</title>
</head>

<body style="background: -webkit-linear-gradient(bottom right,silver,grey,white); ">
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <h1 style="color:white;">Aplicación Gestión Financiera</h1>
        <a type='button' class='btn btn-outline-danger' style="margin-left: 650px;"href='../logout.php'>Cerrar Sesión</a>
    </nav>
    <div class="container" style="margin-top: 20px;">
        <div class="row" style="text-align: center;">
            <?php
            $control = new Control();
            if ($control->calculardiferencia() < 0) {
            ?>
                <div class="col-md-4"></div>
                <div class="col-md-4 text-white" style="background: #AC111B;">
                    <h3>Saldo En Contra</h3>
                    <h3><?php echo "$" . $control->calculardiferencia() ?></h3>
                </div>
            <?php
            }

            if ($control->calculardiferencia() > 0) {
            ?>
                <div class="col-md-4"></div>
                <div class="col-md-4 text-white" style="background: #4C950F;">
                    <h3>Saldo a Favor</h3>
                    <h3><?php echo "$" . $control->calculardiferencia() ?></h3>
                </div>
            <?php
            }

            if ($control->calculardiferencia() == 0) {
            ?>
                <div class="col-md-4"></div>
                <div class="col-md-4 text-white" style="background: #C8C320;">
                    <h3>¡ Saldo Equilibrado !</h3>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="text-align: right;">
                <h3>Suma Ingresos</h3>
                <?php
                $ing1 = new Ingresos();
                $reg1 = $ing1->suma($_SESSION['id']);
                ?>

                <h4>$<?php echo $reg1[0]['respuesta'] ?></h4>
            </div>
            <div class="col-lg-6" style="text-align: left;">
                <h3>Suma Egresos</h3>
                <?php
                $eg1 = new Egresos();
                $reg2 = $eg1->suma($_SESSION['id']);
                ?>
                <h4>$<?php echo $reg2[0]['respuesta'] ?></h4>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-6">
                <h3 align="center">Ingresos</h3>
                <table class="table caption-top table-hover table-success">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ing = new Ingresos();
                        $reg = $ing->Mostrar($_SESSION['id']);

                        for ($i = 0; $i < count($reg); $i++) {
                            echo "<tr>";
                            echo "<td>" . $reg[$i]['id'] . "</td>";
                            echo "<td>" . $reg[$i]['descripcion'] . "</td>";
                            echo "<td>$" . $reg[$i]['valor'] . "</td>";
                        ?>
                            <td>
                                <button class="btn btn-warning" onclick=window.location="../Ingreso/editar.php?id=<?php echo $reg[$i]['id']; ?>">
                                    <span class="material-icons">mode_edit</span>
                                </button>
                                <button class="btn btn-danger" onclick="eliminar('../Ingreso/eliminarI.php?id=<?php echo $reg[$i]['id']; ?>')">
                                    <span class="material-icons">cancel</span>
                                </button>
                            </td>
                        <?php
                        }
                        ?>
                        </tr>
                    </tbody>

                </table>
                <tr>
                    <form action="../Ingreso/insertar.php" method="POST">
                        <td></td>
                        <td colspan="2">
                            <input type="text" id="descripcion" name="descripcion" placeholder="Descripción" required>
                        </td>
                        <td>
                            <input type="number" id="valor" name="valor" placeholder="Valor" required>
                        </td>
                        <td>
                            <button class="btn btn-success">
                                <span class="material-icons">add_circle</span>
                            </button>
                        </td>
                    </form>
                </tr>

            </div>
            <div class="col-lg-6">
                <h3 align="center">Egresos</h3>
                <table class="table caption-top table-hover table-danger">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $eg = new Egresos();
                        $reg = $eg->Mostrar($_SESSION['id']);

                        for ($i = 0; $i < count($reg); $i++) {
                            echo "<tr>";
                            echo "<td>" . $reg[$i]['id'] . "</td>";
                            echo "<td>" . $reg[$i]['descripcion'] . "</td>";
                            echo "<td>$" . $reg[$i]['valor'] . "</td>";
                        ?>
                            <td>
                                <button class="btn btn-warning" onclick=window.location="../Egreso/editarE.php?id=<?php echo $reg[$i]['id']; ?>">
                                    <span class="material-icons">mode_edit</span>
                                </button>
                                <button class="btn btn-danger" onclick="eliminar('../Egreso/eliminarE.php?id=<?php echo $reg[$i]['id']; ?>')">
                                    <span class="material-icons">cancel</span>
                                </button>
                            </td>
                        <?php
                        }
                        ?>
                        </tr>
                    </tbody>

                </table>
                <tr>
                    <form action="../Egreso/insertarE.php" method="POST">
                        <td></td>
                        <td colspan="2">
                            <input type="text" id="descripcion" name="descripcion" placeholder="Descripción" required>
                        </td>
                        <td>
                            <input type="number" id="valor" name="valor" placeholder="Valor" required>
                        </td>
                        <td>
                            <button class="btn btn-success">
                                <span class="material-icons">add_circle</span>
                            </button>
                        </td>
                    </form>
                </tr>
            </div>
        </div>
    </div>

    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>