<?php 
require_once('conexion.php');
$num_ide = $_POST['num_ide'];
$pass = $_POST['new_password'];

$query = "UPDATE registro set password= '$pass' WHERE num_ide= $num_ide";
$conexion->query($query);

header("Location: ../html/iniciosesion.html");


?>