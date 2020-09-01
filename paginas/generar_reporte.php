     <?php
     require_once 'class/fpds/fpdf.php'; 

     class PDF extends FPDF
     {
          //cabecera de pagina
          function Header()
          {
               //Logo
               $this->Image('img/logos/logo.png',7,14,45);
               $this->Image('img/logos/logo2.png' ,215,15,75); 
               //Arial
               $this->SetFont('Arial','b',10);
               //Mover
               $this->cell('70');
               //tituo
               $this->cell(150,8, utf8_decode('"TRABAJOS DE LEVANTAMIENTO  A LOS EQUIPOS Y SISTEMAS DE INSTALACIÓN PERMANENTE ", en REGIÓN CENTRO.  '),0,1,'C');
               // $this->cell(190,8, utf8_decode('en REGIÓN CENTRO.'),0,1,'C');
               $this->cell(290,8, utf8_decode('No. CONTRATO: CJF/SEA/DGIM/LP/30/2019'),0,1,'C');
               $this->cell(290,8, utf8_decode('ADMINISTRACION REGIONAL EN APIZACO, TLAXCALA'),0,1,'C');
               $this->cell(290,8, utf8_decode('UBICACIÓN:EDIFICIO SEDE'),0,0,'C');

               //Salto de linea 
               $this->Ln(10);
          }
          
               //Pie de pagina
               function Footer() {
                    //posision: a 1.5 cm del final
                    $this->SetY(-15);
                    //arial italic 8
                    $this->SetFont('Arial','I',8);
                    //menu de pagina
                    $this->SetTextColor(0,0,0);
                    $this->SetX(-15);
                    $this->Write(5, $this->PageNo().'/{nb}',0,0,'C');
               }
     }

    
     require_once 'class/conexion2.php'; 

     $consulta = "SELECT * FROM equipos_productos";
     $resultado = $mysqli->query($consulta);

$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage('LANDSCAPE', 'A4');
$pdf->SetFont('Arial','B', 12);
$pdf->SetFillColor(16,129,185);
$pdf->SetDrawColor(16,129,185);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(277,8, utf8_decode('REPORTE FOTOGRAFICO'),1,1,'C','false');

while($row = $resultado->fetch_assoc()){
$pdf->Cell(90, 10, $row['imagen'], 1, 0, 'C');  
}

ob_end_clean();
$pdf->Output('I');      
?>