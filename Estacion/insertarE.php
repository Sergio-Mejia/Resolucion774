<?php

include("../Conexion/conexion.php");
include('../Class/class_estacion.php');

$eg = new Estacion();
$eg->insertar1($_REQUEST['nombre'], $_REQUEST['direccion'],$_REQUEST['departamento'], $_REQUEST['municipio'],$_REQUEST['tipo_area'], $_REQUEST['altura'],$_REQUEST['latitud'], $_REQUEST['longitud']);

?>