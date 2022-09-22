<?php  
    class Dbconnection{
        private $host="localhost";
        private $db="feHand";
        private $user="root";
        private $password="";

        public $con;
        public $error=array();

         function connect(){
            try {
                    $this->con=new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->password);
                    $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                    return $this->con;
                    
                } 
            catch (PDOException $e) {
                    return $e->getMessage();
                  }     
     
            }  
            
           
      }
   
?>