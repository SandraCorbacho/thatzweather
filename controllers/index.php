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
<script>alert('codigo postal incorrecto')</script>
</head>

<body class='bg fuente'>
    <div class='container-fluid '>
        <div class='row'>
            <div class='col-12 centrar' id='titulo'>
                 <img src='../img/ThatzWeather.png'>
            </div>  
        </div>
        <div class='row'>
            <div class='col-12'>
                <div class='row centrar' id='parrafo1'>
                    <div id='caja2' class='col-4 '>
                     <p>Enteráte del tiempo en la zona exacta que te interesa buscando por código postal</p>
                    </div>
                </div>
                <div class='row centrar'>
                    <form method="POST" action='resumenTiempo.php'>
                            <div class='col-12'>
                                <input class='tamano' id='Postal'  type='number' name='codigoPostal' placeholder="Introduce el código Postal" required>
                            </div>
                            <div id='boton' class='col-12'>
                                <input id='consulta' class='tamano consultar' type='submit' value='Consultar'>  
                            </div>
                            <img class='posicion' src='../img/shape.png'>
                    </form>
                </div>
                <div class='row centrar'>
                    <div class='col-6 lluvia'>
                        <p>¡Que la lluvia no te pare!</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>