<?php

include("_head.php");


//recherche' => string 'vita'

/*
if(isset($_POST["modificationAgent"])){
    $modifIdentifiant=$_POST["modifIdentifiant"];
    $modifMotdePasse=$_POST["modifMotdePasse"];
    $idAgent=$_POST["idAgent"];

    $erreur=[];
    
    if(empty( $modifMotdePasse)){
        $erreur["mdp"]="tu dois saisir un mot de passe";
  $serialTab=serialize($erreur);
        header("Location:../agent.php?erreur=$serialTab & ModificationAgent=0"); 
    }else{

  

    $sql="UPDATE agent SET email='". $modifIdentifiant."', pass ='".$modifMotdePasse."' WHERE id=".$idAgent;
    $ModificationAgent = $agents->AgentUpdate($sql);

    if($ModificationAgent==1){
        
        header("Location:../agent.php?message=1 & ModificationAgent=1"); 
    }else{
        header("Location:../agent.php?erreur=1 & ModificationAgent=0"); 
    }
    
    }

    
}

if(isset($_POST["autorisationAgent"])){

    $autorisation=$_POST["autorisation"];
    $idAgent=$_POST["idAgent"];

    $etatAutorisation="";

    if($autorisation=="autorise"){
        $etatAutorisation="autorise";
    }else if($autorisation=="bloque"){ 
        $etatAutorisation="bloque";
    }


    $sql= "UPDATE agent set Autorisation='$autorisation' WHERE id=$idAgent";
    $ModificationAgent= $agents->AgentUpdate($sql);

    if($ModificationAgent){
        
        header("Location:../agent.php?message=1 & autorisation=$etatAutorisation"); 
    }else{
        header("Location:../agent.php?erreur=2 & autorisation=$etatAutorisation"); 
    }
    

 
}

*/


if(isset($_POST["enregistrer"])){


/*  var_dump($_POST);
    var_dump($_FILES);
    exit();
*/

    $erreur=[];  

    $rechercheClub=$_POST["rechercheClub"];

    $extPossible = array("jpeg", "jpg", "png");

    $nomFichierPhotoClub = $_FILES["photoClub"]["name"];
    $typeFichierPhotoClub = $_FILES["photoClub"]["type"];
    $sizeFichierPhotoClub = $_FILES["photoClub"]["size"];
    $tmp_namePhotoClub = $_FILES["photoClub"]["tmp_name"];
    $ErreurPhotoClub = $_FILES["photoClub"]["error"];

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
  
    // champ formulaire

    if(empty($rechercheClub)){
        $erreur["rechercheClub"]= "veillez inserer le nom du club ";
    }
 
    if (!empty($erreur)) {

        header("Location:../Club.php?Erreur=1);
  
    }else{

        $club->ClubRegistration($rechercheClub,$prenom,$NomDelaPhotoClubAcutuel,$adresse,$typeAgent, $email,$pass );

        if ($agents) {
            header("Location:../ajouter-agent.php?message=Succes& agent=$noms");
        } else header("Location:../ajouter-agent.php?message=Echec");
   
    }

    /*  $clients->ClientRegistration($nom,$prenom,$photoClub,$adresse,$age,$photoSignature);

                    if($clients){
                        header("Location:../ajouter-client.php");

                    }else echo "Echec enregistrement !";

    */
 }