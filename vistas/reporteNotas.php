<?php
require('../fpdf/fpdf.php');
require('../conexion/Modelo_generico .php');
  @session_start();
    if (isset($_SESSION['logueado']) && $_SESSION['logueado']=="si") {
      
    }else{
        header("Location: ../vistas/inicio.php");
    }



class PDF extends FPDF
{
// Cabecera de página
	function Header()
	{
	    $this->SetFillColor(42, 63, 84);
	    $this->Rect(1,4,208,20,'F');


	     
	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    $this->SetTextColor(254,254,254);
	    // Movernos a la derecha
	    $this->Cell(18);
	    // Título
	    $this->SetXY(28,5);
	    $this->Cell(150,20,utf8_decode('APP DE NOTAS'),0,1,'C');
	   
	  
    }

	// Pie de página
	function Footer()
	{
	  
	    // Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	}

}



$modelo = new Modelo_generico();
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetXY(55,25);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(30,7,'Lista de Tareas por usuarios',0,1,'',0);


$pdf->SetXY(10,35);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,8,'N#',1,0,'C');
$pdf->Cell(20,8,'Usuario',1,0,'C');
$pdf->Cell(23,8,'Fecha',1,0,'C');
$pdf->Cell(33,8,'Tarea',1,0,'C');
$pdf->Cell(103,8,'Descripcion',1,1,'C');
$pdf->SetFont('Arial','',9);

$pdf->SetFillColor(0,123,255);


$pdf->Rect(10,45,189,40,'');

 $sql="SELECT us.user,n.fecha,n.nombre,n.descripcion FROM notas AS n INNER JOIN usuarios AS us ON n.iduser = us.iduser";
        $tareas=$modelo->get_query($sql);
     //   $tareas=$tareas->fetchAll();
       if($tareas[0]=="1"){
       	$i=1;
       foreach($tareas[2] as $row){

	    	$pdf->Cell(10,9,$i,0,0,'C');
			$pdf->Cell(20,9,$row['user'],0,0,'C');
			$pdf->Cell(23,9,$row['fecha'],0,0,'C');
			$pdf->Cell(33,9,$row['nombre'],0,0,'C');
			$pdf->Cell(103,9,$row['descripcion'],0,1,'C');
			$i++;
		}

		}
$pdf->Ln(2);


$pdf->Output();