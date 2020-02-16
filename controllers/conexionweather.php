<?php 
$conexionweather = mysqli_connect('localhost', 'root', '', 'weather')or die("hubo un error al conectar con la base de datos"); 

mysqli_set_charset($conexionweather, "utf8");
 ?>