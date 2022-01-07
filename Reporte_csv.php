<?php
    require 'librerias/PHPSpreadsheet/vendor/autoload.php';
    // Estamos referenciando para llamar el script"Spresdsheet" que también es necesario para hacer documentos CSV
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    //IOFactory es la clase para poder descargar como CSV

    use \PhpOffice\PhpSpreadsheet\IOFactory;
    $spreadsheet= new Spreadsheet();
    $spreadsheet -> getProperties()->setCreator("Jefer Apaza") -> setTitle("Reporte en CSV");
    $hojaActiva = $spreadsheet -> getActiveSheet();
    $hojaActiva -> setCellValue('A1', 'Codigos de Programación');
    $hojaActiva -> setCellValue('B2', 15.264);
    $hojaActiva -> setCellValue('C1', 'Hernan Apaza')->setCellValue('D1', 'cdp');
    header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //En esta línea se nombra el archivo y se pone su extensión
    header('Content-Disposition:attachment;filename="Reporte en CSV.Csv"');
    header('Cache-Control: max-age=0');
    $writer = IOFactory::createWriter($spreadsheet, 'Csv');
    $writer->save('php://output');
    
    ?>