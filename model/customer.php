<?php
include_once __DIR__.'/../includes/db.php';
class Customer{
    private $pdo;
    public function getCustomerList(){
        //get connection
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //write sql
        $sql='select*from customers';

        $statement=$this->pdo->prepare($sql);

        //execute statement
        $statement->execute();
        //result
        $customers=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $customers;

    }
    public function createCustomer($name,$email,$phone,$address){
        //get connection
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //sql
        $sql="insert into customers(name,phone,address,email) values(:name,:phone,:address,:email)";
        //prepare sql
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":phone",$phone);
        $statement->bindParam(":address",$address);
       // $statement->excute();

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function updateCustomer($id,$name,$phone,$address,$email){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //sql
        $sql="update customers set name=:name,phone=:phone,address=:address,email=:email where id=:id";
        //prepare sql
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":phone",$phone);
        $statement->bindParam(":address",$address);
        $statement->bindParam(":email",$email);
       // $statement->excute();
        return $statement->execute();
    }

    public function editCustomers($id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from customers where id=:id';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        $categories=$statement->fetch(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function deleteCustomers($id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='delete from customers where id=:id';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(':id',$id);
        return $statement->execute();
   
    
    }
      
}

?>