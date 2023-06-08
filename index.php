<!-- Código HTML incluido en el doc .php porque no enlazaba correctamente en mi IDE con el archivo .html -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UFT-8">
    <meta name ="viewpoint" content="width=device-width, initial-scale=1">
    <link rel ="stylesheet" href="style.css">
    <script src="index.js"></script>
    <title> Formulario PHP </title>
</head>
<body>
    
    <div class="container">
        
        <form method= "post" action ="index.php" class="formulario" id="formulario"> 
            <p class="titulo">Formulario PHP con validación </p>
            <div class="form_input" style="position: relative;">
                <label>Nombre</label>
                <input type="text" name="nombre" required/>
            </div>  
            <div class="form_input" style="position: relative;">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" required/>
                <br>
            </div>
            <div class="form_input" style="position: relative;">
                <label for="email">Email</label>
                <input type="email" name="email" required/>
                <br>
            </div>
            <div class ="submit_button">
                <input type="submit" name = "submit" value="SUSCRIBIRSE"/>
                <br>
            </div>
        </form>
    </div>
</body>
</html>
<?php
if($_POST){
    $nombre = $_POST ['nombre'];
    $apellido = $_POST ['apellido'];
    $email = $_POST ['email'];

    $servername = 'localhost'; //OJO mirar localhost predeterminado 3306, sino cambiar a localhost: numpuertoactual
    $username = 'root';
    $password = '';
    $dbname = 'cursosql';

    //crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    //check conexión
    if($conn-> connect_error){
        die ("Connection failed " . $conn-> connect_error);
    }

    //query SQL para insertar los datos en la tabla correspondiente
    $sql  = "INSERT INTO `usuario` (`nombre`, `apellido`, `email`)
    VALUES ('$nombre', '$apellido', '$email')";

    //verificar conexión
    if($conn->query($sql) === TRUE){
        echo "Se ha suscrito correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}?>