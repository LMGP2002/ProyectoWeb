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
session_start();
include_once 'conexion.php';
$usuario_nom = $_POST['nombre_usuarioo'];
$contra = $_POST['contraseñaa'];

$sql = 'SELECT * FROM usuario where nombre_usuario=? ';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_nom));
$resultado=$sentencia->fetch();

if(!$resultado){
    echo "<script>
    Swal.fire({
        title: 'Usuario inválido',
        text: 'Intente de nuevo',
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
    die();
}
if(password_verify($contra, $resultado['contrasena'])){
$_SESSION['admin']=$usuario_nom;
$_SESSION['id']=$resultado['id'];
echo"<script>
window.location='../HTML/index.php';</script>";
}else{
    echo "<script>
    Swal.fire({
        title: 'Contraseña inválida',
        text: 'Intente de nuevo',
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
}

$id=$resultado['id'];
$sql_planes='SELECT plan from usuario where id=?';
$sentencia = $pdo->prepare($sql_planes);
$sentencia->execute(array($id));
$res = $sentencia->fetch();
$_SESSION['planes']=$res['plan'];

?>