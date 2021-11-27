<?php
include_once 'conexion.php';
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$edad = $_GET['edad'];
$peso = $_GET['peso'];
$estatura = $_GET['estatura'];

$id = $_GET['id'];

$sql_editar = "UPDATE usuario set nombre=?, apellido=?, edad=?, peso=?, estatura=? where id=?";
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar->execute(array($nombre,$apellido,$edad,$peso,$estatura,$id));
echo"<script>alert('Usuario actualizado.');
window.location='../HTML/index.php'; </script>";