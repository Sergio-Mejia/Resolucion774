<?php

include('../Class/class_usuario.php');

$us = new Usuario();
$us->insertar($_REQUEST['user'],$_REQUEST['pasw'], $_REQUEST['mail']);

?>