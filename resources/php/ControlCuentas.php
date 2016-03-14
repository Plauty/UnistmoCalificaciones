<?php
/**
* 
*/

	require 'ModeloCuentas.php';
		$operacion=$_POST['operacion'];
	    $db=new ModeloCuentas();
    switch ($operacion) {    
	case 'guardar':
				
	break;
	case 'buscarCu':
		$idmaestro=$_POST['idma'];
		$data=$db->SelectCuentaProf($idmaestro);
		echo json_encode($data);
	break;
	case 'eliminar':
		
	break;
	case 'modificar':
	break;

	default:
		# code...
		break;
}




?>