const $loginBtn = document.querySelector('#login_btn');
const $signUp = document.querySelector('#signUp_btn');
const $container = document.querySelector('.container');


$signUp.addEventListener('click',()=>{
    $container.classList.add('signUp_mode');
});
$loginBtn.addEventListener('click',()=>{
    $container.classList.remove('signUp_mode');
});
