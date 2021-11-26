
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
echo "<script> alert('El usuario ya se encuentra registrado.');
          window.location= '../HTML/login.html'; </script>"; 
   
}else if($resultadoem){
    echo"<script>alert('El email ya se encuentra registrado.');
    window.location='../HTML/login.html'; </script>";
}else{
    if($_POST){
 $agregar = 'INSERT into usuario (nombre_usuario, contrasena, email) values (?,?,?)'  ;
 $sql_agregar = $pdo->prepare($agregar);
 $sql_agregar->execute(array($usuario_nom,$contra,$email));
 echo"<script>alert('Registro exitoso.');
window.location='../HTML/login.html'; </script>";
 
}
}
