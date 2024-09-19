<?php
include("../authentication.php");
$page_title = "News Edit";

include("../includes/header.php");
include("../includes/navbar.php");
if(isset($_GET["id"])){
    $news_id = $_GET['id'];
    $news_edit= "SELECT * FROM news WHERE id='$news_id'";
    $news_run = mysqli_query($con,$news_edit);
    if(mysqli_num_rows($news_run) > 0){
        $row=mysqli_fetch_array($news_run);
?>


<div class="container-fluid px -4" > 
    <div class="row mt-4">
        <div class="col-md-12">
        <?php include('../message.php'); ?>
            <div class="card"> 
                <div class="card-header" style="display:flex;justify-content:space-between">
                    <h4>Edit News</h4> 
                    <a href="<?= base_url('admin/news/list')?>" class="btn btn-danger float-end">BACK</a>
                </div> 
                <div class="card-body">
                    <form action="<?= base_url('admin/news/code') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <div class="row">
                            <input type="hidden" name="author_id" value="<?= $_SESSION['auth_user']['user_id'] ?>"> 
                            <div class="col-md-4 mb-3">
                                <label for="title">Name</label>
                                <input type="text" value="<?= $row['title'] ?>" name="title" class="form-control" id="title">
                            </div> 
                            <div class="col-md-6 mb-3">
                                <label for="category">category</label>
                                <select name="category" style="border:1px solid black" class="form-control" id="category">
                                    <option value="<?=$row['category'] ?>"><?=$row['category'] ?></option>
                                    <option value="computing">Computing</option>
                                    <option value="internet">Internet</option>
                                    <option value="it">It</option>
                                    <option value="mobile_tech">Mobile Tech</option>
                                    <option value="security">Security</option>
                                    <option value="tech_blog">Tech Blog</option>
                                    <option value="technology">Technology</option>
                                </select>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <label for="sub_category">Sub category</label>
                                <select name="sub_category"  style="border:1px solid black" class="form-control" id="sub_category">
                                    <option value="<?=$row['sub_category'] ?>"><?=$row['sub_category'] ?></option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="image">image</label>
                                <input type="hidden" name="old_image" value="<?=$row['image'] ?>">
                                <input type="file" class="form-control" id="image" name="image[]" multiple>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="newsdescription"><?= $row['description'] ?></textarea> 
                            </div>
        
                            <div class="col-md-12 mb-3 d-flex">
                                <button type="submit" name="update" class="btn btn-primary">Update News</button>
                                <button type="submit" name="updateDraft" class="btn btn-info ml-2">Save Draft</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    <div>
<div>



<?php 
    }}
include("../includes/footer.php");
?>


<script>

$(document).ready(function() {

    $("#newsdescription").summernote({

        placeholder: 'Type Description Here...',

        tabsize: 2,

        height: 400


      });

    $('.dropdown-toggle').dropdown();

});

$(document).ready(function() {
     $('.table').DataTable();
 } );

</script>

<script>
$(document).ready(function(){
    document.getElementById('category').addEventListener('change', function() {
        var d = this.value;
        if(d != ''){
            category();
        }
    });
    function category(){
        var data = $('#category').val();
        $.ajax({
            url:" <?= base_url('admin/news/ajax') ?>",
            type:"POST",
            cache:false,
            data:{data:data},
            success:function(data){
            $("#sub_category").html(data);
            }  
        });
        }
    });
</script>

