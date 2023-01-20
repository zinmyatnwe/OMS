<?php
ob_start();
include_once 'layouts/sidebar.php';
include_once 'controller/order_controller.php';

$orderController=new orderController();
$orders=$orderController->getOrders();
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                   

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Orders</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Total_qty</th>
                                    <th>Total_Balance</th>
                                    
                                </tr>
                            </thead>
                    <?php
                    for ($row=0; $row < count($orders); $row++) { 
                        echo "<tr>";
                        echo "<td>". $row+1 ."</td>";
                       echo "<td>".$orders[$row]['total_qty']."</td>";
                       echo "<td>".$orders[$row]['total_balance']."</td>";
                      
                       echo "<td><a class='btn btn-primary mr-3'>Edit</a><a class='btn btn-info'>Delete</a></td>";

                        echo "</tr>";
                    }



                                       ?>         

                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include_once 'layouts/footer.php';


?>