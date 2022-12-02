<!doctype html>
<html lang="es">

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
    <!-- Link para animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script type="text/javascript" language="javascript" src="../js/funciones.js"></script>
    <title>estacions</title>
</head>

<body>
    <?php


    //clase estacion 
    class Estacion{
        private $estacion;

        public function __construct()
        {
            $this->estacion = array();
        }

        //mostar estacion

        public function Mostrar()
        {
            $sql = "SELECT `id`, `nombre`, `direccion`, `departamento`, `municipio`, `tipo_area`, `altura`, `latitud`, `longitud` FROM `estacion`";
            $res = mysqli_query(Conexion::conectar(), $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                $this->estacion[] = $row;
            }
            return $this->estacion;
        }

        public function insertar1($nombre, $direccion, $departamento, $municipio, $tipo_area, $altura, $latitud, $longitud)
        {
            $sql = "INSERT INTO `estacion`(`nombre`, `direccion`, `departamento`, `municipio`, `tipo_area`, `altura`, `latitud`, `longitud`) VALUES ('$nombre','$direccion','$departamento','$municipio','$tipo_area','$altura','$latitud','$longitud')";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al insertar ingreso");
            echo " 
                <script type = 'text/javascript'>
                Swal.fire({
                    title: 'Exito',
                    text: 'La estacion se registro correctamente',
                    icon: 'success',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      }
                }).then((result)=>{
                        if(result.value){
                            window.location ='../Home/home.php';
                        }
                    });
                </script>
            ";
        }



        public function  editar($id,$nombre, $direccion, $departamento, $municipio, $tipo_area, $altura, $latitud, $longitud)
        {
            $sql = "UPDATE `estacion` SET `nombre`='$nombre',`direccion`='$direccion',`departamento`='$departamento',`municipio`='$municipio',`tipo_area`='$tipo_area',`altura`='$altura',`latitud`='$latitud',`longitud`='$longitud' WHERE id=$id";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al editar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'La estacion con id $id fue modificada',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../Home/home.php';
                    }
                });
            </script>
        ";
        }


        public function Eliminar($id)
        {
            $sql = "DELETE FROM `estacion` WHERE `id` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al Eliminar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'La estacion con id $id fue eliminado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../Home/home.php';
                    }
                });
            </script>
        ";
        }


        //Crear una función para capturar el id de los botones de acción 
        public function buscarEstacion($id)
        {
            $sql = "select * from `estacion` where `id` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al buscar");
            if ($reg = mysqli_fetch_assoc($res)) {
                $this->estacion[] = $reg;
            }
            return $this->estacion;
        }
    }
    ?>
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>

</html>