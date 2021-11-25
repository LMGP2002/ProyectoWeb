<?php
session_start();
include_once 'conexion.php';
$usuario_nom = $_POST['nombre_usuarioo'];
$contra = $_POST['contraseñaa'];

$sql = 'SELECT * FROM usuario where nombre_usuario=? ';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_nom));
$resultado= $sentencia->fetch();

if(!$resultado){
    echo"<script>alert('El usuario no existe.');</script>";
    header('Location: ../HTML/login.html');
    die();
}

if(password_verify($contra, $resultado['contrasena'])){
$_SESSION['admin']=$usuario_nom;
header('Location: ../PHP/verificar.php');
}else{ 
    echo"<script>alert('Las contraseñas no son iguales');</script>";   
    header('Location: ../HTML/login.html');
}
?>