<?php
include("authentication.php");
$page_title = "Category Add";

include("includes/header.php");
include("includes/navbar.php");

?>
<div class="container-fluid px -4" > 
    <div class="row mt-4">
        <div class="col-md-12">
        <?php include('message.php'); ?>
            <div class="card"> 
                <div class="card-header" style="display:flex;justify-content:space-between">
                    <h4>Add Category</h4> 
                    <a href="<?= base_url('admin/category/list')?>" class="btn btn-danger float-end">BACK</a>
                </div> 
                <div class="card-body">
                    <form action="<?= base_url('admin/categorycode') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div> 
                            <div class="col-md-6 mb-3">
    <label for="image">category image</label>
    <input type="file" class="form-control" id="image" name="image"  required>
  </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="4" id="description"></textarea> 
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" max="191" class="form-control" id="meta_title" > 
                            </div> 
                            <div class="col-md-6 mb-3">
                                <label for="meta_description">Meta Description</label>
                                <input type="text" name="meta_description" class="form-control" id="meta_description">
                            </div> 
                            <div class="col-md-6 mb-3">
                                <label for="meta_keyword">Meta Keyword</label>
                                <input type="text" name="meta_keyword" class="form-control" id="meta_keyword">
                            </div>
                           
                            <div class="mb-3" style="display:flex;justify-content:space-between;width:300px">
                                 <div class="d-flex">
                                    <input type="checkbox" name="status" style="margin:auto 0;width:16px;height:16px;" id="status">
                                    <label for="status" style="margin:auto 4px">Status</label> <br/>
                                </div>
                                 <div class="d-flex">
                                    <input type="checkbox" name="navbar_status" style="margin:auto 0;width:16px;height:16px;" id="navbar_status">
                                    <label for="navbar_status" style="margin:auto 4px">Navbar Status</label> <br/>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="category_add" class="btn btn-primary">Save Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <div>
<div>



<?php 
include("includes/footer.php");
?>



