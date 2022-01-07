 
<?php
    
    require 'librerias/PHPSpreadsheet/vendor/autoload.php';
    require 'Conexion.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use \PhpOffice\PhpSpreadsheet\IOFactory;
    
    $sql = "SELECT id, nombre, edad, matricula, correo FROM alumnos";
    $resultado = $mysqli -> query($sql);

    $spreadsheet= new Spreadsheet();
    $spreadsheet -> getProperties()->setCreator("Jefer Apaza") -> setTitle("Reporte en CSV");
    $hojaActiva = $spreadsheet -> getActiveSheet();
    
    //Encabezado
    $hojaActiva -> setCellValue('A1', 'ID');
    $hojaActiva -> setCellValue('B1', 'Nombre');
    $hojaActiva -> setCellValue('C1', 'Edad');
    $hojaActiva -> setCellValue('D1', 'Matricula');
    $hojaActiva -> setCellValue('E1', 'Correo');

    $fila = 2;

    while($contenido = $resultado -> fetch_assoc()){
        
        $hojaActiva -> setCellValue('A'.$fila, $contenido['id']);
        $hojaActiva -> setCellValue('B'.$fila, $contenido['nombre']);
        $hojaActiva -> setCellValue('C'.$fila, $contenido['edad']);
        $hojaActiva -> setCellValue('D'.$fila, $contenido['matricula']);
        $hojaActiva -> setCellValue('E'.$fila, $contenido['correo']);
        $fila++;
    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Reporte en CSV.Csv"');
    header('Cache-Control: max-age=0');
  
    $writer = IOFactory::createWriter($spreadsheet, 'Csv');
    $writer->save('php://output');
 
 
?>
 
