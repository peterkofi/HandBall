<?php

include("_head.php");

if(isset($_POST["enregistrer"])){

// var_dump($_POST);
// var_dump($_FILES);
// exit();

// 'DateLivraison' => string '' (length=0)
// 'DateCreation' => string '' (length=0)
// 'DureeLicence' => string '' (length=0)
// 'enregistrer' => string '' (length=0)

    $DateLivraison = $_POST["DateLivraison"];
    $DateCreation = $_POST["DateCreation"];
    $DureeLicence = $_POST["DureeLicence"];
    $Athlete = $_POST["Athlete"];

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
  

    if(empty($DateLivraison)){
        $erreur["DateLivraison"]= "veillez inserer le nom du club ";
    }
    if(empty($DateCreation)){
        $erreur["DateCreation"]= "veillez inserer le nom du president du club ";
    }
    if(empty($DureeLicence)){
        $erreur["DureeLicence"]= "veillez inserer la date de creation du club ";
    }
    if(empty($Athlete)){
        $erreur["Athlete"]= "veillez inserer la ligue du club ";
    }
   

    
 
    if (!empty($erreur)) {

        header("Location:../LicenceAthlete.php?Erreur=1");
  
    }else{

        $licenceAthlete->LicenathleteRegistration($DateLivraison,$DateCreation,$DureeLicence,$Athlete);

        if ($licenceAthlete) {
            header("Location:../LicenceAthlete.php?message=Succes&club=$NomClub");
        } else header("Location:../LicenceAthlete.php?message=Echec");
    }
 }

 if(isset($_GET["operation"]) ){

    if($_GET["operation"]=="supp"){
        $id=(int) $_GET["id"];

        $licenceAthlete = $licenceAthlete->DeleteLicenceAthlete($id);
    
        if ($licenceAthlete) {
            header("Location:../Club.php?LicenceAthlete=Succes");
        } else header("Location:../Club.php?LicenceAthlete=Echec");
    }
}