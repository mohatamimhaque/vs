<?php
include("authentication.php");
if($_SESSION['auth_role'] != "1"){
    $_SESSION['message'] = "You are not access this page";
    header("Location: index.php");
    exit(0);

}
$page_title = "Category Trash";
include("includes/header.php");
include("includes/navbar.php");

?>


<div class="container-fluid px-4 mt-4">
    
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <?php
                include("message.php");
            ?>
                 <div class="card-header" style="display:flex;justify-content:space-between">
                      <h4>Post Category</h4>
                      <a href="<?= base_url('admin/category/list') ?>" class="btn btn-outline-primary">back</a>
                </div>
                <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-stripe" style="text-align:center;color:white" id="example">
                             <thead>
                                 <tr>
                                    <th  style="color:white">Name</th>
                                    <th  style="color:white">Restore</th>
                                    <th  style="color:white">Permanently Delete</th>
                                 </tr>
                             </thead>
                             <tbody>
                             <?php
                             $category ="SELECT * FROM category WHERE status='2'";
                             $category_run= mysqli_query($con, $category);
     
                             if(mysqli_num_rows($category_run) > 0){
                                 foreach($category_run as $item){
                                     ?>
                                     <tr>
                                       
                                         <td><?=$item['name'] ?></td>
                                         <td>
                                             <form action="<?= base_url('admin/categorycode') ?>" method="POST">
                                                 <button class="btn btn-outline-success" value="<?= $item['id'] ?>" type="submit" name="category_restore">Restore</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="<?= base_url('admin/categorycode') ?>" method="POST">
                                                  <button type="submit" name="perment_delete" value="<?=$item['id'] ?>" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        
                                        </tr>
                                     <?php
                                 }
                             }
                             else{
                                 ?>
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                 <?php
                             }
                                 ?>
                                 
                                 
                             </tbody>
                         </table>
                     </div>
                </div>
            </div>
        </div>
    </div>
    
</div>




<?php 
include("includes/footer.php");
?>



