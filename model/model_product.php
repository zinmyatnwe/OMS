<?php
include_once __DIR__.'/../includes/db.php';
class Product{
    private $pdo;
    public function getproductList(){
        //get connection
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //write sql
        $sql='select*from products';

        $statement=$this->pdo->prepare($sql);

        //execute statement
        $statement->execute();

        //result
        $products=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $products;

    }

    public function createProduct($name,$parent,$model,$brand,$color){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="insert into products(category_id,name,model,brand,color) values(:parent,:name,:model,:brand,:color)";
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":parent",$parent);
        $statement->bindParam(":name",$name);
       // $statement->bindParam(":price",$price);
        $statement->bindParam(":model",$model);
        $statement->bindParam(":brand",$brand);
        $statement->bindParam(":color",$color);
        
        //$statement->execute();

      if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function editProducts($id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from products where id=:id';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        $products=$statement->fetch(PDO::FETCH_ASSOC);
        return $products;
    }


    public function updateProducts($id,$name,$model,$brand,$color){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="update products set name=:name,model=:model,brand=:brand,color=:color where id=:id";
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->bindParam(":name",$name);
        //$statement->bindParam(":parent",$parent);
        //$statement->bindParam(":price",$price);
        $statement->bindParam(":model",$model);
        $statement->bindParam(":brand",$brand);
        $statement->bindParam(":color",$color);
        return $statement->execute();

     
    }
    public function getParents(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from products where parent=0';
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        
        $parents=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $parents;


    }

    public function deleteProducts($id){
        try{
            $this->pdo=Database::connect();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql='delete from prtoucts where id=:id';
            $statement=$this->pdo->prepare($sql);
            $statement->bindParam(':id',$id);
        
            $sql1='select * from products where parent=:id';
            $statement1=$this->pdo->prepare($sql1);
            $statement1->bindParam(':id',$id);   
            $statement1->execute();
            $product=$statement1->fetchAll(PDO::FETCH_ASSOC);
            if(count($product)>0){
                return false;
                
            }
            else{
                return $statement->execute();
        
            }
           }
           catch(PDOException $e){
            return false;
           }
            
        }  
        
       

    }

?>