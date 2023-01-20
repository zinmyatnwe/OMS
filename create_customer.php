<?php
ob_start();
include_once 'layouts/sidebar.php';
include_once 'controller/cus_controller.php';

$customerController=new CustomerController();
//$customers=$customerController->getCustomers();

if(isset($_POST['add'])){
    $error=false;
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }
    else{
        $error=true;
    }
    if(!empty($_POST['phone'])){
        $phone=$_POST['phone'];
    }
    else{
        $error=true;
    }
    if(!empty($_POST['email'])){
        $email=$_POST['email'];
    }
    else{
        $error=true;
    }
    if(!empty($_POST['address'])){
        $address=$_POST['address'];
    }
    else{
        $error=true;
    }
    if(!$error){
        $result=$customerController->addCustomer($name,$email,$phone,$address);
        if($result){
         
     header("location:Customer.php");
        }
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
                                    <input type="text" name="name" id="" class="form-control" placeholder="Your Full Name">
                                </div>
                                <div class="my-3">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" id="" class="form-control" placeholder="Your Phone Number">
                                </div>
                                <div class="my-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" id="" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="my-3">
                                    <label for="" class="form-label">Address</label>
                                    <input type="text" name="address" id="" class="form-control" placeholder="Your Address" >
                                </div>
                                <div class="my-3">
                                    <button class="btn btn-info" name="add" type="submit">Add</button>
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