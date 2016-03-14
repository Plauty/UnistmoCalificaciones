<?php
/**
* 
*/

require 'singletonPDO.php';
class modelologin extends sdb
{

	

	public function SelectCuenta($u,$p)
	{
		try {
			$sql="select * from cuentas where usuario= '".$u."' and contraseña= '".$p."'";
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('usuario' => $row["usuario"],'pass'=>$row["contraseña"],'idAlumno'=>$row["idAlumno"],'idMaestro'=>$row["idMaestro"],'admi'=>$row['administrador']);
			}
			
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}

}

?>