<?php
session_start();
include("../../admin/config/dbcon.php");
include("../../includes/baseurl.php");
$id = $_SESSION['auth_user']['user_id'];
$sql = mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
foreach($sql as $item){}

  $limit=12;
$page = 1;
if($_POST['page'] > 1){
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else{
  $start = 0;
}
if(isset($_POST["load_data"])){
    $load_data = $_POST["load_data"];
        ?>
        <div class="dataheader shadowdiv">
            <h3>Reviews</h3>
        </div>
        <?php
        $query = "SELECT * FROM reviews WHERE user_id='$id'";
        $filter_query = $query. " LIMIT $start,$limit";

        $statement = $connect->prepare($query);
        $statement->execute();
        $total_data = $statement->rowCount();
        
        $statement = $connect->prepare($filter_query);
        $statement->execute();
        $result = $statement->fetchAll();
        $total_filter_data = $statement->rowCount();
        
        if($total_data > 0){
            ?>
            <div class="databody">
            <?php
            foreach($result as $row){
                $url = $row['url'];
                $category = $row['category'];
                foreach(mysqli_query($con,"SELECT * FROM $category WHERE slug='$url'") as $s){
                    $files = $s['image']; 
                    $file = explode(",",$files);
                    $image =$file[0];
                };

                ?>
                <div style="padding-bottom:6px;border-bottom:1px dotted rgba(0,0,0,0.6);margin-top:12px">
                    <p style="font-size:13px;color:rgba(0,0,0,0.6);margin:0;padding:0;text-align:start">you reviewed <a style="color:rgba(0,0,0,0.9);font-weight:600" href="<?= base_url($category.'/show/'.$url) ?>"><?= $s['name'] ?></a></p>
                    <small style="font-size:10px;color:rgba(0,0,0,0.7;margin:0;padding:0;line-height:0px);"><?= date('d-M-Y',strtotime($row['created_at'])); ?></small>
                    <div class="d-flex mt-1">
                        <div>
                            <div style='width:45px;height:45px;' class='mt-2 mr-2 d-flex justify-content-center'>
                                <img src="<?= base_url('admin/upload/category/'.$category.'/image/'.$image) ?>" alt="" style="width:auto;height:100%;border:none;">
                            </div>
                        </div>
                        <div>
                        <a style="color:rgba(0,0,0,0.9);font-weight:600;font-size:14px;line-height:0px" href="<?= base_url($category.'/show/'.$url) ?>"><?= $s['name'] ?></a>
                        <p style="font-size:13px;color:rgba(0,0,0,0.7);margin:0;padding:0;text-align:start"><?=$row['summary'] ?></p>
                        </div>
                    </div>
                </div>
                <?php
             }
            ?>
        </div>
        <?php
        }
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
              if($page <= 5)
              {
                for($count = 1; $count <= 5; $count++)
                {
                  $page_array[] = $count;
                }
                $page_array[] = '...';
                $page_array[] = $total_links;
              }
              else
              {
                $end_limit = $total_links - 5;
                if($page > $end_limit)
                {
                  $page_array[] = 1;
                  $page_array[] = '...';
                  for($count = $end_limit; $count <= $total_links; $count++)
                  {
                    $page_array[] = $count;
                  }
                }
                else
                {
                  $page_array[] = 1;
                  $page_array[] = '...';
                  for($count = $page - 1; $count <= $page + 1; $count++)
                  {
                    $page_array[] = $count;
                  }
                  $page_array[] = '...';
                  $page_array[] = $total_links;
                }
              }
            }
            else
            {
              for($count = 1; $count <= $total_links; $count++)
              {
                $page_array[] = $count;
              }
            }
            
            for($count = 0; $count < count($page_array); $count++)
            {
              if($page == $page_array[$count])
              {
                $page_link .= '
                <li class=" active">
                  <a  href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
                </li>
                ';
               // <script>history.replaceState({},"","?page='.$page_array[$count].'");</script>
            
                $previous_id = $page_array[$count] - 1;
                if($previous_id > 0)
                {
                  $previous_link = '<li><a style="margin-right:30px"  href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
                }
                
                $next_id = $page_array[$count] + 1;
                if($next_id > $total_links)
                {}
                else
                {
                  $next_link = '<li><a  href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
                }
              }
              else
              {
                if($page_array[$count] == '...')
                {
                  $page_link .= '
                  <li>
                      <a style="pointer-events: none;" href="#">...</a>
                  </li>
                  ';
                }
                else
                {
                  $page_link .= '
                  <li><a  href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
                  ';
                }
              }
            }}
            
            $output .= $previous_link . $page_link . $next_link;
            $output .= '
              </ul>
            
            </div>
          </div>
        
            ';
            
            
            echo $output;
            }

}




?>

<style>
  .ppp {
    display: grid;
    place-items: center;
    text-align: center;
  }
  .pagination-box {
    padding: 10px;
    border-radius: 3px;
  }
  .pagination {
    display: flex;
    list-style: none;
  }
  .pagination li {
    margin: 0px 5px;
    background: none;
    flex: 1;
    border-radius: none;
    box-shadow:none;
  }
  .pagination li a {
    font-size: 18px;
    text-decoration: none;
    color: #4d3252;
    height:20px;
    width: 20px;
    display: block;
    line-height: 45px;
  }
  .pagination li:first-child a {
    width: 20px;
  }
  .pagination li:last-child a {
    width: 20px;
  }
  .pagination li.active {
    box-shadow:none;
      pointer-events: none;
  }
  .pagination li.active a {
    font-size: 17px;
    color: #6f6cde;
  }
  .pagination li:first-child {
    margin: 0 15px 0 0;
  }
  .pagination li:last-child {
    margin: 0 0 0 15px;
  }
</style>