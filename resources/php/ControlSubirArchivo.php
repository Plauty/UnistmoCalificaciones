<?php
/**
* 
*/

	require 'ModeloSubirArchivo.php';
		
	$operacion=$_POST['operacion'];
	
    $db=new ModeloSubirArchivo();

    switch ($operacion) {   

    case 'buscaCarrera':
		$usuario=$_POST['usuario'];

		$data=$db->SelectCarrera($usuario);
		echo json_encode($data);
		break; 


	
	

	default:
		# code...
		break;
}




?>