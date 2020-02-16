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
	print_r($tiempo);
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
<link rel="stylesheet" href="../css/style.css">

<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
</head>
<body class='bg fuente'>
    <div class='container-fluid '>
        <div class='row'>
            <div class='col-12 centrar' id='titulo'>
                <img src='../img/ThatzWeather.png'>
                <p>¡Que la lluvia no te pare!</p>
            </div>      
        </div>
    </div>
    <div id='resumenTiempo' class='container-fluid'>
        <div class='row '>
            <div class='col-8 tiempo margen '>
                <div class='row justify-content-center '>
                    <div class='col-4 altura justificar '> <span>Código Postal: <span id='codPost' class='negrita'></span></span> <br> <span>Ciudad: <span id='ciudad' class='negrita'></span>
                    </div>
                    <div class='col-4 '>
                        
                      
                            <div class='col-12'>
                                <img class='imgbuscador' id='lupaBuscador' src='../img/shape.png'>
                                <input id='codigoBusqueda' class='buscador' type='number' name='codigoPostal' placeholder="Introduce el código Postal">
                            </div>
                            
                           
                    </div>
                </div>
                <div class='row'>
                    <div class='col-2  '>
                        <div class='centrar '>Ahora</div>
                        <div class=' container-fluid'>
                            <div class='row'>
                            <div class='col-6' id='icono'>IMG</div>
                            <div class='col-6'>
                                <div class='col-10' id='descripTiempo'>descr</div>
                                <div class='col-10' id='temp'>temp</div>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class='col-5 borde'>
                    <div class='centrar'>Próximas horas</div>
                    <div class='row altura2 ' >
                    
                        <div class='col-3 alturaInterior '>
                            <div>Ahora</div>
                            <div>img</div>
                            <div>descrip</div>
                            <div>temp</div>
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
                    <div class='col-5 borde'>
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
            <div class='col-3 tiempo'>
                <div class='col-12'><p>Top 5 de las zonas más frías según tus búsquedas</p></div>
                <div class='col-12'>
                    <div class='row'>
                        <div class='col-6'>
                        icono
                        </div>
                        <div class='col-6'>
                        cp y ciudad
                        </div>
                    </div>
                </div>
                <div class='col-12'>
                <div class='row'>
                        <div class='col-6'>
                        icono
                        </div>
                        <div class='col-6'>
                        cp y ciudad
                        </div>
                    </div>
                </div>
                <div class='col-12'>
                <div class='row'>
                        <div class='col-6'>
                        icono
                        </div>
                        <div class='col-6'>
                        cp y ciudad
                        </div>
                    </div>
                </div>
                <div class='col-12'>
                <div class='row'>
                        <div class='col-6'>
                        icono
                        </div>
                        <div class='col-6'>
                        cp y ciudad
                        </div>
                    </div>
                </div>
                <div class='col-12'>
                <div class='row'>
                        <div class='col-6'>
                        icono
                        </div>
                        <div class='col-6'>
                        cp y ciudad
                        </div>
                    </div>
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
        var weatherURL = "http://api.openweathermap.org/data/2.5/weather?zip=0"+codigoPostal+",es&appid=1ebe8fb6c5d2654d9ceb6e243540f115"

    }else{
    var weatherURL = "http://api.openweathermap.org/data/2.5/weather?zip="+codigoPostal+",es&appid=1ebe8fb6c5d2654d9ceb6e243540f115"

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
                       
                        main = datos.main;
                        nombre=datos.name
                        wind = datos.wind;
                        coord = datos.coord;
                        temperatura=parseInt(eval(main.temp)-273);
                        icono="http://openweathermap.org/img/w/"+datos.weather[0].icon+".png";
                        document.getElementById('temp').innerHTML=temperatura;
                        document.getElementById('icono').innerHTML="<img src='"+icono+"'>";
                        document.getElementById('codPost').innerHTML=codigoPostal;
                        document.getElementById('ciudad').innerHTML=datos.name;
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