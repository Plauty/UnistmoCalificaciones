<?php
session_start();
 
 		require 'ModeloConsultaCalificaciones.php';
 		require 'ModeloPDF.php';	
		
	
 		 define("_SYSTEM_TTFONTS", "C:/Windows/Fonts/");
		$db=new ModeloConsultaCalificaciones();

		$idAlum=$_SESSION['idAlum'];
		$data=$db->datosCalificaciones($idAlum);
		$data2=$db->SelectAlumno($idAlum);
		$pdf=new CalPDF('L');
		
		$pdf->AddPage();
		
		$pdf->CreateTable($data,$data2);
		$pdf->Output();

?>