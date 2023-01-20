<?php

include_once 'controller/product_controller.php';

$productController=new ProductController();
$id=$_POST['id'];
$result=$productController->deleteProduct($id);
if($result){
    echo "success";
}
else{
    echo 'fail';
}

?>