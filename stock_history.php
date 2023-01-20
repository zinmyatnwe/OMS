<?php
ob_start();
include_once 'layouts/sidebar.php';
include_once 'controller/stock_controller.php';
include_once 'controller/product_controller.php';

$stockController=new StockController();
$results=$stockController->getStock();
$id=(isset($_GET['id'])) ? $_GET["id"] : null;
$history=$stockController->historyStock($_GET["id"]);


$productController=new ProductController();
$products=$productController->getProducts();







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
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                          <th>Unit Price</th> 
                                          <th>Selling Price</th>                                   
                                         <th>Qty</th>
                                        <th>Date</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($row=0; $row <count($history) ; $row++) { 
                                        echo "<tr>";
                                        echo "<td>". ($row+1) ."</td>";
                                        for ($index=0; $index <count($products) ; $index++) { 
                                                if($history[$row]['product_id']==$products[$index]['id']){
                                                    echo "<td>". $products[$index]['name']."</td>";
                                                }
                                                
                                            }
                                        echo "<td>". $history[$row]['unit_price'] ."</td>";
                                        echo "<td>". $history[$row]['selling_price'] ."</td>";
                                        echo "<td>". $history[$row]['qty'] ."</td>";
                                        echo "<td>". $history[$row]['date'] ."</td>";
                                        //echo "<td><a href='stocks.php?id=".$history[$row]['id']."' class='btn btn-primary'>Add</a></td>";
                                        echo "</tr>";
                                        
                                    }



                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include_once 'layouts/footer.php';


?>