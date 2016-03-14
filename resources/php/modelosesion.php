<?php
require 'singletonPDO.php';
/**
* 
*/
class modelosesion extends sdb
{
	public function SelectCuentaMaestro($u,$p)
	{
		try {
			$sql="select * from maestro where idMaestro=(select idMaestro from cuentas where usuario='".$u."' and contraseña= '".$p."')";
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('idMaestro' => $row["idmaestro"],'nombre'=>$row["nombre"],'apellidop'=>$row["apellidoPaterno"],'apellidom'=>$row["apellidoMaterno"], 'carrera'=>$row['licenciatura']);
			}	
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}



	public function SelectCuentaAlumno($u,$p)
	{
		try {
			$sql="select * from alumnos where idAlumno=(select idAlumno from cuentas where usuario='".$u."' and contraseña= '".$p."')";
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('idAlumno' => $row["idAlumno"],'nombre'=>$row["nombre"],'apellidop'=>$row["apellidoPaterno"],'apellidom'=>$row["apellidoMaterno"], 'carrera'=>$row['licenciatura']);
			}	
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}


	public function SelectDatosAdmin($u)
	{
		try {
			$sql="select nombre,apellidoPaterno,apellidoMaterno, usuario,contraseña,licenciatura from maestro join cuentas on maestro.idmaestro= cuentas.idMaestro where usuario='".$u."'";
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('nombre' => $row["nombre"],'apellidoPaterno'=>$row["apellidoPaterno"],'apellidoMaterno'=>$row["apellidoMaterno"], 'user'=>$row['usuario'],'pass'=>$row['contraseña'],'carrera'=>$row['licenciatura']);
			}	
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}




	

}

?>