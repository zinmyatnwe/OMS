<?php

include_once 'controller/cus_controller.php';

$customersController=new CustomerController();
if(isset($_POST['c_id'])){
    $id = $_POST["c_id"];

    $result=$customersController->deleteCustomer($id);
if($result){
    
    echo "success";
}
else{
    echo 'fail';
}
}
else{
    echo "fail";
}


?>