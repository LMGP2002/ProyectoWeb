<?php
session_start();
if(isset($_SESSION['admin']) || $_SESSION['ids']){
   echo 'Bienvenido'.$_SESSION['admin'];  
  
    //echo json_encode('true');
}else{
   // echo ('registrese');
}
?>