<?php

include("_head.php");


if(isset($_POST["login"])){

    // var_dump($_POST);
    // exit();

    $erreur=[];  

    $EmailUtilisateur=$_POST["EmailUtilisateur"];
    $PassWordUtilisateur=$_POST["PassWordUtilisateur"];
  
    // champ formulaire

    if(empty($EmailUtilisateur)){
        $erreur["EmailUtilisateur"]= "veillez inserer l'email de l'utilisateur' ";
    }
 
    if (!empty($erreur)) {

        header("Location:../index.php?Erreur=1");
  
    }else{

        $sql="SELECT * FROM user WHERE  `email`='$EmailUtilisateur' AND  `password`='$PassWordUtilisateur'";
        $user= $user->selection($sql);

        if ($user) {

    //         public 'Id_user' => string '10' (length=2)
    //   public 'prenom_user' => string 'peter' (length=5)
    //   public 'nom_user' => string 'kofi' (length=4)
    //   public 'email' => string 'peterkofi74@gmail.com' (length=21)
    //   public 'password' => string '1234' (length=4)
    //   public 'fonction_user' => string 'admin' (length=5)
    //   public 'province_user' => string '4' (length=1)


           $IdProvince=(int) $user[0]->province_user;

            $provinces=$province->RechercheProvince('id_province',$IdProvince);
            $nomProvince=$provinces[0]->nom;


            $_SESSION["Id_user"]=$user[0]->Id_user ;
            $_SESSION["prenom_user"]=$user[0]->prenom_user;
            $_SESSION["nom_user"]=$user[0]->nom_user;
            $_SESSION["email"]=$user[0]->email;
            $_SESSION["fonction_user"]=$user[0]->fonction_user;
            $_SESSION["province_user"]=$user[0]->province_user;
            $_SESSION["nomProvince_user"]=$nomProvince;

            header("Location:../accueil.php?message=Succes");
        } else header("Location:../index.php?message=Echec");
   
    }

 }


 if(isset($_GET["operation"]) ){

    if($_GET["operation"]=="supp"){
      
        $id=(int) $_GET["id"];

        $ligue = $ligue-> DeleteLigue($id);
    
        if ($ligue) {
            header("Location:../Ligue.php?message=Succes");
        } else header("Location:../Ligue.php?message=Echec");
    }
}