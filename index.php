<?php
$nombre = strtolower($_POST['firstName']);
$apellido = strtolower($_POST['lastName']); 
$email = strtolower($_POST['email']); 
$phone = strtolower($_POST['phone']); 
$pass = strtolower($_POST['pass']); 
$passConfirm = strtolower($_POST['passConfirm']); 


$hostname = 'bfdo1bp4evxb2gg8hfrp-mysql.services.clever-cloud.com';
$database = 'bfdo1bp4evxb2gg8hfrp';
$username = 'uj9wr7uap2ksi1an';
$password = 'Y1tuNEE33dIfkKuKcP5I';
$port = '3306';

$conexion = mysqli_connect($hostname, $username, $password, $database, $port);

$nombre = mysqli_real_escape_string($conexion, $nombre);
$apellido = mysqli_real_escape_string($conexion, $apellido);
$email = mysqli_real_escape_string($conexion, $email);
$phone = mysqli_real_escape_string($conexion, $phone);
$pass = mysqli_real_escape_string($conexion, $pass);

$sql = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND pass = '$pass' AND email='$email'";

$result = mysqli_query($conexion, $sql);
if (mysqli_num_rows($result)<1) {
    $sql = "INSERT INTO usuarios (nombre, apellidos, email, phone, pass, passConfirm) VALUES('$nombre', '$apellido', '$email', '$phone', '$pass', '$passConfirm')";    
};



if (mysqli_query($conexion, $sql)) {
    echo "Su registro se ha realizado correctamente";
} else {
    echo "Ha habido un error al registrar sus datos";
}
header("Location: index.html");
exit()
?>