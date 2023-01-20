<?php
ob_start();
include_once 'layouts/sidebar.php';
include_once 'controller/stock_controller.php';
include_once 'controller/product_controller.php';

$stockController=new StockController();
$result=$stockController->getStock();

$productController= new ProductController();
$model=$productController->getProducts();
// $parents=$productController->getParents();

if(isset($_POST['add'])){
    
    $parent=$_POST['parent'];
    if(!empty($_POST['unitprice'])){
        $unit_price=$_POST['unitprice'];
    }
    if(!empty($_POST['sellingprice'])){
        $selling_price=$_POST['sellingprice'];
    }
    if(!empty($_POST['qty'])){
        $qty=$_POST['qty'];
    }
    if(!empty($_POST['date'])){
        $date=$_POST['date'];
    }
    $result=$stockController->addStock($parent,$unit_price,$selling_price,$qty,$date);
    if($result){
        header('location:stocks.php');
    }
}
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">stocks</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="stocks.php" class="btn btn-primary">Back</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <form action="" method="post">
                          
                            <div class="my-2">
                                    <label for="" class="form-label">Products</label>
                                <select name="parent" id="" class="form-control">
                                    
                                    <?php
                                    echo "<option> No Parent </option>";
                                    for ($index=0; $index<count($model) ; $index++) { 
                                        echo "<option value='".$model[$index]['id']."'>".$model[$index]['name']."</option>";
                                    }


                                  ?>

                                </select>
                            </div>

                              
                           
                                <div class="my-2">
                                    <label for="" class="form-label">Unit Price</label>
                                    <input type="text" name="unitprice" id="" placeholder="Unit Price" class="form-control">
                                </div>
                                <div class="my-2">
                                    <label for="" class="form-label">Selling Price</label>
                                    <input type="text" name="sellingprice" id="" placeholder="Selling Price" class="form-control">
                                </div>
                                <div class="my-2">
                                    <label for="" class="form-label">Qty</label>
                                    <input type="text" name="qty" id="" placeholder="Qty" class="form-control">
                                </div>
                                <div class="my-2">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" name="date" id="" placeholder="Date" class="form-control">
                                </div>

                                <div class="my-2">
                                    <button class="btn btn-info" name="add">Add</button>

                                </div>



                            </form>
                        </div>
                    </div>



                

                

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include_once 'layouts/footer.php';


?>