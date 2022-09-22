<?php  
    include_once('class.dataBase.php');

       class ManageConfiguration{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }
   
       // `Taux` `Commission` `MotDepasseRetrait`

        function ConfigurationRegistration($Taux,$Commission1,$Commission2,$MotDepasseRetrait){
            $query="insert INTO `configuration` (`Taux`, `Commission1`, `Commission2`, `MotDepasseRetrait`) values($Taux,$Commission1,$Commission2,'$MotDepasseRetrait')";
            $retour = $this->link->exec($query);  
            return $retour; 
        }
        function ConfigurationUpdate($sql){
            $retour = $this->link->exec($sql);  
            
            return $retour; 
        }
            
        function  ConfigurationReseach($champ, $Agent){
            $query="select * FROM `configuration` WHERE $champ = '".$Agent."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }

        function  ConfigurationList(){
            $query="select * FROM `configuration`" ;
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
