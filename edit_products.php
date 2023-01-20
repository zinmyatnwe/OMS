<?php
ob_start();
include_once 'layouts/sidebar.php';
include_once 'controller/product_controller.php';
include_once 'controller/categories_controller.php';

$productController= new ProductController();
//$model=$productController->getProducts();

$categoriesController=new CategoriesController();
//$categories=$categoriesController->getCategories();
$parents=$categoriesController->getParent();
$id=$_GET['id'];
$product=$productController->editProduct($id);

if(isset($_POST['update'])){
    $error=false;
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }
    else{
        $error=true;
    }
   
    if(!empty($_POST['price'])){
        $price=$_POST['price'];
    }
    else{
        $error=true;
    }
    if(!empty($_POST['model'])){
        $model=$_POST['model'];
    }
    else{
        $error=true;
    }
    if(!empty($_POST['brand'])){
        $brand=$_POST['brand'];
    }
    else{
        $error=true;
    }
    if(!empty($_POST['color'])){
        $color=$_POST['color'];
    }
    else{
        $error=true;
    }
   

        $result=$productController->updateProduct($id,$name,$model,$brand,$color);
        if($result){
         
     header("location:products.php");
        }
    }




?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="products.php" class="btn btn-primary">Back</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                       <form action="" method="post">
                       <!-- <div class="my-3">
                            <select name="category" id="" class="form-select">
                                <?php


                                    ?>

                            </select>

                        </div>-->
                       <div class="my-3">
                           <label for="" class="form-label">Name</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="Name" value="<?php echo $product['name']; ?>">
                           </div>
                          <!-- <div>
                                <select name="parent" id="" class="form-control" value="<?php echo $product['parent'];  ?>">
                                    
                                    <?php
                                    echo "<option> No Parent </option>";
                                    for ($index=0; $index <count($parents) ; $index++) { 
                                        echo "<option value='".$parents[$index]['id']."'>".$parents[$index]['name']."</option>";
                                    }


                                  ?>

                                </select>
                            </div>-->
                         
                           <div class="my-3">
                            <label for="" class="form-label">Model</label>
                            <input type="text" name="model" id="" class="form-control" value="<?php echo $product['model']; ?>">
                             
                           </div> 
                           <div class="my-3">
                           <label for="" class="form-label">Brand</label>
                            <input type="text" name="brand" id="" class="form-control" placeholder="Brand" value="<?php echo $product['brand']; ?>">
                           </div> 
                           <div class="my-3">
                           <label for="" class="form-label">Color</label>
                            <input type="text" name="color" id="" class="form-control" placeholder="Color" value="<?php echo $product['color']; ?>">
                           </div> 
                        
                           <div class="my-3">
                            <button class="btn btn-primary" name="update">Update</button>
                           </div>
                       </form>     
                            </div>
                        <div class="col-md-3"></div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include_once 'layouts/footer.php';


?>