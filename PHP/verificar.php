<?php
session_start();
if(isset($_SESSION['admin'])){
   // echo 'Bienvenido'.$_SESSION['admin'];  
    header('Location:../HTML/index.php');  
    //echo json_encode('true');
}else{
   // echo ('registrese');
}
?>