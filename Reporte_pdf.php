<?php
    //Llama a la libreria FPDF para usar sus funciones
    require "Librerias/FPDF/fpdf.php";


    /* 
     Es un método que se llama desde fpdf.php
Este método nos permite agregar características como la orientación, la medida y el tamaño de la hoja
$pdf = new fpdf(orientación, En que medida se va trabajar ,medida predefinida);
     Orientación: p = Vertical  l = Horizontal
     Medidas predefinidas Letter, A4, etc.
     Para agregar una medida personalizada:
     $pdf = new fpdf("p","mm", array(200,200));
     La hoja sería de vertical y 200mm x 200mm
    */
    $pdf = new fpdf("p","mm","letter");
    
    // Sirve para agregar una hoja
    $pdf -> AddPage();

    // Para el Estilo de Fuente:
    // $pdf -> SetFont(Nombre, Estilo, Tamaño);
    // B = Negrita
    $pdf -> SetFont("Arial","B", 12);

    // Para Colocar Celdas
    // $pdf->Cell(Largo, Alto, Contenido, Borde, Salto de línea, Alineación);
    // Borde: 1 = Si, 0 = No 
    // Salto de línea: 1 = Si, 0 = No 
    // C = Center
    // R = Right
    $pdf -> Cell(100, 5, "Mi primer reporte en pdf con PHP y MySQL", 1, 0, "C");
    
    // Función para imprimir el pdf
    $pdf -> Output();


?>
