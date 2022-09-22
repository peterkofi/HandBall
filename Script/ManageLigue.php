<?php  
    include_once('class.dataBase.php');
       class ManageLigue{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }      
       function LigueRegistration($NomLigue){ 
            $query="insert INTO ligue(nom) values('$NomLigue')";
             $this->link->exec($query);   
        }
            
        function RechercheLigue($champ, $val){
            $query="select * FROM ligue WHERE $champ = '".$val."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
     
        function ListeLigue(){
            $query="select * FROM ligue" ;
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
         function LigueUpdate($query){
           $retour= $this->link->exec($query); 
            return $retour; 
             
        }



       }


     

      
    ?>