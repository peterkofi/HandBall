<?php

include("_head.php");

if(isset($_POST["enregistrer"])){

$NomAthlete = $_POST["NomAthlete"];
$PrenomAthlete = $_POST["PrenomAthlete"];
$LieuNaissanceAthlete = $_POST["LieuNaissanceAthlete"];
$DateNaissanceAthlete = $_POST["DateNaissanceAthlete"];
$tailleAthlete = $_POST["tailleAthlete"];
$posteAthlete = $_POST["posteAthlete"];
$poidAthlete = $_POST["poidAthlete"];
$sexeAthlete = $_POST["sexeAthlete"];
$ClubAthlete = $_POST["ClubAthlete"];



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
    if(empty($ProvinceAthlete)){
        $erreur["ProvinceAthlete"]= "veillez inserer le mot de passe de l'athlete ";
    }
    if(empty($LigueAthlete)){
        $erreur["LigueAthlete"]= "veillez inserer le mot de passe de l'athlete ";
    }
    if(empty($ClubAthlete)){
        $erreur["ClubAthlete"]= "veillez inserer le mot de passe de l'athlete ";
    }
 
    if (!empty($erreur)) {

        header("Location:../Athlete.php?Erreur=1");
  
    }else{
        $Athlete->AthleteRegistration($NomAthlete,$PrenomAthlete,$SexeAthlete,$DateNaissanceAthlete,$LieuNaissanceAthlete,$posteAthlete,$poidAthlete,$tailleAthlete,$LigueAthlete);  
     
        if ($Athlete) {

            $noms= $PrenomAthlete ." ".$NomAthlete;
            header("Location:../utilisateur.php?message=Succes&user=$noms");
        } else header("Location:../utilisateur.php?message=Echec");
   
    }

 }