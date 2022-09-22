<?php
include("_head.php");
$error=[];


if(isset($_POST["valider"])){
   // var_dump($_POST);
    $email=$_POST["email"];
    $pass=$_POST["pass"];

    if(!empty($email)){
        if(!empty($pass)){
           // var_dump($_POST);
            $agent= $agents->Login($pass,$email);
          
            if(!empty($agent)){
                
                $Tagent= $agents->AgentReseach('email', $email);
                $id=$Tagent[0]->id;
                $etat=$Tagent[0]->etat;
                $Autorisation=$Tagent[0]->Autorisation;

                if($Autorisation=="autorise"){
                    
                    $sql= "UPDATE agent set etat=1 WHERE id=$id";
                    $ModificationAgent= $agents->AgentUpdate($sql);
                    $_SESSION['agent']=$Tagent[0]->prenom." ".$Tagent[0]->nom;
                    $_SESSION['Image']=$Tagent[0]->photoProfil;
                    $_SESSION['IdAgent']=$Tagent[0]->id;
                    $_SESSION['typeAgent']=$Tagent[0]->type;
                    $_SESSION['email']=$email;

                       if($Tagent[0]->type=="Agent"){
                        header("location:../clients.php");
                    }else if($Tagent[0]->type=="Admin"){
                        header("location:../agent.php");
                    }
                } else header("location:../index.php?Autorisation=0"); //"vous n'etes pas autoriser à acceder  !";
               
                
               
            }else header("location:../index.php?Agent=0"); //["Agent"]="vous n'etes pas reconnu !";
        }else header("location:../index.php?pass=0"); //["pass"]="veillez entrer un mot de pass !";
    }else header("location:../index.php?email=0"); //["email"]="veillez entrer votre adresse email !";
}else{
    header("location:../index.php?methode=0");  //["methode"]="velliez entrer les informations sur le formulaire !";
}






var_dump($_SESSION);