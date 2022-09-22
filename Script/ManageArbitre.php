<?php  
    include_once('class.dataBase.php');

       class ManageArbitre{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }
        function ArbitreRegistration($NomArbitre,$PostnomArbitre,$PrenomArbitre,$LieuDeNaissance,$DateNaissance,$Certification,$IdLigue,$IdProvince){ 
            $query="insert INTO arbitre(nom, postnom, prenom,lieu_naissance,date_naissance,certification,id_ligue,id_province) values($NomArbitre,'$PostnomArbitre','$PrenomArbitre','$LieuDeNaissance','$DateNaissance','$Certification',$IdLigue,$IdProvince)";
             $this->link->exec($query);   
        }
            
        function ArbitreReseach($champ, $val){
            $query="select * FROM arbitre WHERE $champ = '".$val."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
        function ArbitreUpdate($sql){
              $retour = $this->link->exec($sql);  
              
              return $retour; 
          }
          function Comptage($sql){

              $retour = $this->link->exec($sql);  
              
              return $retour; 
          }
        
        function ArbitreList(){
            $query="select * FROM arbitre" ;
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



       }


     

      
    ?>