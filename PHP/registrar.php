<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Recursos/Plugins/dist/sweetalert2.min.css">
</head>
<body>
<script src="../Recursos/Plugins/dist/sweetalert2.all.min.js"></script>

</body>
</html>
<?php 
include_once 'conexion.php';
$usuario_nom = $_POST['nombre_usuario'];
$contra = $_POST['contraseña'];
$email = $_POST['email'];
$contra = password_hash($contra, PASSWORD_DEFAULT);


$sql = 'SELECT * FROM usuario where nombre_usuario=?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_nom));
$resultado= $sentencia->fetchAll();

$sqlem = 'SELECT * FROM usuario where email=?';
$sentenciaem = $pdo->prepare($sqlem);
$sentenciaem->execute(array($email));
$resultadoem= $sentenciaem->fetchAll();

if($resultado){ 
    echo "<script>
    Swal.fire({
        title: '¡Ya existe!',
        text: 'El usuario ya se encuentra registrado',
        icon: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#F75C3A',
        confirmButtonText: 'Aceptar'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location='../HTML/login.html';
        }
      })
    </script>";
   
}else if($resultadoem){
    echo "<script>
    Swal.fire({
        title: '¡Ya existe!',
        text: 'El email ya se encuentra registrado',
        icon: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#F75C3A',
        confirmButtonText: 'Aceptar'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location='../HTML/login.html';
        }
      })
    </script>";
}else{
    if($_POST){
 $agregar = 'INSERT into usuario (nombre_usuario, contrasena, email) values (?,?,?)'  ;
 $sql_agregar = $pdo->prepare($agregar);
 $sql_agregar->execute(array($usuario_nom,$contra,$email));
 echo "<script>
    Swal.fire({
        title: '¡Exitoso!',
        text: 'Registro exitoso',
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#5DF139',
        confirmButtonText: 'Aceptar'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location='../HTML/login.html';
        }
      })
    </script>";
 
}
}
