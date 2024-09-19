<?php 
include("authentication.php");
$page_title = "Edit Category";
include("includes/header.php");
include("includes/navbar.php");

if(isset($_GET["id"])){
    $category_id = $_GET['id'];
    $category_edit= "SELECT * FROM category WHERE id='$category_id'";
    $category_run = mysqli_query($con,$category_edit);
    if(mysqli_num_rows($category_run) > 0){
        $row=mysqli_fetch_array($category_run);
                    
?>

<div class="container-fluid px -4"> 
    <div class="row mt-4">
        <div class="col-md-12">
        <?php include('message.php'); ?>
            <div class="card"> 
                <div class="card-header" style="display:flex;justify-content:space-between">
                    <h4>Edit Category</h4> 
                    <a href="<?= base_url('admin/category/list') ?>" class="btn btn-danger float-end">BACK</a>
                </div> 
                <div class="card-body">
                    <form action="<?= base_url('admin/categorycode') ?>" method="POST"  enctype="multipart/form-data">
                        <input type="hidden" name="category_id" value="<?= $row['id'] ?>">

                        <div class="row"> 
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" id="name" required>
                            </div> 
                           
                            <div class="col-md-6 mb-3">
                            <input type="hidden" name="old_image" value="<?=$row['image'] ?>">
    <label for="image">category image</label>
    <input type="file" class="form-control" id="image" name="image" >
  </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" value="" class="form-control" rows="4" id="description"><?= $row['description'] ?></textarea> 
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="meta_title">Meta Title</label>
                                <input value="<?= $row['meta_title'] ?>" type="text" name="meta_title" max="191" class="form-control" id="meta_title" > 
                            </div> 
                            <div class="col-md-6 mb-3">
                                <label for="meta_description">Meta Description</label>
                                <input value="<?= $row['meta_description'] ?>" type="text" name="meta_description" class="form-control" id="meta_description">
                            </div> 
                            <div class="col-md-6 mb-3">
                                <label for="meta_keyword">Meta Keyword</label>
                                <input value="<?= $row['meta_keyword'] ?>" type="text" name="meta_keyword" class="form-control" id="meta_keyword" >
                            </div>
                           
                            <div class="mb-3" style="display:flex;justify-content:space-between;width:300px">
                                 <div class="d-flex m-auto">
                                    <input type="checkbox" name="status" style="margin:auto 0; width:16px;height:16px;" id="status" <?= $row['status'] == "1" ? "checked":"" ?>>
                                    <label for="status" style="margin:auto 4px">Status</label> <br/>
                                </div>
                                 <div class="d-flex">
                                    <input type="checkbox" name="navbar_status" style="margin:auto 0;width:16px;height:16px;" id="navbar_status" <?= $row['navbar_status'] == "1" ? "checked":'' ?>>
                                    <label for="navbar_status" style="margin:auto 4px">Navbar Status</label> <br/>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="category_update" class="btn btn-primary">Update Category</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    }
                    else{
                        ?>
                        <h4>No record Found</h4>
                </div>
            </div>
        </div>
    <div>
<div>



<?php
 }
}



include("includes/footer.php");
?>



