<?php
/**
* 
*/

	require 'ModeloConfiguracionAdminProfesor.php';
		$operacion=$_POST['operacion'];
	    $db=new ModeloConfiguracionAdminProfesor();
    switch ($operacion) {    
	case 'guardar':
		
	 	$usuario=$_POST['usuario'];
	 	$contraseña=$_POST['contraseña'];
	 	$idmaestro=$_POST['idmaestro'];

		$db->setCuentaProfesor($usuario,$contraseña,$idmaestro);
		
	break;

	case 'buscarIDAdmin':
			$usuario=$_POST['usuario'];
			$data=$db->SelectIdProfesor($usuario);
			echo json_encode($data);
			break;

	case 'buscarIDAlumno':
			$usuario=$_POST['usuario'];
			$carrera=$_POST['carrera'];
			$data=$db->SelectIdAlumno($usuario,$carrera);
			echo json_encode($data);
			break;
	case 'guardarCuentaAlumno':
		
	 	$usuario=$_POST['usuario'];
	 	$contraseña=$_POST['contraseña'];
	 	$idalumno=$_POST['idalumno'];

		$db->setCuentaAlumno($usuario,$contraseña,$idalumno);
		
	break;


	case 'buscarIDMaestro':
			$usuario=$_POST['usuario'];
			$carrera=$_POST['carrera'];
			$data=$db->SelectIdMaestro($usuario,$carrera);
			echo json_encode($data);
			break;
	case 'guardarCuentaMaestro':
		
	 	$usuario=$_POST['usuario'];
	 	$contraseña=$_POST['contraseña'];
	 	$idmaestro=$_POST['idmaestro'];

		$db->setCuentaMaestro($usuario,$contraseña,$idmaestro);
		
	break;

	default:
		# code...
		break;
}




?>