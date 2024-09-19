<?php
session_start();
$page_title = 'Section';
if(isset($_GET['category'])){
    $category =  $_GET['category'];
    $page_title = ucwords(preg_replace('/_/', ' ',$category));
}
if(isset($_GET['sub_category'])){
    if($_GET['sub_category'] != ''){
        $sub_category =  $_GET['sub_category'];
        $page_title = ucwords(preg_replace('/_/', ' ',$sub_category));
    }
}
include('includes/header.php');
include('includes/navbar.php');


if(isset($_GET['category'])){
    $category =  $_GET['category'];
    $page_title = ucwords(preg_replace('/_/', ' ',$category));
    ?>
 <input type="hidden" id="category" value="<?= $category ?>">
 <?php
}
else{
    ?>
 <input type="hidden" id="category" value="">
 <?php
}
if(isset($_GET['sub_category'])){
    if($_GET['sub_category'] != ''){
        $sub_category =  $_GET['sub_category'];
        $page_title = ucwords(preg_replace('/_/', ' ',$sub_category));
        ?>
        <input type="hidden" id="sub_category" value="<?= $sub_category ?>">
        <?php
    }
    else{
        ?>
     <input type="hidden" id="sub_category" value="">
     <?php
    }
}
else{
    ?>
 <input type="hidden" id="sub_category" value="">
 <?php
}

?>



<section class="section wb" style="padding:25px 0">
    <ol class="breadcrumb hidden-xs-down">
        <li class="breadcrumb-item"><a  style='color:grey' href="<?= base_url('trace') ?>">Home</a></li>
        <li class="breadcrumb-item"><a  style='color:grey' href="<?= base_url('trace/section') ?>">Section</a></li>
        <?php
        if(isset($_GET['category'])){
        ?>
            <li class="breadcrumb-item"><a  style='color:grey' href="<?= base_url('trace/section/'.$_GET['category']) ?>"><?=ucwords(preg_replace('/_/', ' ', $_GET['category'] )) ?></a></li>
        <?php
        }
        if(isset($_GET['sub_category'])){
            if($_GET['sub_category'] != ''){
                ?>
                <li class="breadcrumb-item"><a  style='color:grey' href="<?= base_url('trace/section/'.$_GET['category'].'/'.$_GET['sub_category']) ?>"><?=ucwords(preg_replace('/_/', ' ', $_GET['sub_category'] )) ?></a></li>

        <?php
    }}
        ?>
       
    </ol>
    <div class="row show">

</section>







<script>
        $(document).ready(function(){

load_data(1);
function load_data(page){
    var category = $('#category').val();
    var sub_category = $('#sub_category').val();
    var fd = new FormData();
    fd.append('action','action');
    fd.append('page',page);
    if(category != ''){
        fd.append('category',category);
    }
    if(sub_category != ''){
        fd.append('sub_category',sub_category);
    }
    $.ajax({
        url:" <?= base_url('trace/ajax/trace') ?>",
        type:"POST",
        contentType: false,
        processData: false,
        data:fd,
        success:function(data){
        $(".show").html(data);
            }  
        });
    }
    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      load_data(page);
    });
});
</script>
<?php
include('includes/script.php');
include('includes/footer.php');
?>
