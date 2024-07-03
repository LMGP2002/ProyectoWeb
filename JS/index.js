
const $inicioS = document.getElementById('inicioS');
const $ocultarBtn = document.getElementById('ocultarBtn');
const $uneteBtn = document.getElementById('uneteBtn');
console.log($inicioS);
console.log($ocultarBtn);
console.log($uneteBtn);

$inicioS.addEventListener('click',()=>{
fetch('../PHP/verificar.php',{
    method: 'POST'
})
.then( res => res.json())
.then( data => {
    console.log(data)
    if(data ==='true'){
    $ocultarBtn.style.display='none';
                 
    }else{
    resu.innerHTML = `   <div>
      ${data}
    </div>`
        
    }
})
})
