<?php
session_start();
include('conexion.php');

$correo =!empty($_POST['correo']) ? $_POST['correo'] : null;
$passwd =!empty($_POST['contrasena']) ? $_POST['contrasena'] : null;
//$correo = $_POST['correo'];
//$passwd = $_POST['contrasena'];


$_SESSION['correo'] = $correo;

$consulta = "SELECT usuario FROM registro WHERE email = '$correo' and password = '$passwd'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

if ($filas > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $tipo_usuario = $row['usuario'];

    if ($tipo_usuario == 'administrador') {
        header("Location: ../html/menu_principal.html");
        exit();
    } elseif ($tipo_usuario == 'logistica') {
        header("Location: ../html/logistica_main.html");
        exit();
    } else {
        echo "Tipo de usuario desconocido";
    }
} else {
    sleep(2);
    echo '<h1>ERROR DE AUTENTICACION</h1>';
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>