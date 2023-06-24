<?php 
include('conexion.php');
boton($conexion);


function insertar($conexion){
	// Obtener los datos del formulario
	$tipo_prod = $_POST['tipo_prod'];
    $nombre_prod = $_POST['nombre_prod'];
    $cantidad_prod = $_POST['cantidad_prod'];
    $fecha_prod = $_POST['fecha_prod'];
	$correo_donante = $_POST['correo_donante'];
	// Insertar los datos en la base de datos
	$sql = "INSERT INTO donacion(tipo_prod, nombre_prod, cantidad_prod, fecha_prod, correo_donante) VALUES ('$tipo_prod','$nombre_prod','$cantidad_prod','$fecha_prod', '$correo_donante')";
	mysqli_query($conexion, $sql);
	mysqli_close($conexion);
	sleep(5); // Pausa de 5 segundos
}
function boton($conexion){
	////obtener la validacion del boton
	if(isset($_POST['enviar'])){
		insertar($conexion);
        header("Location: ../html/donaciones.html");

	}
	else{
		echo 'no enviado ';
        

	}
}

?>