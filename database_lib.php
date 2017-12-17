<?php
class DB {

        private $pdo;

        public function __construct($host, $dbname, $username, $password) {
                 try{
                    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->pdo = $pdo;
                }
                catch(PDOException $e){
                    //$error = $e->getMessage();
                }
        }
        
        public function session($query) {
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                
                $data = $statement->fetch(PDO::FETCH_ASSOC);
                return $data;
        }
    
         public function select_by_id($query) {
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                
                $data = $statement->fetch(PDO::FETCH_ASSOC);
                return $data;
        }
        public function select($query) {
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                
                $data = $statement->fetchAll();
                return $data;
        }
    
        public function insert($query) {
                try{
                    $statement = $this->pdo->prepare($query);
                    $statement->execute();
                }
                catch(PDOException $e){
                    //$error = $e->getMessage();
                    $statement=false;
                }
                return $statement;
            
        }
    
    public function update($query) {
                try{
                    $statement = $this->pdo->prepare($query);
                    $statement->execute();
                }
                catch(PDOException $e){
                    //$error = $e->getMessage();
                    $statement=$e;
                }
                return $statement;
            
        }

}
?>