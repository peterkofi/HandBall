<?php  
    include_once('class.dataBase.php');

       class ManageAthlete{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }
    
        function AthleteRegistration($IdAthlete,$NomAthlete,$Sexe,$DateNaissance,$LieuDeNaissance,$Poste,$Poid,$Taille,$IdProvince,$IdLigue){
            $query="insert INTO athlete(IdAthlete,NomAthlete, Sexe, DateNaissance,LieuDeNaissance,Poste,Poid,Taille,IdProvince,IdLigue) values($IdAthlete,'$NomAthlete','$Sexe','$DateNaissance','$LieuDeNaissance','$Poste',$Poid,$Taille,$IdProvince,$IdLigue)";
             $this->link->exec($query);   
        }
            
        function AthleteReseach($champ, $val){
            $query="select * FROM athlete WHERE $champ = '".$val."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
        function AthleteUpdate($sql){
              $retour = $this->link->exec($sql);  
              
              return $retour; 
          }
          function Comptage($sql){
            //  $query="insert INTO agent (`nom`, `prenom`, `photoProfil`, `adresse`, `type`, `etat`, `email`, `pass`) values('$nom','$prenom','$photoProfil','$adresse','$typeAgent','0','$email','$pass')";
              $retour = $this->link->exec($sql);  
              
              return $retour; 
          }
        
        

        function AthleteList(){
            $query="select * FROM athlete" ;
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