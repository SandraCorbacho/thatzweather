window.onload=function(){
    this.document.getElementById('consulta').addEventListener('click',consultaTiempo);
}
function consultaTiempo(){
   var codigoPostal=document.getElementById('codigoPostal').value
    espanol=codigoPostal.substr(0,2);
   
    if((espanol>=01&&espanol<=52)&&codigoPostal.length==5){
        window.location(resumenTiempo.php)
    }
    else{
        alert('introduce un códgo postal español y/o válido')
    }
}