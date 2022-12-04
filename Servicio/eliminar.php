<?php
include("../Conexion/conexion.php");
include('../Class/class_servicio.php');

$ing = new Servicio();
$ing->Eliminar($_GET['id_servicio'],$_GET['id_fk2']);

?>