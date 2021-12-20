<?php
    // Llamar a la libreria para utilizar sus clases
    require 'librerias/PHPSpreadsheet/vendor/autoload.php';

    // Estamos referenciando para llamar el script "Spreadsheet"
    // Que es necesario para hacer hojas de calculo con PHP
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    //IOFactory es la clase para poder descargar como Xlsx
    use \PhpOffice\PhpSpreadsheet\IOFactory;
    
    //Declaramos un objeto con la instancia Spreadsheet
    $spreadsheet= new Spreadsheet();

    //Declaramos propiedades de la hoja de calculo
    $spreadsheet -> getProperties()->setCreator("Jefer Apaza") -> setTitle("Reporte en excel");

    //Aqui establecemos la posicion en la que se va a trabajar
    $spreadsheet -> setActiveSheetIndex(0);

    //Aqui declaramos la hoja en la que se va a trabajar
    $hojaActiva = $spreadsheet -> getActiveSheet();

    //Estas Funciones son para cambiar la fuente y el tamaño respectivamente
    $spreadsheet -> getDefaultStyle() -> getFont() -> setName('Arial');
    $spreadsheet -> getDefaultStyle() -> getFont() -> setSize(15);

    $hojaActiva -> getColumnDimension('A')->setWidth(40);
    $hojaActiva -> getColumnDimension('C')->setWidth(20); 

    //Aqui indicamos la celda en la que vamos a trabajar
    //setCellValue('Posicion', 'Contenido');
    $hojaActiva -> setCellValue('A1', 'Codfigos de Programacion');
    $hojaActiva -> setCellValue('B2', 15.264);
    //Otra forma de rellenar las celdas
    $hojaActiva -> setCellValue('C1', 'Hernan Apaza')->setCellValue('D1', 'cdp');


    //header que sirve para descargar el archivo
    //Este header se puede obtener de la documentacion oficial
    //https://phpspreadsheet.readthedocs.io/en/latest/topics/recipes/#http-headers
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
     //En esta linea se nombra el archivo y se pone su extension
    header('Content-Disposition: attachment;filename="Reporte en excel.xlsx"');
    header('Cache-Control: max-age=0');
    
    //esta es la funcion para descargar el archivo al final se pone el tipo de archivo
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');


?>