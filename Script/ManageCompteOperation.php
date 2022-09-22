<?php

include("_head.php");



$jours = date("d-m-Y");

if(isset($_POST["MidClient"])){
  $idClient=$_POST["MidClient"];
  $dataClient = $clients->RechercheClient("id", $idClient);
  $noms = $dataClient[0]->prenom . ' ' . $dataClient[0]->nom;
}


if (isset($_POST["validerOperationDepot"])) {

  $idClient = $_POST["MidClient"];
  $numCompte = $_POST["MnumCompte"];

  $idAgent = $_POST['MidAgent'];
  $Type_Operation = "depot";
  if(isset($_POST["MmontantMultip"]) && $_POST["MmontantMultip"]!=0) $MontantAmultiplie =(int)$_POST["MmontantMultip"];
  if (isset($_POST["Mmontant"])) $Mmontant = $_POST["Mmontant"];


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

    $MontantActuel =0;

    if($MontantAmultiplie){
      $MontantActuel = $MontantAmultiplie * $mise;
      $NouveauCycleD = $CycleD + (int)$MontantAmultiplie;

    }else{
      $MontantActuel= $Mmontant;
      $NouveauCycleD = $CycleD + 1;
    }
    
    
    

    if ($NombreDep < 31) { // pas totaliser un cycle
      if ($dette > 0) { // dette 
        if ($dette < $MontantActuel) {

          $ActuelDette = 0;
          $reste = $MontantActuel - $dette;

          $totalActuel = $total + $reste;

          $sql = "UPDATE compte set CycleD=$NouveauCycleD, dette=$ActuelDette, total=$totalActuel WHERE id =". $numCompte;
          $compte = $comptes->CompteUpdate($sql);

          

          if ($compte) { // modification OK
            $operation = $operations->OperationRegistration($idAgent, $numCompte, $MontantActuel, $Type_Operation, 'NULL');
            header("Location:../clients.php?nDepot=$NouveauCycleD & depotCompte=1 & date=$jours & nom=$noms");
          } else { // pas de modification
            header("Location:../clients.php?depotCompte=0 & nom=$noms");
          }
        } else { // reste un motant après la paye --> dette supe
          $ActuelDette = $dette - $MontantActuel;
          $sql = "UPDATE compte set dette=$ActuelDette WHERE id =" . $numCompte;
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
          $sql = "UPDATE compte set  dette=$ActuelDette WHERE id =" . $numCompte;
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
      
      
             } //fin else pas de dette
    } // un cycle  est atteint

  }
}


if (isset($_POST["validerOperationRetrait"])) {


//  'Mmontant' => string '1000' (length=4)
//  'MmontantMultip' => string '0' (length=1)
//  'MOperation' => string 'retrait' (length=7)
//  'MidAgent' => string '2' (length=1)
//  'MidClient' => string '1' (length=1)
//  'MnumCompte' => string '28' (length=2)
//  'validerOperationRetrait' => string 'Deposer' (length=7)


  $Type_Operation = "retrait";
  $NouveauMontant = (int) $_POST["Mmontant"];
  $numCompte = (int) $_POST["MnumCompte"];
  $idAgent=(int) $_POST["MidAgent"];

  if (isset($_POST["Mmontant"])) $montantDepose = $_POST["Mmontant"];

  $MontantActuel = (int)$montantDepose;

  $CommissionValide=0;
  $SoldeReelX=0;
  
  $sql= "SELECT Commission1,Commission2,Taux from `configuration` ";
  $dataConfig = $Configurations->selection($sql);

  $Commission1=$dataConfig[0]->Commission1;
  $Commission2=$dataConfig[0]->Commission2;
  $Taux=$dataConfig[0]->Taux;

  $sql6 = "SELECT `typeCompte`,`total`,`dette`,`mise`,`CycleR`,`NbrCycle`,`devise`,`CommissionTouche` from compte where id=" . $numCompte;
  $dataCompte = $comptes->selection($sql6);

  $total = $dataCompte[0]->total;
  $dette = $dataCompte[0]->dette;
  $typeCompte = $dataCompte[0]->typeCompte;
  $CycleR = $dataCompte[0]->CycleR;
  $NbrCycle=$dataCompte[0]->NbrCycle;
  $mise = $dataCompte[0]->mise;
  $devise=$dataCompte[0]->devise;

  $sql2 = "SELECT count(numCompte) as nombreDepot from operation where Type_Operation='depot' and numCompte=$numCompte ";
  $data = $clients->selection($sql2);
  $NombreDep = $data[0]->nombreDepot;
 
 


  if($typeCompte == "fixe"){// type fixe
    $Commission=$mise * ($NbrCycle+1);
    $SoldeReelX=$total - $Commission;
   
  }else{ // type desordre

      //conversion devise
      
      $montantConvOuPas=0;

      if($devise="USD"){
        $montantConvOuPas=$total*$Taux;
      }else if($devise="CDF"){
        $montantConvOuPas=$total;
      }
       
       
      $CommissionTouche= $dataCompte[0]->CommissionTouche;
    
      if($montantConvOuPas<50000){
          $CommissionValide= ($Commission1 * $total)  / 100;
          $SoldeReelX=$total-$CommissionValide;
      }else if($montantConvOuPas>=50000){
        $CommissionValide=($Commission2 * $total)  / 100;
        $SoldeReelX=$total-$CommissionValide;
    }

  }

  if( $SoldeReelX > $MontantActuel + $dette){ // on ne viole pas la commision + dette

    if ($typeCompte == "fixe") {
      $dette = $dataCompte[0]->dette;
  
      $NouveauCycleR = $CycleR + 1;
  
      if ($total >  $NouveauMontant + $dette) { // + dette
        // if ($dette== 0) {

          $nouvelleDette=$dette+$NouveauMontant;
  
          $sql = "UPDATE compte set CycleR=$NouveauCycleR, dette=$nouvelleDette WHERE id =" . $numCompte;
          $compte = $comptes->CompteUpdate($sql);
  
          if ($compte) { // modification OK
            $operation = $operations->OperationRegistration($idAgent, $numCompte, $NouveauMontant, $Type_Operation, 'NULL');
            header("Location:../clients.php?nRetrait=$NouveauCycleR & retraitCompte=1 & date=$jours & nom=$noms");
          } else { // pas de modification
            header("Location:../clients.php?retraitCompte=0 & nom=$noms");
          }
        /*} else { // le client a toujours une dette avec ce compte 
          
        
         } // fin else où  le client a toujours une dette avec ce compte */
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
           //header("Location:../clients.php?nRetrait=$NouveauCycleR & DetteRetrait=1 & nom=$noms");
           $soldeReel=$total-$dette;
  
           if( $NouveauMontant<$soldeReel){
             $detteActuelle= $dette+$NouveauMontant;
             
             $sql = "UPDATE compte set CycleR=$NouveauCycleR, dette=$detteActuelle WHERE id =" . $numCompte;
             $compte = $comptes->CompteUpdate($sql);
  
             $operation = $operations->OperationRegistration($idAgent, $numCompte, $NouveauMontant, $Type_Operation, 'NULL');
             header("Location:../clients.php?nRetrait=$NouveauCycleR & retraitCompte=1 & date=$jours & nom=$noms");
       
           }else{//motant deuxième retrait depasse le solde Réel
             header("Location:../clients.php?ErreureDeuxiemeRetrait=1");
       
           }
       
          }
      } else { // total < montant à emprunter
        header("Location:../clients.php?nRetrait=$NouveauCycleR & insuffisanceRetrait=1 & nom=$noms");
      }
    }

  }else{ // on viole la commision

    header("Location:../clients.php?ViolationCommission=1");
       
  } // fin else où on viole la commision

  

 
} // fin post retrait



if (isset($_POST["validerOperationCloture"])) {// cloture compte
  $mdpSaisi = $_POST["password"];
  $numCompte = $_POST["numCompte"];
  $idAgent = $_POST["idAgent"];

  
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
  
    //conversion devise
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
      $data = $clients->selection($sqlOperation);
      
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

$numCompte= $_POST["numCompte"];
  $CycleDActuel = 0;
  $NbrCycleAcutuel =0;
  
  $sql6 = "SELECT `CycleD`,`NbrCycle` from compte where id=" . $numCompte;
  $dataCompte = $comptes->selection($sql6);

  $NbrCycle = $dataCompte[0]->NbrCycle;
  $CycleD = $dataCompte[0]->CycleD;

  if( $CycleD>31){
    $CycleDActuel = $CycleD - 31;  
    $NbrCycleAcutuel = $NbrCycle + 1;

  }else{
    $NbrCycleAcutuel = $NbrCycle + 1;
    $CycleDActuel = 0;
  }




  $sql = "UPDATE compte set NbrCycle=$NbrCycleAcutuel, CycleD=$CycleDActuel WHERE id =" . $numCompte;
  $compte = $comptes->CompteUpdate($sql);

  if ($compte) { // modification OK
    header("Location:../clients.php?NouveauCycle=1 & date=$jours & Compte=$numCompte & nom=$noms");
  } else { // pas de modification
    header("Location:../clients.php?NouveauCycle=0 & nom=$noms  & Compte=$numCompte");
  }
}// fin continuer