<?php
include("authentication.php");
if($_SESSION['auth_role'] != "1"){
    $_SESSION['message'] = "You are not access this page";
    header("Location: index.php");
    exit(0);

}
$page_title="Mobile Trash";

include("includes/header.php");
include("includes/navbar.php");

?>


<form class="container-fluid px-4 mt-4" action="<?= base_url('admin/code/mobile') ?>" method="POST">
    
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <?php
                include("message.php");
            ?>
                 <div class="card-header" style="display:flex;justify-content:space-between">
                      <h4>Trash</h4>
                      <div class="button-grp overflow-hidden d-flex" style="position:relative">
                      <div class="ml-5" style="position:relative">
                              <div  class="position-absolute" style="opacity:0">
                                  <input type="checkbox" style="width:110px;height:38px;" id="select_all"  class="select_all">
                              </div>                          
                              <div class=" mr-2" style="">
                                  <a href="" class="btn btn-effect btn-outline-light"  style="width:120px;height:38px;padding:11px 5px"  type="submit" name="b">select all</a>
                              </div>
                          </div>
                        <div class=" mr-2" style="">
                            <button class="btn btn-effect btn-outline-primary"  style="width:90px;height:38px"  type="submit" name="empty">empty</button>
                        </div>
                        <div class="delete_all mr-2" style="">
                            <button class="btn btn-effect btn-outline-danger" style="width:150px;height:38px" type="submit" name="permanently_delete_all">permanently delete</button>
                        </div>
                        <div class="mr-2" style="">
                            <button class="btn btn-effect btn-outline-success"  style="width:110px;height:38px"  type="submit" name="restore_all">restore</button>
                        </div>
                        <div class="hide mr-2" style="">
                            <a class="btn btn-effect btn-outline-secondary"  style="width:90px;padding:11px 0"  href="<?= base_url('admin/mobile/list') ?>">back</a>
                        </div>
                    </div>                 
                </div>
                <div class="card-body">
                    
                     <div class="table-responsive">
                         <table class="table table-stripe" style="text-align:center;color:white" id="example">
                             <thead>
                                 <tr>
                                    <th  style="color:white">Id</th>
                                    <th  style="color:white">Name</th>
                                    <th  style="color:white">Restore</th>
                                    <th  style="color:white">Permanently Delete</th>
                                 </tr>
                             </thead>
                             <tbody>
                             <?php
                             $mobile ="SELECT * FROM mobile WHERE status='2' ORDER BY id";
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
                                                 echo $x;
                                                 $x++
                                                 ?>
                                            </p>
                                        </td>
                                         <td><?=$item['name'] ?></td>
                                         <td>
                                            <form action="<?= base_url('admin/code/mobile') ?>" method="POST">
                                                 <button  style="padding:5px 8px" class="btn btn-outline-success" value="<?= $item['id'] ?>" type="submit" name="restore">Restore</button>
                                            </form>
                                            </td>
                                            <td>
                                                <form action="<?= base_url('admin/code/mobile') ?>" method="POST">
                                                    <button  style="padding:5px 8px" type="submit" name="permanently_delete" value="<?=$item['id'] ?>" class="btn btn-danger">Delete</button>
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
        
    </form>




<?php 
include("includes/footer.php");
?>



