<?php
ob_start();
include_once 'layouts/sidebar.php';
include_once 'controller/cus_controller.php';

$customerController=new CustomerController();
$customers=$customerController->getCustomers();

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Customer</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="create_customer.php" class="btn btn-primary">Add New Customer</a>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                   <tbody id='cus_tbody'>
                   <?php
                    for ($row=0; $row < count($customers); $row++) { 
                        echo "<tr>";
                        echo "<td>". $row+1 ."</td>";
                       echo "<td>".$customers[$row]['name']."</td>";
                       echo "<td>".$customers[$row]['phone']."</td>";
                       echo "<td>".$customers[$row]['address']."</td>";
                       echo "<td>".$customers[$row]['email']."</td>";
                       echo "<td id='".$customers[$row]['id']."'><a href='edit_customer.php?id=".$customers[$row]['id']."' class='btn btn-warning mr-3'>Edit</a><a  class='btn btn-danger delete'>Delete</a></td>";

                        echo "</tr>";
                    }
                       ?> 
                   </tbody>        

                        </table>
                    </div>

                

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include_once 'layouts/footer.php';


?>