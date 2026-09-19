<?php

include("conexion.php");

$sql = "SELECT * FROM postes";

$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Postes Registrados</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<div class="tabla-contenedor">

    <h1>Postes Registrados</h1>

    <table>

        <tr>
            <th>No. Poste</th>
            <th>Fecha</th>
            <th>Dirección</th>
            <th>Departamento</th>
            <th>Municipio</th>
            <th>Referencia</th>
            <th>Latitud</th>
            <th>Longitud</th>
        </tr>

        <?php while ($fila = $resultado->fetch_assoc()) { ?>

        <tr>
            <td><?php echo $fila["no_poste"]; ?></td>
            <td><?php echo $fila["fecha_registro"]; ?></td>
            <td><?php echo $fila["direccion"]; ?></td>
            <td><?php echo $fila["departamento"]; ?></td>
            <td><?php echo $fila["municipio"]; ?></td>
            <td><?php echo $fila["referencia"]; ?></td>
            <td><?php echo $fila["latitud"]; ?></td>
            <td><?php echo $fila["longitud"]; ?></td>
        </tr>

        <?php } ?>

    </table>

    <a class="regresar" href="index.php">Registrar nuevo poste</a>

</div>

</body>
</html>