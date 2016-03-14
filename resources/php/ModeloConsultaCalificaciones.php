<?php
/**
* 
*/

require 'singletonPDO.php';
class ModeloConsultaCalificaciones extends sdb
{
	

	public function LlenarTablaCalificaciones($idalum){
				try {
					$sql="select nombreMateria, 1ºparcial,2ºparcial,3ºparcial,ordinario,1ºextraordinario,2ºextraordinario,especial,promedio from alumno_calificacion_materia join Calificaciones on alumno_calificacion_materia.idCalificaciones=Calificaciones.idCalificaciones join materias on alumno_calificacion_materia.idMaterias=materias.idmaterias where  idAlumno='".$idalum."'";

					$result=self::$PDOInstance->query($sql);
					$datos=null;	
					$datos2= array();
					foreach ($result as $row){
					 $datos=array('nombreMateria' => $row["nombreMateria"],'parcial_1' => $row["1ºparcial"],'parcial_2' => $row["2ºparcial"],'parcial_3' => $row["3ºparcial"],'ordinario' => $row["ordinario"],'extra_1' => $row["1ºextraordinario"],'extra_2' => $row["2ºextraordinario"],'especial' => $row["especial"],'prom' => $row["promedio"]);
					 array_push($datos2,$datos);
					}	

				
					return $datos2;
					} catch (PDOException $e) {
						  echo "<br>". $e->getMessage();
					}	
			}
		public function datosCalificaciones($idalum){
				try {
					$sql="select nombreMateria, 1ºparcial,2ºparcial,3ºparcial,ordinario,1ºextraordinario,2ºextraordinario,especial,promedio from alumno_calificacion_materia join Calificaciones on alumno_calificacion_materia.idCalificaciones=Calificaciones.idCalificaciones join materias on alumno_calificacion_materia.idMaterias=materias.idmaterias where  idAlumno='".$idalum."'";

					$result=self::$PDOInstance->prepare($sql);
					$result->execute();
					$datos=$result->fetchAll(PDO::FETCH_ASSOC);
					
					return $datos;
					} catch (PDOException $e) {
						  echo "<br>". $e->getMessage();
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

	
}

?>