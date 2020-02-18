<?php
$codigoPostal=filter_input(INPUT_POST,'codigoPostal');
session_start();
$codigoEspana=intval(substr($codigoPostal,0,2));
if(strlen($codigoPostal)<5||$codigoEspana>52||strlen($codigoPostal)>5){
    $_SESSION['codigo']=$codigoPostal;
	header('Location: index.php');
}else{
require "conexionweather.php";
unset($_SESSION['codigo']);

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
<script>
        
        

</script>
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
            <div class='col-xl-8 col-md-11 col-xs-11 tiempo margenes0 '>
                <div class='row justify-content-center '>
                    <div id='movilCaja1' class='col-xl-4  col-xs-12 altura justificar '> <span>Código Postal: <span id='codPost' class='negrita'></span></span> <br> <span>Ciudad: <span id='ciudad' class='negrita'></span>
                    </div>
                    <div class='col-xl-4 col-md-6  col-xs-12 '>
                            <div class='col-12'>
                                <img class='imgbuscador' id='lupaBuscador' src='../img/shape.png'>
                                <input id='codigoBusqueda' class='buscador' type='number' name='codigoPostal' placeholder="Busca otra zona">
                            </div>
                    </div>
                </div>
                <div class='row centrar'>
                    <div class='col-xl-3 col-md-2 col-xs-12 '>
                        <div class='centrar espacio'>Ahora</div>
                        <div class=' container-fluid'>
                            <div class='row'>
                            <div class='col-xl-6 col-xm-6 col-xs-6 '><div  id='icono'></div><div><img id='flecha' src='../img/flecha.png'></div></div>
                            
                            <div class='col-xl-6 col-md-6 col-xs-4 '>
                                <div class='col-10 tamano2' id='descripTiempo'>descrip1</div>
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
            <div class='col-xl-3 col-md-11 col-xs-10 tiempo alturas margenes0'>
                
                <div class='col-12 margen'><p>Top 5 de las zonas más frías según tus búsquedas</p></div>
                   
                <?=$respuesta?>
                
                </div>
               
            </div>
        </div>
    </div>
    
    <script>
var codigoPostal='<?php echo $codigoPostal?>';
codigoPostal1=codigoPostal
if(codigoPostal1<5){
	codigoPostal1.padStart(5 ,'0000')
}

if(codigoPostal!=null){
var codigoPostal=parseInt(<?=$codigoPostal?>);
llamadaApi(codigoPostal);
llamadaApiHora(codigoPostal)
}else{
    window.location.replace="../index.html";
}

var main;
var nombre;
var wind;
var coord;
var temperatura;

document.getElementById('lupaBuscador').addEventListener('click',Api)

function Api(){

    codigoPostal=document.getElementById('codigoBusqueda').value
    var codigoEspana=parseInt(codigoPostal.substr(0,2));
    if(codigoPostal.length<5||codigoEspana>52){
        window.location="index.php";
    }else{
        
        console.log(codigoPostal)
        llamadaApi(codigoPostal)
        llamadaApiHora(codigoPostal) 
    }
        
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
                            window.location="index.php";
                        }                    
                    })
                    .then(function(datos){
                        if(datos.sys==undefined){
                            window.location="index.php";
                        }
                      console.log(datos)
                        pais=datos.sys.country
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
                                    icono="<i class='fas fa-cloud'></i>";
                                    descripcion='Nubes'
                                    break;
                                case 'Rain':
                                    icono="<i class='fas fa-tint'></i>";
                                    descripcion='Lluvia'
                                    break;
                                case 'Clear':
                                    icono="<i class='fas fa-sun'></i>";
                                    descripcion='Despejado'
                                    break;
                                case 'Snow':
                                    icono="<i class='fas fa-snowflake'></i>";
                                    descripcion='Nieve'
                                    break;
                            }
                            var viento=wind.deg;
                            
                            document.getElementById('viento').innerHTML="Viento: "+wind.speed+"km/h";

                            document.getElementById('flecha').style.transition="transform 2s";
                            document.getElementById('flecha').style.transform = "rotate("+viento+"deg)";
                        document.getElementById('descripTiempo').innerHTML=descripcion;
                        document.getElementById('temp').innerHTML=temperatura+"º";
                        document.getElementById('icono').innerHTML=icono;
                        document.getElementById('icono').classList.add('fa-4x')
                        document.getElementById('codPost').innerHTML=codigoPostal;
                        document.getElementById('ciudad').innerHTML=datos.name;
                        document.getElementById('tempHoy').innerHTML=temperatura+"º";
                        document.getElementById('iconoHoy').classList.add('fa-2x')
                        document.getElementById('descripTiempoHoy').innerHTML=descripcion
                        document.getElementById('iconoHoy').innerHTML=icono;
                        wind=parseInt(wind.speed)               
                      
                        var datos= new FormData;
                            datos.append('nombre',nombre)
                            datos.append('temperatura',temperatura)
                            datos.append('main',main)
                            datos.append('wind',wind)
                            
                            datos.append('codigoPostal',codigoPostal)
                            
                            fetch('guardarDatos.php',{
                                method:'POST',
                                body:datos
                            })

                            .then(function(respuesta){
                                if(respuesta.ok){
                                    return respuesta.text()
                                }else {
                                    throw "no se han podido guardar los datos";
                                }
                            })
                            .then(function(datos){
                               console.log(datos)
                            })
                        .catch(function(error){
                            alert(error)
                        })
                
                    })

                    .catch(function(error){
                        alert(error)
                    })
                   

}
  hora1=[];
  temperatura1=[];
  icono1=[];
function llamadaApiHora(codigoPostal){
    
    codigoPostal=codigoPostal.toString()
    if(codigoPostal.length==4){
        var weatherURL ="http://api.openweathermap.org/data/2.5/forecast?zip=0"+codigoPostal+",es&appid=e7aad011f924cc369b24b3ab685b021a"


    }else{
    var weatherURL = "http://api.openweathermap.org/data/2.5/forecast?zip="+codigoPostal+",es&appid=e7aad011f924cc369b24b3ab685b021a"
                     
    }
     fetch(weatherURL)
                    .then(function(respuesta){
                        if(respuesta.ok){
                            return respuesta.json();
                        }else{
                            window.location="index.php";
                        }                    
                    })
                    .then(function(datos){
                        console.log(datos)
                        todo=datos.list;
                        for(c=0;c<3;c++){
                            //controlar las horas
                            hora=todo[c];
                            fecha=hora.dt_txt;
                            largo=(fecha.length)-8
                            hora=fecha.substr(largo,8)
                            hora=hora.substr(0,5)
                            hora1.push(hora)
                            
                            tiempo=todo[c]
                            tiempo=tiempo.main
                            temperatura=parseInt(tiempo.temp-273);
                            temperatura1.push(temperatura)
                        }
                        for(i=0;i<=3;i++){
                                                     
                            icono1.push(datos.list[c].weather[0].main)
                           console.log(icono1)
                            for(c=0;c<=3;c++){
                                switch(icono1[c]){
                                case 'Clouds':
                                    icono="<i class='fas fa-cloud'></i>";
                                    descripcion='Nubes'
                                    break;
                                case 'Rain':
                                    icono="<i class='fas fa-tint'></i>";
                                    descripcion='Lluvia'
                                    break;
                                case 'Clear':
                                    icono="<i class='fas fa-sun'></i>";
                                    descripcion='Despejado'
                                    break;
                                case 'Snow':
                                    icono="<i class='fas fa-snowflake'></i>";
                                    descripcion='Nieve'
                                    break;
                        }
                        var iconos=document.getElementsByClassName('primeraIcono')
                                    for(r=0;r<1;r++){
                                        iconos[c].innerHTML=icono
                                    } 
                                    for(r=0;r<iconos.length;r++){
                                        iconos[r].classList.add('fa-2x')
                                    }
                                    var descrip=document.getElementsByClassName('descripHoy')
                                    for(r=0;r<1;r++){
                                        descrip[c].innerHTML=descripcion
                                    }   
                            }        
                    }  
                        var posiciones=document.getElementsByClassName('primeraHora')
                            for(c=0;c<posiciones.length;c++){
                                posiciones[c].innerHTML=hora1[c]
                            }
                            var posiciones=document.getElementsByClassName('temperaturaHora')
                            for(c=0;c<posiciones.length;c++){
                                posiciones[c].innerHTML=temperatura1[c]+"º"
                            }

                            //montar el tiempo por dias
                            datosTiempo=[];
                            dias=[];
                            for(i=0;dias.length<5;i=i+2){
                                lista=datos.list[i]
                              
                                dia=datos.list[i].dt_txt
                                dia=dia.substr(0,10)
                                dia=dia.substr(8,2)
                                if(i==0){
                                    datosTiempo.push(lista);
                                    dias.push(dia);
                                }
                                $existe=dias.includes(dia);
                               if($existe==false){
                                    datosTiempo.push(lista);
                                    dias.push(dia);
                                }
                                
                            }
                            //datosTiempo contiene array de dias
                            
                            for(c=0;c<datosTiempo.length;c++){
                                
                                var dias=["domingo", "lunes", "martes", "miercoles", "jueves", "viernes", "sabado"];
                                var meses=["null","January","February","March","April","May","June","July","August","September","October","November","December"]

                                    fecha=datosTiempo[c].dt_txt
                                    
                                    anio=fecha.substr(0,4);
                                    mes=parseInt(fecha.substr(5,2));
                                    
                                    mes=meses[mes];
                                    dia=fecha.substr(8,2);

                                diaSemana(dia, mes,anio);
                                function diaSemana(dia,mes,anio){
                                var dt = new Date(mes+' '+dia+', '+anio+' 12:00:00');
                                    var nombres=document.getElementsByClassName('NombreDia')
                                        for(r=0;r<nombres.length;r++){
                                            nombres[c].innerHTML =dias[dt.getUTCDay()];   
                                        }
                                    };
                                   
                                    iconoDias=datosTiempo[c].weather[0].main
                                    
                                for(i=0;i<=3;i++){
                                        switch(iconoDias){
                                        case 'Clouds':
                                            icono="<i class='fas fa-cloud'></i>";
                                            descripcion='Nubes'
                                            break;
                                        case 'Rain':
                                            icono="<i class='fas fa-tint'></i>";
                                            descripcion='Lluvia'
                                            break;
                                        case 'Clear':
                                            icono="<i class='fas fa-sun'></i>";
                                            descripcion='Despejado'
                                            break;
                                        case 'Snow':
                                            icono="<i class='fas fa-snowflake'></i>";
                                            descripcion='Nieve'
                                            break;
                                }
                                var iconos=document.getElementsByClassName('diasIcono')
                                    for(r=0;r<1;r++){
                                        iconos[c].innerHTML=icono
                                    } 
                                    for(r=0;r<iconos.length;r++){
                                        iconos[r].classList.add('fa-2x')
                                    }
                                    var descrip=document.getElementsByClassName('diasDescrip')
                                    for(r=0;r<1;r++){
                                        descrip[c].innerHTML=descripcion
                                    }   
                            }

                            
                            temperatura=datosTiempo[0].main.temp
                          
                            temperatura=parseInt(eval(main.temp)-273);
                            var temperaturas=document.getElementsByClassName('diasTemp')
                                    for(r=0;r<1;r++){
                                        temperaturas[c].innerHTML=temperatura+"º";
                                    }   
                              
                            }
                            
                    })

                    .catch(function(error){
                        alert(error)
                    })
                   
}  
$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:4
        },
       
        300:{
            items:3
        },
        1000:{
            items:3
        },
        1500:{
            items:4
        }
    }
})           

    </script>
  
</body>
</html>