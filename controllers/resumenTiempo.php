<?php
$codigoPostal=filter_input(INPUT_POST,'codigoPostal');

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
        <div id='resumenTiempo' class='row'>
            
        </div>
    </div>
    <script>
        var codigoPostal=parseInt(<?=$codigoPostal?>);

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
                        var main = datos.main;
                        var wind = datos.wind;
                        var coord = datos.coord;
                        var temperatura=parseInt(eval(main.temp)-273);
                        var icono="http://openweathermap.org/img/w/"+datos.weather[0].icon+".png";
                        var html='<div id="tiempo">'
                            html+='<h2>' + datos.name + '</h2>' 
                            html+='<div><img width="50px" src="'+icono+'"></div>'
                            html+='<div><b>Temperatura: </b>'+temperatura+'</div>'            
                            html+='<div><b>Presion: </b>'+ main.pressure+'</div>' 
                            html+='<div><b>Grados: </b>'+ wind.deg+'</div>' 
                            html+='<div><b>Velocidad del viento: </b>'+ wind.speed+'</div>'
                            html+='<div><b>Longitud: </b>'+coord.lon + '</div>' 
                            html+='<div><b>Latitud: </b>'+coord.lat+ '</div>'             
                        html+='</div>'                                                                           ;
                        document.getElementById('resumenTiempo').innerHTML=html
                        
                    })

                    .catch(function(error){
                        alert(error)
                    })
             
                   




    </script>
</body>
</html>