<?php
include("../Conexion/conexion.php");
include('../Class/class_egreso.php');

$eg = new Estacion();
$eg->Eliminar($_GET['id']);

?>