<?php
include_once __DIR__. '/../includes/db.php';

class Price{
    private $pdo;
    public function getPrices(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from price';
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $stock=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $stock;
        
    }
}


?>