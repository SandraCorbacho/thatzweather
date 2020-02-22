<?php
$codigoPostal=filter_input(INPUT_POST,'codigoPostal');
$codigoEspana=intval(substr($codigoPostal,0,2));
if(strlen($codigoPostal)<5||$codigoEspana>52||strlen($codigoPostal)>5){
   
	header('Location: index.php');
}else{
require "conexionweather.php";


	$sql="SELECT ciudad,codigo_postal,temperatura FROM tiempo ORDER BY temperatura";
	

	$resultado=mysqli_query($conexionweather,$sql)or die(mysqli_error($conexionweather));
	$tiempo=array();
	while ($datostiempo=mysqli_fetch_assoc($resultado)) {
		array_push($tiempo, $datostiempo);
    }
   
    $respuesta="<ol class='numeracion' >";
	for($c=0;$c<=4&&$c<count($tiempo);$c++){
        $respuesta.=" <li > <div class='col-12 borde2'>
        <div class='row'>
             <div class='col-3 grande'>
        ".$tiempo[$c]['temperatura']."º
        </div>
        <div class='col-9 pequeno'>
       <span class='letra'> CP:</span> ".$tiempo[$c]['codigo_postal']."<br>
       <span class='letra'>Ciudad: </span>".$tiempo[$c]['ciudad']."
        </div>
        </div>
    </div></li>";
        
       
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thatzads</title>
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
<link rel="stylesheet" href="../css/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/1e5694faf5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/style.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
<script src='../js/weather.js'></script>
</head>
<body class='bg fuente'>
    <div class='container-fluid '>
        <div class='row'>
            <div class='col-xl-12 col-xs-10 centrar' id='titulo'>
                <img src='../img/ThatzWeather.png'>
                <h4 class='posicionar'>¡Que la lluvia no te pare!</h4>
            </div>      
        </div>
    </div>
    <div id='resumenTiempo' class='container-fluid '>
        <div class='row alineacion '>
            <div class='col-xl-8 col-md-11 col-xs-11 tiempo margenes0 ' id='contenedor'>
                <div class='row justify-content-center  '>
                    <div id='movilCaja1' class='col-xl-4  col-xs-12 altura justificar bajar'> <span>Código Postal: <span id='codPost' class='negrita'></span></span> <br> <span>Ciudad: <span id='ciudad' class='negrita'></span>
                    </div>
                    <div class='col-xl-4 col-md-6  col-xs-12 '>
                            <div class='col-12'>
                                <img class='imgbuscador' id='lupaBuscador' src='../img/shape.png'>
                                <input id='codigoBusqueda' class='buscador' type='number' name='codigoPostal' value='<?php echo $codigoPostal?>' placeholder="Busca otra zona">
                            </div>
                    </div>
                </div>
                <div class='row centrar'>
                    <div id='tiempoParaHoy' class='col-xl-3 col-md-2 col-xs-12 '>
                        <div class='centrar espacio'>Hoy</div>
                        <div class=' container-fluid subir'>
                            <div class='row'>
                            <div class='col-xl-6 col-xm-6 col-xs-6 '><div  id='icono'></div><div><img id='flecha' src='../img/flecha.png'></div></div>
                            
                            <div class='col-xl-6 col-md-6 col-xs-4 moverposicion '>
                                <div class='col-10 tamano2' id='descripTiempo'></div>
                                <div class='col-10 tamano1' id='temp'></div>
                                <div class='col-12 ' id='viento'></div>
                             
                            </div>
                            </div>
                        </div>   
                    </div>
                    <div class='col-xl-5 col-md-6 col-xs-12 borde sinborde'>
                    <div class='centrar espacio'>Próximas horas</div>
                    <div class='row altura2 ' >
                    
                        <div class='col-3 alturaInterior '>
                            <div class='espaciosHoy'>Ahora</div>
                            <div id='iconoHoy' class='primeraIcono'></div>
                            <div class='descripTam descripHoy' id='descripTiempoHoy'></div>
                            <div class='temp' id='tempHoy'></div>
                        </div>
                        <div class='col-3 alturaInterior borde'>
                            <div class='espaciosHoy primeraHora'></div>
                            <div  class='primeraIcono'></div>
                            <div class='descripTam descripHoy'></div>
                            <div class='temp temperaturaHora'></div>
                        </div>
                        <div class='col-3 alturaInterior borde'>
                            <div class='espaciosHoy primeraHora'></div>
                            <div  class='primeraIcono'></div>
                            <div class='descripTam descripHoy'></div>
                            <div class='temp temperaturaHora'></div>
                        </div>
                        <div class='col-3 alturaInterior borde'>
                            <div class='espaciosHoy primeraHora'></div>
                            <div  class='primeraIcono'></div>
                            <div class='descripTam descripHoy'></div>
                            <div class='temp temperaturaHora'></div>
                        </div>
                    </div>
                    </div>
                    <div class='col-xl-4 col-md-4 col-xs-12 borde sinborde'>
                    <div class='centrar espacio'>Próximos 5 días</div>
                    <div class='row owl-carousel owl-theme'>
                        <div class='col-3  alturaInterior item'>
                            <div class='espaciosHoy NombreDia'></div>
                            <div class='diasIcono'></div>
                            <div class='descripTam diasDescrip'></div>
                            <div class='temp diasTemp'></div>
                        </div>
                        <div class='col-3  alturaInterior borde item'>
                            <div class='espaciosHoy NombreDia'></div>
                            <div class='diasIcono'></div>
                            <div class='descripTam diasDescrip'></div>
                            <div class='temp diasTemp'></div>
                        </div>
                        <div class='col-3  alturaInterior borde item'>
                            <div class='espaciosHoy NombreDia'></div>
                            <div class='diasIcono'></div>
                            <div class='descripTam diasDescrip' ></div>
                            <div class='temp diasTemp'></div>
                        </div>
                        <div class='col-3  alturaInterior borde item'>
                            <div class='espaciosHoy NombreDia'></div>
                            <div class='diasIcono'></div>
                            <div class='descripTam diasDescrip'></div>
                            <div class='temp diasTemp'></div>
                        </div>
                        <div class='col-3  alturaInterior borde item'>
                            <div class='espaciosHoy NombreDia' id='diadia'></div>
                            <div class='diasIcono'></div>
                            <div class='descripTam diasDescrip'></div>
                            <div class='temp diasTemp'></div>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
            <div class='col-xl-3 col-md-11 col-xs-10 tiempo alturas margenes0 centradoPequeno'>
                
                <div class='col-12 margen '><p class='tamanoLetra'>Top 5 de las zonas más frías según tus búsquedas</p></div>
                   
                <?=$respuesta?>
                
                </div>
               
            </div>
        </div>
    </div>
</body>
</html>