<?php
/**
* 
*/

	require 'ModeloSubirArchivo.php';
		
	$operacion=$_GET['operacion'];
	
    $db=new ModeloSubirArchivo();

    switch ($operacion) {   

	case 'guardar':  
	$carrera=$_GET['carreraRecib'];
	//echo "recibio carrera";
	//datos archivos
	$nombre_archivo=$_FILES['archivo']['name'];
	$tipo_archivo=$_FILES['archivo']['type'];
	$tamaño_archivo=$_FILES['archivo']['size'];
	//echo $nombre_archivo."<br>".$tipo_archivo."<br>";

	if ($carrera=="Informatica") {
	   		//echo "son iguales";
			
			$dir_destino ='files/Informatica/';
			$fichero_subido=$dir_destino.basename($_FILES['archivo']['name']);
			$ExtensionArchivo = pathinfo($fichero_subido,PATHINFO_EXTENSION);
			//echo "<br> Extension archivo: ".$ExtensionArchivo."<br>";
				// el tamañ es 50000 yo lo cambie jejejej
			if (file_exists($fichero_subido)) {
				$data="Archivo ya existe en este directorio";
				echo json_encode($data);
			}
			else{
				if ($ExtensionArchivo=="pdf" || $ExtensionArchivo=="doc" || $ExtensionArchivo=="docx" || $ExtensionArchivo=="ppt" || 
				$ExtensionArchivo=="pptx" || $ExtensionArchivo=="xls" || $ExtensionArchivo=="xlsx" && $tamaño_archivo < 900000000000000000000000000) {
					if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
						$nombre=$nombre_archivo;
				        $descripcion=$_GET['descripcion']; 
				        $carrera=$carrera;
				      
						$db->setArchivo($nombre,$descripcion,$carrera);
						$data="Archivo guardado con exito";
						echo json_encode($data);
					}
					else{
						$data="Ocurrio un error al intentar subir el archivo";
						echo json_encode($data);
					}
				}else{
					$data="La extension o el tamaño de los archivos no es correcto";
					echo json_encode($data);
				}

			}	
			


	   }else{
	   		// segunda carrera
	   			if ($carrera=="Ciencias Empresariales") {
		   		//echo "son iguales";
				
				$dir_destino ='files/CienciasEmpresariales/';
				$fichero_subido=$dir_destino.basename($_FILES['archivo']['name']);
				$ExtensionArchivo = pathinfo($fichero_subido,PATHINFO_EXTENSION);
				//echo "<br> Extension archivo: ".$ExtensionArchivo."<br>";
					// el tamañ es 50000 yo lo cambie jejejej
				if (file_exists($fichero_subido)) {
					$data="Archivo ya existe en este directorio";
					echo json_encode($data);
				}
				else{
					if ($ExtensionArchivo=="pdf" || $ExtensionArchivo=="doc" || $ExtensionArchivo=="docx" || $ExtensionArchivo=="ppt" || 
					$ExtensionArchivo=="pptx" || $ExtensionArchivo=="xls" || $ExtensionArchivo=="xlsx" && $tamaño_archivo < 900000000000000000000000000) {
						if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
							$nombre=$nombre_archivo;
					        $descripcion=$_GET['descripcion']; 
					        $carrera=$carrera;
					      
							$db->setArchivo($nombre,$descripcion,$carrera);
							$data="Archivo guardado con exito";
							echo json_encode($data);
						}
						else{
							$data="Ocurrio un error al intentar subir el archivo";
							echo json_encode($data);
						}
					}else{
						$data="La extension o el tamaño de los archivos no es correcto";
						echo json_encode($data);
					}

				}	
				


		   }else{
		   		// tercera carrera
		   			if ($carrera=="Administración Pública") {
			   		//echo "son iguales";
					
					$dir_destino ='files/AdministracionPublica/';
					$fichero_subido=$dir_destino.basename($_FILES['archivo']['name']);
					$ExtensionArchivo = pathinfo($fichero_subido,PATHINFO_EXTENSION);
					//echo "<br> Extension archivo: ".$ExtensionArchivo."<br>";
						// el tamañ es 50000 yo lo cambie jejejej
					if (file_exists($fichero_subido)) {
						$data="Archivo ya existe en este directorio";
						echo json_encode($data);
					}
					else{
						if ($ExtensionArchivo=="pdf" || $ExtensionArchivo=="doc" || $ExtensionArchivo=="docx" || $ExtensionArchivo=="ppt" || 
						$ExtensionArchivo=="pptx" || $ExtensionArchivo=="xls" || $ExtensionArchivo=="xlsx" && $tamaño_archivo < 900000000000000000000000000) {
							if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
								$nombre=$nombre_archivo;
						        $descripcion=$_GET['descripcion']; 
						        $carrera=$carrera;
						      
								$db->setArchivo($nombre,$descripcion,$carrera);
								$data="Archivo guardado con exito";
								echo json_encode($data);
							}
							else{
								$data="Ocurrio un error al intentar subir el archivo";
								echo json_encode($data);
							}
						}else{
							$data="La extension o el tamaño de los archivos no es correcto";
							echo json_encode($data);
						}

					}	
					


			   }else{
			   			// cuarta carrera derecho
			   				$dir_destino ='files/Derecho/';
							$fichero_subido=$dir_destino.basename($_FILES['archivo']['name']);
							$ExtensionArchivo = pathinfo($fichero_subido,PATHINFO_EXTENSION);
							//echo "<br> Extension archivo: ".$ExtensionArchivo."<br>";
								// el tamañ es 50000 yo lo cambie jejejej
							if (file_exists($fichero_subido)) {
								$data="Archivo ya existe en este directorio";
								echo json_encode($data);
							}
							else{
								if ($ExtensionArchivo=="pdf" || $ExtensionArchivo=="doc" || $ExtensionArchivo=="docx" || $ExtensionArchivo=="ppt" || 
								$ExtensionArchivo=="pptx" || $ExtensionArchivo=="xls" || $ExtensionArchivo=="xlsx" && $tamaño_archivo < 900000000000000000000000000) {
									if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
										$nombre=$nombre_archivo;
								        $descripcion=$_GET['descripcion']; 
								        $carrera=$carrera;
								      
										$db->setArchivo($nombre,$descripcion,$carrera);
										$data="Archivo guardado con exito";
										echo json_encode($data);
									}
									else{
										$data="Ocurrio un error al intentar subir el archivo";
										echo json_encode($data);
									}
								}else{
									$data="La extension o el tamaño de los archivos no es correcto";
									echo json_encode($data);
								}

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