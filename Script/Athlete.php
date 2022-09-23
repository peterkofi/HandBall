<?php

include("_head.php");

if(isset($_POST["enregistrer"])){

    // var_dump($_POST);
    // exit();

    // 'NomAthlete' => string 'kofi' (length=4)
    // 'PrenomAthlete' => string 'peter' (length=5)
    // 'LieuNaissanceAthlete' => string 'kin' (length=3)
    // 'DateNaissanceAthlete' => string '2022-09-01' (length=10)
    // 'tailleAthlete' => string 'peterkofi74@gmail.com' (length=21)
    // 'posteAthlete' => string '3' (length=1)
    // 'poidAthlete' => string '80' (length=2)
    // 'sexeAthlete' => string 'm' (length=1)
    // 'ClubAthlete' => string '3' (length=1)

    $NomAthlete = $_POST["NomAthlete"];
    $PrenomAthlete = $_POST["PrenomAthlete"];
    $LieuNaissanceAthlete = $_POST["LieuNaissanceAthlete"];
    $DateNaissanceAthlete = $_POST["DateNaissanceAthlete"];
    $tailleAthlete =(int) $_POST["tailleAthlete"];
    $posteAthlete =(int) $_POST["posteAthlete"];
    $poidAthlete =(int) $_POST["poidAthlete"];
    $sexeAthlete = $_POST["sexeAthlete"];
    $ClubAthlete =(int) $_POST["ClubAthlete"];



$erreur = array();

    if(empty($NomAthlete)){
        $erreur["NomAthlete"]= "veillez inserer le nom de l'athlete ";
    }
    if(empty($PrenomAthlete)){
        $erreur["PrenomAthlete"]= "veillez inserer le Prenom de l'athlete ";
    }
    if(empty($LieuNaissanceAthlete)){
        $erreur["LieuNaissanceAthlete"]= "veillez inserer l'email de l'athlete ";
    }
    if(empty($DateNaissanceAthlete)){
        $erreur["DateNaissanceAthlete"]= "veillez inserer le mot de passe de l'athlete ";
    }
    if(empty($tailleAthlete)){
        $erreur["tailleAthlete"]= "veillez inserer le mot de passe de l'athlete ";
    }
    if(empty($posteAthlete)){
        $erreur["posteAthlete"]= "veillez inserer le mot de passe de l'athlete ";
    }
    if(empty($poidAthlete)){
        $erreur["poidAthlete"]= "veillez inserer le mot de passe de l'athlete ";
    }
    if(empty($sexeAthlete)){
        $erreur["sexeAthlete"]= "veillez inserer le mot de passe de l'athlete ";
    }
    if(empty($ClubAthlete)){
        $erreur["ClubAthlete"]= "veillez inserer le mot de passe de l'athlete ";
    }
 
    if (!empty($erreur)) {

        header("Location:../Athlete.php?Erreur=1");
  
    }else{

        $Athlete->AthleteRegistration($NomAthlete,$PrenomAthlete,$SexeAthlete,$DateNaissanceAthlete,$LieuNaissanceAthlete,$posteAthlete,$poidAthlete,$tailleAthlete,$ClubAthlete);  
     
        if ($Athlete) {

            $noms= $PrenomAthlete ." ".$NomAthlete;
            header("Location:../Athlete.php?message=Succes&user=$noms");
        } else header("Location:../Athlete.php?message=Echec");
   
    }

 }