<?php
/**
* 
*/

require 'singletonPDO.php';
class ModeloSubirArchivo extends sdb
{


	 public  function setArchivo($nombre,$descripcion,$carrera){
	        try {   
	                    $sql=self::$PDOInstance->prepare("CALL SetArchivo(?,?,?)");
	                    $sql->bindParam(1,$nombre);
	                    $sql->bindParam(2,$descripcion);
	                    $sql->bindParam(3,$carrera);
	                  
	                    $sql->execute();

	 
	        } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }
	 }


	public function SelectCarrera($us)
	{
		try {
			$sql="select licenciatura from maestro join cuentas on maestro.idmaestro=cuentas.idMaestro where usuario='".$us."'";
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('licenciatura' => $row["licenciatura"]);
			}
			
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}

}

?>