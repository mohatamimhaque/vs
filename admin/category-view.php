<?php
include("authentication.php");
$page_title = "Category List";

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
                      <a href="<?=base_url("admin/category/add") ?>" class="btn btn-outline-primary">Add Category</a>
                </div>
                <div class="card-body">
                    
                     <div class="table-responsive">
                         <table class="table table-stripe" style="text-align:center;color:white" id="example">
                             <thead>
                                 <tr>
                                    <th  style="color:white">ID</th>
                                    <th  style="color:white">Name</th>
                                    <th  style="color:white">Status</th>
                                    <th  style="color:white">Edit</th>
                                    <?php
                 if($user_level == "Administrator"){
                   ?>
                                    <th  style="color:white">Delete</th>
                   <?php
                 }
                ?>   
                                 </tr>
                             </thead>
                             <tbody>
                             <?php
                             $category ="SELECT * FROM category WHERE status!='2'";
                             $category_run= mysqli_query($con, $category);
     
                             if(mysqli_num_rows($category_run) > 0){
                                 foreach($category_run as $item){
                                     ?>
                                     <tr>
                                         <td><?=$item['id'] ?></td>
                                         <td><?=$item['name'] ?></td>
                                         <td>
                                            <?php
                                               if($item['status'] == '1'){
                                                   echo "hidden";
                                               }  
                                               else{
                                                   echo "visible";
                                               } 
                                            ?>
                                        </td>
                                        <td><a href="<?=base_url("admin/category/edit/").$item['id'] ?>" class="btn btn-outline-info">EDIT</a></td>
                                        <?php
                 if($user_level == "Administrator"){
                   ?>
                      <td>
                           <form action="<?=base_url('admin/categorycode') ?>" method="POST">
                               <button class="btn btn-outline-danger" value="<?= $item['id'] ?>" type="submit" name="category_delete">Delete</button>
                           </form>
                       </td>
                   <?php
                 }
                ?>   
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



