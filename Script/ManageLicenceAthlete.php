<?php  
    include_once('class.dataBase.php');
       class ManageLicenceAthlete{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }
       function LicenathleteRegistration($DateLivraison,$DateCreation,$Duree,$IdAthlete){   
            $query="insert INTO licenathlete(`date_livraison`, `date_creation`, `durée`, `id_athlete`) values('$DateLivraison','$DateCreation','$Duree',$IdAthlete)";
             $this->link->exec($query);   
        }
            
        function RechercheLicenathlete($champ, $val){
            $query="select * FROM licenathlete WHERE $champ = '".$val."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
     
        function ListeLicenathlete(){
            $query="select * FROM licenathlete" ;
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
         function LicenathleteUpdate($query){
           $retour= $this->link->exec($query); 
            return $retour; 
             
        }
        function DeleteLicenceAthlete($id){

            $sql="DELETE FROM licenathlete WHERE id_licence=:id";

            $stm= $this->link->prepare($sql);
            $stm->bindParam("id", $id, PDO::PARAM_INT);

            $res=$stm->execute();

            return $res;

        }



       }


     

      
    ?>