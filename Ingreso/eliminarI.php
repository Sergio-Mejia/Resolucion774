<?php
include("../Conexion/conexion.php");
include('../Class/class_ingreso.php');

$ing = new Ingresos();
$ing->Eliminar($_GET['id']);

?>