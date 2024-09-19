
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
		SELECT * FROM laptop WHERE status = '0'
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
        $result = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'laptop'";
        $result_run = mysqli_query($con,$result);
        $search_result = array();
            foreach($result_run as $value) {
            foreach($value as $value) {
                $search ="SELECT * from laptop WHERE status='0' AND $value LIKE '%".str_replace(" ", "%", $_POST["criteria"][0])."%'";

        
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
    
    if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])){
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
    if(isset($_POST["brand"])){
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
    if(isset($_POST["device_type"])){
      $device_type = array();
      foreach($_POST["device_type"] as $d){
        $device_type[] = ucwords(preg_replace('/_/',' ',$d));
      }

                $type_filter = implode("','", $device_type);
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
        $u.= 'device_type-'.implode('-',$_POST["device_type"]).'/';
    }
    if(isset($_POST["utility"])){
      $utility = array();
      foreach($_POST["utility"] as $ut){
        $utility[] = ucwords(preg_replace('/_/',' ',$ut));
      }

                $utility_filter = implode("','", $utility);
                $query .= "
                 AND utility IN('".$utility_filter."')
                ";
                $utility=explode("','",$utility_filter);
              
                ?>
                <div class="d-flex filter-data">
                    <p>
                       Utility:
                    </p>
                    <?php
                      foreach($utility as $value) {
                    ?>
        
                    <small><?= $value?></small>
                    <?php 
                      }
                    
                    ?>
                </div>
              <?php
        $u.= 'utility-'.implode('-',$_POST["utility"]).'/';
    }
    if(isset($_POST["screen_size"])){
          $primary=array();
          ?>
            <div class="d-flex filter-data">
                <p>
                  Screen Size:
                </p>
          <?php
                  $list = array();
                  $u.='screen_size';
          foreach($_POST["screen_size"] as $r){
            $u.='-'.$r;
            $r = explode('_',$r)[0];
        
              $screen_size = "SELECT size FROM laptop WHERE status='0'";
              $screen_size_run = mysqli_query($con, $screen_size);
              if(mysqli_num_rows($screen_size_run) > 0){
                  foreach($screen_size_run as $screen_size){
                      $s = explode('.',$screen_size['size'])[0];
                      if (in_array($screen_size['size'], $list, TRUE)){
                      }
                      else{
                          if($r<=$s)
                              $list[]=$screen_size['size'];
                      }
                    }
                  }
                  ?>
                    <small><?= $r ?> Inches & Above</small>
                    <?php
                }
                ?>
     </div>
      <?php
                $size_filter = implode("','", $list);
                $query .= "
                AND size IN('".$size_filter."')
                ";
                $u.='/';

    }
    if(isset($_POST["resolution"])){
      $resolution = array();
      foreach($_POST["resolution"] as $r){
        $resolution[] = preg_replace('/_/',' ',$r);
      }

                $resolution_filter = implode("','", $resolution);
                $query .= "
                 AND resolution IN('".$resolution_filter."')
                ";
                $resolution=explode("','",$resolution_filter);
              
                ?>
                <div class="d-flex filter-data">
                    <p>
                       Resolution:
                    </p>
                    <?php
                      foreach($resolution as $value) {
                    ?>
        
                    <small><?= $value?></small>
                    <?php 
                      }
                    
                    ?>
                </div>
              <?php
        $u.= 'resolution-'.implode('-',$_POST["resolution"]).'/';
    }
    if(isset($_POST["cpu_brand"])){
      $cpu_brand = array();
      foreach($_POST["cpu_brand"] as $cb){
        $cpu_brand[] = ucwords(preg_replace('/_/',' ',$cb));
      }

                $cpu_brand_filter = implode("','", $cpu_brand);
                $query .= "
                 AND processor_brand IN('".$cpu_brand_filter."')
                ";
                $cpu_brand=explode("','",$cpu_brand_filter);
              
                ?>
                <div class="d-flex filter-data">
                    <p>
                      CPU brand:
                    </p>
                    <?php
                      foreach($cpu_brand as $value) {
                    ?>
        
                    <small><?= $value?></small>
                    <?php 
                      }
                    
                    ?>
                </div>
              <?php
        $u.= 'cpu_brand-'.implode('-',$_POST["cpu_brand"]).'/';
    }
    if(isset($_POST["cpu_model"])){
      $cpu_model = array();
      foreach($_POST["cpu_model"] as $cm){
        $cpu_model[] = ucwords(preg_replace('/_/',' ',$cm));
      }

                $cpu_model_filter = implode("','", $cpu_model);
                $query .= "
                 AND processor IN('".$cpu_model_filter."')
                ";
                $cpu_model=explode("','",$cpu_model_filter);
              
                ?>
                <div class="d-flex filter-data">
                    <p>
                       CPU model:
                    </p>
                    <?php
                      foreach($cpu_model as $value) {
                    ?>
        
                    <small><?= $value?></small>
                    <?php 
                      }
                    
                    ?>
                </div>
              <?php
        $u.= 'cpu_model-'.implode('-',$_POST["cpu_model"]).'/';
    }
    if(isset($_POST["cache_memory"])){
      $primary=array();
      ?>
        <div class="d-flex filter-data">
            <p>
              Cache Memory:
            </p>
      <?php
              $list = array();
              $u.='cache_memory';
      foreach($_POST["cache_memory"] as $r){
        $u.='-'.$r;
        $r = explode('_',$r)[0];
    
          $cache_memory = "SELECT cache FROM laptop WHERE status='0'";
          $cache_memory_run = mysqli_query($con, $cache_memory);
          if(mysqli_num_rows($cache_memory_run) > 0){
              foreach($cache_memory_run as $cache_memory){
                  $s = explode(' ',$cache_memory['cache'])[0];
                  if (in_array($cache_memory['cache'], $list, TRUE)){
                  }
                  else{
                      if($r<=$s)
                          $list[]=$cache_memory['cache'];
                  }
                }
              }
              ?>
                <small><?= $r ?> MB </small>
                <?php
            }
            ?>
     </div>
      <?php
            $cache_filter = implode("','", $list);
            $query .= "
            AND cache IN('".$cache_filter."')
            ";
            $u.='/';
    }

    if(isset($_POST["cpu_core"])){
      $cpu_core = Array();
      ?>
      <div class="d-flex filter-data">
            <p>
             CPU Core:
            </p>
      <?php
      foreach($_POST['cpu_core'] as $cc){
        $cc=ucwords(preg_replace('/_/',' ',$cc));
        $cpu_core[]=$cc;
        ?>
        <small><?= $cc ?> </small>
        <?php
      }
      
      ?>
     </div>
     <?php
     foreach($cpu_core as $cc ){
        $query .= "
        AND speed LIKE '%".str_replace(" ", "%", $cc)."%'
        ";
      }
      $u.='cpu_core-'.implode('-',$_POST["cpu_core"]).'/';
    }
 
    if(isset($_POST["ram"])){
      $primary=array();
      ?>
        <div class="d-flex filter-data">
            <p>
              RAM Memory:
            </p>
      <?php
              $list = array();
              $u.='ram';
      foreach($_POST["ram"] as $r){
        $u.='-'.$r;
        $r = explode('_',$r)[0];
    
          $ram = "SELECT ram FROM laptop WHERE status='0'";
          $ram_run = mysqli_query($con, $ram);
          if(mysqli_num_rows($ram_run) > 0){
              foreach($ram_run as $ram){
                  $s = explode(' ',$ram['ram'])[0];
                  if (in_array($ram['ram'], $list, TRUE)){
                  }
                  else{
                      if($r<=$s)
                          $list[]=$ram['ram'];
                  }
                }
              }
              ?>
                <small><?= $r ?> GB & Above </small>
                <?php
            }
            ?>
     </div>
      <?php
            $ram_filter = implode("','", $list);
            $query .= "
            AND ram IN('".$ram_filter."')
            ";
            $u.='/';
    }

    if(isset($_POST["ram_type"])){
      $ram_type = array();
      foreach($_POST["ram_type"] as $rt){
        $ram_type[] = ucwords(preg_replace('/_/',' ',$rt));
      }

                $ram_type_filter = implode("','", $ram_type);
                $query .= "
                 AND ram_type IN('".$ram_type_filter."')
                ";
                $ram_type=explode("','",$ram_type_filter);
              
                ?>
                <div class="d-flex filter-data">
                    <p>
                       RAM Type:
                    </p>
                    <?php
                      foreach($ram_type as $value) {
                    ?>
        
                    <small style='text-transform:uppercase'><?= $value?></small>
                    <?php 
                      }
                    
                    ?>
                </div>
              <?php
        $u.= 'ram_type-'.implode('-',$_POST["ram_type"]).'/';
    }
    if(isset($_POST["hdd"])){
      $primary=array();
      ?>
        <div class="d-flex filter-data">
            <p>
              HDD:
            </p>
      <?php
              $list = array();
              $u.='hdd';
      foreach($_POST["hdd"] as $r){
        $u.='-'.$r;
        $r = explode('_',$r)[0];
    
          $hdd = "SELECT hdd FROM laptop WHERE status='0'";
          $hdd_run = mysqli_query($con, $hdd);
          if(mysqli_num_rows($hdd_run) > 0){
              foreach($hdd_run as $hdd){
                  $s = explode(' ',$hdd['hdd'])[0];
                  if (in_array($hdd['hdd'], $list, TRUE)){
                  }
                  else{
                      if($r<=$s)
                          $list[]=$hdd['hdd'];
                  }
                }
              }
              ?>
                <small><?= $r ?> GB & Above </small>
                <?php
            }
            ?>
     </div>
      <?php
            $hdd_filter = implode("','", $list);
            $query .= "
            AND hdd IN('".$hdd_filter."')
            ";
            $u.='/';
    }
    if(isset($_POST["ssd"])){
      $primary=array();
      ?>
        <div class="d-flex filter-data">
            <p>
              SSD:
            </p>
      <?php
              $list = array();
              $u.='ssd';
      foreach($_POST["ssd"] as $r){
        $u.='-'.$r;
        $r = explode('_',$r)[0];
    
          $ssd = "SELECT ssd FROM laptop WHERE status='0'";
          $ssd_run = mysqli_query($con, $ssd);
          if(mysqli_num_rows($ssd_run) > 0){
              foreach($ssd_run as $ssd){
                  $s = explode(' ',$ssd['ssd'])[0];
                  if (in_array($ssd['ssd'], $list, TRUE)){
                  }
                  else{
                      if($r<=$s)
                          $list[]=$ssd['ssd'];
                  }
                }
              }
              ?>
                <small><?= $r ?> GB & Above </small>
                <?php
            }
            ?>
     </div>
      <?php
            $ssd_filter = implode("','", $list);
            $query .= "
            AND ssd IN('".$ssd_filter."')
            ";
            $u.='/';
    }
    if(isset($_POST["graphics"])){
      $primary=array();
      ?>
        <div class="d-flex filter-data">
            <p>
              Graphics:
            </p>
      <?php
              $list = array();
              $u.='graphics';
      foreach($_POST["graphics"] as $r){
        $u.='-'.$r;
        $r = explode('_',$r)[0];
    
          $graphics = "SELECT dedicated_memory FROM laptop WHERE status='0'";
          $graphics_run = mysqli_query($con, $graphics);
          if(mysqli_num_rows($graphics_run) > 0){
              foreach($graphics_run as $graphics){
                  $s = explode(' ',$graphics['dedicated_memory'])[0];
                  
                  if (in_array($graphics['dedicated_memory'], $list, TRUE)){
                  }
                  else{
                      if($r<=$s)
                          $list[]=$graphics['dedicated_memory'];

                  }
                }
              }
              ?>
                <small><?= $r ?> GB & Above </small>
                <?php
            }
            ?>
     </div>
      <?php
            $graphics_filter = implode("','", $list);
            $query .= "
            AND dedicated_memory IN('".$graphics_filter."')
            ";
            $u.='/';
    }


    if(isset($_POST["os"])){
      $os = Array();
      ?>
      <div class="d-flex filter-data">
            <p>
             OS:
            </p>
      <?php
      foreach($_POST['os'] as $cc){
        $cc=ucwords(preg_replace('/_/',' ',$cc));
        $os[]=$cc;
        ?>
        <small><?= $cc ?> </small>
        <?php
      }
      
      ?>
     </div>
     <?php
     foreach($os as $cc ){
        $query .= "
        AND os LIKE '%".str_replace(" ", "%", $cc)."%'
        ";
      }
      $u.='os-'.implode('-',$_POST["os"]).'/';
    }
    if(isset($_POST["feature"])){
      foreach($_POST["feature"] as $ff){
          $query .="AND $ff!=''";
      }
      ?>
      <div class="d-flex filter-data">
            <p>
            Feature:
            </p>
      <?php
      foreach($_POST["feature"] as $ff){
        $ff = ucwords(preg_replace('/_/',' ',$ff));
        if($ff == 'Hdmi' || $ff =='Ssd'){
        ?>
          <small><?= strtoupper($ff) ?> </small>
        <?php
        }
        else{
        ?>
          <small><?= $ff ?> </small>
        <?php
        }
      }
      ?>
      </div>
      <?php
      $u.='feature-'.implode('-',$_POST["feature"]).'/';
    }
        
	
 
    
            


    ?>
     </div>
            
    <hr>
  </div>

    <?php











    if(isset($_POST["sort"])){
     
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
        
        <div class="grid-box" style="overflow:hidden;">
            <div>
    
                <div class="product_image" style="height:110px">
                    <a href="<?= base_url('laptop/show/'.$row['slug']);?>">
                        <img src="<?= $url?>admin/upload/category/laptop/image/<?= $image ?>" alt="<?= $image ?>">
                    </a>
                </div>
                <a class="product-name" style="overflow:hidden;" href="<?= base_url('laptop/show/'.$row['slug']);?>">
                <p style="color:rgb(123, 122, 122);font-size: 22px; line-height: 1.0;overflow:hidden;text-align:center;margin:0;font-weight: 400;" class="pt-1">
                <?= $row['name']?>
            </p>
                </a>
                <div class="position-absolute p" style="bottom:8px;height:35px;width:90%" >
                    <div class="position-relative" style='margin:auto;width:130px;height:35px;'>
                        <button type='submit' id=""  class="position-relative laptop_compare btn btn-primary" style='width:100%' value="<?= $row['id'] ?>"><i class="fa-solid fa-plus"></i>Compare</button>
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
          <div style="height:100px">
          <img src="<?= $url?>admin/upload/category/laptop/image/<?= $image ?>" alt="<?= $image ?>">
          </div>
    
        </div>
    
    
        <div class="product_details">
            <a href="<?= base_url('laptop/show/'.$row['slug']);?>" style="color:rgb(123, 122, 122);font-size: 24px; line-height: 1.1;margin:0;font-weight: 400;" class="pt-1">
                <?= $row['name']?>
            </a>
            <hr class="mt-1">
            <div class="product_header">
            <p style="color:rgb(123, 122, 122);font-size: 17px;margin:0;padding:0;font-weight: 700;">Product feature</p>
            <small>        
                <a href="<?= base_url('laptop/show/'.$row['slug']);?>">view all sepecification</a>
            </small>
            </div>
    
    
            <div class="row mt-2">
              <div class="col-md-6">
                <p>
                <i class="fa-solid fa-check"></i>
                <?php
                if($row['processor'] != ''){
                echo $row['processor'];
                }
                if($row['generation'] != ''){
                echo ' '.$row['generation'];
                }
                
                ?>
                </p>
                <p>
                <i class="fa-solid fa-check"></i>
                <?php 
                if(!is_null($row['speed'])){
    
                echo $row['speed'];
                }
    
                ?>
                </p>
                <p>
                <i class="fa-solid fa-check"></i>
                <?php 
                if(!is_null($row['ram_type'])){
    
                echo $row['ram_type'].' ';
                }
    
                ?>
                <?php 
                if(!is_null($row['ram'])){
    
                echo $row['ram'].' Ram';
                }
    
                ?>
              
                </p>
    
                <p>
                <i class="fa-solid fa-check"></i>
                <?php 
                if(!is_null($row['ssd'])){
    
                echo $row['ssd'].' SSD ';
                }
    
                ?>
                <?php 
                if(!is_null($row['hdd'])){
    
                echo $row['hdd'].' HDD';
                }
    
                ?>
                
                </p>
                    </div>
                    <div class="col-md-6 sm-none">
                    <p>
                <i class="fa-solid fa-check"></i>
                <?php 
                if(!is_null($row['dedicated_memory'])){
    
                echo $row['dedicated_memory'].' ';
                }
                if(!is_null($row['gpu'])){
    
                echo $row['gpu'];
                }
    
                ?>
                </p>
                    <p>
                <i class="fa-solid fa-check"></i>
                <?php 
                if(!is_null($row['size'])){
                echo $row['size'];
                }
                if(!is_null($row['resolution'])){
                echo ', '.$row['resolution'];
                }
          
    
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
                <p>
                <i class="fa-solid fa-check"></i>
    
                <?php 
    
                if(!is_null($row['warranty'])){
    
                echo $row['warranty'];
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
              <button type='submit' id=""  class="position-relative laptop_compare btn" style='width:100%' value="<?= $row['id'] ?>"><i class="fa-solid fa-plus"></i>Compare</button>
            </div>
          </div>
        </div>
      </div>
    <?php
    ?>
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
    
    
    
    