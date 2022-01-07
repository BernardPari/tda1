<?php
    // Llamar a la librería para utilizar sus clases
    require 'librerias/PHPSpreadsheet/vendor/autoload.php';
    // Estamos referenciando para llamar el script "Spreadsheet"
    // Que es necesario para hacer hojas de cálculo con PHP
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

    //IOFactory es la clase para poder descargar como Xlsx o Csv

    use \PhpOffice\PhpSpreadsheet\IOFactory;

    //Declaramos un objeto con la instancia Spreadsheet

    $spreadsheet= new Spreadsheet();

    //Declaramos propiedades de la hoja de cálculo

    $spreadsheet -> getProperties()->setCreator("JeferApaza") -> setTitle("Reporte en Excel");

    //Aquí establecemos la posición en la que se va a trabajar. 0 para indicar que empezaremos de la pagina 0
    $spreadsheet -> setActiveSheetIndex(0);

    //Aquí declaramos la hoja en la que se va a trabajar

    $hojaActiva = $spreadsheet -> getActiveSheet();

    ///Estas Funciones son para cambiar la fuente y el tamaño respectivamente

    $spreadsheet -> getDefaultStyle() -> getFont() ->
    setName('Arial');
    $spreadsheet -> getDefaultStyle() -> getFont() ->
    setSize(15);

    //Estas Funciones son el tamaño de la celda

    $hojaActiva -> getColumnDimension('A')->setWidth(40);
    $hojaActiva -> getColumnDimension('C')->setWidth(20);

    //Aqui indicamos la celda en la que vamos a trabajar
    //setCellValue('Posicion', 'Contenido');

    $hojaActiva -> setCellValue('A1', 'Codigos de
    Programacion');
    $hojaActiva -> setCellValue('B2', 15.264);
    //Otra forma de rellenar las celdas

    $hojaActiva -> setCellValue('C1', 'Hernan
    Apaza')->setCellValue('D1', 'cdp');

    //header que sirve para descargar el archivo
    //Este header se puede obtener de la documentación oficial
    //https://phpspreadsheet.readthedocs.io/en/latest/topics/recipes/#http-headers
    header('Content-Type:
    application/vnd.openxmlformats-officedocument.spreadsheetml.
    sheet');

    //En esta línea se nombra el archivo y se pone su extensión
    header('Content-Disposition:attachment;filename="Reporte en excel.xlsx"');
    header('Cache-Control: max-age=0');
    //esta es la función para descargar el archivo al final se pone el tipo de archivo
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    ?>
