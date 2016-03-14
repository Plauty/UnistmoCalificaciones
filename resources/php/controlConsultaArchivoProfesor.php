<?php
/**
* 
*/

	require 'ModeloConsultaArchivoProfesor.php';
		
	$operacion=$_POST['operacion'];
	
    $db=new ModeloConsultaArchivoProfesor();

    switch ($operacion) { 

    case 'buscaCarrera':
    	$idAlumno=$_POST['idAlumno'];
      	$data=$db->BuscaCarrera($idAlumno);
		echo json_encode($data);
      	break;  

	case 'buscar':  
	$i=1;
	$carrera=$_POST['carreraRecib'];
	
	

	if ($carrera=="Informatica") {
	   		$path='files/Informatica/';
			$pathCompleto='resources/php/files/Informatica/';	      
					
						$data=$db->MostrarArchivos($path);
						//echo json_encode($data);
					    foreach( $data as $valor )
						{
							echo "<tr>
									<td><a target=_blank  class=enlace href=".$pathCompleto.$valor.">".$valor."</a></td>";
									$data2=$db->BuscaDescripcion($valor,$carrera);
					    foreach( $data2 as $value )
					    {
								echo	"<td>".$value."</td>";

					    }

									
							 echo "</tr>";

						
						}

	   }else{
	   		
	   		if ($carrera=="Ciencias Empresariales") {
	   		$path='files/CienciasEmpresariales/';
			$pathCompleto='resources/php/files/CienciasEmpresariales/';	      
					
						$data=$db->MostrarArchivos($path);
						//echo json_encode($data);
					    foreach( $data as $valor )
						{
							echo "<tr>
									<td><a target=_blank  class=enlace href=".$pathCompleto.$valor.">".$valor."</a></td>";
									$data2=$db->BuscaDescripcion($valor,$carrera);
					    foreach( $data2 as $value )
					    {
								echo	"<td>".$value."</td>";

					    }

									
							 echo "</tr>";

						
						}

						
				   }else{
					   		
					    if ($carrera=="Administración Pública") {
				   		$path='files/AdministracionPublica/';
						$pathCompleto='resources/php/files/AdministracionPublica/';	      
								
								$data=$db->MostrarArchivos($path);
									//echo json_encode($data);
								    foreach( $data as $valor )
									{
										echo "<tr>
												<td><a target=_blank  class=enlace href=".$pathCompleto.$valor.">".$valor."</a></td>";
												$data2=$db->BuscaDescripcion($valor,$carrera);
								    foreach( $data2 as $value )
								    {
											echo	"<td>".$value."</td>";

								    }

												
										 echo "</tr>";

									
									}

									
							   }else{

							   			$path='files/Derecho/';
										$pathCompleto='resources/php/files/Derecho/';	      
												
												$data=$db->MostrarArchivos($path);
													//echo json_encode($data);
												    foreach( $data as $valor )
													{
														echo "<tr>
																<td><a target=_blank  class=enlace href=".$pathCompleto.$valor.">".$valor."</a></td>";
																$data2=$db->BuscaDescripcion($valor,$carrera);
												    foreach( $data2 as $value )
												    {
															echo	"<td>".$value."</td>";

												    }

																
														 echo "</tr>";

													
													}
								   		

									 } 

						 } 
		   } 

	      
		
	break;

	

	default:
		# code...
		break;
}




?>