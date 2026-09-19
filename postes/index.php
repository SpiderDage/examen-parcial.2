<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$conexion = new mysqli("127.0.0.1", "root", "1234", "postes_zacapa", 3306);

if ($conexion->connect_error) {
    die("Error de conexión");
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $poste = $_POST["poste"];
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
    ('$poste', '$fecha', '$direccion', '$departamento', '$municipio', '$referencia', '$latitud', '$longitud')";

    if ($conexion->query($sql)) {
        $mensaje = "Registro guardado";
    } else {
        $mensaje = "No se pudo guardar";
    }
}

$datos = $conexion->query("SELECT * FROM postes");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Postes eléctricos</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<div class="principal">

    <h1>Registro de postes</h1>

    <p class="texto">
        Ingrese los datos del poste que desea registrar.
    </p>

    <?php
    if ($mensaje != "") {
        echo "<p class='mensaje'>$mensaje</p>";
    }
    ?>

    <form method="POST">

        <label>Número de poste</label>
        <input type="text" name="poste" required>

        <label>Fecha de registro</label>
        <input type="date" name="fecha" required>

        <label>Dirección</label>
        <input type="text" name="direccion" required>

        <label>Departamento</label>
        <select name="departamento" required>
            <option value="">Seleccione un departamento</option>
            <option value="Alta Verapaz">Alta Verapaz</option>
            <option value="Baja Verapaz">Baja Verapaz</option>
            <option value="Chimaltenango">Chimaltenango</option>
            <option value="Chiquimula">Chiquimula</option>
            <option value="El Progreso">El Progreso</option>
            <option value="Escuintla">Escuintla</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Huehuetenango">Huehuetenango</option>
            <option value="Izabal">Izabal</option>
            <option value="Jalapa">Jalapa</option>
            <option value="Jutiapa">Jutiapa</option>
            <option value="Petén">Petén</option>
            <option value="Quetzaltenango">Quetzaltenango</option>
            <option value="Quiché">Quiché</option>
            <option value="Retalhuleu">Retalhuleu</option>
            <option value="Sacatepéquez">Sacatepéquez</option>
            <option value="San Marcos">San Marcos</option>
            <option value="Santa Rosa">Santa Rosa</option>
            <option value="Sololá">Sololá</option>
            <option value="Suchitepéquez">Suchitepéquez</option>
            <option value="Totonicapán">Totonicapán</option>
            <option value="Zacapa">Zacapa</option>
        </select>

        <label>Municipio</label>
        <select name="municipio" required>
            <option value="">Seleccione un municipio</option>
            <option value="Zacapa">Zacapa</option>
            <option value="Estanzuela">Estanzuela</option>
            <option value="Río Hondo">Río Hondo</option>
            <option value="Gualán">Gualán</option>
            <option value="Teculután">Teculután</option>
            <option value="Usumatlán">Usumatlán</option>
            <option value="Cabañas">Cabañas</option>
            <option value="San Diego">San Diego</option>
            <option value="La Unión">La Unión</option>
            <option value="Huité">Huité</option>
            <option value="San Jorge">San Jorge</option>
        </select>

        <label>Referencia</label>
        <input type="text" name="referencia">

        <label>Latitud</label>
        <input type="text" name="latitud">

        <label>Longitud</label>
        <input type="text" name="longitud">

        <button type="submit">Guardar</button>

    </form>

</div>


<div class="registros">

    <h2>Postes ingresados</h2>

    <table>

        <tr>
            <th>Poste</th>
            <th>Fecha</th>
            <th>Dirección</th>
            <th>Departamento</th>
            <th>Municipio</th>
            <th>Referencia</th>
            <th>Latitud</th>
            <th>Longitud</th>
        </tr>

        <?php while ($fila = $datos->fetch_assoc()) { ?>

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

</div>

</body>
</html>