<?php  
    include_once('class.dataBase.php');

       class ManageParametre{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }

        function ParametreUpdate($sql){
            //  $query="insert INTO agent (`nom`, `prenom`, `photoProfil`, `adresse`, `type`, `etat`, `email`, `pass`) values('$nom','$prenom','$photoProfil','$adresse','$typeAgent','0','$email','$pass')";
              $retour = $this->link->exec($sql);  
              
              return $retour; 
        }


      
        function RechercheParametre($champ,$valeur){
            $query="select * FROM Parametre WHERE $champ =".$valeur;
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }


        function ListeParametre(){
            $query="select * FROM Parametre" ;
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
