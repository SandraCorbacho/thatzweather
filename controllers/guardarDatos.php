<?php
require "conexionweather.php";
$nombre=filter_input(INPUT_POST,'nombre');
$temperatura=filter_input(INPUT_POST,'temperatura');
$codigoPostal=filter_input(INPUT_POST,'codigoPostal');
$viento=filter_input(INPUT_POST,'wind');
if($codigoPostal<5){
	$largo=strlen($codigoPostal);
	$ceros=5-$largo;
	str_pad($codigoPostal, $ceros, "0");
}
$sql = "INSERT INTO tiempo(ciudad,temperatura,codigo_postal,viento) VALUES ('$nombre','$temperatura', '$codigoPostal','$viento')";

if(!mysqli_query($conexionweather,$sql)){ 
	
	if(mysqli_errno($conexionweather)==1062){
       echo "$nombre";
         $sql = "UPDATE tiempo SET temperatura='$temperatura' WHERE ciudad='$nombre'";
            mysqli_query($conexionweather,$sql);
              
	}else{ 
		echo(mysqli_error($conexionweather));
	}
}



?>