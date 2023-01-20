<?php
ob_start();
include_once 'layouts/sidebar.php';
include_once 'controller/cus_controller.php';

$customerController=new CustomerController();
//$customers=$customerController->getCustomers();
$id=$_GET['id'];
$customer=$customerController->editCustomer($id);
if(isset($_POST['update'])){
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }
    if(!empty($_POST['phone'])){
        $phone=$_POST['phone'];
    }
  
    if(!empty($_POST['address'])){
        $address=$_POST['address'];
    }
    if(!empty($_POST['email'])){
        $email=$_POST['email'];
    }
    $update=$customerController->updateCustomers($id,$name,$phone,$address,$email);
    if($update){
        header('location:Customer.php');
    }

}


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
                            <a href="Customer.php" class="btn btn-primary">Back</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="my-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" id="" class="form-control" placeholder="Your Full Name" value="<?php echo $customer['name']; ?>">
                                </div>
                                <div class="my-3">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" id="" class="form-control" placeholder="Your Phone Number" value="<?php echo $customer['phone'];  ?>">
                                </div>
                               
                                <div class="my-3">
                                    <label for="" class="form-label">Address</label>
                                    <input type="text" name="address" id="" class="form-control" placeholder="Your Address" value="<?php echo $customer['address']; ?>" >
                                </div>
                                <div class="my-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" id="" class="form-control" placeholder="Your Email" value="<?php echo $customer['email'] ;?>">
                                </div>
                                <div class="my-3">
                                    <button class="btn btn-info" name="update" type="submit">Update</button>
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