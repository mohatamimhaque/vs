<?php
include('config.php');
include("../admin/config/dbcon.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">

    <title><?php if(isset($page_title)) { echo "$page_title"; } else { echo "vs"; } ?></title>
    <meta name="description" content="<?php if(isset($meta_description)) { echo '$meta_description'; } ?>" />
    <meta name="keyword" content="<?php if(isset($meta_keyword) ) { echo '$meta_keywords'; } ?>" />
    <meta name="author" content="vs" />
    
    <link rel="shortcut icon" href="<?= base_url('admin/assets/images/favicon.png') ?>" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <!-- ===== Website Title ===== -->
    
    
     
    <link rel="shortcut icon" href="<?= base_url('admin/assets/images/favicon.png') ?>"/>
    <link href="<?= base_url('admin/assets/css/dataTables.jqueryui.min.css') ?>" rel="stylesheet"/>
    
    <script src="<?= base_url('ajax/js/jquery-1.10.2.min.js') ?>"></script>
    <script src="<?= base_url('ajax/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('ajax/js/jquery-ui.js') ?>"></script>
    <link href = "<?= base_url('ajax/css/jquery-ui.css') ?>" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('ajax/css/style.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?= base_url('admin/assets/css/icons.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link href="<?= base_url('admin/assets/css/bootstrap.min.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/jquery-ui.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('admin/assets/css/app-style.css') ?>" rel="stylesheet"/>
    
    <link href="<?= base_url('admin/assets/css/dataTables.jqueryui.min.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/jquery.prodigal.css') ?>" rel="stylesheet" type="text/css"/>
    <script src="<?= base_url('assets/js/jquery.prodigal.js') ?>"></script>
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link href="<?= base_url('assets/css/button.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('assets/css/product.css') ?>" rel="stylesheet" type="text/css"/>
   <!-- <link href="<?= base_url('assets/css/neumorphism.css') ?>" rel="stylesheet" type="text/css"/>
-->


</head>
<script>
$(document).ready(function(){

$(".compareSearch3").on("keyup", function(){
var comparesearch = $(this).val();
if (comparesearch !=="") {
$.ajax({
url:"<?= base_url('laptop/ajax/compare') ?>",
type:"POST",
cache:false,
data:{compareSearch:comparesearch},
success:function(data){
 
$(".compareSearchResult").html(data);
$(".compareSearchResult").fadeIn();
}  
});
}else{
$(".compareSearchResult").html("");  
$(".compareSearchResult").fadeOut();
}
});
});

$(document).ready(function(){
    
    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
    
    
});
</script>

<?php
if(isset($_SESSION['laptop'])){

}
else{
    mysqli_query($con, "UPDATE category SET views=views+1 WHERE slug='laptop'");
    $_SESSION['laptop'] = "laptop";
}

?>
