<?php
include('../../admin/config/dbcon.php');
include('../includes/baseurl.php');
if(isset($_POST["action"])){
    $limit = '24';
    $page = 1;
    if($_POST['page'] > 1){
      $start = (($_POST['page'] - 1) * $limit);
      $page = $_POST['page'];
    }
    else{
      $start = 0;
    }
    
    
    $query = "SELECT * FROM news WHERE status = '0'";
        if(isset($_POST['category'])){
                $category = $_POST['category'];
                $query.="AND category = '$category'";
        }
        if(isset($_POST['sub_category'])){
            $sub_category = $_POST['sub_category'];
            $query.="AND sub_category = '$sub_category'";
        }
        $filter_query = $query. " LIMIT $start,$limit";

        $statement = $connect->prepare($query);
        $statement->execute();
        $total_data = $statement->rowCount();
        
        $statement = $connect->prepare($filter_query);
        $statement->execute();
        $result = $statement->fetchAll();
        $total_filter_data = $statement->rowCount();
        ?>


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="page-wrapper">
                                    <div class="portfolio row">
                                    <?php
                                    if($total_data > 0){
                                        foreach($result as $row){
                                            $files = $row['image']; 
                                            $file = explode(",",$files);
                                            $image =$file[0];
                                        ?>

                                            <div class="pitem item-w1 item-h1">
                                                <div class="blog-box">
                                                    <div class="post-media">
                                                        <a href="<?=base_url('trace/show/'.$row['slug'])?>" title="">
                                                            <img src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" alt="" class="img-fluid shadowdiv">
                                                            <div class="hovereffect">
                                                                <span>
                                                                </span>
                                                            </div><!-- end hover -->
                                                        </a>
                                                    </div><!-- end media -->
                                                    <div class="blog-meta">
                                                        <span class="bg-grey"><a href="<?= base_url('trace/section/'.$row['category']) ?>"><?=ucwords(preg_replace('/_/', ' ', $row['category'] )) ?></a></span>
                                                        <h4><a href="<?=base_url('trace/show/'.$row['slug'])?>" title=""><?= $row['title'] ?></a></h4>
                                                        <small>
                                                            <a title="">By: 
                                                                <?php
                                                                $id = $row['author_id'];
                                                                $author = "SELECT name FROM users WHERE id='$id' LIMIT 1";
                                                                $author_run = mysqli_query($con, $author);
                                                                    foreach( $author_run as $a){
                                                                        echo $a['name'];
                                                                    }
                                                                ?>
                                                            </a>
                                                        </small>
                                                        <small><?= date('d-M-Y',strtotime($row['created_at'])); ?></small>
                                                    </div><!-- end meta -->
                                                </div><!-- end blog-box -->
                                            </div><!-- end col -->
                                        <?php
                                        }}
                                        ?>
                                       

                                    </div><!-- end portfolio -->
                                </div><!-- end page-wrapper -->
        
                               
                            </div><!-- end col -->
                       























<?php
if($total_data > 0){
    $output = '
    
    <div style="margin-top:25px" class="ppp">
    <div class="pagination-box">
      <ul style="margin:auto" class="pagination">
    ';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;




if($total_links > 1){
    if($total_links > 4){
        if($page <= 5){
            for($count = 1; $count <= 5; $count++){
                $page_array[] = $count;
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
        }
        else{
            $end_limit = $total_links - 5;
            if($page > $end_limit){
            $page_array[] = 1;
            $page_array[] = '...';
            for($count = $end_limit; $count <= $total_links; $count++){
                $page_array[] = $count;
                }
            }
            else{
            $page_array[] = 1;
            $page_array[] = '...';
            for($count = $page - 1; $count <= $page + 1; $count++){
                $page_array[] = $count;
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
            }
        }
    }

    else{
        for($count = 1; $count <= $total_links; $count++){
            $page_array[] = $count;
        }
    }

for($count = 0; $count < count($page_array); $count++){
  if($page == $page_array[$count]){
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" style="pointer-events:none;" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';
    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0){
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {}
    else{
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" style="pointer-events:none;" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;

    

}}

}

  
?>
                <script src="<?= base_url('trace/assets/js/masonry.js') ?>"></script>
