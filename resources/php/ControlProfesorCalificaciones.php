<?php
require 'ModeloProfesorCalificaciones.php';
$md=new modeLoprofesorcalificaciones();

if(isset($_POST["op"])){
$op=$_POST["op"];
}
if(isset($_GET["op"])){
$op=$_GET["op"];
}
switch ($op) {
	case "materias":

		$arr=$md->selectProfesorMateria($_POST['id']);		
		echo json_encode($arr,JSON_UNESCAPED_UNICODE);
		break;
	case 'alumnos':
		$arr=$md->selectDatosAlumnos($_POST['codM']);
		echo json_encode($arr,JSON_UNESCAPED_UNICODE);
		break;
	case 'calificaciones':
		$arr=$md->SelectCalif($_POST['idM']);
		echo json_encode($arr,JSON_UNESCAPED_UNICODE);
		break;
	case 'alumno':
		$arr=$md->SelectAlumno($_POST['idM']);
		echo json_encode($arr,JSON_UNESCAPED_UNICODE);
	break;
	case 'sendCal':
		$md->setCalificaciones(json_decode($_POST['datos']));
		
		break;
	default:
		# code...
		break;



}

?>