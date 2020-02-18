<?php
require "conexionweather.php";
$nombre=filter_input(INPUT_POST,'nombre');
$temperatura=filter_input(INPUT_POST,'temperatura');
$codigoPostal=filter_input(INPUT_POST,'codigoPostal');
$viento=filter_input(INPUT_POST,'wind');

$sql = "INSERT INTO tiempo(ciudad,temperatura,codigo_postal,viento) VALUES ('$nombre','$temperatura', '$codigoPostal','$viento')";

if(!mysqli_query($conexionweather,$sql)){ 

	if(mysqli_errno($conexionweather)==1062){
       
         $sql = "UPADTE TIEMPO SET TEMPERATURA='$temperatura' WHERE nombre='$nombre'";
            mysqli_query($conexionweather,$sql);
              
	}else{ 
		echo(mysqli_error($conexionweather));
	}
}



?>