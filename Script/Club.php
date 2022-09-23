<?php

include("_head.php");

if(isset($_POST["enregistrer"])){

    $NomClub = $_POST["NomClub"];
    $PresidentClub = $_POST["PresidentClub"];
    $DateCreationClub = $_POST["DateCreationClub"];
    $LigueAthlete = $_POST["LigueAthlete"];
    $ProvinceAthlete = $_POST["ProvinceAthlete"];

    

    $erreur=[];  

    $extPossible = array("jpeg", "jpg", "png");

    $nomFichierPhotoClub = $_FILES["PhotoClub"]["name"];
    $typeFichierPhotoClub = $_FILES["PhotoClub"]["type"];
    $sizeFichierPhotoClub = $_FILES["PhotoClub"]["size"];
    $tmp_namePhotoClub = $_FILES["PhotoClub"]["tmp_name"];
    $ErreurPhotoClub = $_FILES["PhotoClub"]["error"];

    $extFichierPhotoClub = explode(".", $nomFichierPhotoClub);
    $extFichierPhotoClubActuelle = strtolower(end($extFichierPhotoClub));

    $NomDelaPhotoClubAcutuel = uniqid("", true) . "." . $extFichierPhotoClubActuelle;

    $dossierClubComplet = "../images/Club/" . $NomDelaPhotoClubAcutuel;

    move_uploaded_file($tmp_namePhotoClub, $dossierClubComplet);
 
//fichier Club
if (!empty($_FILES["photoClub"]["name"])) {

    if (!in_array($extFichierPhotoClubActuelle, $extPossible)) {
        $erreur["photoClub"] = "Type photo du Club n'est pas permis ";
    }

    if ($ErreurPhotoClub != 0) {
        $erreur["SauvegardePhotoClub"] = "erreur lors de l'enregistrement de la photo de Club ";
    }
    if ($sizeFichierPhotoClub > 8000000) {
        $erreur["TaillePhotoClub"] = " la taille de la photo de Club est trop lourd ";
    }
    
} else {
    $erreur["photoClub"] = "veillez inserer la photo de Club ";
}
  

    if(empty($NomClub)){
        $erreur["NomClub"]= "veillez inserer le nom du club ";
    }
    if(empty($PresidentClub)){
        $erreur["PresidentClub"]= "veillez inserer le nom du president du club ";
    }
    if(empty($DateCreationClub)){
        $erreur["DateCreationClub"]= "veillez inserer la date de creation du club ";
    }
    if(empty($LigueAthlete)){
        $erreur["LigueAthlete"]= "veillez inserer la ligue du club ";
    }
    if(empty($ProvinceAthlete)){
        $erreur["ProvinceAthlete"]= "veillez inserer la province du club ";
    }

    
 
    if (!empty($erreur)) {

        header("Location:../Club.php?Erreur=1");
  
    }else{


        $club->ClubRegistration($NomClub,$NomDelaPhotoClubAcutuel,$DateCreationClub,$PresidentClub,$LigueAthlete,$ProvinceAthlete);

        if ($club) {
            header("Location:../Club.php?message=Succes&club=$NomClub");
        } else header("Location:../Club.php?message=Echec");
   
    }

 }