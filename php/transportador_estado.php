<?php
session_start();
$inc = include('conexion.php');
$user = $_SESSION['correo'];

if($inc){
    $sql = "SELECT * FROM registro where email = '".$user."'";
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
                border-radius: 10px;
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
                border-spacing: 10px;
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
                <h1>Consulta de donaciones</h1>
            </div>
            
            <div class="body_table">
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Número de Identificación</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row = $resultado->fetch_array()){
                                $nombre = $row['nombre'];
                                $num_ide = $row['num_ide'];
                                $user = $row['usuario'];
                                $correo = $row['email'];
                                $estado = $row['estado'];
                            ?>
                            <tr>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $num_ide; ?></td>
                                <td><?php echo $user; ?></td>
                                <td><?php echo $correo; ?></td>
                                <td>
                                    <form method="POST" action="actualizar_estado.php">
                                        <input type="hidden" name="email" value="<?php echo $correo; ?>">
                                        <select name="estado">
                                            <option value="disponible" <?php if($estado == 'disponible') echo 'selected'; ?>>disponible</option>
                                            <option value="no disponible" <?php if($estado == 'no disponible') echo 'selected'; ?>>no disponible</option>
                                        </select>
                                        <button type="submit">Actualizar</button>
                                    </form>
                                </td>
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