function imc(){
    var pes = document.getElementById("pesoo").value;
    var al = document.getElementById("estaturaa").value;
    var resultado = parseFloat(pes) / Math.pow(parseFloat(al), 2);
    resultado = resultado.toFixed(1);
    document.getElementById('res').value=`Su índice de masa corporal es ${resultado} `;
  
}