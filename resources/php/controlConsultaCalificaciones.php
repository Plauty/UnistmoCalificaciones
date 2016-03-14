<?php
/**
* 
*/
	session_start();

	require 'ModeloConsultaCalificaciones.php';
	require 'ModeloPDF.php';
		
	$operacion=$_POST['operacion'];
	
    $db=new ModeloConsultaCalificaciones();

    switch ($operacion) { 

	case 'LlenarTabla':  

	$idAlum=$_POST['idAlumno'];
	$data=$db->LlenarTablaCalificaciones($idAlum);
	echo json_encode($data,JSON_UNESCAPED_UNICODE);
				    

	break;
	case 'dato':
			$_SESSION['idAlum'] = $_POST['idAlumno'];
			echo "ok";
		break;
	default:
		# code...
		break;
}




?>