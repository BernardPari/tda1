<?php
    // En este archivo haremos una cabecera y pie de pagina
    require 'Librerias/FPDF/fpdf.php';

    // Llama a las funciones de la clase FDPF
    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Se usa "$this" por que se esta heredando funciones de la clase fpdf
            // Trasladamos el titulo y la imagen de "ReportedBD.php"
            // Logo
            $this -> Image('img/logounap.png',10,8,33);
            // Arial bold 15
            $this -> SetFont('Arial','B',12);
            // Celdas vacias Para Acomodar el titulo
            $this -> Cell(25);
            // Título
            $this -> Cell(200, 5, 'Reporte De Alumnos', 0, 0,'C');
            // Fecha
            $this -> SetFont('Arial','',10);
            // date ("d/m/Y") -> funcion de php para la fecha
            $this -> Cell(20, 5, 'Fecha: '.date("d/m/Y"), 0, 1,'C');
            // Salto de línea
            $this -> Ln(20);
        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this -> SetY(-15);
            // Arial italic 8
            $this -> SetFont('Arial','I',8);
            // Número de página 
            // 0 = Va usar todo el ancho de la pagina
            // $this->PageNo() -> Identifica el numero de pagina
            // {nb} -> Numero total de Paginas
            $this -> Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

?>