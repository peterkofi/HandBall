<?php  
    include_once('class.dataBase.php');
       class ManageLicenceCoach{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }
       function LicenceCoachRegistration($Coach, $Categorie){   
            $query="insert INTO licencoach(`id_coach`, `categorie`) values($Coach,'$Categorie')";
             $this->link->exec($query);   
        }
            
        function RechercheLicenceCoach($champ, $val){
            $query="select * FROM licencoach WHERE $champ = '".$val."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
     
        function ListeLicenceCoach(){
            $query="select * FROM licencoach" ;
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
         function LicenceCoachUpdate($query){
           $retour= $this->link->exec($query); 
            return $retour; 
             
        }
        function DeleteLicenceCoach($id){

            $sql="DELETE FROM licencoach WHERE id_licenceCoach=:id";

            $stm= $this->link->prepare($sql);
            $stm->bindParam("id", $id, PDO::PARAM_INT);

            $res=$stm->execute();

            return $res;

        }



       }


     

      
    ?>