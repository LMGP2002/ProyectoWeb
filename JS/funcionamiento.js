function imc() {
    var pes = document.getElementById("pesoo").value;
    var al = document.getElementById("estaturaa").value;
    var resultado = parseFloat(pes) / Math.pow(parseFloat(al), 2);
    resultado = resultado.toFixed(2);
    if (al > 2 || al < 0) {
        document.getElementById('res').value = `La altura ingresada no es válida`;
    } else if (pes == '' || al == '') {
        document.getElementById('res').value = `Campos vacíos`;
    } else {
        document.getElementById('res').value = `Tu índice de masa corporal es ${resultado} `;
    }
}
function validarNeg(e){
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key);
    numeros = "0123456789";
    especiales = [8, 37, 38, 46];
    tecladoEspecial = false;
    for (item of especiales) {
        if (key == item) {           
                tecladoEspecial = true;            
        }
    }
    if (numeros.indexOf(teclado) == -1 && !tecladoEspecial) {
        return false;
    }
}


function meta() {
    var sex = document.getElementById("sex").value;
    var pes = document.getElementById("pes").value;
    var esta = document.getElementById("esta").value;
    var ed = document.getElementById("ed").value;
    var r = (10 * pes) + (6.25 * esta) - (5 * ed);

    if (sex == '' || pes == '' || esta == '' || ed == '' ) {
        document.getElementById('resmeta').value = `Campos vacíos`;
    }else if(esta>210){
        document.getElementById('resmeta').value = `Estatura inválida`;                
    }else if (sex === "mujer") {
        var to = r - 161;
        document.getElementById('resmeta').value = `Tu metabolismo basal es ${to} `;
    } else if (sex == "hombre") {
        var to = r + 5;
        document.getElementById('resmeta').value = `Tu metabolismo basal es ${to} `;
    } else {
        document.getElementById('resmeta').value = `Sexo incorrecto`;
    }
}

function soloNumeros(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key);
    numeros = "0123456789";
    especiales = [8, 37, 38, 46];
    tecladoEspecial = false;
    for (item of especiales) {
        if (key == item) {
            if (teclado != '%' && teclado != '&' && teclado != '.' ) {
                tecladoEspecial = true;
            }
        }
    }
    if (numeros.indexOf(teclado) == -1 && !tecladoEspecial) {
        return false;
    }
}