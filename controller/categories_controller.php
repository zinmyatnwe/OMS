<?php
include_once __DIR__ .'/../model/model_categories.php';
class CategoriesController extends Categories{
    public function getcategories(){
        $categories=$this->getCategory();
        return $categories;
    }
    public function getParent(){
        $parent=$this->getParents();
        return $parent;
     }
     public function addCategory($name,$parent){
        $result=$this->addCat($name,$parent);
            return $result;
        }
        public function getCat($id){
            $result=$this->getCatInfo($id);
            return $result;
        }

        public function updateCategory($id,$name,$parent){
            $result=$this->updateCat($id,$name,$parent);
            return $result;
        }

        public function deleteCategory($id){
            $result=$this->deleteCat($id);
            return $result;
     }

     public function getCategoriesPage($page){
        $result=parent::getCategoriesPages($page);
        return $result;
     }
       
     }
    