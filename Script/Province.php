<?php
include("_head.php");
$erreur = array();

if (isset($_POST["valider"])) {

    $Province = $_POST["Province"];

    // champ formulaire

    if (empty($Province)) {
        $erreur["Province"] = " veillez inserer le province ";
    }
    if (!empty($erreur)) {

        header("Location:../Province.php?Erreur=1");
    } else {

        $province->ProvinceRegistration($Province);

        if ($province) {
            header("Location:../Province.php?message=Succes&Province=$Province");
        } else header("Location:../Province.php?message=Echec");
    }




    //   move_uploaded_file($tmp_namePhotoProfil,$dossierSignature);


    //   echo $nomFichierPhotoSignature ." ".$extFichierPhotoProfil;
}