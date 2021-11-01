function imc(){
    var pes = document.getElementById("pesoo").value;
    var al = document.getElementById("estaturaa").value;
    var resultado = parseFloat(pes) / Math.pow(parseFloat(al), 2);
    resultado = resultado.toFixed(1);
    document.getElementById('res').value=`Su índice de masa corporal es ${resultado} `;
  
}
function meta(){
    var sex = document.getElementById("sex").value;
    var pes = document.getElementById("pes").value;
    var esta = document.getElementById("esta").value;
    var ed = document.getElementById("ed").value;
    var r = (10*pes)+(6.25*esta)-(5*ed);
    if(sex === "mujer"){
        var to = r - 161;
    }else{
        var to = r + 5;
    }
    document.getElementById('resmeta').value=`Su metabolismo basal es ${to} `;
  
}
function soloNumeros(e){
    key=e.keycode || e.which;
    teclado=String.fromCharCode(key);
    numeros="0123456789";
    especiales=[8,37,38,46];
    tecladoEspecial=false;
    for(item of especiales){
        if(key==item){
            if(teclado!='%'&&teclado!='&'&&teclado!='.'){
                tecladoEspecial=true;
            }
        }
    }
    if(numeros.indexOf(teclado)==-1 &&!tecladoEspecial){
        return false;
    } 
}