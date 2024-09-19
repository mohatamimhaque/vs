<?php
include("authentication.php");
$page_title="Mobile List";

include("includes/header.php");
include("includes/navbar.php");

?>

<form action="<?= base_url('admin/code/mobile') ?>" method="POST" class="delete_all">

<div class="container-fluid px-4 mt-4">
    
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <?php
                include("message.php");
            ?>
                 <div class="card-header" style="display:flex;justify-content:space-between">
                      <h3 class="mt-auto">Mobile</h3>
                      <div class="button-grp overflow-hidden d-flex" style="position:relative">
                          <div class="ml-5" style="position:relative">
                              <div  class="position-absolute" style="opacity:0">
                                  <input type="checkbox" style="width:110px;height:38px;" id="select_all"  class="select_all" id="select-all">
                              </div>                          
                              <div class=" mr-2" style="">
                                  <a href="" class="btn btn-effect btn-outline-light"  style="width:120px;height:38px;padding:11px 5px"  type="submit" name="hide">select all</a>
                              </div>
                          </div>
                          <div class=" mr-2" style="">
                              <button class="btn btn-effect btn-outline-primary"  style="width:90px;height:38px"  type="submit" name="hide">hide</button>
                          </div>
                          <div class="mr-2" style="">
                                <button class="btn btn-effect btn-outline-success"  style="width:90px;height:38px"  type="submit" name="visible">visible</button>
                            </div>
                            <div class="delete_all mr-2" style="">
                                <button class="btn btn-effect btn-outline-danger" style="width:100px;height:38px" type="submit" name="delete_all">Delete</button>
                            </div>
                            <div class="hide mr-2" style="">
                                <a class="btn btn-effect btn-outline-secondary"  style="width:90px;padding:11px 0"  href="<?= base_url('admin/mobile/add') ?>">add</a>
                            </div>
                    </div>               
                 </div>
                <div class="card-body">
                    
                     <div class="table-responsive">
                         <table class="table table-stripe" style="text-align:center;color:white" id="example">
                             <thead>
                                 <tr>
                                    <th  style="color:white">  ID</th>
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
                             $mobile ="SELECT * FROM mobile WHERE status!='2' ORDER BY id";
                             $mobile_run= mysqli_query($con, $mobile);
     
                             if(mysqli_num_rows($mobile_run) > 0){
                                 $x=1;
                                 foreach($mobile_run as $item){
                                     ?>
                                     <tr>
                                         <td class="d-flex">
                                            <input type="checkbox" value="<?=$item['id'] ?>" name="select_item[]" id="" class="select_item">
                                            <p>
                                                <?php 
                                                echo $x ;
                                                $x++;
                                    
                                                ?>
                                            </p>
                                        </td>
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
                                        <td><a href="<?=$url.'admin/mobile/edit/'.$item['id'] ?>" style="padding:5px 8px" class="btn btn-info">EDIT</a></td>
                                        <?php
                 if($user_level == "Administrator"){
                   ?>
                      <td>
                           <form action="<?= base_url('admin/code/mobile') ?>" method="POST">
                               <button class="btn btn-danger"c value="<?= $item['id'] ?>" type="submit" name="delete">Delete</button>
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
</form>




<?php 
include("includes/footer.php");
?>



