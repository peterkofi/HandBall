<?php
include("_head.php");
var_dump($_SESSION);
        $sql= " UPDATE agent set etat=0 where id =".$_SESSION["IdAgent"];
        $ModificationAgent= $agents->AgentUpdate($sql);
           session_destroy();
      if( $ModificationAgent){
               header("Location:../index.php");
      }
      
      
   
    
?>