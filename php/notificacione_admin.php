<?php 
$inc = include('conexion.php');
if($inc){
    // Consulta para obtener la cantidad de registros en la tabla
    $query = "SELECT COUNT(*) AS count FROM donacion";
    $resultado = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($resultado);
    $cantidad_registros_actual = $row['count'];

    // Obtener la cantidad de registros previamente almacenada
    $archivo_cantidad_registros = 'cantidad_registros.txt';
    $cantidad_registros_previa = file_get_contents($archivo_cantidad_registros);
   ?>
   <style>
    
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.principal{
    background-color: #6e91c1;
    height: 100vh;

}
.cuadrado {
    width: 730px;
    height: 480px;
    background-color: white;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
 }

 .noti_titulo{
    height: 10vh;
    background-color: #72c1e8;
    text-align: center;
    padding: 14px;
    color: #FFFFFF;
    border-radius: 8px;
    margin: 10px;
 }
.noti_nuevas_titulo{
    height: 6vh;
    background-color: #6e91c1;
    padding: 14px;
    color: #FFFFFF;
    border-radius: 8px;
    margin: 10px;
}
.noti_nuevas_content{
    height: 16vh;
    background-color: #72c1e8;
    padding: 6px;
    color: #FFFFFF;
    border-radius: 8px;
    margin: 10px;
    font-size: 22px;
}

 h1{
    font-weight: bolder;
    font-size: 40px;
 }
   </style>
    <body>
    <div class="principal" id="pr">
        <div class="cuadrado">
           <div class="noti_titulo">
            <h1>notificaciones</h1>
           </div>
           <div class="noti_nuevas_titulo">
            <h2>nuevas</h2>
           </div>
            <?php
           
            if ($cantidad_registros_actual != $cantidad_registros_previa) {
                
                $table_add = "nueva donación";
            ?>
            <div class="noti_nuevas_content">
                <ul>
                    <li><?php echo $table_add; ?></li>
                </ul>
            </div>
            <?php
                
                file_put_contents($archivo_cantidad_registros, $cantidad_registros_actual);
            } else {
                // No se ha producido un cambio en la cantidad de registros
            }
            ?>
    </div>
    </body>
<?php
}
?>