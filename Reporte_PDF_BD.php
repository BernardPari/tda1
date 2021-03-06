<?php
    require "Conexion.php";
    require "Librerias/FPDF/fpdf.php";
    // Para Imprimir un reporte de la BD (Base de Datos).
    // Generamos una consulta que llame a los archivos de nuestra base de datos:
    $sql = "SELECT id, nombre, edad, matricula, correo FROM alumnos";
    // $Variable = $msqli
    // $mysqli -> traída de "conexion.php"
    // $mysqli -> query($sql) Sirve para hacer una consulta a la base de datos
    // Esta consulta traera “n" resultados
    $resultado = $mysqli->query($sql);
    $pdf = new fpdf("p","mm","letter");
    $pdf -> AddPage();
    $pdf -> SetFont("Arial","B", 12);
    $pdf -> Cell(190, 5, "Reporte de Alumnos", 0, 1,
    "C");
    // $pdf -> ln(n) sirve para dar n saltos de línea
    $pdf -> ln(3);
    // Encabezados de la tabla
    $pdf -> Cell(10, 6, "ID", 1, 0, "C");
    $pdf -> Cell(70, 6, "Nombre", 1, 0, "C");
    $pdf -> Cell(20, 6, "Edad", 1, 0, "C");
    $pdf -> Cell(35, 6, "Matricula", 1, 0, "C");
    // Ponemos salto de línea para que no se pongan en serie con lo que se inserte debajo
    $pdf -> Cell(60, 6, "Correo", 1, 1, "C");
    $pdf -> SetFont("Arial","", 12);
    // $fila -> Nos permitirá obtener los datos fila por fila mediante el while
    // fetch_assoc() -> Asocia las filas para poder usarlos asi:
    // $fila['id'];
    while($fila = $resultado -> fetch_assoc()){
        //Cambiamos los encabezados por los valores de cada fila de la base de datos
        $pdf -> Cell(10, 6, $fila['id'], 1, 0, "C");
        $pdf -> Cell(70, 6, $fila['nombre'], 1, 0, "");
        $pdf -> Cell(20, 6, $fila['edad'], 1, 0, "C");
        $pdf -> Cell(35, 6, $fila['matricula'], 1, 0,"C");
        $pdf -> Cell(60, 6, $fila['correo'], 1, 1, "C");
        //La libreria FPDF agregara páginas automáticamente cuando una se llena por lo que ya no es necesario usar de nuevo la clase "AddPage()"
    }
    $pdf -> Output();
?>
