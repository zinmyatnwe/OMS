<?php
ob_start();
include_once 'layouts/sidebar.php';
include_once 'controller/stock_controller.php';
include_once 'controller/product_controller.php';

$stockController=new StockController();
$result=$stockController->getStock();


// $productController=new ProductController();
// $products=$productController->getProducts();
// $id=$_GET['id'];
// $history=$productController->historyProduct($id);




?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">stocks</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-6">
                            <a href="create_stock.php" class="btn btn-primary">Add Strock</a>
                           
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="stocks.php" class="btn btn-info">Selling Price</a>
                           
                        </div>
                    </div>
                    



                    <div class="row">
                        <div class="col-md-10">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                        
                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($row=0; $row < count($result) ; $row++) { 
                                        echo "<tr>";
                                        echo "<td>". ($row+1) ."</td>";
                                        // for ($index=0; $index <count($products) ; $index++) { 
                                        //     if($result[$row]['product_id']==$products[$index]['id']){
                                        //         echo "<td>". $products[$index]['name']."</td>";
                                        //     }
                                            
                                        // }
                                       echo "<td>".$result[$row]['name']."</td>";
                                        echo "<td>".$result[$row]['total_qty'] ."</td>";
                                       // echo "<td>" .$result[$row]['date'] ."</td>";
                                      //  echo "<td>" .$result[$row]['min_price'] * $result[$row]['qty'] ."</td>";
                                     echo "<td><a href='stock_history.php?id=".$result[$row]['product_id']."' class='btn btn-outline-success mr-3'>History</td>";
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