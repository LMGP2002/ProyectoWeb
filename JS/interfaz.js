const comprarBtn = document.querySelector('#comprarBtn');
const modalUser = document.querySelector('#modalUser');
const modificarBtn = document.querySelector('#modificarBtn');
const ocultarBtn = document.querySelector('#ocultarBtn');
const bandera = document.querySelector('#bandera');
let session = bandera.getAttribute('data-description');
//MODAL USERS
const cerrar=document.querySelector(".close");
const abrir=document.querySelector(".modal_users");
const modal=document.querySelector(".modal_content");
const modalC=document.querySelector(".modal_container");
//PLANES
let category="";
let objetos=document.querySelectorAll(".card");
console.log(objetos);
objetos.forEach((item,index)=>{  
    item.addEventListener('click', ()=>{
        switch(index){
            case 0:
                category=item.getAttribute('data-category');
                comprarBtn.setAttribute('data-category',category);
                break;
            case 1:
                category=item.getAttribute('data-category');
                comprarBtn.setAttribute('data-category',category);
                break;
            case 2:
                category=item.getAttribute('data-category');
                comprarBtn.setAttribute('data-category',category);
                break;
            case 3:
                category=item.getAttribute('data-category');
                comprarBtn.setAttribute('data-category',category);
                break;
        }
    })
});

comprarBtn.addEventListener('click',()=>{
if(session!="Vacío"){
    document.querySelector('#tittle').innerHTML=comprarBtn.getAttribute('data-category');
    let data=new FormData();
    data.append('nomPlan',comprarBtn.getAttribute('data-category'));
    data.append('id',comprarBtn.getAttribute('data-id'));
  

    fetch('../PHP/plan.php',{
        method:'POST',
        body: data
    })
    .then(function(response){
        if(response.ok){
           return response.text(); 
        }else{
            throw "error";
        }
    })
    .then(function(texto){
        console.log(texto);
    })
    .catch(function(error){
        console.log(error);
    });
}
})

if(session=="Vacío"){
    comprarBtn.setAttribute('href','../HTML/login.html');
    comprarBtn.removeAttribute('data-id');
    modalUser.setAttribute('href','../HTML/login.html');
}else{
    ocultarBtn.style.display="none";
    modificarBtn.setAttribute('href','#plans');
    modificarBtn.innerHTML= "Adquirir";

//MODAL USERS
abrir.addEventListener('click',(e)=>{
    e.preventDefault();
    modalC.style.visibility='visible';
    modal.classList.remove('modal_close');
});
function close(){
    modal.classList.add('modal_close');
    modalP.classList.add('close_modal_planes');
    setTimeout(function(){
        modalC.style.visibility='hidden';
        modalCP.style.visibility='hidden';
    },350);
}
cerrar.addEventListener('click',(e)=>{
    e.preventDefault();
    close();
});

window.addEventListener('click',(e)=>{
    if(e.target==modalC){
        close();
    }
});
}

