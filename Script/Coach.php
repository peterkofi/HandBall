<?php

include("_head.php");


if(isset($_POST["enregistrer"])){

    $NomCoach = $_POST["NomCoach"];
    $PrenomCoach = $_POST["PrenomCoach"];
    $LieuNaissanceCoach = $_POST["LieuNaissanceCoach"];
    $DateNaissanceCoach = $_POST["DateNaissanceCoach"];
    $sexeCoach = $_POST["sexeCoach"];
    $ClubCoach =(int) $_POST["ClubCoach"];

    $erreur=[];  
  
    // champ formulaire

    if(empty($NomCoach)){
        $erreur["NomCoach"]= "veillez inserer le nom du coach ";
    }
    if(empty($PrenomCoach)){
        $erreur["PrenomCoach"]= "veillez inserer le prenom du coach ";
    }
    if(empty($LieuNaissanceCoach)){
        $erreur["LieuNaissanceCoach"]= "veillez inserer le lieu de naissance du coach ";
    }
    if(empty($DateNaissanceCoach)){
        $erreur["DateNaissanceCoach"]= "veillez inserer la date de naissance du coach ";
    }
    if(empty($sexeCoach)){
        $erreur["sexeCoach"]= "veillez inserer le sexe  du coach ";
    }
    if(empty($ClubCoach)){
        $erreur["ClubCoach"]= "veillez inserer le club du coach ";
    }
 
    if (!empty($erreur)) {

        header("Location:../Coach.php?Erreur=1");
  
    }else{

        $coach->CoachRegistration($NomCoach,$PrenomCoach,$sexeCoach,$DateNaissanceCoach,$LieuNaissanceCoach,$ClubCoach);

        if ($coach) {
            header("Location:../Coach.php?message=Succes&Ligue=$insertionLigue");
        } else header("Location:../Coach.php?message=Echec");
   
    }

 }


 if(isset($_GET["operation"]) ){

    if($_GET["operation"]=="supp"){
      
        $id=(int) $_GET["id"];

        $coach = $coach-> DeleteCoach($id);
    
        if ($coach) {
            header("Location:../Coach.php?message=Succes");
        } else header("Location:../Coach.php?message=Echec");
    }
}