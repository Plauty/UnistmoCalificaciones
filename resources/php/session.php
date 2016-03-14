<?php
	session_start();
require 'modelosesion.php';
$md=new modelosesion();
	switch ($_POST['op']) {
		case 'op1':
				$_SESSION['cod'] = $_POST['cod'];
				$_SESSION['us']=$_POST['us'];
			break;
		case 'op2':
				$arr=$md->SelectDatosAdmin($_SESSION['us']);
				
				echo json_encode($arr);

			break;
		case 'op3':
				   $_SESSION = array();
				session_destroy();	

			break;
		case 'op4':
		if($_POST['type']=="maestro"){
			$arr=$md->SelectCuentaMaestro($_SESSION['us'],$_SESSION['cod']);
			echo json_encode($arr);
		}else{
			if($_POST['type']=="alumno"){
			$arr=$md->SelectCuentaAlumno($_SESSION['us'],$_SESSION['cod']);
			echo json_encode($arr);
		}
		}
			break;
		
		
		default:
			# code...
			break;
	}


   
?>