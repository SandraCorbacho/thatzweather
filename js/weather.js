var main;
var nombre;
var wind;
var coord;
var temperatura;
var registro;
var hora1=[];
var temperatura1=[];
 var icono1=[];
 var temperaturasDias=[];
window.onload=function(){
    var codigoPostal=document.getElementById('codigoBusqueda').value;
    var codigoEspana=parseInt(codigoPostal.substr(0,2));
    if(codigoPostal.length<5||codigoEspana>52||codigoPostal==null){
        window.location="index.php";
    }else{
        llamadaApi(codigoPostal)
    }
    document.getElementById('lupaBuscador').addEventListener('click',Api)
}
function Api(){
    var codigo=document.getElementById('codigoBusqueda').value
    llamadaApi(codigo)
}
function llamadaApi(codigoPostal){
    console.log(typeof(codigoPostal))
    var weatherURL = "http://api.openweathermap.org/data/2.5/weather?zip="+codigoPostal+",es&appid=1ebe8fb6c5d2654d9ceb6e243540f115&lang= es"
    fetch(weatherURL)
        .then(function(respuesta){
            if(respuesta.ok){
                return respuesta.json();
            }else{
                //window.location="index.php";
                throw "codigo postal incorrecto ";
            }                    
        })
        .then(function(datos){
        
            var pais=datos.sys.country
            var tiempo=datos.weather
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
            llamadaApiHora(codigoPostal) 
            registro= new FormData;
            registro.append('nombre',nombre)
            registro.append('temperatura',temperatura)
            registro.append('main',main)
            registro.append('wind',wind)
            registro.append('codigoPostal',codigoPostal)
        })

        .catch(function(error){
            alert(error)
        })
}

function llamadaApiHora(codigoPostal){
    codigoPostal=document.getElementById('codigoBusqueda').value
    var weatherURL = "http://api.openweathermap.org/data/2.5/forecast?zip="+codigoPostal+",es&appid=e7aad011f924cc369b24b3ab685b021a"               
    fetch(weatherURL)
        .then(function(respuesta){
            if(respuesta.ok){
                return respuesta.json();
            }else{
                //window.location="index.php";
                throw "código Postal incorrecto 2";
            }                    
        })
        .then(function(datos){
            temperaturasDias=[]
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
                temperaturasDias.push(temperatura)
                var temperaturas=document.getElementsByClassName('diasTemp')
                for(r=0;r<1;r++){
                    temperaturas[c].innerHTML=temperatura+"º";
                            
                }    
            }
            registro.append('temp2',temperaturasDias[1])
            registro.append('temp3',temperaturasDias[2])
            registro.append('temp4',temperaturasDias[3])
            registro.append('temp5',temperaturasDias[4])
            fetch('guardarDatos.php',{
                method:'POST',
                body:registro
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
                            
        })

        .catch(function(error){
            alert(error)
        })             
}  

         
