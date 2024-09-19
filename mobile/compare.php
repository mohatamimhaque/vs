
<?php
 session_start();
 include("../admin/config/dbcon.php");

 $x= array();
 $y= array();
 $z= array();
 if(isset($_GET['title'])){
   $title=$_GET['title'];
   if($title != ''){
    $checktitle = "SELECT * from comparelist WHERE title='$title' LIMIT 1";
    $checktitle_run = mysqli_query($con, $checktitle);
    if(mysqli_num_rows($checktitle_run)>0){
      if(isset($_SESSION['mobile_compare'])){
        unset($_SESSION['mobile_compare']);
      }
      while($row = mysqli_fetch_array($checktitle_run)){
        $product_list = $row['product_list'];
        $list = explode(",", $product_list);
        $_SESSION['mobile_compare']= explode(",", $product_list);
      }
    }
  }
  else{
    header("Location: ../index");
    exit(0);
  }
}
if(isset($_SESSION['mobile_compare'])){
  if(count($_SESSION['mobile_compare'])!=0){
    $list = $_SESSION['mobile_compare'];
    
    if (array_key_exists(0, $list)){
      $l0=$list[0];
      $query = "SELECT * FROM mobile WHERE id='$l0'";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
        foreach($row as $key => $value){
          $x[$key] = $value;
        } 
      }}
    }
    if (array_key_exists(1, $list)){
      $l1=$list[1];
      $query = "SELECT * FROM mobile WHERE id='$l1'";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          foreach($row as $key => $value){
            $y[$key] = $value;
          } 
        }}
      }
      if (array_key_exists(2, $list)){
        $l2=$list[2];
        $query = "SELECT * FROM mobile WHERE id='$l2'";
        $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                foreach($row as $key => $value){
                  $z[$key] = $value;
                } 
              }}
            }
            
            
            
            

            
            
            
            
            
            $page_title='';
            if (array_key_exists(0, $list)){
              $page_title .= $x['name'];
            }
            if (array_key_exists(1, $list)){
    $page_title .=' vs '.$y['name'];
  }
  if (array_key_exists(2, $list)){
    $page_title .=' vs '.$z['name'];
  }
 

if(isset($_GET['title'])){
  $title=$_GET['title'];
  
  $checktitle = "SELECT * from comparelist WHERE title='$title'";
  $checktitle_run = mysqli_query($con, $checktitle);
  if(mysqli_num_rows($checktitle_run)>0){
    if(isset($_SESSION[$title])){
    }
    else{
      $_SESSION[$title] = $title;
      mysqli_query($con, "UPDATE comparelist SET views=views+1 WHERE title='$title'");
    }
  }
  else{
    $title = strtolower(preg_replace('/_/', '-', preg_replace('/ /', '-', $page_title)));
    $product_list =implode(',',$list);
    $product_name = $page_title;
    $product_type = 'Mobile';
    $views = 1;
    mysqli_query($con, "INSERT INTO comparelist (title,product_list,product_type,views,product_name) VALUES ('$title','$product_list','$product_type','$views','$product_name')");
             
  }
}}}
include('includes/header.php');
include('includes/navbar.php');
if(isset($_SESSION['mobile_compare'])){

?>

<div class="compareData">
<div id="submenu">
  <div class="d-flex">
    <div class='featureList' ><a>features</a></div>
    <div class='featureDetails'>
      <?php
      if (array_key_exists(0, $list)){
      ?>
        <a href="<?= base_url('mobile/show/'.$x['slug']);?>"> <?= $x['name'] ?></a>
        <input type="hidden" value='<?= array_search($l0, $list);  ?>'>
        <div class="singleRemove">
          <i class="fa-solid fa-xmark"></i>
        </div>
      <?php
      }
      ?>
    </div>
    <div  class='featureDetails'>
      <?php
        if (array_key_exists(1, $list)){
        ?>
          <a href="<?= base_url('mobile/show/'.$y['slug']);?>"> <?= $y['name'] ?></a>
          <input type="hidden" value='<?= array_search($l1, $list);  ?>'>
          <div class="singleRemove">
            <i class="fa-solid fa-xmark"></i>
          </div>
         <?php
        }
        else{
          ?>
            <div class='d-flex w-100' style="display:flex;align-items:center;justify-content:center">
              <div class="position-relative" style="">
              <div class="search">
                <div class="InputContainer">
                  <input  class='comparesearch' placeholder="add another product..."/>
                </div>
              </div>  
              <div class="aaa position-absolute" style="top:8px;width:100%">

                </div>
              </div>
            </div>
          <?php
        }

      ?>
    </div>
    <div  class='featureDetails'>
      <?php
      if (array_key_exists(2, $list)){
        ?>
        <a href="<?= base_url('mobile/show/'.$z['slug']);?>"> <?= $z['name'] ?></a>
        <input type="hidden" value='<?= array_search($l2, $list);  ?>'>
        <div class="singleRemove">
          <i class="fa-solid fa-xmark"></i>
        </div>
         <?php
      }
      else{
        ?>
          <div class='d-flex w-100' style="display:flex;align-items:center;justify-content:center">
            <div class="position-relative" style="">
              <div class="search">
                <div class="InputContainer">
                  <input  class='comparesearch2' placeholder="add another product..."/>
                </div>
              </div>  
              <div class="aaa2 position-absolute" style="top:8px;width:100%">

              </div>
            </div>
          </div>
        <?php
      }

    ?>
    </div>
  </div>
</div>


<div class="compareHead d-flex justify-space-between">
   <h1>compare</h1>
   <div class="compareHeadTitle d-flex">
     <?php
       if (array_key_exists(0, $list)){
         ?>
         <h3> <?= $x['name'] ?></h3>
     <?php
       }
       if (array_key_exists(1, $list)){
         ?>
         <p style="text-transform:none">vs</p><h3> <?= $y['name'] ?></h3>
     <?php
       }
     ?>
     <?php
       if (array_key_exists(2, $list)){
         ?>
        <p style="text-transform:none">vs</p> <h3> <?= $z['name'] ?></h3>
     <?php
       }
     ?>
    
   </div>
 </div>
 
 <hr>

     <div class="dodo_box" style='width:90%;height:100px;margin:8px auto'></div>
       
 <table class="compareBody w-100">
   <thead id="comparenavbar" class="comparenavbar w-100">
     <tr class="w-100">
        <th class='featureList' ><a>features</a></th>
        <th class='featureDetails'>
          <?php
          if (array_key_exists(0, $list)){
          ?>
            <a href="<?= base_url('mobile/show/'.$x['slug']);?>"> <?= $x['name'] ?></a>
          <?php
          }
          ?>
        </th>
        <th  class='featureDetails'>
          <?php
            if (array_key_exists(1, $list)){
            ?>
              <a href="<?= base_url('mobile/show/'.$y['slug']);?>"> <?= $y['name'] ?></a>
             <?php
            }
          ?>
        </th>
       <th  class='featureDetails'>
          <?php
          if (array_key_exists(2, $list)){
            ?>
            <a href="<?= base_url('mobile/show/'.$z['slug']);?>"> <?= $z['name'] ?></a>
             <?php
          }
          ?>
       </th>
     </tr>
   </thead>

  <tbody class="w-100">
     <tr class="w-100" >
       <td class='featureList' style="background-color:#E2F5CC;"></td>
       <td style="background-color:white">
        <div class='featureDetails m-0 position-relative d-flex justify-space-between w-100' style='height:150px;'>
        <?php
            if (array_key_exists(0, $list)){
              ?> 
            <div class="w-50 pl-5" style="display:flex;justify-content:center;align-items:center">
              
              <?php
              $files = $x['image']; 
              $file = explode(",",$files);
              $image =$file[0];
              ?>
              <div class="w-100 h-100">
                <div>
                  <img style='height:100%' width='auto' src="<?= $url .'admin/upload/category/mobile/image/'.$image ?>" alt="">
                </div>                      
              </div>                  
            </div>
            <div class="w-50" style="display:flex;justify-content:center;align-items:center">
                <p style="color:black;text-align:center"><?= $x['price'] ?> TK</p>
            </div>
            <input type="hidden" value='<?= array_search($l0, $list);  ?>'>
            <div class="singleRemove">
              <i class="fa-solid fa-xmark"></i>
            </div>
            <?php
            }
          
            ?>
        </div>
       </td>
       <td style="background-color:rgb(248,248,248)">
        <div class='featureDetails position-relative d-flex justify-space-between w-100' style='height:150px;'>
        <?php
            if (array_key_exists(1, $list)){
              ?> 
            <div class="w-50 pl-5" style="display:flex;justify-content:center;align-items:center">
              
              <?php
              $files = $y['image']; 
              $file = explode(",",$files);
              $image =$file[0];
              ?>
              <div class="w-100 h-100">
                <img style='height:100%' width='auto' src="<?= $url .'admin/upload/category/mobile/image/'.$image ?>" alt="">
              </div>                  
            </div>
            <div class="w-50" style="display:flex;justify-content:center;align-items:center">
                <p style="color:black;text-align:center"><?= $y['price'] ?> TK</p>
            </div>
            <input type="hidden" value='<?= array_search($l1, $list);  ?>'>
              <div class="singleRemove">
            <i class="fa-solid fa-xmark"></i>
          </div>
            <?php
            }
            else{
              ?>
                <div class='d-flex w-100' style="display:flex;align-items:center;justify-content:center">
                  <div class="position-relative" style="">
                  <div class="search">
                <div class="InputContainer">
                  <input  class='comparesearch' placeholder="add another product..."/>
                </div>
              </div>  
                    <div class="aaa position-absolute" style="top:8px;width:100%">
                    </div>
                  </div>
                </div>
              <?php
            }
            ?>
        </div>
       </td>
       <td style="background-color:white">
        <div class='featureDetails position-relative d-flex justify-space-between w-100' style='height:150px;'>
        <?php
            if (array_key_exists(2, $list)){
              ?> 
            <div class="w-50 pl-5" style="display:flex;justify-content:center;align-items:center">
              
              <?php
              $files = $z['image']; 
              $file = explode(",",$files);
              $image =$file[0];
              ?>
              <div class="w-100 h-100">
                <img style='height:100%' width='auto' src="<?= $url .'admin/upload/category/mobile/image/'.$image ?>" alt="">
              </div>                  
            </div>
            <div class="w-50" style="display:flex;justify-content:center;align-items:center">
                <p style="color:black;text-align:center"><?= $z['price'] ?> TK</p>
            </div>
            <input type="hidden" value='<?= array_search($l2, $list);  ?>'>
              <div class="singleRemove">
            <i class="fa-solid fa-xmark"></i>
          </div>
            <?php
            }
            else{
              ?>
                 <div class='d-flex w-100' style="display:flex;align-items:center;justify-content:center">
                  <div class="position-relative" style="">
                  <div class="search">
                <div class="InputContainer">
                  <input  class='comparesearch2' placeholder="add another product..."/>
                </div>
              </div>  
                    <div class="aaa2 position-absolute" style="top:4px;width:100%">

                    </div>
                  </div>
                </div>
              <?php
            }
            ?>
        </div>
       </td>

    
     </tr>
     <tr class="w-100 cHead">
       <td class='featureList'>Generel</td>
       <td colspan='3' class='featureDetails'></td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>sim type</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['sim_type'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['sim_type'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['sim_type'];
       }
         ?>
       </td>
      
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>dual sim</td>
       <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['dual_sim'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
        }
          ?>
       </td>
       <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['dual_sim'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
        }
          ?>
       </td>
       <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['dual_sim'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
        }
          ?>
       </td>
       
      
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>sim size</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['sim_size'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['sim_size'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['sim_size'];
       }
         ?>
       </td>
      
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>device type</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['device_type'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['device_type'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['device_type'];
       }
         ?>
       </td>
      
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>release date</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['release_date'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['release_date'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['release_date'];
       }
         ?>
       </td>
      
     </tr>
  <tbody>
</table>
     <div class="dodo_box" style='width:90%;height:100px;margin:8px auto;back'></div>
     <table class="compareBody w-100">
   <thead id="" class="comparenavbar w-100">
     <tr class="w-100 cHead">
     <th class='featureList' ><a>design</a></th>
       <th class='featureDetails'>
       </th>
       <th  class='featureDetails'>
       </th>
       <th  class='featureDetails'>
       </th>
     </tr>
   </thead>

  <tbody class="w-100">
     <tr class="cd w-100">
       <td class='featureList'>dimensions</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['dimensions'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['dimensions'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['dimensions'];
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>weight</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['wieght'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['wieght'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['wieght'];
       }
         ?>
       </td>
     </tr>
     <tr class="w-100 cHead">
       <td class='featureList'>display</td>
       <td colspan='3' class='featureDetails'></td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>Type</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['display_type'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['display_type'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['display_type'];
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>touch</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['touch'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x['touch_details'] ;?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['touch'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y['touch_details'] ;?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['touch'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z['touch_details'] ;?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>size</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['size'].' '.$x['refresh_rate'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['size'].' '.$y['refresh_rate'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['size'].' '.$z['refresh_rate'];
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>aspect ratio</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['aspect_raito'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['aspect_raito'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['aspect_raito'];
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>PPI</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['ppi'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['ppi'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['ppi'];
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>Screen to Body Radio</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['sb_ratio'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['sb_ratio'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['sb_ratio'];
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>glass type</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['glass_type'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['glass_type'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['glass_type'];
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>notch</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['notch'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x['notch_details'] ;?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['notch'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y['notch_details'] ;?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['notch'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z['notch_details'] ;?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="w-100 cHead">
       <td class='featureList'>memory</td>
       <td colspan='3' class='featureDetails'></td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>RAM</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['ram'].'GB';
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['ram'].'GB';
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['ram'].'GB';
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>storage</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['storage'].'GB';
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['storage'].'GB';
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['storage'].'GB';
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>card slot</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['card_slot'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x['card_slot_details'] ;?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['card_slot'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y['card_slot_details'] ;?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['card_slot'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z['card_slot_details'] ;?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tbody>
</table>
     <div class="dodo_box" style='width:90%;height:100px;margin:8px auto;back'></div>
<table class="compareBody w-100">
   <thead id="" class="comparenavbar w-100">
     <tr class="w-100 cHead">
     <th class='featureList' ><a>connectivity</a></th>
       <th class='featureDetails'>
       </th>
       <th  class='featureDetails'>
       </th>
       <th  class='featureDetails'>
       </th>
     </tr>
   </thead>

  <tbody class="w-100">
     <tr class="cd w-100">
       <td class='featureList'>GPRS</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['gprs'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['gprs'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['gprs'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>EDGE</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['edge'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['edge'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['edge'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>3G</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['3g'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['3g'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['3g'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
      <tr class="cd w-100">
       <td class='featureList'>4G</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['4g'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['4g'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['4g'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>5G</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['5g'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['5g'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['5g'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>VoLTE</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['volte'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x["volte_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['volte'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y["volte_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['volte'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z["volte_details"] ?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>WIFI</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['wifi'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x["wifi_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['wifi'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y["wifi_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['wifi'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z["wifi_details"] ?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>bluetooth</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['blutooth'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x["blutooth_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['blutooth'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y["blutooth_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['blutooth'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z["blutooth_details"] ?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>USB</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['usb'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x["usb_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['usb'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y["usb_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['usb'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z["usb_details"] ?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>USB features</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['usb'] == '1'){
            ?>
           <?= $x["usb_feature"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i>                
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['usb'] == '1'){
            ?>
           <?= $y["usb_feature"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i>                 
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['usb'] == '1'){
          ?>
         <?= $z["usb_feature"] ?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i>               
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="w-100 cHead">
       <td class='featureList'>extra</td>
       <td colspan='3' class='featureDetails'></td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>GPS</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['gps'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x["gps_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['gps'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y["gps_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['gps'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z["gps_details"] ?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>fignerprint sensor</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['fingerprint'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x["fingerprint_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['fingerprint'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y["fingerprint_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['fingerprint'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z["fingerprint_details"] ?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>face unlock</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['face_unlock'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['face_unlock'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['face_unlock'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>sensors</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['sensors'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['sensors'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['sensors'];
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>3.5mm Headphone jack</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['headphone_jack'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['headphone_jack'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['headphone_jack'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>extra</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['extra'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['extra'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['extra'];
       }
         ?>
       </td>
     </tr>
     <tbody>
</table>
     <div class="dodo_box" style='width:90%;height:100px;margin:8px auto;back'></div>
<table class="compareBody w-100">
   <thead id="" class="comparenavbar w-100">
     <tr class="w-100 cHead">
     <th class='featureList' ><a>camera</a></th>
       <th class='featureDetails'>
       </th>
       <th  class='featureDetails'>
       </th>
       <th  class='featureDetails'>
       </th>
     </tr>
   </thead>

  <tbody class="w-100">
     <tr class="cd w-100">
       <td class='featureList'>rear camera</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['rear_camera'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x["rear_camera_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['rear_camera'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y["rear_camera_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['rear_camera'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z["rear_camera_details"] ?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>features</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['feature'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['feature'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['feature'];
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>video recording</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['video_recording'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x["video_recording_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['video_recording'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y["video_recording_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['video_recording'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z["video_recording_details"] ?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>flash</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['flash'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x["flash_type"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['flash'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y["flash_type"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['flash'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z["flash_type"] ?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>front camera</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['front_camera'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x["front_camera_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['front_camera'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y["front_camera_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['front_camera'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z["front_camera_details"] ?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>front video recording</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['front_camera_video'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $x["front_camera_video_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['front_camera_video'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes, <?= $y["front_camera_video_details"] ?>
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['front_camera_video'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes, <?= $z["front_camera_video_details"] ?>
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="w-100 cHead">
       <td class='featureList'>technical</td>
       <td colspan='3' class='featureDetails'></td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>OS</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['os'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['os'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['os'];
       }
         ?>
       </td>
      
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>chipset</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['chipset'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['chipset'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['chipset'];
       }
         ?>
       </td>
      
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>CPU</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['cpu'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['cpu'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['cpu'];
       }
         ?>
       </td>
      
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>core details</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['core_details'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['core_details'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['core_details'];
       }
         ?>
       </td>
      
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>java</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['java'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['java'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['java'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>browser</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['browser'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['browser'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['browser'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tbody>
</table>
     <div class="dodo_box" style='width:90%;height:100px;margin:8px auto;back'></div>
<table class="compareBody w-100">
   <thead id="" class="comparenavbar w-100">
     <tr class="w-100 cHead">
     <th class='featureList' ><a>multimedia</a></th>
       <th class='featureDetails'>
       </th>
       <th  class='featureDetails'>
       </th>
       <th  class='featureDetails'>
       </th>
     </tr>
   </thead>

  <tbody class="w-100">
     <tr class="cd w-100">
       <td class='featureList'>email</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['email'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['email'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['email'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>music</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['music'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['music'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['music'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>video</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['video'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['video'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['video'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>fm radio</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['fm_radio'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['fm_radio'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['fm_radio'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>document_reader</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
          if($x['document_reader'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
          if($y['document_reader'] == '1'){
            ?>
            <i class="fa-solid fa-check"></i> yes
            <?php
            }
            else{
              ?>
              <i class="fa-solid fa-xmark"></i> No                   
            <?php
            }
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
        if($z['document_reader'] == '1'){
          ?>
          <i class="fa-solid fa-check"></i> yes
          <?php
          }
          else{
            ?>
            <i class="fa-solid fa-xmark"></i> No                   
          <?php
          }
       }
         ?>
       </td>
     </tr>
     <tr class="w-100 cHead">
       <td class='featureList'>battery</td>
       <td colspan='3' class='featureDetails'></td>
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>battery type</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['battery_type'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['battery_type'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['battery_type'];
       }
         ?>
       </td>
      
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>battery size</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['battery_size'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['battery_size'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['battery_size'];
       }
         ?>
       </td>
      
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>fast charging</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['fast_charging'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['fast_charging'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['fast_charging'];
       }
         ?>
       </td>
      
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>talk time</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['talk_time'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['talk_time'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['talk_time'];
       }
         ?>
       </td>
      
     </tr>
     <tr class="cd w-100">
       <td class='featureList'>music playback time</td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(0, $list)){
       echo $x['playback_time'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(1, $list)){
       echo $y['playback_time'];
       }
         ?>
       </td>
       <td class='featureDetails'>
       <?php
       if (array_key_exists(2, $list)){
       echo $z['playback_time'];
       }
         ?>
       </td>
      
     </tr>
   </tbody>
 </table>


<div class="row mt-5 mb-5">
<div class="col-md-9 col-sm-6 mb-3">
<div class="sub-content">
<div class="sub-content-header">
  <p>You may also like</p>
</div>
<div class="sub-content-body">
  <?php  
  $query = "SELECT * FROM mobile ORDER BY RAND() LIMIT 6";
  $query_run = mysqli_query($con, $query);
  if(mysqli_num_rows($query_run) > 0){
    foreach($query_run as $row){
      $files = $row['image']; 
      $file = explode(",",$files);
      $image =$file[0];
      if (in_array($row['id'], $list, TRUE)){
      }
      else{
    ?>
      <div class="row-content position-relative p-2">
        <div style='margin:0 auto;height:120px;width:60px;justify-content:center' class="d-flex">
          <div class="w-100 h-100">
            <img class="w-100 h-100" src="<?=$url.'admin/upload/category/mobile/image/'.$image ?>" alt="">
          </div>
        </div>
        <a href="<?= base_url('mobile/show/').$row['slug'] ?>" ><p style="text-align:center;color:#27518D;margin-top:10px;font-size:13px"><?= $row['name'] ?></p></a>
          <div class="position-absolute pp" style="bottom:8px;height:25px;width:90%" >
            <div class="position-relative" style='margin:auto;width:100px;height:25px;'>
              <input type="hidden" value="<?= $row['id'] ?>">
              <p class="comparesearchlist btn position-relative" style="padding:4px 6px;margin:auto;width:100%;height:100%;" ><i class="fa-solid fa-plus mr-1"></i>compare</p>
            </div>
        </div>
        
      </div>
      <?php
    }}}  
    ?>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6 mb-3">
  <div class="topCompared">
    <div class="topComparedHeader bg-green">
      top compred with
    </div>
    <div class="topComparedBody">
      <?php
        $query = "SELECT * FROM comparelist WHERE product_type='mobile'  ORDER BY views DESC LIMIT 6";
        $query_run = mysqli_query($con, $query);
        if(mysqli_num_rows($query_run) > 0){
          foreach($query_run as $row){
            ?>
            <div>
              <a href="<?=base_url('mobile/comparison/'.$row['title']) ?>"><?= $row['product_name'] ?></a>
             </div>
            <?php
            }
          }
        ?>
  </div>

</div>
</div>
</div>





<?php
}
?>
<script>
  $(document).ready(function(){
    $('.singleRemove').click(function(){
    var thisclicked = $(this); 
    var value = thisclicked.closest('.featureDetails').find('input').val();
    $.ajax({
      url:"<?= base_url('mobile/ajax/comparepage') ?>",
      method:"POST",
      data:{singleRemove:'singleRemove',value:value},
      dataType:"JSON",
      success:function(data){
        var title=data.title;
        location.href = "<?= base_url('mobile/comparison/')?>"+title;
        }

  });
  });

  $(document).on("click",".comparesearchlist", function(){
var thisclicked = $(this); 
var value = thisclicked.closest('.pp').find('input').val();
$.ajax({
url:"<?= base_url('mobile/ajax/comparepage') ?>",
method:"POST",
data:{compare:'compare',id:value},
dataType:"JSON",
success:function(data){
  var title=data.title;
  location.href = "<?= base_url('mobile/comparison/')?>"+title;}
})
});
});
</script>


<script src="<?= base_url('admin/assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/sidebar-menu.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/app-script.js') ?>"></script>

<script src="<?= base_url('admin/assets/js/off-canvas.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/misc.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/dashboard.js') ?>"></script>

<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables.jqueryui.min.js') ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> 
<script src="<?= base_url('assets/js/script.js') ?>"></script>
<script src="<?= base_url('assets/js/select.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#search").on("keyup", function(){
var search = $(this).val();
if (search !=="") {
$.ajax({
url:" <?= base_url('ajax/search') ?>",
type:"POST",
cache:false,
data:{query:search},
success:function(data){
$(".bbb").html(data);
$(".bbb").fadeIn();
}  
});
}else{
$(".bbb").html("");  
$(".bbb").fadeOut();
}
});

});

</script>






<script type="text/javascript">
$(document).ready(function(){
$(".comparesearch").on("keyup", function(){
var comparesearch = $(this).val();
if (comparesearch !==""){
$.ajax({
url:"<?= base_url('mobile/ajax/autofill') ?>",
type:"POST",
cache:false,
data:{comparesearch:comparesearch},
success:function(data){
$(".aaa").html(data);
$(".aaa").fadeIn();
}  
});
}
else{
$(".aaa").html("");  
$(".aaa").fadeOut();
}


});
$(".comparesearch2").on("keyup", function(){
var comparesearch = $(this).val();
if (comparesearch !=="") {
$.ajax({
url:"<?= base_url('mobile/ajax/autofill') ?>",
type:"POST",
cache:false,
data:{comparesearch:comparesearch},
success:function(data){
 
$(".aaa2").html(data);
$(".aaa2").fadeIn();
}  
});
}else{
$(".aaa2").html("");  
$(".aaa2").fadeOut();
}
});
});

</script>


<script>
$(document).ready(function(){
    
    $(window).scroll(function(){
        if ($(this).scrollTop() > 300) {
            $('#submenu').fadeIn();
        } else {
            $('#submenu').fadeOut();
        }
    });
    
    
});

    

</script>

</body>
</html>










