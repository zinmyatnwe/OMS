<?php
ob_start();
include_once 'layouts/sidebar.php';
include_once 'controller/categories_controller.php';

$categoriesController=new CategoriesController();
$categories=$categoriesController->getCategories();

if(isset($_GET['page']) && !empty($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
$result_page=$categoriesController->getCategoriesPage($page);




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
                        <div class="col-md-6">
                            <a href="create_categories.php" class="btn btn-primary">Add New Categories</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Parent</th> 
                                    <th>Actions</th>
                                </tr>
                            </thead>

                 <tbody id="cat_tbody">
                    <form action="" method="post">
                <?php
                $item_page=5;
                $number=1+($page-1)*$item_page;
                    for ($row=0; $row < count($result_page); $row++) { 
                        echo "<tr>";
                        echo "<td>". $row+$number ."</td>";
                       echo "<td>".$result_page[$row]['name']."</td>";
                       if($result_page[$row]['parent']==0){
                        echo "<td>-</td>";
                       }
                       else{
                        for ($index=0; $index <count($categories) ; $index++) { 
                            if($result_page[$row]['parent']==$categories[$index]['id']){
                                echo "<td>".$categories[$index]['name']."</td>";
                            }
                            
                        }
                       }
                     
                      echo "<td id='".$result_page[$row]['id']."'><a href='edit_categories.php?id=".$result_page[$row]['id']."' class='btn btn-warning mr-3'>Edit</a><a class='btn btn-danger delete'>Delete</a></td>";

                        echo "</tr>";
                    }
                      ?> 
                      </form>        
                 </tbody>
                
                        </table>
                </div>
                    </div>

                    <div class="row">
                        <div class="col-10">
                        <ul class="pagination">
   
    <?php
    $pages=ceil(count($categories)/$item_page);
    $previous=$page-1;
    $next=$page+1;
    if($page<=1){
        echo ' <li class="page-item disabled">
        <a class="page-link">Previous</a>
      </li>';
    }
    else{
        if($previous==1){
            echo ' <li class="page-item ">
            <a class="page-link" href="categories.php">Previous</a>
          </li>';
        }  
    }
    if($page==1){
        echo ' <li class="page-item active"><a class="page-link" href="categories.php">1</a></li>';   

    }
    else{
        echo ' <li class="page-item"><a class="page-link" href="categories.php">1</a></li>';
       
    }
    for ($index=2; $index <= $pages ; $index++) { 
        if($page==$index){
            echo ' <li class="page-item active"><a class="page-link" href="categories.php?page='.$index.'">'.$index.'</a></li>';
        }
        else{
            echo ' <li class="page-item "><a class="page-link" href="categories.php?page='.$index.'">'.$index.'</a></li>';
        }
        
    }
    if($page>=$pages){
        echo '<li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>';
    }
    else{
        echo '<li class="page-item">
        <a class="page-link" href="categories.php?page='.$next.'">Next</a>
      </li>';
    }
        ?>
   
    
    
  </ul>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include_once 'layouts/footer.php';

?>