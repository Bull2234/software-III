<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $estado = $_POST['estado'];

    // Realizar la consulta para actualizar el estado en la base de datos
    $consulta = "UPDATE registro SET estado = '$estado' WHERE email = '$email'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "Estado actualizado correctamente";
    } else {
        echo "Error al actualizar el estado";
    }

    mysqli_close($conexion);
}
?>