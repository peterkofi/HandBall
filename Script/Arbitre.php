<?php

include("_head.php");

if(isset($_POST["enregistrer"])){

    // var_dump($_POST);
    // exit();

    // 'NomArbitre' => string '' (length=0)
    // 'PostnomArbitre' => string '' (length=0)
    // 'PrenomArbitre' => string '' (length=0)
    // 'CertificationArbitre' => string '' (length=0)
    // 'LieuNaissanceArbitre' => string '' (length=0)
    // 'DateNaissanceArbitre' => string '' (length=0)
    // 'LigueArbitre' => string '2' (length=1)
    // 'enregistrer' => string '' (length=0)

    $NomArbitre = $_POST["NomArbitre"];
    $PostnomArbitre = $_POST["PostnomArbitre"];
    $PrenomArbitre = $_POST["PrenomArbitre"];
    $CertificationArbitre = $_POST["CertificationArbitre"];
    $LieuNaissanceArbitre = $_POST["LieuNaissanceArbitre"];
    $DateNaissanceArbitre = $_POST["DateNaissanceArbitre"];
    $LigueArbitre =(int) $_POST["LigueArbitre"];

    $erreur = array();

    if(empty($NomArbitre)){
        $erreur["NomArbitre"]= "veillez inserer le nom de l'athlete ";
    }
    if(empty($PostnomArbitre)){
        $erreur["PostnomArbitre"]= "veillez inserer le Prenom de l'athlete ";
    }
    if(empty($PrenomArbitre)){
        $erreur["PrenomArbitre"]= "veillez inserer l'email de l'athlete ";
    }
    if(empty($CertificationArbitre)){
        $erreur["CertificationArbitre"]= "veillez inserer l'email de l'athlete ";
    }
    if(empty($DateNaissanceArbitre)){
        $erreur["DateNaissanceArbitre"]= "veillez inserer le mot de passe de l'athlete ";
    }
    if(empty($LieuNaissanceArbitre)){
        $erreur["LieuNaissanceArbitre"]= "veillez inserer le mot de passe de l'athlete ";
    }
    if(empty($LigueArbitre)){
        $erreur["LigueArbitre"]= "veillez inserer le mot de passe de l'athlete ";
    }
   
    if (!empty($erreur)) {

        header("Location:../Athlete.php?Erreur=1");
  
    }else{

        $arbitre->ArbitreRegistration($NomArbitre,$PostnomArbitre,$PrenomArbitre,$LieuNaissanceArbitre,$DateNaissanceArbitre,$CertificationArbitre,$LigueArbitre);
          
        if ($arbitre) {

            $noms= $PrenomArbitre ." ".$NomArbitre;
            header("Location:../Arbitre.php?message=Succes&user=$noms");
        } else header("Location:../Arbitre.php?message=Echec");
   
    }

 }