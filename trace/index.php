<?php
session_start();
$page_title = 'Trace';
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="py-3">
    <div class="">
        <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
            <?php
            $query = "SELECT * FROM news WHERE status = '0' ORDER BY views desc LIMIT 4";
            $query_run = mysqli_query($con, $query);
                if(mysqli_num_rows($query_run) > 0){
                $category = array();
                foreach($query_run as $row){
                    ?>
                <div class="shadowdiv">

                    <div class="d-flex">
                        <img class="shadowdiv" src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>"  alt= '="<?=$row['image'] ?>' style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                            <a class="text-dark font-weight-semi-bold" href="<?=base_url('trace/show/'.$row['slug'])?>"><?= $row['title'] ?></a>
                        </div>
                    </div>
                </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<div class="top-news">
    <div class="">
        <div class="row">
            <div class="col-md-6 tn-left">
                <div class="row tn-slider">
                    <?php
              
                $query = "SELECT * FROM news WHERE status = '0' ORDER BY views desc LIMIT 2";
                    $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                        $category = array();
                        foreach($query_run as $row){
                            ?>
                    <div class="col-md-6">
                        <div class="tn-img">
                            <img class='shadowdiv' src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" />
                            <div class="tn-title">
                                <a href="<?=base_url('trace/show/'.$row['slug'])?>"><?= $row['title'] ?></a>
                            </div>
                        </div>
                    </div>
                  <?php
                        }}
                        $rstart = $row['id'];
                  ?>
                </div>
            </div>
            <div class="col-md-6 tn-right">
                <div class="row shadowdiv">
                    <?php
                    $query = "SELECT * FROM news WHERE status = '0' ORDER BY views desc LIMIT  2,4";
                    $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                        $category = array();
                        foreach($query_run as $row){
                            ?>
                            <div class="col-md-6">
                                <div class="tn-img ml-1 mb-1">
                                    <img src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" />
                                    <div class="tn-title">
                                        <a href="<?=base_url('trace/show/'.$row['slug'])?>"><?=$row['title'] ?> </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }}
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
              <!-- Featured News Slider Start -->
<div class="py-3">
    <div class="">
        <div class="d-flex shadowdiv align-items-center justify-content-between bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Featured</h3>
            <a class="text-secondary font-weight-medium text-decoration-none" href="<?= base_url('trace/section')?>">View All</a>
        </div>
        <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
        <?php
        $query = "SELECT * FROM news WHERE status = '0' ORDER BY created_at desc LIMIT 8";
        $query_run = mysqli_query($con, $query);
            if(mysqli_num_rows($query_run) > 0){
            $category = array();
            foreach($query_run as $row){
                ?>
                
                    <div class="position-relative shadowdiv yy overflow-hidden" style="height: 300px;">
                        <img class="img-fluid shadowdiv w-100 h-100" src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="<?= base_url('trace/section/'.$row['category']) ?>"><?=ucwords(preg_replace('/_/', ' ', $row['category'] )) ?></a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white"><?= date('d-M-Y',strtotime($row['created_at'])); ?></a>
                            </div>
                            <a class="h4 m-0 text-white" href="<?=base_url('trace/show/'.$row['slug'])?>"><?=$row['title'] ?></a>

                        </div>
                    </div>
                    <?php
            }}
            ?>
            </div>

    </div>
</div>
   
    <!-- Featured News Slider End -->


    <!-- Category News Slider Start -->
    <div class="">
        <div class="">
            <div class="row">
                <div class="col-lg-6 py-3">
                    <div class="bg-light shadowdiv py-2 px-4 mb-3">
                        <h3 class="m-0">Computing</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <?php
                        $query = "SELECT * FROM news WHERE status = '0' AND category='computing' ORDER BY id desc LIMIT 3";
                        $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0){
                            $category = array();
                            foreach($query_run as $row){
                                ?>
                            <div class="position-relative shadowdiv">
                                <img class="shadowdiv img-fluid w-100" src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="<?= base_url('trace/section/'.$row['category']) ?>"><?=ucwords(preg_replace('/_/', ' ', $row['category'] )) ?></a>
                                        <span class="px-1">/</span>
                                        <span><?= date('d-M-Y',strtotime($row['created_at'])); ?></span>
                                    </div>
                                    <a class="h4 m-0" href="<?=base_url('trace/show/'.$row['slug'])?>"><?=$row['title'] ?></a>
                                </div>
                            </div>
                            <?php
                            }}
                            ?>
                       
                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="bg-light shadowdiv py-2 px-4 mb-3">
                        <h3 class="m-0">Internet</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <?php
                        $query = "SELECT * FROM news WHERE status = '0' AND category='internet' ORDER BY id desc LIMIT 3";
                        $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0){
                            $category = array();
                            foreach($query_run as $row){
                                ?>
                            <div class="position-relative shadowdiv">
                                <img class="img-fluid shadowdiv w-100" src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="<?= base_url('trace/section/'.$row['category']) ?>"><?=ucwords(preg_replace('/_/', ' ', $row['category'] )) ?></a>
                                        <span class="px-1">/</span>
                                        <span><?= date('d-M-Y',strtotime($row['created_at'])); ?></span>
                                    </div>
                                    <a class="h4 m-0" href="<?=base_url('trace/show/'.$row['slug'])?>"><?=$row['title'] ?></a>
                                </div>
                            </div>
                            <?php
                            }}
                            ?>
                       
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
    <!-- Category News Slider End -->
    <!-- Category News Slider Start -->
    <div class="">
        <div class="">
            <div class="row">
                <div class="col-lg-6 py-3">
                    <div class="bg-light shadowdiv py-2 px-4 mb-3">
                        <h3 class="m-0">IT</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <?php
                        $query = "SELECT * FROM news WHERE status = '0' AND category='it' ORDER BY id desc LIMIT 3";
                        $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0){
                            $category = array();
                            foreach($query_run as $row){
                                ?>
                            <div class="position-relative shadowdiv">
                                <img class="shadowdiv img-fluid w-100" src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="<?= base_url('trace/section/'.$row['category']) ?>"><?=ucwords(preg_replace('/_/', ' ', $row['category'] )) ?></a>
                                        <span class="px-1">/</span>
                                        <span><?= date('d-M-Y',strtotime($row['created_at'])); ?></span>
                                    </div>
                                    <a class="h4 m-0" href="<?=base_url('trace/show/'.$row['slug'])?>"><?=$row['title'] ?></a>
                                </div>
                            </div>
                            <?php
                            }}
                            ?>
                       
                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="bg-light shadowdiv py-2 px-4 mb-3">
                        <h3 class="m-0">Mobile Tech</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <?php
                        $query = "SELECT * FROM news WHERE status = '0' AND category='mobile_tech' ORDER BY id desc LIMIT 3";
                        $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0){
                            $category = array();
                            foreach($query_run as $row){
                                ?>
                            <div class="position-relative shadowdiv">
                                <img class="img-fluid shadowdiv w-100" src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="<?= base_url('trace/section/'.$row['category']) ?>"><?=ucwords(preg_replace('/_/', ' ', $row['category'] )) ?></a>
                                        <span class="px-1">/</span>
                                        <span><?= date('d-M-Y',strtotime($row['created_at'])); ?></span>
                                    </div>
                                    <a class="h4 m-0" href="<?=base_url('trace/show/'.$row['slug'])?>"><?=$row['title'] ?></a>
                                </div>
                            </div>
                            <?php
                            }}
                            ?>
                       
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
    <!-- Category News Slider End -->
    <!-- Category News Slider Start -->
    <div class="">
        <div class="">
            <div class="row">
                <div class="col-lg-6 py-3">
                    <div class="bg-light shadowdiv py-2 px-4 mb-3">
                        <h3 class="m-0">Security</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <?php
                        $query = "SELECT * FROM news WHERE status = '0' AND category='security' ORDER BY id desc LIMIT 3";
                        $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0){
                            $category = array();
                            foreach($query_run as $row){
                                ?>
                            <div class="position-relative shadowdiv">
                                <img class="shadowdiv img-fluid w-100" src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="<?= base_url('trace/section/'.$row['category']) ?>"><?=ucwords(preg_replace('/_/', ' ', $row['category'] )) ?></a>
                                        <span class="px-1">/</span>
                                        <span><?= date('d-M-Y',strtotime($row['created_at'])); ?></span>
                                    </div>
                                    <a class="h4 m-0" href="<?=base_url('trace/show/'.$row['slug'])?>"><?=$row['title'] ?></a>
                                </div>
                            </div>
                            <?php
                            }}
                            ?>
                       
                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="bg-light shadowdiv py-2 px-4 mb-3">
                        <h3 class="m-0">Technology</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <?php
                        $query = "SELECT * FROM news WHERE status = '0' AND category='technology' ORDER BY id desc LIMIT 3";
                        $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0){
                            $category = array();
                            foreach($query_run as $row){
                                ?>
                            <div class="position-relative shadowdiv">
                                <img class="img-fluid shadowdiv w-100" src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="<?= base_url('trace/section/'.$row['category']) ?>"><?=ucwords(preg_replace('/_/', ' ', $row['category'] )) ?>
                                        <span class="px-1">/</span>
                                        <span><?= date('d-M-Y',strtotime($row['created_at'])); ?></span>
                                    </div>
                                    <a class="h4 m-0" href="<?=base_url('trace/show/'.$row['slug'])?>"><?=$row['title'] ?></a>
                                </div>
                            </div>
                            <?php
                            }}
                            ?>
                       
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
    <!-- Category News Slider End -->











<?php
include('includes/script.php');
include('includes/footer.php');
?>

