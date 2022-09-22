<?php  
    include_once('class.dataBase.php');

       class ManageAgent{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }
        function AgentRegistration($Nom,$Postnom,$Prenom,$LieuNaissance,$DateNaissance){ 
            $query="insert INTO agent (`nom`, `postnom`, `prenom`, `lieu_naissance`, `date_naissance`) values('$Nom','$Postnom','$Prenom','$LieuNaissance','$DateNaissance')";
            $retour = $this->link->exec($query);  
            return $retour; 
        }
        function AgentUpdate($sql){
            $retour = $this->link->exec($sql);  
            
            return $retour; 
        }
        function AgentReseach($champ, $Agent){
            $query="select * FROM agent WHERE $champ = '".$Agent."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
        function AgentList(){
            $query="select * FROM agent" ;
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
        function Login($MotDePasse,$mail){
            $query="select * FROM agent WHERE  pass ='$MotDePasse' and email='$mail'";
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
