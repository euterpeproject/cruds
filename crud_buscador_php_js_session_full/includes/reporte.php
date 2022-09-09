<?php
require_once("../fpdf/fpdf.php");

class PDF extends FPDF {
    //Cabecera de página
    function Header()
    {
        //$this->image("../img/logo.png", 150, 1, 60); // X, Y, Tamaño
        $this->Ln(20); 
        //Arial bold 15
        $this->SetFont('Arial', 'B', 20);

        //Movernos a la derecha
        $this->Cell(60);

        //Título
        $this->Cell(70,10,'Tabla de usuarios ',0,0,'C');
        //Salto de línea

        $this->Ln(30);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(20);
        $this->Cell(25,10,'Nombre',1,0,'C',0);
        $this->Cell(50,10,'Correo',1,0,'C',0);
        $this->Cell(27,10,'Telefono',1,0,'C',0);
        $this->Cell(40,10,'Fecha',1,0,'C',0);
        // $this->Cell(40,10,'Contrasena',1,0,'C',0);
        $this->Cell(30,10,'Rol',1,1,'C',0);
    } 

    // Pie de página
    function Footer() {
        //Posición: 1 1,5 cm del final
        $this->SetY(-15);

        //Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        //Número de página

        $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
        // $this->SetFillColor(223,229,235);
        // $this->SetDrawColor(181,14,246);
        // $this->Ln(0.5);
    }
}

include('./db.php');
$consulta = "select *, usuarios.id, permisos.rol 
from usuarios
left join permisos 
on usuarios.rol = permisos.id";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
// $pdf->SetLineWidth(array(10,30,27,27,20,20,20,20,22));
while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(20);

    $pdf->Cell(25,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(50,10,$row['correo'],1,0,'C',0);
    $pdf->Cell(27,10,$row['telefono'],1,0,'C',0);
    $pdf->Cell(40,10,$row['fecha'],1,0,'C',0);
    // $pdf->Cell(40,10,$row['clave'],1,0,'C',0);
    $pdf->Cell(30,10,$row['rol'],1,1,'C',0);
}

$pdf->Output();

?>