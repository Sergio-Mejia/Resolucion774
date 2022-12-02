<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    -->
    <link rel="stylesheet" language="javascript" href="./bootstrap/css/bootstrap.min.css">
    <!-- Sweet alert-->
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">

    <!-- Iconos -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Link para animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script type="text/javascript" language="javascript" src="js/funciones.js"></script>
    <title>INICIO DE SESION</title>
</head>

<body>
    <?php
    session_start();
    ?>
    <?php
    include("./Conexion/conexion.php");

    $con = new Conexion();
    $link = $con->Conectar();

    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $contra = (isset($_POST['contra'])) ? $_POST['contra'] : '';

    //validar usuario y passwd
    $sql = "select * from `usuario` where `usuario`.`correo` ='$email' and `usuario`.`contraseña`= '$contra'";
    $result = mysqli_query($link, $sql);
    if ($row = mysqli_fetch_array($result)) {
        //crear la variable de sesion del usuario
        $user= $row['usuario'];
        $_SESSION['id'] = $row['idUsuario'];
        echo " 
        <script type = 'text/javascript'>
        Swal.fire({
            title: 'Exito',
            text: 'Bienvenido $user al sistema',
            icon: 'success',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
              }
        }).then((result)=>{
                if(result.value){
                    window.location ='./Home/home.php';
                }
            });
        </script>
    ";
    } else {
        $_SESSION['id'] = NULL;
        echo " 
        <script type = 'text/javascript'>
        Swal.fire({
            title: 'Error!',
            text: 'Usuario o contraseña incorrectos',
            icon: 'error',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
              }
        }).then((result)=>{
                if(result.value){
                    window.location ='index.php';
                }
            });
        </script>
    ";
    }
    ?>