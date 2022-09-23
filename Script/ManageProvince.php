<?php  
    include_once('class.dataBase.php');
       class ManageProvince{
        public $link;

       public function __construct(){

           $db=new Dbconnection();
           $this->link=$db->connect();

            return $this->link;
        }      
       function ProvinceRegistration($NomProvince){ 
            $query="insert INTO province(nom) values('$NomProvince')";
             $this->link->exec($query);   
        }
            
        function RechercheProvince($champ, $val){
            $query="select * FROM province WHERE $champ = '".$val."'";
            $res=$this->link->query($query);
            $data=$res->fetchAll(PDO::FETCH_OBJ);

           return $data;            
        }
     
        function ListeProvince(){
            $query="select * FROM province" ;
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

         function ProvinceUpdate($query){
           $retour= $this->link->exec($query); 
            return $retour; 
             
        }

        function DeleteProvince($id){

            $sql="DELETE FROM province WHERE id_province = :id";
            $res =$this->link->prepare($sql);
            $res->bindParam('id', $id, PDO::PARAM_INT);
            $retour = $res->execute();

            return $retour;
        }



       }


     

      
    ?>