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
        }, 330, function(){
          window.location.hash = hash;
        });
      } 
    });
  });

//MODAL USERS
let cerrar=document.querySelector(".close");
let abrir=document.querySelector(".modal_users");
let modal=document.querySelector(".modal_content");
let modalC=document.querySelector(".modal_container");

abrir.addEventListener('click',(e)=>{
    e.preventDefault();
    modalC.style.visibility='visible';
    modal.classList.remove('modal_close');
});
function close(){
    modal.classList.add('modal_close');
    setTimeout(function(){
        modalC.style.visibility='hidden';
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