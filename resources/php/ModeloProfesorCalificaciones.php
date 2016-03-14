	<?php 
	require 'singletonPDO.php';
	/**
	* 
	*/
	class modeloprofesorcalificaciones extends sdb
	{

			public function selectProfesorMateria($u){
					try {
						$sql="select * from maestro_materia join materias on maestro_materia.idMateria=materias.idMaterias where idMaestro='".$u."'";

						$result=self::$PDOInstance->query($sql);
						$datos=null;	
						$datos2= array();
						foreach ($result as $row){
						 $datos=array('idMaestro'=>$row["idMaestro"],'idMateria'=>$row["idMateria"],'cicloe'=>$row["cicloEscolar"],
						 	'nombreMat'=>$row["nombreMateria"],'idSemestre'=>$row["idSemestre"],'carrera'=>$row["carrera"]);
						 array_push($datos2,$datos);
						}	

					
						return $datos2;
						} catch (PDOException $e) {
							  echo "<br>". $e->getMessage();
						}	
				}
			public function selectDatosAlumnos($s){
				try {

						$sql="select * from alumnos where semestre =(select semestre from materias where idMaterias='".$s."')";
						$result=self::$PDOInstance->query($sql);
						$datos=null;	
						$datos2= array();


						foreach ($result as $row){
							 $datos=array('Matricula' => $row["idAlumno"],'Nombre'=>$row["nombre"],'ApellidoPaterno'=>$row["apellidoPaterno"],'ApellidoMaterno'=>$row["apellidoMaterno"],'Email'=>$row["email"],'Carrera'=>$row["licenciatura"]
							 ,'Telefono'=>$row["telefono"],'Semestre'=>$row["semestre"],'Grupo'=>$row["grupo"],'Estado'=>$row["estado"]);
							//$datos=array('Nombre'=>$row["nombre"]." ".$row["apellidoPaterno"]." ".$row["apellidoMaterno"]);

							 array_push($datos2,$datos);
							}

			
			               	
						return $datos2;



				} catch (Exception $e) {
					  echo "<br>". $e->getMessage();
				}



			}
			 public function SelectCalif($idM)
			{
			try {
		
				$sql="select calificaciones.idCalificaciones,alumnos.idAlumno,nombre,apellidoPaterno,apellidoMaterno,1ºparcial,2ºparcial,3ºparcial,ordinario,1ºextraordinario,2ºextraordinario,especial,promedio from calificaciones join alumno_calificacion_materia on calificaciones.idCalificaciones= alumno_calificacion_materia.idCalificaciones join alumnos on alumnos.idAlumno= alumno_calificacion_materia.idAlumno where(alumno_calificacion_materia.idMaterias='".$idM."' )";
					$result=self::$PDOInstance->query($sql);
						$datos=null;	
						$datos2=array();
						foreach ($result as $row){
							 $datos=array('idCalificaciones'=>$row["idCalificaciones"],'Matricula' => $row["idAlumno"],'Estudiante' => $row["nombre"]." ".$row["apellidoPaterno"]." ".$row["apellidoMaterno"],"parcial_1"=>$row["1ºparcial"],"parcial_2"=>$row["2ºparcial"],"parcial_3"=>$row["3ºparcial"],"Ordinario"=>$row["ordinario"],"Extra_1"=>$row["1ºextraordinario"],"Extra_2"=>$row["2ºextraordinario"],"especial"=>$row["especial"],"promedio"=>$row["promedio"]);
							array_push($datos2, $datos);
						}
						//$datos2['Records']=$ax;
						
					return $datos2;
			
			} catch (Exception $e) {
				
			}


			}
				public function SelectAlumno($m){
					try {
						$sql="select * from alumnos where idAlumno=".$m;
						$result=self::$PDOInstance->query($sql);
						$datos=null;	
						
						foreach ($result as $row){
						 $datos=array('Matricula' => $row["idAlumno"],'Nombre'=>$row["nombre"],'ApellidoPaterno'=>$row["apellidoPaterno"],'ApellidoMaterno'=>$row["apellidoMaterno"],'Email'=>$row["email"],'Carrera'=>$row["licenciatura"]
						 ,'Telefono'=>$row["telefono"],'Semestre'=>$row["semestre"],'Grupo'=>$row["grupo"],'Estado'=>$row["estado"]);
						}
						 
						return $datos;
						} catch (PDOException $e) {
							  echo "<br>". $e->getMessage();
						}	
		}
		 public function setCalificaciones($var){
		 	for ($i=0; $i <8 ; $i++) { 
		 		//echo $var[$i]."<br>";
		 		if($var[$i]==""){
		 					$var[$i]=0;
		 				}	
		 	}
			$promedio=0;
		 	

		 	/*for ($i=0; $i <8 ; $i++) { 
		 		echo "<br>".$var[$i]."<br>";
		 	}*/

		 	if($var[4]=="" && $var[5]=="" && $var[6]==""){
			$promedio=(($var[0]+$var[1]+$var[2])/3)/2+($var[3]/2);
			}
			if($var[4]!=""){
				$promedio=$var[4];
			}
				if($var[5]!=""){
				$promedio=$var[5];
			}
				if($var[6]!=""){
				$promedio=$var[6];
			}
			echo $promedio." ".$var[7];
			try {

					$sql=self::$PDOInstance->prepare("CALL UPDATE_CALIFICACIONES(?,?,?,?,?,?,?,?,?)");
				        				$sql->bindParam(1,$var[7]);
				        				$sql->bindParam(2,$var[0]);
				        				$sql->bindParam(3,$var[1]);
				        				$sql->bindParam(4,$var[2]);
				        				$sql->bindParam(5,$var[3]);
				        				$sql->bindParam(6,$var[4]);
				        				$sql->bindParam(7,$var[5]);
				        				$sql->bindParam(8,$var[6]);
				        				$sql->bindParam(9,$promedio);
				        				$sql->execute();
				    return "ok";

			} catch (Exception $e) {
				echo $e;
				
			}

		}
	}
?>