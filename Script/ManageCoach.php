<?php  
    include_once('class.dataBase.php');
       class ManageCoach{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }
       function CoachRegistration($NomCoach,$PrenomCoach,$sexeCoach,$DateNaissanceCoach,$LieuNaissanceCoach,$ClubCoach){       
            $query="insert INTO coach(`nom_coach`, `prenom_coach`, `sexe_coach`, `date_naissance`, `lieu_naissance`, `id_club`) values('$NomCoach','$PrenomCoach','$sexeCoach','$DateNaissanceCoach','$LieuNaissanceCoach',$ClubCoach)";
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
        function DeleteCoach($id){

            $sql="DELETE FROM coach WHERE id_club = :id";
            $res =$this->link->prepare($sql);
            $res->bindParam('id', $id, PDO::PARAM_INT);
            $retour = $res->execute();

            return $retour;
        }

       



       }


     

      
    ?>