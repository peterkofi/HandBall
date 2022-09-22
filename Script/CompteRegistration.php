<?php
include_once('_head.php');

$jours=date("Y-d-m");

if(isset($_GET['Operation']) && $_GET['Operation']=="modifier"){

  $client= $_GET['client'];
  $compte= $_GET['compte'];
  
   $req = "SELECT * FROM `compte` WHERE idClient=$client and NumeroCompte=".$compte;
   $donnee = $comptes->selection($req);

   echo json_encode($donnee) ;
  
}

if(isset($_POST['CompteModalModification'])){

    $type=$_POST['TypeCompte'];
    $mise=$_POST['mise'];
    $devise=$_POST['devise'];
    $idClient=$_POST["IdClient"];
    $idCompte=$_POST["CompteClient"];

    $req = "SELECT * FROM `compte` WHERE idClient=$idClient and NumeroCompte=".$idCompte;
    $donnee = $comptes->selection($req); 

    $total=$donnee[0]->total;
    $dette =$donnee[0]->dette;
    $NbrCycle =$donnee[0]->NbrCycle;
    $Cloture =$donnee[0]->Cloture;
    
    if($dette == 0 && $total == 0 && $NbrCycle==0 && $Cloture==0 ){

      $sql = "UPDATE `compte` SET `mise`='$mise',`typeCompte`='$type',`devise`='$devise'";
      $modif=$comptes->CompteUpdate($sql);
      if($modif){
        header("Location:../clients.php?ModificationCompte=1");
      }else{
        header("Location:../clients.php?ModificationCompte=0");
      }
     // $sql = "UPDATE `compte` SET `id`=[value-1],`NumeroCompte`=[value-2],`idClient`=[value-3],`mise`=[value-4],`typeCompte`=[value-5],`devise`=[value-6]"
     
        // $requete=" UPDATE `compte` SET `nom`='$nom',`prenom`='$prenom',`Delegue1`='$Delegue1',`Delegue2`='$Delegue2',`photoProfil`='$NomDelaPhotoProfilAcutuel',`photoSignature`='$NomDelaPhotoSignatureAcutuel',`NumeroTelephone`='$NumTel',`adresse`='$Adresse',`age`='$Age' WHERE `id`=".$id;
        //            $modif= $clients->ClientUpdate($requete);

    }else{
       header("Location:../clients.php?CompteImpossibleModif=1");  
    }
}

if(isset($_POST['CompteRegistrate'])){
    $type=$_POST['TypeCompte'];
    $mise=$_POST['mise'];
    $devise=$_POST['devise'];
    $idClient=$_POST["idClient"];

    $req = "SELECT COUNT(idClient) as nombreCompte FROM `compte` WHERE idClient=".$idClient;
    $NumeroCompte = $comptes->selection($req);
    
    $NouveaNumCompte=(int) $NumeroCompte[0]->nombreCompte + 1;
    
 
    

    if(!empty($mise)){
       //   SELECT COUNT(idClient) FROM `compte` WHERE idClient=123

        $comptes->CompteRegistration($NouveaNumCompte,$idClient,$mise,$type,$devise);
      
        if($comptes){// Ajout OK
            header("Location:../clients.php?CreationCompte=1  & retour=". $NumeroCompte." & date=$jours"); 
          } else{// pas de Ajout
            header("Location:../clients.php?CreationCompte=0 & retour=". $NumeroCompte."");        
          }
    }else{
        $comptes->CompteRegistration($NouveaNumCompte,$idClient,0,$type,$devise);
      
        if($comptes){// Ajout OK
            header("Location:../clients.php?CreationCompte=1 & date=$jours"); 
          } else{// pas de Ajout
            header("Location:../clients.php?CreationCompte=0");        
          }
    }

}

?>