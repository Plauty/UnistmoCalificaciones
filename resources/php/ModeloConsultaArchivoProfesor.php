<?php
/**
* 
*/

require 'singletonPDO.php';
class ModeloConsultaArchivoProfesor extends sdb
{
	public function MostrarArchivos($path){
		    $dir = opendir($path);
		    $files = array();
		    while ($current = readdir($dir)){
		        if( $current != "." && $current != "..") {
		            if(is_dir($path.$current)) {
		                MostrarArchivos($path.$current.'/');
		            }
		            else {
		                $files[] = $current;
		            }
		        }
		    }
		   return $files;
		}



		public function BuscaDescripcion($arch,$carr){

		try {
			$sql="select descripcion from archivos where nombre='".$arch."' and carrera='".$carr."'";
			$result=self::$PDOInstance->query($sql);
			$datos=null;	
			foreach ($result as $row){
			 $datos=array('descripcion' => $row["descripcion"]);
			}
			return $datos;
			
			} catch (PDOException $e) {
				  echo "<br>". $e->getMessage();
			}

	}


	
}

?>