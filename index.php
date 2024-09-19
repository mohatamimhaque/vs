<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");
include("includes/homeheader.php");
?>





<section>
    <div class="blog" style="position:relative">
        <div class="owl-carousel owl-theme blog-post">
        <?php
        $bg_color = array("rgba(215,32,224,0.6)", "rgba(280,64,57,0.6)", "rgba(77,62,243,0.6)", "rgba(131,89,74,0.6)", "rgba(74,80,128,0.6)","rgba(80,225,24,0.6)");
        $query = "SELECT * FROM news WHERE status = '0' ORDER BY created_at desc LIMIT 12";
        $query_run = mysqli_query($con, $query);
            if(mysqli_num_rows($query_run) > 0){
            $category = array();
            foreach($query_run as $row){
                $key = array_rand($bg_color);
                ?>
            <div class="blog-content" data-aos="zoom-in" data-aos-delay="200">
                <img src="<?= base_url('admin/upload/category/news/image/'.$row['image']) ?>" alt="post-1">
                <div class="blog-title" style="overflow:hidden;background-color: <?= $bg_color[$key]; ?>">
                    <p style="margin:22px auto;color:white;font-size:20px">NEW</p>
                    <div style="margin:10px auto;padding:0 12px;overflow:hidden;height:94px;">
                        <a href="<?= base_url('trace/show/'.$row['slug']) ?>" style="line-height:10px;color:white;font-size:24px;"><?= $row['title'] ?></a>
                    </div>
                    <div class="descript" style="padding:0 12px;color:white;margin:20px auto;height:120px;overflow:hidden"><?= $row['description'] ?></div>
                    <a style="padding:0 12px;margin-top:25px;color:white;font-size:18px;font-weight:700" href="<?= base_url('trace/show/'.$row['slug']) ?>">See Details <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
           
            <?php }}?>
        </div>
    </div>
   
</section>
<section style="width:92%;margin:auto">
    <?php
        $top = array();
        $q = mysqli_query($con, "SELECT * FROM category where status='0' ORDER BY views DESC LIMIT 6");
        if(mysqli_num_rows($q) > 0){
            foreach($q as $i){
                if (in_array($i['name'], $top, TRUE)){
                }
                else{
                  $top[]=$i['name'];
                  $t = $i['name'];
              
    ?>
    <div class="topCategory mb-5">
        <div class="topCategoryHeader" style="padding:12px 0">
            <p style="margin:0;padding:0;text-transform:uppercase;font-size:15px;font-weight:700;color:grey">Trending category</p>
            <a href="<?= base_url(strtolower($t)) ?>" style="margin:0;padding:0;font-size:30px;color:black;font-weight:600"><?= $t ?>s</a>
        </div>
        <div class="topCategoryBody">
            <div class="div1">
                <div class="left">
                    <div class="top">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM $t where status='0' ORDER BY views DESC LIMIT 1");
                    if(mysqli_num_rows($query) > 0){
                        foreach($query as $row){
                            $files = $row['image']; 
                            $file = explode(",",$files);
                            $image =$file[0];
                            ?>
                            <a href="<?= base_url(strtolower($t).'/show/'.$row['slug']) ?>" class="pupularview" data-aos="zoom-in" data-aos-delay="200">
                            <!--<img src="<?= base_url('admin/upload/category/'.$t.'/image/').$image ?>" > -->
                            <img src="<?= base_url('admin/upload/category/image/'.$i['image']) ?>" >
                                <div class="same" style="background-image:linear-gradient(330deg,#7600e0,#3c59fc)">
                                </div>
                                <div class="sametext">
                                    <div>
                                        <p>pupular</p>
                                        <p><?= $row['name'] ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php }} ?>
                    </div>
                    <div class="bottom">
                        <?php
                        $bg = array("linear-gradient(330deg,#ff164b,#ff5631);","linear-gradient(330deg,#7600e0,#ff2de0)");
                        ?>
                        <?php
                        $query = mysqli_query($con, "SELECT * FROM $t where status='0' ORDER BY id DESC LIMIT 2");
                        if(mysqli_num_rows($query) > 0){
                            $s=0;
                            foreach($query as $row){
                                $files = $row['image']; 
                                $file = explode(",",$files);
                                $image =$file[0];
                                ?>
                                <a href="<?= base_url(strtolower($t).'/show/'.$row['slug']) ?>" class="new" data-aos="fade-right" data-aos-delay="200">
                                    <!--<img src="<?= base_url('admin/upload/category/'.$t.'/image/').$image ?>" > -->
                                    <img src="<?= base_url('admin/upload/category/image/'.$i['image']) ?>" >
                                    <div class="same" style="background-image:<?= $bg[$s] ?>">
                                        
                                    </div>
                                    <div class="sametext">
                                        <div>
                                            <p>new</p>
                                            <p><?= $row['name'] ?></p>
                                        </div>
                                    </div>
                                </a>
                                <?php
                                $s= $s+1; 
                            }}
                        ?>
                    </div>
                </div>
                <div class="right">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM comparelist where product_type='$t' ORDER BY views DESC LIMIT 1");
                    if(mysqli_num_rows($query) > 0){
                        $s=0;
                        foreach($query as $row){
                            ?>
                            <a href="<?= base_url(strtolower($t).'/comparison/'.$row['title']) ?>" class="comparison" data-aos="fade-left" data-aos-delay="100">
                            <img src="<?= base_url('admin/upload/category/image/'.$i['image']) ?>" >
                                <div class="same" style="background-image: linear-gradient(330deg,#4a4a4a,#4a4a4a);">
                                        
                                </div>
                                <div class="sametext">
                                    <div data-aos="fade-right" data-aos-delay="100">
                                        <p>trending comparison</p>
                                        <p><?= $row['product_name'] ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php
                            } }
                        ?>
                </div>
            </div>
            <div class="div2 mt-2">
                <div class="item">
                   <p style="color:darkblue;font-size:16px;margin:0;padding:3px 0;font-weight:600">populer</p>
                    <ul class="item-list">
                        <?php
                    $query = mysqli_query($con, "SELECT * FROM $t where status='0' ORDER BY views DESC LIMIT 6");
                    $s = 1;
                    if(mysqli_num_rows($query) > 0){
                        foreach($query as $row){
        
                            ?>
                        <li class="list-items" data-aos="fade-right" data-aos-delay="<?= $s*100 ?>">
                            <a href="<?= base_url(strtolower($t).'/show/'.$row['slug']) ?>"><?= $s.'. '.$row['name'] ?></a>
                        </li>
                        <?php 
                        $s = $s+1;
                    }} ?>
                    </ul>
                </div>

                <div class="item">
                <?php
                    $review = array();
                    $r = mysqli_query($con, "SELECT * FROM reviews where category='$t'");
                    if(mysqli_num_rows($r) > 0){
                        foreach($r as $j){
                            $k = $j['url'];
                            if(count($review)!=6){
                                if (array_key_exists($k,$review)){
                                    $review[$k] = $review[$k] +1;
                                }
                                else{
                                    $review[$k]=1;
                                }
                            }
                        }}
        arsort($review);
       
                            ?>
                   <p style="color:darkblue;font-size:16px;margin:0;padding:3px 0;font-weight:600">top rated</p>
                    <ul class="item-list">
                        <?php
                        $s= 1;
                         foreach($review as $key => $value){
                            $query = mysqli_query($con, "SELECT * FROM $t where status='0' AND slug = '$key'");
                            if(mysqli_num_rows($query) > 0){
                                foreach($query as $row){
                                    ?>
                                    <li class="list-items" data-aos="zoom-in" data-aos-delay="<?= $s*100 ?>">
                                        <a href="<?= base_url(strtolower($t).'/show/'.$row['slug']) ?>"><?= $s.'. '.$row['name'] ?></a>
                                    </li>
                                <?php
                                }}
                         $s= $s+1;
                         } ?>
                    </ul>
                </div>
                <div class="item">
                   <p style="color:darkblue;font-size:16px;margin:0;padding:3px 0;font-weight:600">newest</p>
                    <ul class="item-list">
                        <?php
                    $query = mysqli_query($con, "SELECT * FROM $t where status='0' ORDER BY id DESC LIMIT 6");
                    $s = 1;
                    if(mysqli_num_rows($query) > 0){
                        foreach($query as $row){
        
                            ?>
                        <li class="list-items" data-aos="fade-left" data-aos-delay="<?= $s*100 ?>">
                            <a href="<?= base_url(strtolower($t).'/show/'.$row['slug']) ?>"><?= $s.'. '.$row['name'] ?></a>
                        </li>
                        <?php 
                        $s = $s+1;
                    }} ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php }}} ?>
</section>
<!-- ----------x---------- Blog Carousel --------x-------- -->

<!-- ---------------------- Site Content -------------------------->



















<?php
include("includes/footer.php")
?>