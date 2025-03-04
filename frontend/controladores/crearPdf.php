<?php 
if(isset($_POST['strPdf'])){
    $strPdf = $_POST['strPdf'];
    $strPdf = explode('&', $strPdf);
    require '../../fpdf186/fpdf.php';
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);
    foreach($strPdf as $linea){
        $pdf->Cell(0, 10, $linea);
        $pdf->Ln();
    }
    $pdf->Output('factura_cliente.pdf', 'I');
}else{
    header("Location:../controladores/index.php");
}


?>