<?php
/**
* 
*/

require 'singletonPDO.php';
class ModeloConfiguracionAdminProfesor extends sdb
{

	
	 public  function setCuentaProfesor($us,$con,$id){
	        try {   
	                    $sql=self::$PDOInstance->prepare("CALL updateCuenta(?,?,?)");
	                    $sql->bindParam(1,$us);
	                    $sql->bindParam(2,$con);
	                    $sql->bindParam(3,$id);
	                    
	                    $sql->execute();

	 
	        } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }
	 }

	 
	public function SelectIdProfesor($us)
	{
		try {
			$sql="select idMaestro from cuentas where usuario='".$us."' and administrador='si'";
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('idmaestro' => $row["idMaestro"]);
			}
			
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}


	public function SelectIdAlumno($us,$carr)
	{
		try {
			$sql="select cuentas.idAlumno from cuentas join alumnos on cuentas.idAlumno=alumnos.idAlumno where alumnos.nombre='".$us."' and licenciatura='".$carr."'";
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('idAlumno' => $row["idAlumno"]);
			}
			
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}


	 public  function setCuentaAlumno($us,$con,$id){
	        try {   
	                    $sql=self::$PDOInstance->prepare("CALL updateCuentaAlumno(?,?,?)");
	                    $sql->bindParam(1,$us);
	                    $sql->bindParam(2,$con);
	                    $sql->bindParam(3,$id);
	                    
	                    $sql->execute();

	 
	        } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }
	 }





	 public function SelectIdMaestro($us,$carr)
	{
		try {
			$sql="select cuentas.idMaestro from cuentas join maestro on cuentas.idMaestro=maestro.idmaestro where maestro.nombre='".$us."' and licenciatura='".$carr."'";
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('idMaestro' => $row["idMaestro"]);
			}
			
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}


	 public  function setCuentaMaestro($us,$con,$id){
	        try {   
	                    $sql=self::$PDOInstance->prepare("CALL updateCuentaProfesor(?,?,?)");
	                    $sql->bindParam(1,$us);
	                    $sql->bindParam(2,$con);
	                    $sql->bindParam(3,$id);
	                    
	                    $sql->execute();

	 
	        } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }
	 }



	

}

?>