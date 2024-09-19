
<?php
    $query = "SELECT category FROM news";
    $query_run = mysqli_query($con, $query);
    $popular_category = array();
    $total_post = array();
        if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            $c = $row['category'];
            if (in_array($c, $popular_category, TRUE)){
            }
            else{
                $search = "SELECT * FROM news WHERE category = '$c'";
                $search_run = mysqli_query($con, $search);
                $x=0;
                $y=mysqli_num_rows($search_run);
                if(mysqli_num_rows($search_run) > 0){
                    foreach($search_run as $item){
                        $x = $x+$item['views'];
                    }}
                    $popular_category[$c]=$x;
                    $total_post[$c]=$y;
                    ?>
            <?php
            }}}
            arsort($popular_category);
            ?>
    
    <footer class="footer shadowdiv" style="padding:25px;background-color:transparent">
        <div class="">
            <div class="row">
                
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <?php
                                    $query = "SELECT * FROM news WHERE status = '0' ORDER BY created_at desc LIMIT 3";
                                    $query_run = mysqli_query($con, $query);
                                        if(mysqli_num_rows($query_run) > 0){
                                        $category = array();
                                        foreach($query_run as $row){
                                            ?>
                                        <a href="<?=base_url('trace/show/'.$row['slug'])?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 d-flex justify-content-between">
                                                <img src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" style='width:75px;height:75px' alt="" class="img-fluid shadowdiv">
                                                <h5 class="mb-1"> <?= $row['title'] ?></h5>
                                            </div>
                                        </a>
                                    <?php
                                }}
                                ?>

                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
                </div><!-- end col -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Popular News</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <?php
                                    $query = "SELECT * FROM news WHERE status = '0' ORDER BY views desc LIMIT 3";
                                    $query_run = mysqli_query($con, $query);
                                        if(mysqli_num_rows($query_run) > 0){
                                        $category = array();
                                        foreach($query_run as $row){
                                            ?>
                                        <a href="<?=base_url('trace/show/'.$row['slug'])?>" class="list-group-item list-group-item-action flex-column align-items-start" style=''>
                                            <div class="p-2 d-flex justify-content-between">
                                                <img src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" style='width:75px;height:75px'  alt="" class="img-fluid shadowdiv">
                                                <h5 class="mb-1"> <?= $row['title'] ?></h5>
                                            </div>
                                        </a>
                                    <?php
                                }}
                                ?>

                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Popular Categories</h2>
                        <div class="link-widget">
                            <ul>
                                <?php
                                 foreach($popular_category as $key => $value){
                                    foreach($total_post as $key2 => $value2){
                                        if($key==$key2){
                                            ?>
                                            <li><a href="<?= base_url('trace/section/'.$key2) ?>"><?=  ucwords(preg_replace('/_/',' ',$key)) ?><span>(<?= $value2 ?>)</span></a></li>
                                             <?php
                                            }
                                        }
                                    }
                                ?>
                            </ul>
                        </div><!-- end link-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->
            </div><!-- end row -->

     
        </div><!-- end  -->
    </footer>




            </div>
           
            


        </div>

       
        
     

        
     
        
     
        
        <script src="<?= base_url('trace/assets/easing/easing.min.js') ?>"></script>
        <script src="<?= base_url('trace/assets/slick/slick.min.js') ?>"></script>
        <script src="<?= base_url('trace/assets/owlcarousel/owl.carousel.min.js') ?>"></script>
        <script src="<?= base_url('trace/assets/js/script.js') ?>"></script>

    </body>
</html>
