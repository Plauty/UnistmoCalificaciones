<?php
/**
* 
*/

require 'singletonPDO.php';
class modeloCuentas extends sdb
{
	public function SelectCuentaProf($m)
	{
		try {
			$sql="select *from cuentas where idmaestro=".$m;
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('usuario' => $row["usuario"]);
			}
			
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}

}

?>