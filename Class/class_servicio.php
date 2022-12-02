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
    <title>Gestión Servicio</title>
</head>

<body>
    <?php


    //clase servicios 
    class Servicio{
        private $servicio;

        public function __construct()
        {
            $this->servicio = array();
        }

        //mostar servicios

        public function Mostrar()
        {
            $sql = "SELECT `id_servicio`, `id_estacion_fk`, `ganancia`, `frecuencia`, `potencia` FROM `servicio` WHERE 1";
            $res = mysqli_query(Conexion::conectar(), $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                $this->servicio[] = $row;
            }
            return $this->servicio;
        }

        public function insertar($id_fk,$ganancia,$frecuencia,$potencia)
        {
            $sql = "INSERT INTO `servicio`(`id_estacion_fk`, `ganancia`, `frecuencia`, `potencia`) VALUES ('$id_fk','$ganancia','$frecuencia','$potencia')";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al insertar servicio");
            echo " 
                <script type = 'text/javascript'>
                Swal.fire({
                    title: 'Exito',
                    text: 'El servicio se registro correctamente',
                    icon: 'success',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      }
                }).then((result)=>{
                        if(result.value){
                            window.location ='../Home/servicio.php';
                        }
                    });
                </script>
            ";
        }



        public function  editar($id,$ganancia,$frecuencia,$potencia)
        {
            $sql = "UPDATE `servicio` SET `ganancia`='$ganancia',`frecuencia`='$frecuencia',`potencia`='$potencia' WHERE `id_servicio`=$id";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al editar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El servicio con id $id fue modificado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../Home/servicio.php';
                    }
                });
            </script>
        ";
        }

        public function buscarservicio($id)
        {
            $sql = "select * from `servicio` where `id_servicio` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al buscar");
            if ($reg = mysqli_fetch_assoc($res)) {
                $this->servicio[] = $reg;
            }
            return $this->servicio;
        }

        public function Eliminar($id)
        {
            $sql = "DELETE FROM `servicio` WHERE `id_servicio` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al Eliminar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El servicio con id $id fue eliminado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../Home/servicio.php';
                    }
                });
            </script>
        ";
        }
    }
    ?>
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>

</html>