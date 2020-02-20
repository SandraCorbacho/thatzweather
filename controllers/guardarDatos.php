<?php
require "conexionweather.php";
$nombre=filter_input(INPUT_POST,'nombre');
$temperatura=filter_input(INPUT_POST,'temperatura');
$codigoPostal=filter_input(INPUT_POST,'codigoPostal');
$viento=filter_input(INPUT_POST,'wind');
$temp2=filter_input(INPUT_POST,'temp2');
$temp3=filter_input(INPUT_POST,'temp3');
$temp4=filter_input(INPUT_POST,'temp4');
$temp5=filter_input(INPUT_POST,'temp5');
echo $temp2;
if($codigoPostal<5){
	$largo=strlen($codigoPostal);
	$ceros=5-$largo;
	str_pad($codigoPostal, $ceros, "0");
}
$sql = "INSERT INTO tiempo(ciudad,temperatura,codigo_postal,viento,tempDia2,tempDia3,tempDia4,tempDia5) VALUES ('$nombre','$temperatura', '$codigoPostal','$viento','$temp2','$temp3','$temp4','$temp5')";

if(!mysqli_query($conexionweather,$sql)){ 
	
	if(mysqli_errno($conexionweather)==1062){
       echo "$nombre";
         $sql = "UPDATE tiempo SET temperatura='$temperatura',tempDia2='$temp2',tempDia3='$temp3',tempDia4='$temp4',tempDia5='$temp5' WHERE ciudad='$nombre'";
            mysqli_query($conexionweather,$sql);
              
	}else{ 
		echo(mysqli_error($conexionweather));
	}
}



?>