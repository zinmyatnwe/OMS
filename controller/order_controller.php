<?php
include_once __DIR__."/../model/model_order.php";
class OrderController extends Order{

public function getOrders(){
    $order=$this->getOrderList();
    return $order;



}


}

?>