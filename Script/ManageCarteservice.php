<?php  
    include_once('class.dataBase.php');

       class ManageCarteservice{
        public $link;

        public function __construct(){
           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }
        function CarteserviceRegistration($Fonction,$IdAgent,$IdLigue,$IdArbitre){ 
            $query="insert INTO carteservice (`fonction`, `id_agent`, `id_ligue`, `id_arbitre`) values('$Fonction',$IdAgent,$IdLigue,$IdArbitre)";
            $retour = $this->link->exec($query);  
            return $retour; 
        }
        function CarteserviceUpdate($sql){
            $retour = $this->link->exec($sql);  
            
            return $retour; 
        }
        function CarteserviceReseach($champ, $valeur){
            $query="select * FROM carteservice WHERE $champ = '".$valeur."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
        function carteserviceList(){
            $query="select * FROM carteservice" ;
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
        function Login($MotDePasse,$mail){
            $query="select * FROM carteservice WHERE  pass ='$MotDePasse' and email='$mail'";
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
        function DeleteCarteservice($id){

            $sql="DELETE FROM carteservice WHERE id_carte=:id";

            $stm= $this->link->prepare($sql);
            $stm->bindParam("id", $id, PDO::PARAM_INT);

            $res=$stm->execute();

            return $res;

        }
         

       }


     

      
    ?>
