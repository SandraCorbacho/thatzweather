<?php
$codigoPostal=filter_input(INPUT_POST,'codigoPostal');

$codigoPostal=filter_input(INPUT_POST,'codigoPostal');
require "conexionweather.php";

	$sql="SELECT * FROM tiempo ORDER BY temperatura";
	

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
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thatzads</title>

<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/1e5694faf5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/style.css">

<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
</head>
<body class='bg fuente'>
    <div class='container-fluid '>
        <div class='row'>
            <div class='col-xl-12 col-xs-10 centrar' id='titulo'>
                <img src='../img/ThatzWeather.png'>
                <p>¡Que la lluvia no te pare!</p>
            </div>      
        </div>
    </div>
    <div id='resumenTiempo' class='container-fluid '>
        <div class='row alineacion '>
            <div class='col-xl-7 col-md-11 tiempo margenes0 '>
                <div class='row justify-content-center '>
                    <div id='movilCaja1' class='col-xl-4 col-xs-12 altura justificar '> <span>Código Postal: <span id='codPost' class='negrita'></span></span> <br> <span>Ciudad: <span id='ciudad' class='negrita'></span>
                    </div>
                    <div class='col-xl-4 col-xs-12 '>
                            <div class='col-12'>
                                <img class='imgbuscador' id='lupaBuscador' src='../img/shape.png'>
                                <input id='codigoBusqueda' class='buscador' type='number' name='codigoPostal' placeholder="Introduce el código Postal">
                            </div>
                            
                           
                    </div>
                </div>
                <div class='row centrar'>
                    <div class='col-xl-2 xol-md-2 col-xs-12 '>
                        <div class='centrar '>Ahora</div>
                        <div class=' container-fluid'>
                            <div class='row'>
                            <div class='col-xl-6 col-xm-6 col-xs-12' id='icono'>IMG</div>
                            <div class='col-6'>
                                <div class='col-10' id='descripTiempo'>descrip1</div>
                                <div class='col-10' id='temp'></div>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class='col-xl-5 col-xs-12 borde sinborde'>
                    <div class='centrar'>Próximas horas</div>
                    <div class='row altura2 ' >
                    
                        <div class='col-3 alturaInterior '>
                            <div>Ahora</div>
                            <div id='iconoHoy'>img</div>
                            <div id='descripTiempoHoy'>descrip2</div>
                            <div id='tempHoy'>temp</div>
                        </div>
                        <div class='col-3 alturaInterior borde'>
                            <div>18:00</div>
                            <div>img</div>
                            <div>descrip</div>
                            <div>temp</div>
                        </div>
                        <div class='col-3 alturaInterior borde'>
                            <div>19:00</div>
                            <div>img</div>
                            <div>descrip</div>
                            <div>temp</div>
                        </div>
                        <div class='col-3 alturaInterior borde'>
                            <div>20:00</div>
                            <div>img</div>
                            <div>descrip</div>
                            <div>temp</div>
                        </div>
                    </div>
                    </div>
                    <div class='col-xl-5 col-xs-12 borde sinborde '>
                    <div class='centrar'>Próximos 5 días</div>
                    <div class='row'>
                        <div class='col-3  alturaInterior'>
                            <div>Ahora</div>
                            <div>img</div>
                            <div>descrip</div>
                            <div>temp</div>
                        </div>
                        <div class='col-3  alturaInterior borde'>
                            <div>18:00</div>
                            <div>img</div>
                            <div>descrip</div>
                            <div>temp</div>
                        </div>
                        <div class='col-3  alturaInterior borde'>
                            <div>19:00</div>
                            <div>img</div>
                            <div>descrip</div>
                            <div>temp</div>
                        </div>
                        <div class='col-3  alturaInterior borde'>
                            <div>20:00</div>
                            <div>img</div>
                            <div>descrip</div>
                            <div>temp</div>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
            <div class='col-xl-4 col-md-11 col-xs-10 tiempo alturas margenes0'>
                
                <div class='col-12 margen'><p>Top 5 de las zonas más frías según tus búsquedas</p></div>
                   
                <?=$respuesta?>
                
                </div>
               
            </div>
        </div>
    </div>
    
    <script>
if(<?=$codigoPostal?>!=null){
var codigoPostal=parseInt(<?=$codigoPostal?>);
llamadaApi(codigoPostal);
}

var main;
var nombre;
var wind;
var coord;
var temperatura;

document.getElementById('lupaBuscador').addEventListener('click',Api)

function Api(){
   
    var codigo=document.getElementById('codigoBusqueda').value
    llamadaApi(codigo)
}

function llamadaApi(codigoPostal){
    
    codigoPostal=codigoPostal.toString()
    if(codigoPostal.length==4){
        var weatherURL = "http://api.openweathermap.org/data/2.5/weather?zip=0"+codigoPostal+",es&appid=1ebe8fb6c5d2654d9ceb6e243540f115&lang= es"

    }else{
    var weatherURL = "http://api.openweathermap.org/data/2.5/weather?zip="+codigoPostal+",es&appid=1ebe8fb6c5d2654d9ceb6e243540f115&lang= es"

    }
     fetch(weatherURL)
                    .then(function(respuesta){
                        if(respuesta.ok){
                            return respuesta.json();
                        }else{
                            throw "error en la peticion";
                        }                    
                    })
                    .then(function(datos){
                        
                       //console.log(datos.weather.description)
                       tiempo=datos.weather
                       
                        main = datos.main;
                        nombre=datos.name
                        wind = datos.wind;
                        coord = datos.coord;
                        temperatura=parseInt(eval(main.temp)-273);
                        tiempo=tiempo[0];
                        tiempo=tiempo['main']
                      
                            switch(tiempo){
                                case 'Clouds':
                                    icono="<i class='fas fa-cloud '></i>";
                                    descripcion='Nubes'
                                    break;
                            }
                        document.getElementById('descripTiempo').innerHTML=descripcion
                        document.getElementById('temp').innerHTML=temperatura+"º";
                        document.getElementById('icono').innerHTML=icono;
                        document.getElementById('codPost').innerHTML=codigoPostal;
                        document.getElementById('ciudad').innerHTML=datos.name;
                        document.getElementById('tempHoy').innerHTML=temperatura;
                        document.getElementById('iconoHoy').innerHTML=icono;
                                        
                      
                        var datos= new FormData;
                            datos.append('nombre',nombre)
                            datos.append('temperatura',temperatura)
                            datos.append('main',main)
                            datos.append('wind',wind)
                            datos.append('icono',icono)
                            datos.append('codigoPostal',codigoPostal)
                            
                            fetch('guardarDatos.php',{
                                method:'POST',
                                body:datos
                            })

                            .then(function(respuesta){
                                if(respuesta.ok){
                                    return respuesta.text()
                                }else {
                                    throw "error en la peticion"
                                }
                            })
                            .then(function(datos){
                               
                            })
                        .catch(function(error){
                            alert(error)
                        })
                
                    })

                    .catch(function(error){
                        alert(error)
                    })
                   

}
           
                
                

			
		
             
                   




    </script>
</body>
</html>