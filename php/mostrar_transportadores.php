<?php 
$inc = include('conexion.php');
if($inc){
    $sql = "SELECT * FROM `registro` WHERE usuario = 'logistica'";
    $resultado = mysqli_query($conexion, $sql);
    if($resultado){
        ?>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Darumadrop+One&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');

            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
                
            }
            body{
                background-color: #6e91c1;
            }
            .main_text{
                background-color: #72c1e8;
                color: #FFFFFF;
                display: flex;
                justify-content: center;
                padding: 22px;
                width: 1200px; 
                height: 100px; 
                margin: 20px auto;
                border-radius: 10px
            }
            .body_table{
                width: 1200px; 
                height: 600px; /* Ajusta la altura según tus necesidades */
                max-width: 1200px; /* Establece el ancho máximo para evitar que se vuelva demasiado grande */
                background-color: #ccc;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                border-radius: 10px;
                
            }
            .table{
                display: flex;
                justify-content: center;
            }
            table{
                border-collapse: separate;
                border-spacing: 10px
            }
            th {
                 background-color: #6e91c1; /* Color de fondo */
                color: #FFFFFF; /* Color de texto */
                font-weight: bold; /* Fuente en negrita */
                 padding: 10px; /* Espaciado interno */
                 border: 1px solid #ccc; /* Borde */
                }
            td, th {
            padding: 10px; /* Ajusta el valor para obtener el espaciado deseado */
            }
        </style>
        <body>
            <div class="main_text">
                <h1>disponibilidad tranportadores</h1>
            </div>
            <div class="body_table">
                <div class="table">
                <table>
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>Num identifiacación</th>
                    <th>correo</th>
                    <th>estado</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
            while($row = $resultado->fetch_array()){
                $nombre = $row['nombre'];
                $num_ide = $row['num_ide'];
                $email = $row['email'];
                $estado= $row['estado'];
                ?>
                <tr>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $num_ide; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $estado; ?></td>
                    
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
                </div>
            </div>
        
            
        </body>
        
        <?php
    }
}
?>