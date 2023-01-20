<?php
include_once __DIR__ .'/../model/stock_model.php';

class stockController extends Stock{
    public function getStock(){
        $result=$this->getStocks();
        return $result;
    }

    public function addStock($parent,$unit_price,$selling_price,$qty,$date){
        $result=$this->addStocks($parent,$unit_price,$selling_price,$qty,$date);
            return $result;
        }
public function historyStock($id){
    $result=$this->historyStocks($id);
    return $result;
}
      
    }




?>