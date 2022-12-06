<?php
session_start();
include("../Conexion/conexion.php");
include('../Class/class_servicio.php');

$ing = new Servicio();
$ing->insertar($_REQUEST['id_fk'], $_REQUEST['ganancia'],$_REQUEST['frecuencia'], $_REQUEST['potencia'], $_REQUEST['tipo_servicio']);

?>