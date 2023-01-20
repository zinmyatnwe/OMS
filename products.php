<?php
ob_start();
include_once 'layouts/sidebar.php';
include_once 'controller/product_controller.php';
include_once 'controller/categories_controller.php';

$productController=new ProductController();
$products=$productController->getProducts();

// echo "<pre>";
// var_dump($products);
// echo "</pre>";

// $length = count($products);

//  echo "<pre>";
// var_dump($products[$length -1]);
//  echo "</pre>";



$categoriesController=new CategoriesController();
$categories=$categoriesController->getCategories();

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Products</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="create_product.php" class="btn btn-primary">Add New Products</a>
                        </div>
                    </div>

                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Parent</th>
                                    
                                    <th>Model</th>
                                    <th>Brand</th>
                                    <th>Color</th>
                                    <th>Actions</th>
                                    
                                </tr>
                            </thead>
                   <tbody id='tbody'>
                   <?php
                    for ($row=0; $row < count($products); $row++) { 
                        echo "<tr>";
                        echo "<td>". $row+1 ."</td>";
                       for ($index=0; $index <count($categories) ; $index++) { 
                            if($products[$row]['category_id']==$categories[$index]['id']){
                                echo "<td>". $categories[$index]['name']."</td>";
                            }
                            
                        }
                       echo "<td>".$products[$row]['name']."</td>";
                       echo "<td>".$products[$row]['model']."</td>";
                       echo "<td>".$products[$row]['brand']."</td>";
                       echo "<td>".$products[$row]['color']."</td>";
                       echo "<td id='".$products[$row]['id']."'><a href='edit_products.php?id=".$products[$row]['id']."' class='btn btn-warning mr-3'>Edit</a><a class='btn btn-danger delete'>Delete</a></td>";

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