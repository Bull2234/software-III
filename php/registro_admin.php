<?php
include('conexion.php');
boton($conexion);


function insertar($conexion){
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $fecha_nac = $_POST['fecha'];
    $tipo_ide = $_POST['identificacion'];
    $num_ide = $_POST['numidentif'];
    $usuario= $_POST['usuario'];
    $email = $_POST['correo'];
    $password = $_POST['contrasena'];
    $estado = 'sin definir';
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO registro VALUES ('$nombre', '$fecha_nac', '$tipo_ide', '$num_ide', '$usuario', '$email', '$password', '$estado')";
    
    try {
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        sleep(2); // Pausa de 5 segundos
        header("Location: ../html/iniciosesion.html");
    } catch (mysqli_sql_exception $excepcion) {
        // Verificar si es un error de clave primaria duplicada
        if ($excepcion->getCode() === 1062) {
            // Mostrar advertencia personalizada
            echo 'el número de cédula ya está vinculado a una cuenta' ;
			echo '<script>window.location.href = "../html/registrarse.html";</script>';
			
        } else {
            // Mostrar mensaje de error general
            echo "Error en la consulta: " . $excepcion->getMessage();
        }
    }
}

function boton($conexion){
    // obtener la validación del botón
    if(isset($_POST['enviar'])){
        insertar($conexion);
    } else {
		
    }
}
?>