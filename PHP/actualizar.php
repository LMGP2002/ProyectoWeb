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
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$edad = $_GET['edad'];
$peso = $_GET['peso'];
$estatura = $_GET['estatura'];

$id = $_GET['id'];

$sql_editar = "UPDATE usuario set nombre=?, apellido=?, edad=?, peso=?, estatura=? where id=?";
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar->execute(array($nombre,$apellido,$edad,$peso,$estatura,$id));
echo "<script>
Swal.fire({
    title: '¡Exitoso!',
    text: 'Datos actualizados',
    icon: 'success',
    showCancelButton: false,
    confirmButtonColor: '#5DF139',
    confirmButtonText: 'Aceptar'
  }).then((result) => {
    if (result.isConfirmed) {
        window.location='../HTML/index.php';
    }
  })
</script>";