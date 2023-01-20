<?php
ob_start();
include_once 'layouts/sidebar.php';
include_once "controller/categories_controller.php";

$categoriesController=new CategoriesController();
$parents=$categoriesController->getParent();

if(isset($_POST['add'])){
    $error=false;
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }
    else{
        $error=true;
    }
    $parent=$_POST['parent'];
    $result=$categoriesController->addCategory($name,$parent);
    if($result){
        header("location:categories.php");
    }
}

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <div class="col-md-6">
                        <a href="categories.php" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="" method="post">
                            <div class="my-3">
                                <label for="" class="form-label" >Name</label>
                                <input type="text" name="name" id="" class="form-control">
                            </div>
                            <div>
                                <select name="parent" id="" class="form-control">
                                    
                                    <?php
                                    echo "<option> No Parent </option>";
                                    for ($index=0; $index <count($parents) ; $index++) { 
                                        echo "<option value='".$parents[$index]['id']."'>".$parents[$index]['name']."</option>";
                                    }


                                  ?>

                                </select>
                            </div>
                            <div class="my-3">
                                <button class="btn btn-primary" name="add">Add</button>
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

