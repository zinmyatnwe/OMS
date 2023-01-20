<?php
include_once __DIR__. '/../includes/db.php';

class Stock{
    private $pdo;
    public function getStocks(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select sum(stock.qty) as total_qty,products.name,product_id
        from stock join products where products.id=stock.product_id group by products.name';
        $statement=$this->pdo->prepare($sql);

        //  $sql1='select sum(stock_history.qty + stock.qty) from stock_history join stock where stock_history.product_id=stock.product_id
        // group by stock.product_id';
        // $statement1=$this->pdo->prepare($sql1);

        $statement->execute();
        $stock=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $stock;
    }     

    

    public function addStocks($parent,$unit_price,$selling_price,$qty,$date){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="insert into stock_history(product_id,unit_price,selling_price,qty,date) values(:name,:min_price,:max_price,:qty,:date)";
        $statement=$this->pdo->prepare($sql);
       
        $statement->bindParam(":name",$parent);  
        $statement->bindParam(":min_price",$unit_price);
        $statement->bindParam(":max_price",$selling_price);
        $statement->bindParam(":qty",$qty);
        $statement->bindParam(":date",$date);

        $statement=$this->pdo->prepare($sql1);
       
        if($statement->execute()){
           
            return true;
        }
        else{
            return false;
        }    
    }

    public function historyStocks($id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * 
        from stock_history
       where product_id=:id' ;
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();       
        $stock=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $stock;
    }

}


?>