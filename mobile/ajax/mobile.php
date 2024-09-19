
<?php

session_start();
include('../includes/config.php');
if(isset($_POST["action"])){
  if(isset($_POST["limit"])){
    $limit = $_POST["limit"];
  }

$page = 1;
if($_POST['page'] > 1){
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

  $u='';
	$query = "
		SELECT * FROM mobile WHERE status = '0'
	";

    if(isset($_POST["category"])){
        $category = $_POST["category"];
        if($category!= ''){
        $query.= "and brand='$category'";
      }
    }
    ?>
    



     <div class="filter-type">
           
  

            <div class="d-flex p-1">
              <h5 class=''>FILTER:</h5>

               

    <?php
    

  
    if(isset($_POST["criteria"])){
        $result = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'mobile'";
        $result_run = mysqli_query($con,$result);
        $search_result = array();
            foreach($result_run as $value) {
            foreach($value as $value) {
                $search ="SELECT * from mobile WHERE status='0' AND $value LIKE '%".str_replace(" ", "%", $_POST["criteria"][0])."%'";

        
                    $result = mysqli_query($con, $search);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                                $search_result[]=$row['name'];
                        }
                    }
            }
               
        }        
            
                $criteri_filter = implode("','", $search_result);
    $query .= "
     AND name IN('".$criteri_filter."')
    ";
    $name=explode("','",$criteri_filter);

    $u.='criteria-'.implode('-',$_POST["criteria"]).'/';
  

?>
 <div class="d-flex filter-data">
            
            <?php
              foreach($_POST["criteria"] as $value) {
            ?>

            <small><?= $value?></small>
            <?php 
              }
            
            ?>
        </div>

<?php


        }
    

        if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
        {
              $minimum = $_POST["minimum_price"];
              $maximum = $_POST["maximum_price"];
              $query .= "
              AND price BETWEEN $minimum AND  '$maximum'"
              ;
              
              ?>
              <div class="d-flex filter-data">
                  <p>
                      Price:
                  </p>
                  <small><?php echo $_POST["minimum_price"] ?> to <?php echo $_POST["maximum_price"] ?></small>
              </div>
            <?php
            $u.='price-'.$_POST["minimum_price"].'-to-'.$_POST["maximum_price"].'/';
        }
        
      
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND brand IN('".$brand_filter."')
		";
        $brand=explode("','",$brand_filter);
      
        ?>
        <div class="d-flex filter-data">
            <p>
                Brand:
            </p>
            <?php
              foreach($brand as $value) {
            ?>

            <small><?= $value?></small>
            <?php 
              }
              $u.='brand-'.implode('-',$brand).'/';
            
            ?>
        </div>
      <?php
	}
    if(isset($_POST["type"]))
            {
                $type_filter = implode("','", $_POST["type"]);
                $query .= "
                 AND device_type IN('".$type_filter."')
                ";
                $device_type=explode("','",$type_filter);
              
                ?>
                <div class="d-flex filter-data">
                    <p>
                       Device Type:
                    </p>
                    <?php
                      foreach($device_type as $value) {
                    ?>
        
                    <small><?= $value?></small>
                    <?php 
                      }
                    
                    ?>
                </div>
              <?php
              $u.= 'type-'.implode('-',$_POST["type"]).'/';
            }



if(isset($_POST["ram"])){
    $primary=array();
    ?>
       <div class="d-flex filter-data">
            <p>
                ram:
            </p>
           

    <?php
    foreach($_POST["ram"] as $r){
        $ram = "SELECT ram FROM mobile WHERE status='0'";
        $ram_run = mysqli_query($con, $ram);
        $ram_list = array();
        if(mysqli_num_rows($ram_run) > 0){
            foreach($ram_run as $ram){
                if (in_array($ram, $ram_list, TRUE)){
                }
                else{
                    if($r<=$ram['ram'])
                        $ram_list[]=$ram['ram'];
                }
        
            }
        
    }
        foreach($ram_list as $p){
            if (in_array($p, $primary, TRUE)){
            }
            else{
                 $primary[]=$p;
           }}
		$ram_filter = implode("','", $primary);
		$query .= "
		 AND ram IN('".$ram_filter."')
		";
        $ram=explode("','",$ram_filter);
        
        ?>
     
     <small><?= $r?>GB & Above</small>
     
     
     <?php
	}
    echo " </div>";
    $u.='ram';
   foreach($_POST["ram"] as $r){
       $u.='-'.$r.'_gb_above';
   }
   $u.='/';
        
}
	
	if(isset($_POST["camera"]))
    
	{	
        $camera=$_POST["camera"];
        $camera_list = array("flash", "rear_camera", "front_camera","rear_camera_details");
        ?>
        <div class="d-flex filter-data">
        <p>
            Camera:
        </p>
       
        <?php
          
        
        
   
        foreach($camera as $feature) {
       
        foreach($camera_list as $value) {
                if($value==$feature){
                    $query .="AND $value = '1'";
                }
                else if($value == "rear_camera_details"){
                    $list = array();
                    $search = "SELECT rear_camera_details FROM mobile where status= '0'";
                    $result = mysqli_query($con,$search);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $str = $row['rear_camera_details'];
                            $target =(explode(" ",$str));
                            $t=(int)preg_replace('/MP/', '', $target[0]);
                            $s=(int)preg_replace('/MP/', '', (explode(" ",$feature))[0]);
                            $s=(int)$feature;
                            if($s<=$t){
                                $list[]=$str;
                            }
                            
                        }   
                    }
                    
                    $filter = implode("','", $list);
    $query .= "
     AND rear_camera_details IN('".$filter."')
    ";
    $rear_camera_details=explode("','",$filter);
                   

   
        echo '<small>'.preg_replace('/_/', ' ', $feature).'</small>';

   
                 
                }       
                

        }
        
    }
    ?>
         </div>
         <?php
       
       $u.='camera-'.implode('-',$_POST["camera"]).'/';
    
	}
	
  if(isset($_POST["connectivity"]))
    
	{	
        $connectivity=$_POST["connectivity"];
        $connectivity_list = array("3g", "4g", "5g","volte","wifi","headphone_jack");
        ?>
        <div class="d-flex filter-data">
        <p>
            Connectivity:
        </p>
       
        <?php 
          
        
        
   
        foreach($connectivity_list as $value) {
            foreach($connectivity as $value2) {
                if($value==$value2){
                    $query .="AND $value = '1'";
                    if($value=="headphone_jack"){
                    ?>
                    <small>3.5MM Jack</small>
                    <?php
                    }
                    else{
                    ?>
                    <small><?= $value?></small>
                    <?php
                    }
                }

        }
    }
		?>
         </div>
        <?php
      $u.='connectivity-'.implode('-',$_POST["connectivity"]).'/';
    
	}
	if(isset($_POST["feature"]))
    
	{	
        $feature=$_POST["feature"];
        $feature_list =$_POST["feature"];
        ?>
        <div class="d-flex filter-data">
        <p>
        Features:
        </p>
       
        <?php 
          
        
        
   
        foreach($feature_list as $value) {
            foreach($feature as $value2) {
                if($value==$value2){
                    $query .="AND $value = '1'";
            
                    if($value =="card_slot"){
                    ?>

<small>memory card supported</small>
<?php
                    }
else {
    echo '<small>'.preg_replace('/_/', ' ', $value).'</small>';
}

                    
                }

        }
    }
		?>
         </div>
        <?php
    
    $u.='feature-'.implode('-',$_POST["feature"]).'/';
	}

        if(isset($_POST["storage"])){
            $primary=array();
            ?>
               <div class="d-flex filter-data">
                    <p>
                        Storage:
                    </p>
                   
        
            <?php
            foreach($_POST["storage"] as $s){
                $storage = "SELECT storage FROM mobile WHERE status='0'";
                $storage_run = mysqli_query($con, $storage);
                $storage_list = array();
                if(mysqli_num_rows($storage_run) > 0){
                    foreach($storage_run as $storage){
                        if (in_array($storage, $storage_list, TRUE)){
                        }
                        else{
                            if($s<=$storage['storage'])
                                $storage_list[]=$storage['storage'];
                        }
                
                    }
                
            }
                foreach($storage_list as $p){
                    if (in_array($p, $primary, TRUE)){
                    }
                    else{
                         $primary[]=$p;
                   }}
                $storage_filter = implode("','", $primary);
                $query .= "
                 AND storage IN('".$storage_filter."')
                ";
                $storage=explode("','",$storage_filter);
              
                ?>
             
                    <small><?= $s?>GB & Above</small>
                    
               
              <?php
            }
            echo " </div>";
            $u.='storage';
            foreach($_POST["storage"] as $r){
                $u.='-'.$r.'_gb_above';
            }
            $u.='/';
        }
            


    ?>
     </div>
            
            <hr>
                      </div>

    <?php











    if(isset($_POST["sort"]))
	{
        $sort = $_POST["sort"];
		$query .="ORDER BY $sort[0]";
        $u.= 'sortby-'.implode('-',$_POST["sort"]);
       
	}
   $u = strtolower(preg_replace('/ /', '_', $u));
   
   function set_url($url){
       echo("<script>history.replaceState({},'','$url');</script>");
   }
   if(!empty($u)) {
       set_url('?query='.$u); 
}



$filter_query = $query. " LIMIT $start,$limit";

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();
$fisrt_id=0;
$last_id = $fisrt_id +1;
    ?>
    <div class="showingResultCount">
        <p><?=$start?>-<?=$start+$total_filter_data ?> of <?=$total_data?> Matched Results</p>
    </div>
    <div class='grid-view'>
    <?php
    if($total_data > 0){
		foreach($result as $row){
	$files = $row['image']; 
    $file = explode(",",$files);
    $image =$file[0];
    ?>
    
    <div class="grid-box">
        <div>

            <div class="product_image">
                <a href="<?= base_url('mobile/show/'.$row['slug']);?>">
                    <img src="<?= $url?>admin/upload/category/mobile/image/<?= $image ?>" alt="<?= $image ?>">
                   
                </a>
            </div>
            <a class="product-name" href="<?= base_url('mobile/show/'.$row['slug']);?>">
                <h3>
                    <?= $row['name']?>
                </h3>
            </a>
            <div class="position-absolute p" style="bottom:8px;height:35px;width:90%" >
                <div class="position-relative" style='margin:auto;width:130px;height:35px;'>
                    <button type='submit' id=""  class="position-relative mobile_compare btn" style='width:100%' value="<?= $row['id'] ?>"><i class="fa-solid fa-plus"></i>Compare</button>
                </div>
            </div>
           
        </div>
    </div>


<?php
$last_id++;
        }}
?>
   </div>
<?php



   echo "<div class='list-view'>";
	if($total_data > 0){
		foreach($result as $row){
			$files = $row['image']; 
            $file = explode(",",$files);
            $image =$file[0];
    ?>
    <div class="product_box">
    <div class="product_image">
      <div>
      <img src="<?= $url?>admin/upload/category/mobile/image/<?= $image ?>" alt="<?= $image ?>">
      </div>

    </div>


    <div class="product_details">
        <a href="<?= base_url('mobile/show/'.$row['slug']);?>" style="color:rgb(123, 122, 122);font-size: 28px;margin:0;font-weight: 400;" class="pt-1">
            <?= $row['name']?>
        </a>
        <hr>
        <div class="product_header">
        <p style="color:rgb(123, 122, 122);font-size: 17px;margin:0;font-weight: 700;">Product feature</p>
        <small>        
            <a href="<?= base_url('mobile/show/'.$row['slug']);?>">view all sepecification</a>
        </small>
        </div>


        <div class="row mt-2">
        <div class="col-md-6">
            <p>
            <i class="fa-solid fa-check"></i>
            <?php
            if($row['dual_sim'] == '1'){
            echo 'Dual sim';
            }
            if($row['3g'] == '1'){
            echo ', 3G';
            }
            if($row['4g'] == '1'){
            echo ', 4G';
            }
            if($row['5g'] == '1'){
            echo ', 5G';
            }
            if($row['volte'] == '1'){
            echo ', VoLTE';
            }
            if($row['wifi'] == '1'){
            echo ', Wifi';
            }
            if(!is_null($row['extra'])){

            echo ', '.$row['extra'];
            }
            ?>
            </p>
            <p>
            <i class="fa-solid fa-check"></i>
            <?php 
            if(!is_null($row['core_details'])){

            echo $row['core_details'];
            }

            ?>
            </p>
            <p>
            <i class="fa-solid fa-check"></i>
            <?php 
            if(!is_null($row['ram'])){

            echo $row['ram'].'GB Ram, ';
            }

            ?>
            <?php 
            if(!is_null($row['storage'])){

            echo $row['storage'].'GB inbuilt Memory';
            }

            ?>
            </p>

            <p>
            <i class="fa-solid fa-check"></i>
            <?php 
            if(!is_null($row['battery_size'])){

            echo $row['battery_size'].' ';
            }

            ?>
            <?php
            if($row['fast_charging'] == '1'){
            if(!is_null($row['fast_charging_details'])){

                echo 'with'.$row['fast_charging_details'];
            }
            
            }
            ?>
            </p>
                </div>
                <div class="col-md-6 sm-none">
                <p>
            <i class="fa-solid fa-check"></i>
            <?php 
            if(!is_null($row['size'])){

            echo $row['size'];
            }
            if(!is_null($row['refresh_rate'])){

            echo ', '.$row['refresh_rate'].' display';
            }

            ?>
            </p>
                <p>
            <i class="fa-solid fa-check"></i>
            <?php 
            if($row['rear_camera'] == '1')
            echo $row['rear_camera_details']
            ?>
            <?php 
            if($row['front_camera'] == '1')
            echo ', '.$row['front_camera_details']
            ?>
            </p>
                <p>
            <i class="fa-solid fa-check"></i>
            <?php 
            if($row['card_slot'] == '1')
            echo 'memory card supported '.$row['card_slot_details']
            ?>
            </p>
            <p>
            <i class="fa-solid fa-check"></i>

            <?php 

            if(!is_null($row['os'])){

            echo $row['os'];
            }


            ?>
            </p>
                </div>
              </div>
    </div>
    <div class="product_sidebar d-flex align-items-center justify-content-center">
      <div class='p'>
        <div class="mb-2">
          <i class="fas fa-star star-light mr-1 <?= $row['slug'].'_main_star'?>"></i>
          <i class="fas fa-star star-light mr-1 <?= $row['slug'].'_main_star'?>"></i>
          <i class="fas fa-star star-light mr-1 <?= $row['slug'].'_main_star'?>"></i>
          <i class="fas fa-star star-light mr-1 <?= $row['slug'].'_main_star'?>"></i>
          <i class="fas fa-star star-light mr-1 <?= $row['slug'].'_main_star'?>"></i>
        </div>
        <input type="hidden" id="surl" class="<?= $row['slug'];?>" value="<?= $row['slug'];?>" name="url">
        <div style='margin:auto;width:130px;height:35px;'>
          <button type='submit' id=""  class="position-relative mobile_compare btn" style='width:100%' value="<?= $row['id'] ?>"><i class="fa-solid fa-plus"></i>Compare</button>
        </div>
      </div>
    </div>
  </div>

<script>
      $(document).ready(function(){
     load_rating_data();

    function load_rating_data(){
    var url = $('.<?= $row['slug'];?>').val();
    $.ajax({
          url:"<?= base_url('ajax/submitrating') ?>",
        method:"POST",
        data:{action:'load_data',url:url},
        dataType:"JSON",
        success:function(data){
              var count_star = 0;
            $('.<?= $row['slug'].'_main_star'?>').each(function(){
                count_star++;
                if(Math.ceil(data.average_rating) >= count_star)
                {
                    $(this).addClass('text-warning');
                    $(this).addClass('star-light');
                }
            });

            $('#total_five_star_review').text(data.five_star_review);

            $('#total_four_star_review').text(data.four_star_review);

            $('#total_three_star_review').text(data.three_star_review);

            $('#total_two_star_review').text(data.two_star_review);

            $('#total_one_star_review').text(data.one_star_review);

            $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

            $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

            $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

            $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

            $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

            if(data.review_data.length > 0)
            {
                var html = '';

                for(var count = 0; count < data.review_data.length; count++)
                {
                    html += '<div class="row mb-3">';

                    html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                    html += '<div class="col-sm-11">';

                    html += '<div class="card">';

                    html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                    html += '<div class="card-body">';

                    for(var star = 1; star <= 5; star++)
                    {
                        var class_name = '';

                        if(data.review_data[count].rating >= star)
                        {
                            class_name = 'text-warning';
                        }
                        else
                        {
                            class_name = 'star-light';
                        }

                        html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                    }

                    html += '<br />';

                    html += data.review_data[count].user_review;

                    html += '</div>';

                    html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                    html += '</div>';

                    html += '</div>';

                    html += '</div>';
                }

            }
        }
    })
}

});
  </script>
		
        
    <?php    
		}
	}
    echo "</div>";
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
          $previous_link = '<li><a  href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
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
    else{
        echo '<p class="text-warning" style="font-size:38px;margin:0">No data found</p>';
    }
}


?>



