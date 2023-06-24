<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_donacion = $_GET['id'];
    
    // Obtener la información de la donación
    $sql_donacion = "SELECT * FROM donacion WHERE id = '$id_donacion'";
    $resultado_donacion = mysqli_query($conexion, $sql_donacion);
    $donacion = mysqli_fetch_assoc($resultado_donacion);

    // Obtener los usuarios de logística con estado disponible
    $sql_logistica = "SELECT * FROM registro WHERE usuario = 'logistica' AND estado = 'disponible'";
    $resultado_logistica = mysqli_query($conexion, $sql_logistica);

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
            <h1>Asignar Personal de Logística</h1>
        </div>
        <div class="body_table">
            <div class="table">
                <form action="actualizar_estado_donacion.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id_donacion; ?>">
                    <label for="num_ide">Seleccionar personal de logística:</label>
                    <select name="num_ide" id="num_ide">
                        <?php
                        while ($row = mysqli_fetch_assoc($resultado_logistica)) {
                            $id_logistica = $row['num_ide'];
                            $nombre_logistica = $row['nombre'];
                            ?>
                            <option value="<?php echo $id_logistica; ?>"><?php echo $nombre_logistica; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <input type="submit" value="Asignar">
                </form>
            </div>
        </div>
    </body>
    <?php
}
?>