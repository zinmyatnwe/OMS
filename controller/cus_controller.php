<?php
include_once __DIR__."/../model/customer.php";
class CustomerController extends Customer{

public function getCustomers(){
    $customer=$this->getCustomerList();
    return $customer;
}

public function addCustomer($name,$phone,$address,$email){
    $result=$this->createCustomer($name,$phone,$address,$email);
    return $result;
}
public function updateCustomers($id,$name,$phone,$address,$email){
    $result=$this->updateCustomer($id,$name,$phone,$address,$email);
    return $result;
}

public function editCustomer($id){
    $result=$this->editCustomers($id);
    return $result;
}

public function deleteCustomer($id){
    try{
        $result=$this->deleteCustomers($id);
    return $result;
    }
    catch(PDOException $e){
        return false;
    }
}

}

?>