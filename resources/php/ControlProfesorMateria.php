<?php
/**
* 
*/

	require 'ModeloProfesorMateria.php';
		$operacion=$_POST['operacion'];
	    $db=new ModeloProfesorMateria();
    switch ($operacion) {    
	case 'guardar':
		$idmaestro=$_POST['idmaestro'];
	 	$idMateria=$_POST['idMateria'];
	 	$cicloEscolar=$_POST['cicloEscolar'];
    
		$db->setProfesorMateriaConProcedimiento($idmaestro,$idMateria,$cicloEscolar);
		
	break;

	case 'buscar':
		$idmaestro=$_POST['idmaestro'];
		$data=$db->SelectProfesor($idmaestro);
		echo json_encode($data);
	break;

	case 'buscarMateria':
		$i=1;
		$idmaestro=$_POST['idmaestro'];
		$cicloEscolar=$_POST['cicloEscolar'];
		$data=$db->SelectProfesorMateria($idmaestro,$cicloEscolar);
		echo json_encode($data);
		if(empty($data)) { 
			echo "<tr></tr>";
		}else{ 
				foreach( $data as $valor )
				{
					echo "<tr>
							<td>".$valor[ "nombreMateria" ]."</td>
							
							<td id='cuerpotd".$i."'>
							<button class = 'btn btn-primary Eliminar btn-xs' id = '".$valor[ "idmaterias" ]."'>Eliminar</button>
						</td>
					  </tr>";

					  $i++;
				
				}
		} 
		

	break;


	case 'buscarCicloEscolarExiste':
		$idmaestro=$_POST['idmaestro'];
		$cicloEsc=$_POST['cicloEscolar'];
		$data=$db->SelectCicloEscolar($idmaestro,$cicloEsc);
		echo json_encode($data);
	break;

	case 'buscarCodigoMateria':
		$idmaestro=$_POST['idmaestro'];
		$idMateria=$_POST['idMateria'];
		$data=$db->SelectCodigoMateria($idmaestro,$idMateria);
		echo json_encode($data);
		break;

	case 'eliminarMateria':
		$db->deleteMateriaProfesorConProcedimiento($_POST['id']);
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


	case 'BuscaExistenciaMat':
		$idMateria=$_POST['idMateria'];
		$data=$db->SelectIdMateria($idMateria);
		echo json_encode($data);
		break;

	case 'buscarMatCarrera':
		
		$i=1;
		$carrera=$_POST['licenciatura'];
		$semestre=$_POST['semestre'];
		$data=$db->buscaMateriasCarrera($carrera,$semestre);
		echo json_encode($data);
		if(empty($data)) { 
			echo "<tr></tr>";
		}else{ 
				foreach( $data as $valor )
				{
					echo "<tr>
							<td>".$valor[ "idmaterias" ]."</td>
							<td>".$valor[ "nombreMateria" ]."</td>
							
							<td id='cuerpotd2".$i."'>
							<button class = 'btn btn-primary Asignar btn-xs' id = '".$valor[ "idmaterias" ]."'>Asignar</button>
						</td>
					  </tr>";

					  $i++;
				
				}
		} 
		break;

		case 'RestablecerMaterias':
			$carrera=$_POST['licenciatura'];
			$db->RestablecerMaterias($carrera);
			break;

	default:
		# code...
		break;
}




?>