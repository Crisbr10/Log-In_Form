<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOG IN</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Regístrese en nuestro sitio para acceder a contenido exclusivo y funcionalidades adicionales. Complete el formulario de registro para crear una cuenta.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="logIn.css">
</head>

<body>
    <a href="./index.html" class="text-decoration-none text-secondary" id="sing">SIGN UP</a>
    <h1 class="mb-4">Log In</h1>
    <main class="rounded-4 d-flex justify-content-center mt-5 py-2 px-4 flex-wrap">
        <form action="login.php" method="post" class=" mt-4 pt-3 d-flex flex-column align-items-center gap-3">
            <label for="userName" class="text-start mt-1"> User Name<br>
                <input class="bg-transparent rounded-3 " type="text" name="userName" id="userName" pattern="[A-Za-z\s]+" required maxlength="30" minlength="3">
            </label>
            <label for="pass" class="text-start mt-3">Password <br>
                <input class="bg-transparent rounded-3 " type="password" name="pass" id="pass" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$" required minlength="8">
            </label>
            <button type="submit" class="mt-4 mb-4 rounded">LOG IN</button>

        </form>
        <?php
        error_reporting(E_ALL & ~E_NOTICE);
        ini_set('display_errors', 'Off');

        $userName = strtolower($_POST['userName']);
        $pass = strtolower($_POST['pass']);

        $hostname = 'bfdo1bp4evxb2gg8hfrp-mysql.services.clever-cloud.com';
        $database = 'bfdo1bp4evxb2gg8hfrp';
        $username = 'uj9wr7uap2ksi1an';
        $password = 'Y1tuNEE33dIfkKuKcP5I';
        $port = '3306';

        $conexion = mysqli_connect($hostname, $username, $password, $database, $port);

        $userName = mysqli_real_escape_string($conexion, strtolower($userName));
        $pass = mysqli_real_escape_string($conexion, strtolower($pass));


        $sql = "SELECT * FROM usuarios WHERE nombre = '$userName' AND pass = '$pass'";

        $result = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div id="usuario" class="rounded-4 p-3 mb-2">';
                echo '<h4>'."Datos encontrados".'</h4>';
                echo '<span>' . $row["nombre"] . '</span> ';
                echo '<span>' . $row["apellidos"] . '</span>';
                echo '<br>';
                echo "Email: " . $row["email"]. '<br>';
                echo '👏';
                echo '</div>';
            }
        }
        ?>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>