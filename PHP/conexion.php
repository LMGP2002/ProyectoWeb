<?php
$usuario = 'root';
$pass = '';
try {
    $pdo = new PDO('mysql:host=localhost;dbname=hardwork', $usuario, $pass);
 } catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>



