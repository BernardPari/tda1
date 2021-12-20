<?php

    require 'librerias/PHPSpreadsheet/vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use \PhpOffice\PhpSpreadsheet\IOFactory;
    

    $spreadsheet= new Spreadsheet();
    $spreadsheet -> getProperties()->setCreator("Jefer Apaza") -> setTitle("Reporte en excel");

    $spreadsheet -> setActiveSheetIndex(0);

    $hojaActiva = $spreadsheet -> getActiveSheet();

    $spreadsheet -> getDefaultStyle() -> getFont() -> setName('Arial');
    $spreadsheet -> getDefaultStyle() -> getFont() -> setSize(15);

    $hojaActiva -> getColumnDimension('A')->setWidth(40);
    $hojaActiva -> getColumnDimension('C')->setWidth(20); 

    $hojaActiva -> setCellValue('A1', 'Codfigos de Programacion');
    $hojaActiva -> setCellValue('B2', 15.264);
    $hojaActiva -> setCellValue('C1', 'Hernan Apaza')->setCellValue('D1', 'cdp');

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Reporte en excel.Csv"');
    header('Cache-Control: max-age=0');
    
    $writer = IOFactory::createWriter($spreadsheet, 'Csv');
    $writer->save('php://output');


?>