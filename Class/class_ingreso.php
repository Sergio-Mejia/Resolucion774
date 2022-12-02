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
    <title>Gestión Empleados</title>
</head>

<body>
    <?php


    //clase ingresos 
    class Ingresos{
        private $ingreso;

        public function __construct()
        {
            $this->ingreso = array();
        }

        //mostar Ingresos

        public function Mostrar($id)
        {
            $sql = "SELECT `id`, `descripcion`, `valor` FROM `ingresos/egresos` WHERE `estado_fk`=1 and `Usuario_idUsuario`=$id";
            $res = mysqli_query(Conexion::conectar(), $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                $this->ingreso[] = $row;
            }
            return $this->ingreso;
        }

        public function insertar($desc, $valor,$user)
        {
            $sql = "INSERT INTO `ingresos/egresos`( `descripcion`, `valor`, `estado_fk`,`Usuario_idUsuario`) VALUES ('$desc', $valor, 1,$user)";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al insertar ingreso");
            echo " 
                <script type = 'text/javascript'>
                Swal.fire({
                    title: 'Exito',
                    text: 'El ingreso se registro correctamente',
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



        public function  editar($id, $desc, $valor)
        {
            $sql = "UPDATE `ingresos/egresos` SET `descripcion`='$desc',`valor`=$valor WHERE id=$id";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al editar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El ingreso con id $id fue modificado',
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

        public function suma($id)
        {
            $sql = "SELECT sum(valor) as 'respuesta', descripcion from `ingresos/egresos` WHERE `estado_fk`=1 and `Usuario_idUsuario`=$id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al sumar");

            if ($reg = mysqli_fetch_assoc($res)) {
                $this->ingreso[] = $reg;
            }
            return $this->ingreso;
        }

        //Crear una función para capturar el id de los botones de acción 
        public function buscarIngreso($id)
        {
            $sql = "select * from `ingresos/egresos` where `id` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al buscar");
            if ($reg = mysqli_fetch_assoc($res)) {
                $this->ingreso[] = $reg;
            }
            return $this->ingreso;
        }

        public function Eliminar($id)
        {
            $sql = "DELETE FROM `ingresos/egresos` WHERE `ingresos/egresos`.`id` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al Eliminar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El ingreso con id $id fue eliminado',
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
    }
    ?>
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>

</html>