window.onbeforeunload = function () {
    window.scrollTo(0,0);
}

document.addEventListener('scroll',()=>{
    let nav=document.querySelector('.nav');
    let scroll_position=window.scrollY;
    if(scroll_position>140){
        nav.style.backgroundColor='#222';
    }else nav.style.backgroundColor='transparent';

});

// código para el Smooth Scroll
$(document).ready(function(){
    $("a").on('click', function(event) {
      if (this.hash !== "") {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 500, function(){
          window.location.hash = hash;
        });
      } 
    });
  });

//MODAL USERS
const cerrar=document.querySelector(".close");
const abrir=document.querySelector(".modal_users");
const modal=document.querySelector(".modal_content");
const modalC=document.querySelector(".modal_container");

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

//MODAL PLANES
const modalP=document.querySelector(".planes_modal_content");
const modalCP=document.querySelector(".planes_modal");
const fondoModalP=document.querySelector(".left_column");
const duracionPlan=document.querySelector("#duracion");
const descripcionPlan=document.querySelector("#descripcion_plan");

document.querySelectorAll('.abrir_modal').forEach((item,index)=> {
  item.addEventListener('click', e => {
    e.preventDefault();
    fondoModalP.style.backgroundImage=`url('../Recursos/card${index}.jpg')`;
    switch (index) {
      case 0:
        duracionPlan.innerText='1 mes';
        descripcionPlan.innerText='Plan de entrenamiento intenso e instructor personalizado durante un mes.';
        break;
      case 1:
        duracionPlan.innerText='3 meses';
        descripcionPlan.innerText='Plan de entrenamiento intenso e instructor personalizado durante tres mes.';
        break;
      case 2:
        duracionPlan.innerText='6 meses';
        descripcionPlan.innerText='Plan de entrenamiento, instructor personalizado, dieta estructurada durante seis meses.';
        break;
      case 3:
        duracionPlan.innerText='12 meses';
        descripcionPlan.innerText='Un año de rutinas variables, dieta flexible, instructor personalizado y material audiovisual de ejercicios.';
        break;
    }
    modalCP.style.visibility='visible';
    modalP.classList.remove('close_modal_planes');
  })
});
window.addEventListener('click',(e)=>{
  if(e.target==modalCP){
      close();
  }
});
