<?php

    // Agregamos PHP para hacer una consulta

    // Conectamos a la Base de Datos
    require "conexion.php";

    // Hacemos la consulta a la Base de Datos para que nos traiga los grados
    $sql = "SELECT id, grado FROM grados";
    $resultado = $mysqli->query($sql);

?>
    <!DOCTYPE html>
    <html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Generador de Reportes</title>
    </head>
    <body>
        
        <ul>
            <li><a href="reporte_csv.php">CSV</a></li>
            <li><a href="reporte_excel.php">Excel</a></li>
            <li><a href="reporteBD.php">PDF</a></li>
        </ul>
    </body>
    </html>