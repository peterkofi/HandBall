<?php


if(isset($_GET["id"])){
$id_compte= $_GET["id"];


$sqlClient="SELECT * FROM compte WHERE id =".$id_compte;

$compteClient = $comptes->selection($sqlClient);
   
}


if (isset($_POST["valider"])) {
    $operationMin = strtolower($_POST["operation"]);
    $operation = strtolower($_POST["operation"]);
    $dataNotif = $_POST["dataNotif"];

    $dataOperations=null;


    if($operationMin==='commission'){

    $sqlOperation= "  SELECT * FROM `operation` 
    WHERE `date`='$dataNotif'
    AND MontantToucheClient > 0 
    ORDER BY `MontantToucheClient`  DESC";
    
    $dataOperations = $operations->selection($sqlOperation);
    
        

    }else if($operationMin=='toutes'){

        $sqlOperation="SELECT * FROM operation 
        WHERE date ='$dataNotif'        
        ORDER BY numCompte";
    
        $dataOperations = $operations->selection($sqlOperation);

    }else{

    $sqlOperation="SELECT * FROM operation 
    WHERE date ='$dataNotif'
    AND Type_Operation='$operation' or Type_Operation='$operationMin'
    ORDER BY numCompte";

    $dataOperations = $operations->selection($sqlOperation);

    
    }

    
    

    // $nmr=$dataOperations->rowCount();
    // $i=0;
    
    $SommeMontant=0;
    $operation=0;
    
   foreach ($dataOperations as $Doperation) {    
    $SommeMontant =$SommeMontant + $Doperation->montant;
    $operation ++;
   }
 


    //  var_dump( $dataOperations);

 }




?>