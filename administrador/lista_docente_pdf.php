<?php
require_once('../administrador/tcpdf/tcpdf.php');


if (isset($_POST['pdf_content'])) {
    // Recuperar el contenido de la tabla HTML desde el formulario
    $html = urldecode($_POST['pdf_content']);

    // Crear instancia de TCPDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Establecer información del documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Autor');
    $pdf->SetTitle('Lista de Docentes');
    $pdf->SetSubject('Tabla de datos');

    // Agregar una página
    $pdf->AddPage();

    // Escribir el contenido HTML en el PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    $nombre_archivo= $_REQUEST['nombre_archivo'];
    // Salida del PDF (directorio, nombre del archivo)
    $pdf->Output($nombre_archivo.'.pdf', 'I');
    
}