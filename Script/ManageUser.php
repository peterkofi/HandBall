<?php  
    include_once('class.dataBase.php');
       class ManageUser{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }      
       function UserRegistration($PrenomUser,$NomUser,$email,$password,$fonctionUser){ 
            $query="insert INTO user( `prenom_user`, `nom_user`, `email`, `password`, `fonction_user`) values('$PrenomUser','$NomUser','$email','$password','$fonctionUser')";
             $this->link->exec($query);   
        }
            
        function RechercheUser($champ, $val){
            $query="select * FROM user WHERE $champ = '".$val."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
     
        function ListeUser(){
            $query="select * FROM user" ;
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }

           function selection($sql){
            $res=$this->link->prepare($sql);
            $res->execute();
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
         function UserUpdate($query){
           $retour= $this->link->exec($query); 
            return $retour; 
             
        }



       }


     

      
    ?>