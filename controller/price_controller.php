<?php
include_once __DIR__ .'/../model/price_model.php';

class priceController extends Price{
    public function getPrice(){
        $result=$this->getPrices();
        return $result;
    }
}



?>