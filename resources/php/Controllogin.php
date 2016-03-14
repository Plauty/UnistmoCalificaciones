<?php



require 'Modelologin.php';
		
	    $db=new modelologin();
		$user=$_POST['usuario'];
	 	$pass=$_POST['pass'];
	 	$datos=$db->SelectCuenta($user,$pass);
	 	echo json_encode($datos);

?>