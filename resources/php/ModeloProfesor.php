<?php
/**
* 
*/

require 'singletonPDO.php';
class modeloProfesor extends sdb
{

	public  function setProfesor($m,$n,$ap,$am,$tel,$e,$tit){
	        try {   
	                    $sql="insert into maestro values("."'".$m."'".","."'".$n."'".","."'".$ap."'".","."'".$am."'".","."'".$tel."'".","."'".$e."'".","."'".$tit."'".")";
	                  
	                   self::$PDOInstance->query($sql);
	 
	        } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }
	 }


	 public  function setProfesorConProcedimiento($m,$n,$ap,$am,$tel,$e,$tit,$adm,$lic){
	        try {   
	                    $sql=self::$PDOInstance->prepare("CALL InsertMaestro(?,?,?,?,?,?,?,?,?)");
	                    $sql->bindParam(1,$m);
	                    $sql->bindParam(2,$n);
	                    $sql->bindParam(3,$ap);
	                    $sql->bindParam(4,$am);
	                    $sql->bindParam(5,$tel);
	                    $sql->bindParam(6,$e);
	                    $sql->bindParam(7,$tit);
	                    $sql->bindParam(8,$adm);
	                    $sql->bindParam(9,$lic);
	                    $sql->execute();

	 
	        } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }
	 }


	public function updateProfesor($m,$n,$ap,$am,$tel,$e,$tit)
	{
		try {
			$sql="update  maestro set nombre='".$n."'".",apellidoPaterno="."'".$ap."'".",apellidoMaterno="."'".$am."'".",telefono="."'".$tel."'".",email="."'".$e."'".",titulo="."'".$tit."' "."where idmaestro=".$m;
				self::$PDOInstance->query($sql);	

			  } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }

	}

	public function updateProfesorConProcedimiento($m,$n,$ap,$am,$tel,$e,$tit,$adm,$lic)
	{
		try {
						$sql=self::$PDOInstance->prepare("CALL updateMaestro(?,?,?,?,?,?,?,?,?)");
	                    $sql->bindParam(1,$m);
	                    $sql->bindParam(2,$n);
	                    $sql->bindParam(3,$ap);
	                    $sql->bindParam(4,$am);
	                    $sql->bindParam(5,$tel);
	                    $sql->bindParam(6,$e);
	                    $sql->bindParam(7,$tit);
	                    $sql->bindParam(8,$adm);
	                    $sql->bindParam(9,$lic);
	                    $sql->execute();	

			  } catch (PDOException $e) {
	            echo "<br>". $e->getMessage();
	        }

	}


	public function deleteProfesor($m){
		try {
			$sql="delete from maestro where idmaestro='".$m."'";
			self::$PDOInstance->query($sql);	

		} catch (PDOException $e) {
			  echo "<br>". $e->getMessage();
		}
	}

	public function SelectProfesor($m)
	{
		try {
			$sql="select maestro.idmaestro,nombre,apellidoPaterno,apellidoMaterno,telefono,email,titulo, administrador, licenciatura  from maestro join  cuentas on maestro.idmaestro= cuentas.idMaestro where maestro.idmaestro=".$m;
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('idmaestro' => $row["idmaestro"],'nombre'=>$row["nombre"],'apellidoPaterno'=>$row["apellidoPaterno"],'apellidoMaterno'=>$row["apellidoMaterno"],'telefono'=>$row["telefono"],'email'=>$row["email"],'titulo'=>$row["titulo"],'administrador'=>$row["administrador"],'licenciatura'=>$row["licenciatura"]);
			}
			
			return $datos;
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}	
	}


	public function ContadorAdministrador($lic){

		try {
			$sql="select count(*) as contador from cuentas join maestro on cuentas.idMaestro=maestro.idmaestro where administrador='si' and licenciatura='".$lic."'";
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('contador' => $row["contador"]);
			}
			return $datos;
			
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}

	}

}

?>