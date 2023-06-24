<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cambiar_contrasena.css">
    
    <title>recuperación contraseña</title>
</head>
<body>
    <div class="main_div_cambiar_contrasena">
        <div class="formulario_cambiar_contrasena">
            
            <form action="../php/cambiar_contrasena.php" method="POST">
                <h2>Restablecer contarseña</h2>  <br>
                <label for=""> nueva contraseña</label> <br>
                <input type="text" name="new_password" id="" required> <br> <br>
                <input type="hidden" name="num_ide" value="<?php echo $_GET['id']; ?>"> <br> <br>
                <button type="submit">Restablecer</button>
            </form>
        </div>
    </div>
    
</body>
</html>