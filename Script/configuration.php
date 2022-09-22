<?php

include("_head.php");



if(isset($_POST["modificationTaux"])){
    if(isset($_POST['taux'])){

        $taux=$_POST['taux'];
        $sql="UPDATE configuration set Taux = $taux";
        $parametres=$parametre->ParametreUpdate($sql);
    
        if($parametres){
            header("Location:../configuration.php?modificationTaux=1");
        }else  header("Location:../configuration.php?modificationTaux=0");
    }else header("Location:../configuration.php?Saisitaux=0");
}else
if(isset($_POST["modificationCommission1"])){
    if(isset($_POST['Commission1'])){

        $Commission1=$_POST['Commission1'];
        $sql="UPDATE configuration set Commission1 = $Commission1";
        $parametres=$parametre->ParametreUpdate($sql);
    
        if($parametres){
            header("Location:../configuration.php?modificationCommission=1");
        }else  header("Location:../configuration.php?modificationCommission=0");
    }else header("Location:../configuration.php?SaisiCommission=0");
}else
if(isset($_POST["modificationCommission2"])){
    if(isset($_POST['Commission2'])){

        $Commission2=$_POST['Commission2'];
        $sql="UPDATE configuration set Commission2 = $Commission2";
        $parametres=$parametre->ParametreUpdate($sql);
    
        if($parametres){
            header("Location:../configuration.php?modificationCommission2=1");
        }else  header("Location:../configuration.php?modificationCommission2=0");
    }else header("Location:../configuration.php?SaisiCommission2=0");
}else
if(isset($_POST["modificationAdmin"])){
    $email=$_POST['email'];
    $mdp=$_POST['pass'];
    $emailAdmin=$_SESSION['email'];

    if(!empty($email)){

        if(!empty($mdp)){

            $sql="UPDATE agent set email='".$email."', pass='".$mdp."' WHERE email='".$email."' ";
            $agent=$agents->AgentUpdate($sql);
        
            if($agent){
                header("Location:../configuration.php?ModificationAdmin=1");
            }else  header("Location:../configuration.php?ModificationAdmin=0");
        }else header("Location:../configuration.php?MdpAdmin=0");
    }else header("Location:../configuration.php?EmailAdmin=0");
}else 

if(isset($_POST["modificationMdpRetrait"])){
    if(isset($_POST['MotDePasseRetrait'])){
    
            $MotDepasseRetrait=$_POST['MotDePasseRetrait'];
            $sql="UPDATE configuration set MotDepasseRetrait = $MotDepasseRetrait";
            $NouveauMotDepasseRetrait=$parametre->ParametreUpdate($sql);
        
        if($NouveauMotDepasseRetrait){
             header("Location:../configuration.php?modificationMotDepasseRetrait=1");
        }else  header("Location:../configuration.php?modificationMotDepasseRetrait=0");
    }else header("Location:../configuration.php?SaisiMotDepasseRetrait=0");
}
    

