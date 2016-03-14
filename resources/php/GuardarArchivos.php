<?php
	//datos archivos
	$nombre_archivo=$_FILES['fichero_usuario']['name'];
	$tipo_archivo=$_FILES['fichero_usuario']['type'];
	$tamaño_archivo=$_FILES['fichero_usuario']['size'];

	$dir_destino ='files/';
	$fichero_subido=$dir_destino.basename($_FILES['fichero_usuario']['name']);
		// el tamañ es 50000 yo lo cambie jejejej
	if ((strpos($tipo_archivo, "pdf")) || (strpos($tipo_archivo, "doc")) || (strpos($tipo_archivo, "ppt")) || (strpos($tipo_archivo, "pptx")) || (strpos($tipo_archivo, "xlsx")) && $tamaño_archivo < 900000000000000000000000000) {
		if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
			echo "El fichero es valido y subido con exito.\n";
		}
		else{
			echo "Ocurrio un error al intentar subir el archivo.\n";
		}
}else{
	echo "La extension o el tamaño de los archivos no es correcto <br>";
	echo "Se permiten archivos pdf o doc, pptx y xlsx, menores o iguales a 50Kb";
}


?>