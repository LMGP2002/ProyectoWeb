window.onbeforeunload = function () {
    window.scrollTo(0,0);
}

document.addEventListener('scroll',()=>{
    let nav=document.querySelector('.nav');
    console.log(nav);
    let scroll_position=window.scrollY;
    console.log(scroll_position);
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
        }, 340, function(){
          window.location.hash = hash;
        });
      } 
    });
  });
