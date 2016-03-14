<?php

require 'ModeloAlumno.php';
$md=new modeloAlumno();

$op=$_POST['op'];
switch ($op) {
	case 'guardar':
	$m=$_POST['m'];
	$n=$_POST['n'];
	$ap=$_POST['ap'];
	$am=$_POST['am'];
	$e=$_POST['e'];
	$t=$_POST['t'];
	$s=$_POST['s'];
	$g=$_POST['g'];
	$c=$_POST['c'];
			switch ($s) {
				case 'Primero':
				$s=1;
				break;
				case 'Segundo':
				$s=2;
				break;
				case 'Tercero':
				$s=3;
				break;
				case 'Cuarto':
				$s=4;
				break;
				case 'Quinto':
				$s=5;
				break;
				case 'Sexto':
				$s=6;
				break;
				case 'Septimo':
				$s=7;
				break;
				case 'Octavo':
				$s=8;
				break;
				case 'Noveno':
				$s=9;
				break;
				case 'Decimo':
				$s=10;
				break;
			default:
				# code...
				break;
		}
		$md->setAlumno($m,$n,$ap,$am,$e,$t,$s,intval($g),$c);

		break;
	case 'buscar':
		$m=$_POST['m'];
		$data=$md->SelectAlumno($m);
		echo json_encode($data);
		break;
	case 'eliminar':
		$m=$_POST['m'];
		$md->deleteAlumno($m);
		break;
	
	case 'actualizar':
	$m=$_POST['m'];
	$n=$_POST['n'];
	$ap=$_POST['ap'];
	$am=$_POST['am'];
	$e=$_POST['e'];
	$t=$_POST['t'];
	$s=$_POST['s'];
	$g=$_POST['g'];
	$c=$_POST['c'];
			switch ($s) {
				case 'Primero':
				$s=1;
				break;
				case 'Segundo':
				$s=2;
				break;
				case 'Tercero':
				$s=3;
				break;
				case 'Cuarto':
				$s=4;
				break;
				case 'Quinto':
				$s=5;
				break;
				case 'Sexto':
				$s=6;
				break;
				case 'Septimo':
				$s=7;
				break;
				case 'Octavo':
				$s=8;
				break;
				case 'Noveno':
				$s=9;
				break;
				case 'Decimo':
				$s=10;
				break;
			default:
				# code...
				break;
		}
		$md->updateAlumno($m,$n,$ap,$am,$e,$t,$s,intval($g),$c);

		break;
	default:
		# code...
		break;
}


?>