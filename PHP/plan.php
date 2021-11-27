<?php

$a=$_POST['nomPlan'];
$b=$_POST['id'];

include_once 'conexion.php';
$agregar = 'UPDATE usuario set plan=? where id=?';
$sql_agregar = $pdo->prepare($agregar);
$sql_agregar->execute(array($a,$b));

