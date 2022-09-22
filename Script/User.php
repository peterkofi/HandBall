<?php

include("_head.php");

if(isset($_POST["enregistrer"])){


$NomUtilisateur = $_POST["NomUtilisateur"];
$PrenomUtilisateur = $_POST["PrenomUtilisateur"];
$EmailUtilisateur = $_POST["EmailUtilisateur"];
$PassWordUtilisateur = $_POST["PassWordUtilisateur"];
$FonctionUtilisateur = $_POST["FonctionUtilisateur"];



$erreur = array();

    if(empty($NomUtilisateur)){
        $erreur["NomUtilisateur"]= "veillez inserer le nom de l'utilisateur ";
    }
    if(empty($PrenomUtilisateur)){
        $erreur["PrenomUtilisateur"]= "veillez inserer le Prenom de l'utilisateur ";
    }
    if(empty($EmailUtilisateur)){
        $erreur["EmailUtilisateur"]= "veillez inserer l'email de l'utilisateur ";
    }
    if(empty($PassWordUtilisateur)){
        $erreur["PassWordUtilisateur"]= "veillez inserer le mot de passe de l'utilisateur ";
    }
 
    if (!empty($erreur)) {

        header("Location:../utilisateur.php?Erreur=1");
  
    }else{

        $user->UserRegistration($PrenomUtilisateur,$NomUtilisateur,$EmailUtilisateur,$PassWordUtilisateur,$FonctionUtilisateur);

        if ($user) {

            $noms= $PrenomUtilisateur ." ".$NomUtilisateur;
            header("Location:../utilisateur.php?message=Succes&user=$noms");
        } else header("Location:../utilisateur.php?message=Echec");
   
    }

 }