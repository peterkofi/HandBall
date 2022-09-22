<?php  
    include_once('class.dataBase.php');

       class ManageClub{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }

       function ClubRegistration($NomClub,$PhotoClub,$AnneeCreation,$President,$IdLeague,$IdProvince){
            $query="insert INTO club(NomClub,photo_club,AnneeCreation,President,IdLeague,IdProvince) values($IdClub,'$NomClub','$PhotoClub','$AnneeCreation','$President',$IdLeague,$IdProvince)";
             $this->link->exec($query);   
        }
            
        function RechercheClub($champ, $val){
            $query="select * FROM club WHERE $champ = '".$val."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
     
        function ListeClub(){
            $query="select * FROM club" ;
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
         function ClubUpdate($query){
           $retour= $this->link->exec($query); 
            return $retour; 
             
        }



       }


     

      
    ?>