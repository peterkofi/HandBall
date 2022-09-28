<?php

include("_head.php");

if(isset($_POST["enregistrer"])){

    // var_dump($_POST);
    // exit();

    // 'FontionCarteService' => string '' (length=0)
    // 'Agent' => string '10' (length=2)
    // 'Ligue' => string '2' (length=1)
    // 'ClubAthlete' => string '1' (length=1)
    // 'enregistrer' => string '' (length=0)

    $FontionCarteService = $_POST["FontionCarteService"];
    $Agent = (int)$_POST["Agent"];
    $Ligue =(int) $_POST["Ligue"];
    $Arbitre =(int) $_POST["Arbitre"];

    
   
    $erreur = array();

    if(empty($FontionCarteService)){
        $erreur["FontionCarteService"]= "veillez inserer le nom de l'athlete ";
    }
    if(empty($Agent)){
        $erreur["Agent"]= "veillez inserer le Prenom de l'athlete ";
    }
    if(empty($Ligue)){
        $erreur["Ligue"]= "veillez inserer l'email de l'athlete ";
    }
    if(empty($Arbitre)){
        $erreur["Arbitre"]= "veillez inserer l'email de l'athlete ";
    }
   
    if (!empty($erreur)) {

        header("Location:../Athlete.php?Erreur=1");
  
    }else{

        $carteService->CarteserviceRegistration($FontionCarteService,$Agent,$Ligue,$Arbitre);
          
        if ($carteService) {

            header("Location:../CarteService.php?message=Succes");
        } else header("Location:../CarteService.php?message=Echec");
   
    }

 }