<?php
/**
* 
*/

	require 'ModeloProfesor.php';
		$operacion=$_POST['operacion'];
	    $db=new ModeloProfesor();
    switch ($operacion) {    
	case 'guardar':
		$idmaestro=$_POST['idmaestro'];
	 	$nombre=$_POST['nombre'];
	 	$apellidoP=$_POST['apellidoPaterno'];
        $apellidoM=$_POST['apellidoMaterno'];
        $telefono=$_POST['telefono'];
	 	$email=$_POST['email'];
	 	
        $titulo=$_POST['titulo'];        
		$db->setProfesor($idmaestro,$nombre,$apellidoP,$apellidoM,$telefono,$email,$titulo);
		
	break;

	case 'guardarProcedi':
		$idmaestro=$_POST['idmaestro'];
	 	$nombre=$_POST['nombre'];
	 	$apellidoP=$_POST['apellidoPaterno'];
        $apellidoM=$_POST['apellidoMaterno'];
        $telefono=$_POST['telefono'];
	 	$email=$_POST['email'];
	 	
        $titulo=$_POST['titulo'];    
        $admin=$_POST['admin'];  
        $lic=$_POST['licenciatura'];  
		$db->setProfesorConProcedimiento($idmaestro,$nombre,$apellidoP,$apellidoM,$telefono,$email,$titulo,$admin,$lic);
		
	break;

	case 'buscar':
		$idmaestro=$_POST['idmaestro'];
		$data=$db->SelectProfesor($idmaestro);
		echo json_encode($data);
	break;
	case 'eliminar':
		$idmaestro=$_POST['idmaestro'];
		$db->deleteProfesor($idmaestro);
	break;
	case 'modificar':
		$idmaestro=$_POST['idmaestro'];
	 	$nombre=$_POST['nombre'];
	 	$apellidoP=$_POST['apellidoPaterno'];
        $apellidoM=$_POST['apellidoMaterno'];
	 	$email=$_POST['email'];
	 	$telefono=$_POST['telefono'];
	 	$titulo=$_POST['titulo'];        

	 	$db->updateProfesor($idmaestro,$nombre,$apellidoP,$apellidoM,$telefono,$email,$titulo);

	break;

	case 'modificarProcedi':
		$idmaestro=$_POST['idmaestro'];
	 	$nombre=$_POST['nombre'];
	 	$apellidoP=$_POST['apellidoPaterno'];
        $apellidoM=$_POST['apellidoMaterno'];
	 	$email=$_POST['email'];
	 	$telefono=$_POST['telefono'];
	 	$titulo=$_POST['titulo'];        
	 	$admin=$_POST['admin']; 
	 	$lic=$_POST['licenciatura'];  
	 	$db->updateProfesorConProcedimiento($idmaestro,$nombre,$apellidoP,$apellidoM,$telefono,$email,$titulo,$admin,$lic);

	break;

	case 'ContadorAdministrador':
		$lic=$_POST['licenciatura'];  
		$data=$db->ContadorAdministrador($lic);
		echo json_encode($data);

		break;


	default:
		# code...
		break;
}




?>