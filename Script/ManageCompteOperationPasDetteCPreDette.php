<?php

include("_head.php");



$jours = date("d-m-Y");
$idAgent = $_POST["idAgent"];
$idClient = $_POST["idClient"];
$numCompte = $_POST["numCompte"];

$dataClient = $clients->RechercheClient("id", $idClient);
$noms = $dataClient[0]->prenom . ' ' . $dataClient[0]->nom;

if (isset($_POST["validerOperationDepot"])) {

  var_dump($_POST);


  $idAgent = $_SESSION['IdAgent'];
  $Type_Operation = "depot";
  $MontantAmultiplie = $_POST["montantMultip"];
  if (isset($_POST["montant"])) $montantDepose = $_POST["montant"];


  $sql6 = "SELECT `typeCompte`,`total`,`dette`,`mise`,`CycleD` from compte where id=" . $numCompte;
  $dataCompte = $comptes->selection($sql6);

  $typeCompte = $dataCompte[0]->typeCompte;


  $sql2 = "SELECT count(numCompte) as nombreDepot from operation where Type_Operation='depot' and numCompte=$numCompte ";
  $data = $clients->selection($sql2);

  $NombreDep = $data[0]->nombreDepot;


  if ($typeCompte == "fixe") {

    $dette = $dataCompte[0]->dette;
    $mise = $dataCompte[0]->mise;
    $total = $dataCompte[0]->total;
    $CycleD = $dataCompte[0]->CycleD;

    $MontantActuel = (int)$MontantAmultiplie * $mise;



    $NouveauCycleD = $CycleD + 1;

    if ($NombreDep < 31) { // pas totaliser un cycle
      if ($dette > 0) { // dette 
        if ($dette < $MontantActuel) {

          $ActuelDette = 0;

          $reste = $MontantActuel - $dette;

          $totalActuel = $total + $reste;


          $sql = "UPDATE compte set CycleD=$NouveauCycleD, dette=$ActuelDette, total=$totalActuel WHERE id =" . $numCompte;
          $compte = $comptes->CompteUpdate($sql);
          if ($compte) { // modification OK
            $operation = $operations->OperationRegistration($idAgent, $numCompte, $MontantActuel, $Type_Operation, 'NULL');
            header("Location:../clients.php?nDepot=$NouveauCycleD & depotCompte=1 & date=$jours & nom=$noms");
          } else { // pas de modification
            header("Location:../clients.php?depotCompte=0 & nom=$noms");
          }
        } else { // reste un motant après la paye --> dette supe
          $ActuelDette = $dette - $MontantActuel;
          $sql = "UPDATE compte set CycleD=$NouveauCycleD, dette=$ActuelDette WHERE id =" . $numCompte;
          $compte = $comptes->CompteUpdate($sql);
          if ($compte) { // modification OK
            $operation = $operations->OperationRegistration($idAgent, $numCompte, $MontantActuel, $Type_Operation, 'NULL');
            header("Location:../clients.php?nDepot=$NouveauCycleD & depotCompte=1 & date=$jours & nom=$noms");
          } else { // pas de modification
            header("Location:../clients.php?depotCompte=0 & nom=$noms");
          }
        }
      } else { // pas de dette

        $totalActuel = $total + $MontantActuel;

        $sql = "UPDATE compte set CycleD=$NouveauCycleD, total=$totalActuel WHERE id =" . $numCompte;
        $compte = $comptes->CompteUpdate($sql);

        if ($compte) { // modification OK
          $operation = $operations->OperationRegistration($idAgent, $numCompte, $MontantActuel, $Type_Operation, 'NULL');
          header("Location:../clients.php?nDepot=$NouveauCycleD & depotCompte=1 & date=$jours & nom=$noms");
        } else { // pas de modification
          header("Location:../clients.php?depotCompte=0 & nom=$noms");
        }
      }
    } // un cycle  est atteint

  } else { // compte desordre

    $dette = $dataCompte[0]->dette;
    $total = $dataCompte[0]->total;
    $CycleD = $dataCompte[0]->CycleD;

    $MontantActuel = (int)$montantDepose;

    $NouveauCycleD = $CycleD + 1;

    if ($NombreDep < 31) { // pas totaliser un cycle
      if ($dette > 0) { // dette 
        if ($dette < $MontantActuel) {

          $ActuelDette = 0;

          $reste = $MontantActuel - $dette;

          $totalActuel = $total + $reste;


          $sql = "UPDATE compte set CycleD=$NouveauCycleD, dette=$ActuelDette, total=$totalActuel WHERE id =" . $numCompte;
          $compte = $comptes->CompteUpdate($sql);
          if ($compte) { // modification OK
            $operation = $operations->OperationRegistration($idAgent, $numCompte, $MontantActuel, $Type_Operation, 'NULL');
            header("Location:../clients.php?nDepot=$NouveauCycleD & depotCompte=1 & date=$jours & nom=$noms");
          } else { // pas de modification
            header("Location:../clients.php?depotCompte=0 & nom=$noms");
          }
        } else { // reste un motant après la paye
          $ActuelDette = $dette - $MontantActuel;
          $sql = "UPDATE compte set CycleD=$NouveauCycleD, dette=$ActuelDette WHERE id =" . $numCompte;
          $compte = $comptes->CompteUpdate($sql);
          if ($compte) { // modification OK
            $operation = $operations->OperationRegistration($idAgent, $numCompte, $total, $Type_Operation, 'NULL');
            header("Location:../clients.php?nDepot=$NouveauCycleD & depotCompte=1 & date=$jours & nom=$noms");
          } else { // pas de modification
            header("Location:../clients.php?depotCompte=0 & nom=$noms");
          }
        }
      } else { // pas de dette

        $totalActuel = $total + $MontantActuel;

        $sql = "UPDATE compte set CycleD=$NouveauCycleD, total=$totalActuel WHERE id =" . $numCompte;
        $compte = $comptes->CompteUpdate($sql);

        if ($compte) { // modification OK
          $operation = $operations->OperationRegistration($idAgent, $numCompte, $MontantActuel, $Type_Operation, 'NULL');
          header("Location:../clients.php?nDepot=$NouveauCycleD & depotCompte=1 & date=$jours & nom=$noms");
        } else { // pas de modification
          header("Location:../clients.php?depotCompte=0 & nom=$noms");
        }
      }
    } // un cycle  est atteint

  }
}


if (isset($_POST["validerOperationRetrait"])) {
  $Type_Operation = "retrait";
  $NouveauMontant = $_POST["montant"];
  if (isset($_POST["montant"])) $montantDepose = $_POST["montant"];

  $MontantActuel = (int)$montantDepose;

  $sql6 = "SELECT `typeCompte`,`total`,`dette`,`mise`,`CycleR` from compte where id=" . $numCompte;
  $dataCompte = $comptes->selection($sql6);

  $typeCompte = $dataCompte[0]->typeCompte;


  $sql2 = "SELECT count(numCompte) as nombreDepot from operation where Type_Operation='depot' and numCompte=$numCompte ";
  $data = $clients->selection($sql2);

  $NombreDep = $data[0]->nombreDepot;

  if ($typeCompte == "fixe") {
    $dette = $dataCompte[0]->dette;
    $mise = $dataCompte[0]->mise;
    $total = $dataCompte[0]->total;
    $CycleR = $dataCompte[0]->CycleR;

    $NouveauCycleR = $CycleR + 1;

    if ($total >  $NouveauMontant) {
      if ($dette   == 0) {

        $sql = "UPDATE compte set CycleR=$NouveauCycleR, dette=$NouveauMontant WHERE id =" . $numCompte;
        $compte = $comptes->CompteUpdate($sql);

        if ($compte) { // modification OK
          $operation = $operations->OperationRegistration($idAgent, $numCompte, $NouveauMontant, $Type_Operation, 'NULL');
          header("Location:../clients.php?nRetrait=$NouveauCycleR & retraitCompte=1 & date=$jours & nom=$noms");
        } else { // pas de modification
          header("Location:../clients.php?retraitCompte=0 & nom=$noms");
        }
      } else { // le client a toujours une dette avec ce compte 
        header("Location:../clients.php?nRetrait=$NouveauCycleR & DetteRetrait=1 & nom=$noms");
      }
    } else { // total < montant à emprunter
      header("Location:../clients.php?nRetrait=$NouveauCycleR & insuffisanceRetrait=1 & nom=$noms");
    }
    //  $NouveauMontant



  } else { //compte desordre

    $dette = $dataCompte[0]->dette;
    $total = $dataCompte[0]->total;
    $CycleR = $dataCompte[0]->CycleR;

    $NouveauCycleR = $CycleR + 1;

    if ($total > $MontantActuel) {
      if ($dette == 0) {

        $sql = "UPDATE compte set CycleR=$NouveauCycleR, dette=$MontantActuel WHERE id =" . $numCompte;
        $compte = $comptes->CompteUpdate($sql);

        if ($compte) { // modification OK
          $operation = $operations->OperationRegistration($idAgent, $numCompte, $NouveauMontant, $Type_Operation, 'NULL');
          header("Location:../clients.php?nRetrait=$NouveauCycleR & retraitCompte=1 & date=$jours & nom=$noms");
        } else { // pas de modification
          header("Location:../clients.php?retraitCompte=0 & nom=$noms");
        }
      } else { // le client a toujours une dette avec ce compte 
        header("Location:../clients.php?nRetrait=$NouveauCycleR & DetteRetrait=1 & nom=$noms");
      }
    } else { // total < montant à emprunter
      header("Location:../clients.php?nRetrait=$NouveauCycleR & insuffisanceRetrait=1 & nom=$noms");
    }
  }
} // fin post retrait



if (isset($_POST["validerOperationCloture"])) {
  $mdpSaisi = $_POST["password"];
  $sql = "SELECT MotDepasseRetrait from `configuration` ";
  $data = $Configurations->selection($sql);

  $mdpSt = $data[0]->MotDepasseRetrait;


  if ($mdpSaisi == $mdpSt) {
    $Type_Operation="Cloture";
    $CommissionValide=0;
  
    $sql= "SELECT Commission1,Commission2,Taux from `configuration` ";
    $data = $Configurations->selection($sql);
  
    $Commission1=$data[0]->Commission1;
    $Commission2=$data[0]->Commission2;
    $Taux=$data[0]->Taux;
   
    $sql2= "SELECT `typeCompte`,`total`,`dette`,`mise`,`CycleR`,`MontantRetire`,`CommissionTouche`,`Cloture`,`NbrCycle`,`devise` from compte where id=". $numCompte;
    $dataCompte = $comptes->selection($sql2);
  
  
   
    $typeCompte = $dataCompte[0]->typeCompte;
    $dette = $dataCompte[0]->dette;
    $mise = $dataCompte[0]->mise;
    $total = $dataCompte[0]->total;
    $CycleR= $dataCompte[0]->CycleR;
    $MontantRetire= $dataCompte[0]->MontantRetire;
    $CommissionTouche= $dataCompte[0]->CommissionTouche;
    $Cloture=$dataCompte[0]->Cloture;
  
    $Cycle=$dataCompte[0]->NbrCycle;
  
    $devise=$dataCompte[0]->devise;
  
    $montantConvOuPas=0;
  
    if($devise="USD"){
      $montantConvOuPas=$total*$Taux;
    }else if($devise="CDF"){
      $montantConvOuPas=$total;
    }
  
  
    $CycleAct= $Cycle +1;
    
  
    $CommissionTouche= $dataCompte[0]->CommissionTouche;
  
    if($montantConvOuPas<50000){
        $CommissionValide= ($Commission1 * $total)  / 100;
    }else if($montantConvOuPas>=50000){
      $CommissionValide=($Commission2 * $total)  / 100;
    }
  
  
    
     $MontantAremettre=0;
  
    if($typeCompte=="fixe"){
      
      if($dette>0){
        $MontantAremettre=$total-$dette;
      }else{
        $MontantAremettre=$total;
      }
      
  
      $CommissionToucheActuelle= $mise * $CycleAct ;
  
      $MontantRetireActuelle=$MontantAremettre - $CommissionToucheActuelle;
  
      $SoldeActuelle=$MontantRetireActuelle;
      $dette=0;
  
      $Cloture=1;
  
      $sql="UPDATE compte set CommissionTouche=$CommissionToucheActuelle, MontantRetire= $MontantRetireActuelle, total=$SoldeActuelle, dette=$dette, Cloture=$Cloture WHERE id =". $numCompte;
      $compte=$comptes->CompteUpdate($sql);
      
      if($compte){// modification OK
        $operation=$operations->OperationRegistration($idAgent,$numCompte, $CommissionToucheActuelle, $Type_Operation,$SoldeActuelle);  
        header("Location:../clients.php?Cycle=$Cycle & CycleAct=$CycleAct & ClotureCompte=1 & date=$jours & nom=$noms & Compte=$numCompte" ); 
          
      } else{// pas de modification
        header("Location:../clients.php?ClotureCompte=0 & nom=$noms & Compte=$numCompte");        
      }
  
  
    }else if($typeCompte=="desordre"){  // desordre
      if($dette>0){
        $MontantAremettre=$total-$dette;
      }else{
        $MontantAremettre=$total;
      }
  
      $sqlOperation = "SELECT count(numCompte) as nombreDepot from operation where Type_Operation='depot' and numCompte=$numCompte ";
      $data = $clients->selection($sql2);
      
      $NombreDep = $data[0]->nombreDepot;
      
      $CommissionToucheActuelle= $CommissionValide ;
      $MontantRetireActuelle=$MontantAremettre - $CommissionToucheActuelle;
  
      $SoldeActuelle=$MontantRetireActuelle;
      $dette=0;
  
      $Cloture=1;
  
      $sql="UPDATE compte set CommissionTouche=$CommissionToucheActuelle, MontantRetire= $MontantRetireActuelle, total=$SoldeActuelle, dette=$dette, Cloture=$Cloture WHERE id =". $numCompte;
      $compte=$comptes->CompteUpdate($sql);
      
      if($compte){// modification OK
        $operation=$operations->OperationRegistration($idAgent,$numCompte, $CommissionToucheActuelle, $Type_Operation,'NULL');  
        header("Location:../clients.php?ClotureCompte=1 & date=$jours & nom=$noms & Compte=$numCompte" ); 
          
      } else{// pas de modification
        header("Location:../clients.php?ClotureCompte=0 & nom=$noms & Compte=$numCompte");        
      }
  
    
    
    }
  
  } else {
    header("Location:../clients.php?erreurCloture=1");
  }
}
if (isset($_POST["Continuer"])) {

  $sql6 = "SELECT `NbrCycle` from compte where id=" . $numCompte;
  $dataCompte = $comptes->selection($sql6);

  $NbrCycle = $dataCompte[0]->NbrCycle;
  $NbrCycleAcutuel = $NbrCycle + 1;
  $CycleDActuel = 0;


  $sql = "UPDATE compte set NbrCycle=$NbrCycleAcutuel, CycleD=$CycleDActuel WHERE id =" . $numCompte;
  $compte = $comptes->CompteUpdate($sql);

  if ($compte) { // modification OK
    header("Location:../clients.php?NouveauCycle=1 & date=$jours & Compte=$numCompte & nom=$noms");
  } else { // pas de modification
    header("Location:../clients.php?NouveauCycle=0 & nom=$noms  & Compte=$numCompte");
  }
}// fin continuer
