   var codigoPostal=document.getElementById('codigoPostal').value
    espanol=codigoPostal.substr(0,2);
   
    if((espanol>=01&&espanol<=52)&&codigoPostal.length==5){
        window.location(resumenTiempo.php)
    }
    else{
        alert('introduce un códgo postal español y/o válido')
    }
    
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
                      console.log(datos)
                        var datos=JSON.parse(datos)
                        console.log(datos)
                    })

                    .catch(function(error){
                        alert(error)
                    })
             
                   

subst