<?php

include("_head.php");

if(isset($_POST["enregistrer"])){

// var_dump($_POST);
// var_dump($_FILES);
// exit();

    $NomClub = $_POST["NomClub"];
    $PresidentClub = $_POST["PresidentClub"];
    $DateCreationClub = $_POST["DateCreationClub"];
    $LigueAthlete = $_POST["LigueAthlete"];
    $ProvinceAthlete = $_POST["ProvinceAthlete"];

    // 'NomClub' => string 'rennaissance' (length=12)
    // 'PresidentClub' => string 'mukuna' (length=6)
    // 'DateCreationClub' => string '2022-09-05' (length=10)
    // 'LigueAthlete' => string '2' (length=1)
    // 'ProvinceAthlete' => string '4' (length=1)
    // 'enregistrer' => string '' (length=0)



//     C:\wamp64\www\Handball\Script\Club.php:8:
// array (size=1)
//   'PhotoClub' => 
//     array (size=5)
//       'name' => string '' (length=0)
//       'type' => string '' (length=0)
//       'tmp_name' => string '' (length=0)
//       'error' => int 4
//       'size' => int 0

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
if (isset($nomFichierPhotoClub)) {

    if (!in_array($extFichierPhotoClubActuelle, $extPossible)) {
        $erreur["photoClub"] = "Type photo du Club n'est pas permis ";
    }

    if ($ErreurPhotoClub != 0) {
        $erreur["SauvegardePhotoClub"] = "erreur lors de l'enregistrement de la photo de Club ";
    }
    // if ($sizeFichierPhotoClub > 8000000) {
    //     $erreur["TaillePhotoClub"] = " la taille de la photo de Club est trop lourd ";
    // }
    
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
        $tabErr= serialize($erreur);
        header("Location:../Club.php?Erreur=1&message=$tabErr");
  
    }else{


        $club->ClubRegistration($NomClub,$NomDelaPhotoClubAcutuel,$DateCreationClub,$PresidentClub,$LigueAthlete,$ProvinceAthlete);

        if ($club) {
            header("Location:../Club.php?message=Succes&club=$NomClub");
        } else header("Location:../Club.php?message=Echec");
   
    }

 }

 if(isset($_GET["operation"]) ){

    if($_GET["operation"]=="supp"){
        $id=(int) $_GET["id"];

        $club = $club-> DeleteClub($id);
    
        if ($club) {
            header("Location:../Club.php?message=Succes");
        } else header("Location:../Club.php?message=Echec");
    }
}