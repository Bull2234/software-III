<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_donacion = $_POST['id'];
    $id_logistica = $_POST['num_ide'];

    // Actualizar el estado de la donación
    $sql_update = "UPDATE donacion SET estado_don = 'en progreso' WHERE id= '$id_donacion'";
    mysqli_query($conexion, $sql_update);

    // Actualizar el estado del usuario de logística
    $sql_update_logistica = "UPDATE `registro` SET `estado`='no disponible' WHERE num_ide = '$id_logistica'";
    mysqli_query($conexion, $sql_update_logistica);

    mysqli_close($conexion);
    header("Location: mostrar_donaciones.php");
}
?>