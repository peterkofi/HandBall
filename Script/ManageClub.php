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
            $query="insert INTO club( `nom_club`, `photo_club`, `annee_creation`, `president`, `id_ligue`, `id_province`) values('$NomClub','$PhotoClub','$AnneeCreation','$President',$IdLeague,$IdProvince)";
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

        function DeleteClub($id){

            $sql="DELETE FROM club WHERE id_club=:id";

            $stm= $this->link->prepare($sql);
            $stm->bindParam("id", $id, PDO::PARAM_INT);

            $res=$stm->execute();

            return $res;

        }



       }


     

      
    ?>