<?php
    require 'librerias/PHPSpreadsheet/vendor/autoload.php';
    require 'conexion.php';

    $sql = "SELECT id, nombre, edad, matricula, correo FROM alumnos";
    $resultado = $mysqli -> query($sql);
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use \PhpOffice\PhpSpreadsheet\IOFactory;
    

    $excel= new Spreadsheet();
    $hojaActiva = $excel->getActiveSheet();
    $hojaActiva -> setTitle("Alumnos");

    //Medidad de las Celdas
    $hojaActiva -> getColumnDimension('B')->setWidth(40);
    $hojaActiva -> getColumnDimension('D')->setWidth(15);
    $hojaActiva -> getColumnDimension('E')->setWidth(40);  

    //Encabezado
    $hojaActiva -> setCellValue('A1', 'ID');
    $hojaActiva -> setCellValue('B1', 'Nombre');
    $hojaActiva -> setCellValue('C1', 'Edad');
    $hojaActiva -> setCellValue('D1', 'Matricula');
    $hojaActiva -> setCellValue('E1', 'Correo');

    //Esta variable servira para el salto de linea
    $fila = 2;
    //igual que en el PDF con esto traeremos lo valores de la BD
    while($contenido = $resultado -> fetch_assoc()){
        
        //concatenamos la variable $fila para que haya saltos de linea 
        $hojaActiva -> setCellValue('A'.$fila, $contenido['id']);
        $hojaActiva -> setCellValue('B'.$fila, $contenido['nombre']);
        $hojaActiva -> setCellValue('C'.$fila, $contenido['edad']);
        $hojaActiva -> setCellValue('D'.$fila, $contenido['matricula']);
        $hojaActiva -> setCellValue('E'.$fila, $contenido['correo']);
        //Aumentamos la variable $fila para que se impriman debajo y no en la misma posicion
        $fila++;
    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Alumnos.xlsx"');
    header('Cache-Control: max-age=5');
    
    $writer = IOFactory::createWriter($excel, 'Xlsx');
    $writer -> save('php://output');
    
    exit;


?>