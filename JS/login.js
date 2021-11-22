const $loginBtn = document.querySelector('#login_btn');
const $signUp = document.querySelector('#signUp_btn');
const $container = document.querySelector('.container');
let idUsuario = null;

$signUp.addEventListener('click',()=>{
    $container.classList.add('signUp_mode');
});
$loginBtn.addEventListener('click',()=>{
    $container.classList.remove('signUp_mode');
});

$(document).ready(function (usuario) {
    consultarDatosUsuario();

    $('#registro_usuario').submit(function (e) {
        e.preventDefault();
        const usuario = {
            nombre_usuario: $('#nombre_usuario').val(),
            contrasena: $('#contraseña').val(),
            email: $('#email').val(),           
        };
        if (!idUsuario) {
            registarUsuario(usuario);
        } else {
            alert('se va a modificar');
        }
        
    });
    
});
    

function consultarDatosUsuario() {
    $.ajax({
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        url: 'http://localhost:8000/registro',
        type: 'GET',
        success: function (response) {
            const dataResponse = JSON.parse(response);
            loadDatUsuario(dataResponse.data);
        },
        error: function (errorMsg) {
            console.error(errorMsg);
        },
        complete: function () {
            console.log('Consumo realizado');
        }
    });
}

function registarUsuario(dataUsuario) {
    $.ajax({
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        url: 'http://localhost:8000/registro',
        type: 'POST',
        data: JSON.stringify(dataUsuario),
        success: function (response) {
            consultarDatosUsuario();
            $('#nombre_usuario').val('');
            $('#email').val('');
            $('#contraseña').val('');
            alert('Usuario registrado');
        },
        error: function (errorMsg) {
            console.error(errorMsg);
            alert('Usuario no registrado');
        },
        complete: function () {
            console.log('Consumo realizado');         
        }
      });
    
}

