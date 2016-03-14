<?php
/**
* 
*/

require 'singletonPDO.php';
class modeloALumno extends sdb
{
	

	public  function setAlumno($m,$n,$ap,$am,$e,$t,$s,$g,$c){
	        try {   
	        				$materias=array();
	        				$stamptimeid=array();
	        				$es="cursando";
	        				$sql=self::$PDOInstance->prepare("CALL INSERT_ALUMNO(?,?,?,?,?,?,?,?,?,?)");
	        				$sql->bindParam(1,$m);
	        				$sql->bindParam(2,$n);
	        				$sql->bindParam(3,$ap);
	        				$sql->bindParam(4,$am);
	        				$sql->bindParam(5,$t);
	        				$sql->bindParam(6,$e);
	        				$sql->bindParam(7,$c);
	        				$sql->bindParam(8,$s);
	        				$sql->bindParam(9,$g);
	        				$sql->bindParam(10,$es);
	        				$sql->execute();
		               		

	        				$sql="select * from materias where idSemestre=(select semestre from alumnos where idAlumno='".$m."')";
		               		getdate()[0]+gettimeofday()["usec"];
				           	$result=self::$PDOInstance->query($sql);
							$datos=null;	
							$i=0;
							foreach ($result as $row){
							$materias[$i]=$row["idmaterias"];	
							$sql=self::$PDOInstance->prepare("CALL INSERT_CAlIFICACIONES(?)");
							$stamptimeid[$i]=getdate()[0]+gettimeofday()["usec"]."";
							echo $stamptimeid[$i]."<br>";
							$sql->bindParam(1,$stamptimeid[$i]);
							$sql->execute();
							$sql=null;
							$sql=self::$PDOInstance->prepare("CALL INSERT_A_C_M(?,?,?)");
							$sql->bindParam(1,$m);
							$sql->bindParam(2,$materias[$i]);
							$sql->bindParam(3,$stamptimeid[$i]);
							$sql->execute();
							//registrar materias con id y al mismo tiempo meterlos en un arreglo para posteriormente insertar la relacion a_c_m
							}
												

	        				/*
							buscar cuantas materias tiene el alumno para despues insert el numero determinado de filas a la tabla 
							calificaciones, setear con ceros ¿obtener ultimos 5 valores o poner un staptime para cacda ide de calificciones ?
							n=nummaterias
							array materias [n] array Stamptime[n*time]
							insert into calif  
							next
							for
							insertar los datos de la matricula los datow de array de materias y luego los datos del arra de los ides de las calfiiciaciones
							insert into alumos calificiciacion materia into 
							end for

	        				*/




	 
	        } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }
	 }

	public function updateAlumno($m,$n,$ap,$am,$e,$t,$s,$g,$c)
	{
		try {
				$sql=self::$PDOInstance->prepare("CALL UPDATE_ALUMNO(?,?,?,?,?,?,?,?,?,?)");
			
	        				$es="cursando";
	        				$sql->bindParam(1,$m);
	        				$sql->bindParam(2,$n);
	        				$sql->bindParam(3,$ap);
	        				$sql->bindParam(4,$am);
	        				$sql->bindParam(5,$t);
	        				$sql->bindParam(6,$e);
	        				$sql->bindParam(7,$c);
	        				$sql->bindParam(8,$s);
	        				$sql->bindParam(9,$g);
	        				$sql->bindParam(10,$es);
	        				$sql->execute();

			  } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }

	}
	public function deleteAlumno($m){
		try {
			$sql="delete from alumnos where idAlumno='".$m."'";
			self::$PDOInstance->query($sql);	

		} catch (PDOException $e) {
			  echo "<br>". $e->getMessage();
		}
	}

	public function SelectAlumno($m)
	{
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