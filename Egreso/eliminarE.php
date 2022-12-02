<?php
include("../Conexion/conexion.php");
include('../Class/class_egreso.php');

$eg = new Egresos();
$eg->Eliminar($_GET['id']);

?>