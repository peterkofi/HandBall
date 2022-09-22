<?php  
    include_once('class.dataBase.php');
       class ManageCoach{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }
       function CoachRegistration($NomCoach,$DateNaissance,$LieuNaissance,$IdProvince,$IdLeague,$IdClub){ 
            $query="insert INTO coach(noms_coach,date_naissance,lieu_naissance,id_province,IdLeague,id_club) values('$NomCoach','$DateNaissance','$LieuNaissance',$IdProvince,$IdLeague,$IdClub)";
             $this->link->exec($query);   
        }
            
        function RechercheCoach($champ, $val){
            $query="select * FROM coach WHERE $champ = '".$val."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
     
        function ListeCoach(){
            $query="select * FROM coach" ;
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
         function CoachUpdate($query){
           $retour= $this->link->exec($query); 
            return $retour; 
             
        }



       }


     

      
    ?>