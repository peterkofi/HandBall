<?php
include("_head.php");

if(isset($_GET["client"])){
    $idClient=$_GET["client"];

    $data=$clients->RechercheClient('id',$idClient);

 // echo $data[0]->nom;
  echo json_encode($data); //$data[0]->photoProfil;

 // echo $idClient;
}
//$data = $clients->

