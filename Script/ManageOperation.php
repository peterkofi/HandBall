<?php  
    include_once('class.dataBase.php');

       class ManageOperation{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }
   
        function OperationRegistration($idAgent,$numCompte,$montant,$Type_Operation, $MontantToucheClient ){
            $query="insert INTO operation (`idAgent`, `numCompte`, `montant`, `Type_Operation`,`MontantToucheClient`, `date`) values($idAgent,$numCompte ,$montant, '$Type_Operation', $MontantToucheClient,Now()) ";
            $retour = $this->link->exec($query);  
            return $retour; 
        }
            
        function OperationReseach($champ, $Agent){
            $query="select * FROM operation WHERE $champ = '".$Agent."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }

        function OperationList(){
            $query="select * FROM operation" ;
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
