<?php

include("_head.php");

if(isset($_POST["enregistrer"])){

// var_dump($_POST);
// var_dump($_FILES);
// exit();

    $Coach = (int) $_POST["Coach"];
    $Categorie = $_POST["Categorie"];


    $erreur=[];  

//     $extPossible = array("jpeg", "jpg", "png");

//     $nomFichierPhotoClub = $_FILES["PhotoClub"]["name"];
//     $typeFichierPhotoClub = $_FILES["PhotoClub"]["type"];
//     $sizeFichierPhotoClub = $_FILES["PhotoClub"]["size"];
//     $tmp_namePhotoClub = $_FILES["PhotoClub"]["tmp_name"];
//     $ErreurPhotoClub = $_FILES["PhotoClub"]["error"];

//     $extFichierPhotoClub = explode(".", $nomFichierPhotoClub);
//     $extFichierPhotoClubActuelle = strtolower(end($extFichierPhotoClub));

//     $NomDelaPhotoClubAcutuel = uniqid("", true) . "." . $extFichierPhotoClubActuelle;

//     $dossierClubComplet = "../images/Club/" . $NomDelaPhotoClubAcutuel;

//     move_uploaded_file($tmp_namePhotoClub, $dossierClubComplet);
 
// //fichier Club
// if (isset($nomFichierPhotoClub)) {

//     if (!in_array($extFichierPhotoClubActuelle, $extPossible)) {
//         $erreur["photoClub"] = "Type photo du Club n'est pas permis ";
//     }

//     if ($ErreurPhotoClub != 0) {
//         $erreur["SauvegardePhotoClub"] = "erreur lors de l'enregistrement de la photo de Club ";
//     }
//     // if ($sizeFichierPhotoClub > 8000000) {
//     //     $erreur["TaillePhotoClub"] = " la taille de la photo de Club est trop lourd ";
//     // }
    
// } else {
//     $erreur["photoClub"] = "veillez inserer la photo de Club ";
// }
  
    if(empty($Athlete)){
        $erreur["Athlete"]= "veillez inserer le nom du club ";
    }
    if(empty($Categorie)){
        $erreur["Categorie"]= "veillez inserer le nom du president du club ";
    }

    if (!empty($erreur)) {

        header("Location:../LicenceCoach.php?Erreur=1");
  
    }else{


        $licenceCoach->LicenceCoachRegistration($Coach, $Categorie);

        if ($licenceAthlete) {
            header("Location:../LicenceCoach.php?message=Succes&club=$NomClub");
        } else header("Location:../LicenceCoach.php?message=Echec");
    }
 }

 if(isset($_GET["operation"]) ){

    if($_GET["operation"]=="supp"){
        $id=(int) $_GET["id"];

        $licenceCoach = $licenceCoach->DeleteLicenceCoach($id);
    
        if ($licenceCoach) {
            header("Location:../LicenceCoach.php?LicenceAthlete=Succes");
        } else header("Location:../LicenceCoach.php?LicenceAthlete=Echec");
    }
}