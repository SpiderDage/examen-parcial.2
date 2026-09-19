<?php

include("conexion.php");

$no_poste = $_POST["no_poste"];
$fecha = $_POST["fecha"];
$direccion = $_POST["direccion"];
$departamento = $_POST["departamento"];
$municipio = $_POST["municipio"];
$referencia = $_POST["referencia"];
$latitud = $_POST["latitud"];
$longitud = $_POST["longitud"];

$sql = "INSERT INTO postes
(no_poste, fecha_registro, direccion, departamento, municipio, referencia, latitud, longitud)
VALUES
('$no_poste', '$fecha', '$direccion', '$departamento', '$municipio', '$referencia', '$latitud', '$longitud')";

if ($conexion->query($sql) === TRUE) {
    $mensaje = "Poste registrado correctamente";
} else {
    $mensaje = "Error al registrar el poste";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<div class="mensaje">

    <h2><?php echo $mensaje; ?></h2>

    <a href="index.php">Registrar otro</a>

    <a href="consulta.php">Ver registros</a>

</div>

</body>
</html>