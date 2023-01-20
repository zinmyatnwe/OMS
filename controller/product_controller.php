<?php
include_once __DIR__."/../model/model_product.php";
class ProductController extends Product{

public function getProducts(){
    $product=$this->getproductList();
    return $product;
}

public function addProduct($name,$parent,$model,$brand,$color){
    $result=$this->createProduct($name,$parent,$model,$brand,$color);
    return $result;
}

public function editProduct($id){
    $result=$this->editProducts($id);
    return $result;
}

public function updateProduct($id,$name,$model,$brand,$color){
    $result=$this->updateProducts($id,$name,$model,$brand,$color);
    return $result;
}
public function getParent(){
    $result=$this->getParents();
    return $result;
}

public function deleteProduct($id){
    $result=$this->deleteProducts($id);
    return $result;
}





}

?>