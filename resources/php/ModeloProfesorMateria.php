<?php
/**
* 
*/

require 'singletonPDO.php';
class modeloProfesorMateria extends sdb
{

	public  function setProfesorMateria($idM,$idMat,$ce){
	        try {   
	                    $sql="insert into maestro_materia values("."'".$idM."'".","."'".$idMat."'".","."'".$ce."'".")";
	                  
	                   self::$PDOInstance->query($sql);
	 
	        } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }
	 }

	 public  function setProfesorMateriaConProcedimiento($idM,$idMat,$ce){
	        try {   
	                    $sql=self::$PDOInstance->prepare("CALL AsignacionMateria(?,?,?)");
	                    $sql->bindParam(1,$idM);
	                    $sql->bindParam(2,$idMat);
	                    $sql->bindParam(3,$ce);
	                  
	                    $sql->execute();

	 
	        } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }
	 }


	public function updateProfesor($m,$n,$ap,$am,$e,$tel,$tit)
	{
		try {
			$sql="update  maestro set nombre='".$n."'".",apellidoPaterno="."'".$ap."'".",apellidoMaterno="."'".$am."'".",telefono="."'".$tel."'".",email="."'".$e."'".",titulo="."'".$tit."' "."where idmaestro=".$m;
				self::$PDOInstance->query($sql);	

			  } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }

	}
	public function deleteMateriaProfesor($idMat){
		try {
			$sql="delete from maestro_materia where idMateria=".$idMat;
			self::$PDOInstance->query($sql);	
			echo "eliminado con exito";

		} catch (PDOException $e) {
			  echo "<br>". $e->getMessage();
		}
	}


	public  function deleteMateriaProfesorConProcedimiento($idMat){
	        try {   
	                    $sql=self::$PDOInstance->prepare("CALL deleteMateriaAsignado(?)");
	                    $sql->bindParam(1,$idMat);
	                  	                  
	                    $sql->execute();

	 
	        } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }
	 }



	public function SelectProfesor($m)
	{
		try {
			$sql="select maestro.idmaestro, nombre,apellidoPaterno,apellidoMaterno,telefono,email,titulo,licenciatura,administrador from maestro join cuentas on maestro.idmaestro= cuentas.idMaestro where maestro.idmaestro='".$m."'";
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('idmaestro' => $row["idmaestro"],'nombre'=>$row["nombre"],'apellidoPaterno'=>$row["apellidoPaterno"],'apellidoMaterno'=>$row["apellidoMaterno"],'administrador'=>$row["administrador"]);
			}
			
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}


	public function SelectProfesorMateria($m,$ciEs)
	{
		try {
			$sql="select nombreMateria,idmaterias from materias join maestro_materia on materias.idmaterias= maestro_materia.idMateria where idMaestro=".$m." and cicloEscolar='".$ciEs."'";
			$result=self::$PDOInstance->query($sql);
			$datos=null;
            $datos2=array();

            foreach ($result as $row){
            
                    
             $datos=array('nombreMateria' => $row["nombreMateria"],'idmaterias' => $row["idmaterias"] );
             array_push($datos2, $datos); 
                        

            }
            
            return $datos2;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}


public function SelectCicloEscolar($m,$ciEs)
	{
		try {
			$sql="select cicloEscolar from maestro_materia where idMaestro=".$m." and cicloEscolar='".$ciEs."'";
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('cicloEscolar' => $row["cicloEscolar"]);
			}
			
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}




		public function SelectCodigoMateria($m,$cd)
	{
		try {
			$sql="select idMateria from maestro_materia where idMaestro=".$m." and idMateria=".$cd;
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('idMateria' => $row["idMateria"]);
			}
			
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}




		public function SelectIdMateria($m)
	{
		try {
			$sql="select idmaterias from materias where idmaterias=".$m;
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('idmaterias' => $row["idmaterias"]);
			}
			
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}


	public function buscaMateriasCarrera($ca,$sem){

		try {
			$sql="select idmaterias, nombreMateria from materias where carrera='".$ca."' and asignado='false' and idSemestre=".$sem;
			$result=self::$PDOInstance->query($sql);
			$datos=null;
            $datos2=array();

            foreach ($result as $row){
            
                    
             $datos=array('idmaterias' => $row["idmaterias"],'nombreMateria' => $row["nombreMateria"] );
             array_push($datos2, $datos); 
                        

            }
            
            return $datos2;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}

	}


	public function RestablecerMaterias($ca){
		try {   
	                    $sql=self::$PDOInstance->prepare("CALL RestablecerMaterias(?)");
	                    $sql->bindParam(1,$ca);
	                  	                  
	                    $sql->execute();

	 
	        } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }

	}




}

?>