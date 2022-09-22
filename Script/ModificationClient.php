<?php
include_once('_head.php');


if (isset($_POST['validerModification'])) {

    $id = $_POST['IdClient'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $noms = $prenom . " " . $nom;

    $Delegue1 = $_POST['Delegue1'];
    $Delegue2 = $_POST['Delegue2'];
    $Adresse = $_POST['Adresse'];
    $NumTel = $_POST['NumTel'];
    $Age = $_POST['Age'];
    $validerModification = $_POST['validerModification'];

    $erreur = [];

    // Profil

    $extPossible = array("jpeg", "jpg", "png");

    if (isset($_FILES["photoProfil"]["name"]) && !empty($_FILES["photoProfil"]["name"])) {
       // var_dump($_FILES);
        $nomFichierPhotoProfil = $_FILES["photoProfil"]["name"];
        $typeFichierPhotoProfil = $_FILES["photoProfil"]["type"];
        $sizeFichierPhotoProfil = $_FILES["photoProfil"]["size"];
        $tmp_namePhotoProfil = $_FILES["photoProfil"]["tmp_name"];
        $ErreurPhotoProfil = $_FILES["photoProfil"]["error"];

        $extFichierPhotoProfil = explode(".", $nomFichierPhotoProfil);
        $extFichierPhotoProfilActuelle = strtolower(end($extFichierPhotoProfil));

        $NomDelaPhotoProfilAcutuel = uniqid("", true) . "." . $extFichierPhotoProfilActuelle;

        $dossierProfilComplet = "../images/Profil/" . $NomDelaPhotoProfilAcutuel;

        if (!in_array($extFichierPhotoProfilActuelle, $extPossible)) {
            $erreur["photoProfil"] = "Type photo de profil n'est pas permis ";
        }

        if ($ErreurPhotoProfil != 0) {
            $erreur["SauvegardePhotoProfil"] = "erreur lors de l'enregistrement de la photo de profil ";
        }

        if (empty($erreur)) {
            move_uploaded_file($tmp_namePhotoProfil, $dossierProfilComplet);
        }
    }

    //signature

    if (isset($_FILES["photoSignature"]["name"]) && !empty($_FILES["photoSignature"]["name"])) {
        $nomFichierPhotoSignature = $_FILES["photoSignature"]["name"];
        $typeFichierPhotoSignature = $_FILES["photoSignature"]["type"];
        $sizeFichierPhotoSignature = $_FILES["photoSignature"]["size"];
        $tmp_namePhotoSignature = $_FILES["photoSignature"]["tmp_name"];
        $ErreurPhotoSignature = $_FILES["photoSignature"]["error"];

        $extFichierPhotoSignature = explode(".", $nomFichierPhotoSignature);
        $extFichierPhotoSignatureActuelle = strtolower(end($extFichierPhotoSignature));


        $NomDelaPhotoSignatureAcutuel = uniqid("", true) . "." . $extFichierPhotoSignatureActuelle;

        $dossierSignatureComplet = "../images/Signature/" . $NomDelaPhotoSignatureAcutuel;

        if (!in_array($extFichierPhotoProfilActuelle, $extPossible)) {
            $erreur["photoProfil"] = "Type photo de signature n'est pas permis ";
        }

        if ($ErreurPhotoProfil != 0) {
            $erreur["SauvegardePhotoProfil"] = "erreur lors de l'enregistrement de la photo de signature";
        }

        if (empty($erreur)) {
            move_uploaded_file($tmp_namePhotoSignature, $dossierSignatureComplet);
        }
    }

    if (isset($erreur) && !empty($erreur)) {

       
        $tab_serialiser = serialize($erreur);

        header("Location:../clients.php?client='$noms'&erreur=" . $tab_serialiser);
    }else{
        // $requete=" UPDATE `client` SET `NumeroClient`='$NumTel',`nom`='$nom',`prenom`='$prenom',`Delegue1`='$Delegue1',`Delegue2`='$Delegue2',`photoProfil`=[value-7],`photoSignature`=[value-8],`NumeroTelephone`=[value-9],`adresse`=[value-10],`age`=[value-11] WHERE 1
        // $data= $clients->ClientUpdate()

        if(!empty($nomFichierPhotoSignature)){
            if(!empty($nomFichierPhotoProfil)){// on modifie aussi les deux photos
                $requete=" UPDATE `client` SET `nom`='$nom',`prenom`='$prenom',`Delegue1`='$Delegue1',`Delegue2`='$Delegue2',`photoProfil`='$NomDelaPhotoProfilAcutuel',`photoSignature`='$NomDelaPhotoSignatureAcutuel',`NumeroTelephone`='$NumTel',`adresse`='$Adresse',`age`='$Age' WHERE `id`=".$id;
                $modif= $clients->ClientUpdate($requete);
            }else { // on modifie aussi seulement la photo de signature
                $requete=" UPDATE `client` SET `nom`='$nom',`prenom`='$prenom',`Delegue1`='$Delegue1',`Delegue2`='$Delegue2',`photoSignature`='$NomDelaPhotoSignatureAcutuel',`NumeroTelephone`='$NumTel',`adresse`='$Adresse',`age`='$Age' WHERE `id`=".$id;
                $modif= $clients->ClientUpdate($requete);
            }           
            
        } else if(!empty($nomFichierPhotoProfil)){// on modifie aussi seulement la photo de profil
                $requete=" UPDATE `client` SET `nom`='$nom',`prenom`='$prenom',`Delegue1`='$Delegue1',`Delegue2`='$Delegue2',`photoProfil`='$NomDelaPhotoProfilAcutuel',`NumeroTelephone`='$NumTel',`adresse`='$Adresse',`age`='$Age' WHERE `id`=".$id;
                $modif= $clients->ClientUpdate($requete);
            }  else{// aucune photo à modifier
                $requete=" UPDATE `client` SET `nom`='$nom',`prenom`='$prenom',`Delegue1`='$Delegue1',`Delegue2`='$Delegue2',`NumeroTelephone`='$NumTel',`adresse`='$Adresse',`age`='$Age' WHERE `id`=".$id;
                $modif= $clients->ClientUpdate($requete);
            }    
        
        

        if($modif){
            header("Location:../clients.php?messageModification=Succes&client=$noms&Id=$id");
        }else{
            header("Location:../clients.php?messageModification=Erreur&client=$noms&Id=$id");
        }
    }


    /*    


*/
}

/*
 
*/