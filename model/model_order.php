<?php
include_once __DIR__.'/../includes/db.php';
class Order{
    private $pdo;
    public function getOrderList(){
        //get connection
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //write sql
        $sql='select*from orders';

        $statement=$this->pdo->prepare($sql);

        //execute statement
        $statement->execute();

        //result
        $orders=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $orders;


    }
}



?>