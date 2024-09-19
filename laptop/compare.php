
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
      if(isset($_SESSION['laptop_compare'])){
        unset($_SESSION['laptop_compare']);
      }
      while($row = mysqli_fetch_array($checktitle_run)){
        $product_list = $row['product_list'];
        $list = explode(",", $product_list);
        $_SESSION['laptop_compare']= explode(",", $product_list);
      }
    }
  }
  else{
    header("Location: ../index");
    exit(0);
  }
}
if(isset($_SESSION['laptop_compare'])){
  if(count($_SESSION['laptop_compare'])!=0){
    $list = $_SESSION['laptop_compare'];
    
    if (array_key_exists(0, $list)){
      $l0=$list[0];
      $query = "SELECT * FROM laptop WHERE id='$l0'";
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
      $query = "SELECT * FROM laptop WHERE id='$l1'";
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
        $query = "SELECT * FROM laptop WHERE id='$l2'";
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
    $product_type = 'Laptop';
    $views = 1;
    mysqli_query($con, "INSERT INTO comparelist (title,product_list,product_type,views,product_name) VALUES ('$title','$product_list','$product_type','$views','$product_name')");
             
  }
}}}
include('includes/header.php');
include('includes/navbar.php');
if(isset($_SESSION['laptop_compare'])){

?>

<div class="compareData">
<div id="submenu">
  <div class="d-flex">
    <div class='featureList' ><a>features</a></div>
    <div class='featureDetails'>
      <?php
      if (array_key_exists(0, $list)){
      ?>
        <a href="<?= base_url('laptop/show/'.$x['slug']);?>"> <?= $x['name'] ?></a>
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
          <a href="<?= base_url('laptop/show/'.$y['slug']);?>"> <?= $y['name'] ?></a>
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
        <a href="<?= base_url('laptop/show/'.$z['slug']);?>"> <?= $z['name'] ?></a>
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
              <a href="<?= base_url('laptop/show/'.$x['slug']);?>"> <?= $x['name'] ?></a>
            <?php
            }
            ?>
          </th>
          <th  class='featureDetails'>
            <?php
              if (array_key_exists(1, $list)){
              ?>
                <a href="<?= base_url('laptop/show/'.$y['slug']);?>"> <?= $y['name'] ?></a>
              <?php
              }
            ?>
          </th>
        <th  class='featureDetails'>
            <?php
            if (array_key_exists(2, $list)){
              ?>
              <a href="<?= base_url('laptop/show/'.$z['slug']);?>"> <?= $z['name'] ?></a>
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
                <div style="width:140px;height:auto">
                  <div>
                    <img style='height:auto;width:100%' width='auto' src="<?= $url .'admin/upload/category/laptop/image/'.$image ?>" alt="">
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
                <div style="width:140px;height:auto">
                  <div>
                    <img style='height:auto;width:100%' width='auto' src="<?= $url .'admin/upload/category/laptop/image/'.$image ?>" alt="">
                  </div>                      
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
                <div style="width:140px;height:auto">
                  <div>
                    <img style='height:auto;width:100%' width='auto' src="<?= $url .'admin/upload/category/laptop/image/'.$image ?>" alt="">
                  </div>                      
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
        <td class='featureList'>series</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['series'] != ''){ 
              echo $x['series'] ;
          }}?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['series'] != ''){ 
            echo $y['series'];
        }}?>
        </td>
        <td class='featureDetails'>
        <?php
          if (array_key_exists(2, $list)){
            if($z['series'] != ''){ 
              echo $z['series'];
          }}?>
        </td>
        
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>model</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['model'] != ''){ 
              echo $x['model'] ;
          }}?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['model'] != ''){ 
            echo $y['model'];
        }}?>
        </td>
        <td class='featureDetails'>
        <?php
          if (array_key_exists(2, $list)){
            if($z['model'] != ''){ 
              echo $z['model'];
          }}?>
        </td>
        
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>utility</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['utility'] != ''){ 
              echo $x['utility'] ;
          }}?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['utility'] != ''){ 
            echo $y['utility'];
        }}?>
        </td>
        <td class='featureDetails'>
        <?php
          if (array_key_exists(2, $list)){
            if($z['utility'] != ''){ 
              echo $z['utility'];
          }}?>
        </td>
        
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>Operating system</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['os'] != ''){ 
              echo $x['os'] ;
          }}?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['os'] != ''){ 
            echo $y['os'];
        }}?>
        </td>
        <td class='featureDetails'>
        <?php
          if (array_key_exists(2, $list)){
            if($z['os'] != ''){ 
              echo $z['os'];
          }}?>
        </td>
        
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>dimensions</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['dimensions'] != ''){ 
              echo $x['dimensions'] ;
          }}?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['dimensions'] != ''){ 
            echo $y['dimensions'];
        }}?>
        </td>
        <td class='featureDetails'>
        <?php
          if (array_key_exists(2, $list)){
            if($z['dimensions'] != ''){ 
              echo $z['dimensions'];
          }}?>
        </td>
        
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>weight</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['weight'] != ''){ 
              echo $x['weight'] ;
          }}?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['weight'] != ''){ 
            echo $y['weight'];
        }}?>
        </td>
        <td class='featureDetails'>
        <?php
          if (array_key_exists(2, $list)){
            if($z['weight'] != ''){ 
              echo $z['weight'];
          }}?>
        </td>
        
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>warranty</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['warranty'] != ''){ 
            ?>
          <i class="fa-solid fa-check"></i> <?= $x["warranty"] ?>          
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['warranty'] != ''){ 
            ?>
            <i class="fa-solid fa-check"></i> <?= $y["warranty"] ?>
            <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
          if (array_key_exists(2, $list)){
            if($z['warranty'] != ''){
              ?>
              <i class="fa-solid fa-check"></i> <?= $z["warranty"] ?>
              <?php }} ?>
        </td>
        
      </tr>
    <tbody>
  </table>
  <div class="dodo_box" style='width:90%;height:100px;margin:8px auto;back'></div>
  <table class="compareBody w-100">
    <thead id="" class="comparenavbar w-100">
      <tr class="w-100 cHead">
      <th class='featureList' ><a>display</a></th>
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
        <td class='featureList'>Type</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['display_type'] != ''){ 
              echo $x['display_type'];
           }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['display_type'] != ''){ 
              echo $y['display_type'];
           }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['display_type'] != ''){ 
              echo $z['display_type'];
           }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>Touch</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['touch'] != ''){ ?>
              <i class="fa-solid fa-check"></i> Yes
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['touch'] != ''){ ?>
              <i class="fa-solid fa-check"></i> Yes
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['touch'] != ''){ ?>
              <i class="fa-solid fa-check"></i> Yes
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>size</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['size'] != ''){ 
              echo $x['size'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['size'] != ''){ 
              echo $y['size'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['size'] != ''){ 
              echo $z['size'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>resolution</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['resolution'] != ''){ 
              echo $x['resolution'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['resolution'] != ''){ 
              echo $y['resolution'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['resolution'] != ''){ 
              echo $z['resolution'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>PPI</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['ppi'] != ''){ 
              echo $x['ppi'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['ppi'] != ''){ 
              echo $y['ppi'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['ppi'] != ''){ 
              echo $z['ppi'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>anti glare screen</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['anti_glare_screen'] != ''){ ?>
              <i class="fa-solid fa-check"></i> Yes
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['anti_glare_screen'] != ''){ ?>
              <i class="fa-solid fa-check"></i> Yes
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['anti_glare_screen'] != ''){ ?>
              <i class="fa-solid fa-check"></i> Yes
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>refresh rate</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['refresh_rate'] != ''){ 
              echo $x['refresh_rate'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['refresh_rate'] != ''){ 
              echo $y['refresh_rate'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['refresh_rate'] != ''){ 
              echo $z['refresh_rate'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>refresh rate</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['features'] != ''){ 
              echo $x['features'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['features'] != ''){ 
              echo $y['features'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['features'] != ''){ 
              echo $z['features'];
          }} ?>
        </td>
      </tr>
      <tr class="w-100 cHead">
        <td class='featureList' ><a>connectivity</a></td>
        <td class='featureDetails'>
        </td>
        <td  class='featureDetails'>
        </td>
        <td  class='featureDetails'>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>ethernet</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['ethernet'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['ethernet'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['ethernet'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['ethernet'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['ethernet'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['ethernet'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>wifi</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['wifi'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['wifi'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['wifi'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['wifi'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['wifi'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['wifi'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>bluetooth</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['bluetooth'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['bluetooth'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['bluetooth'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['bluetooth'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['bluetooth'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['bluetooth'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>USB ports</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['usb_ports'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['usb_ports'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['usb_ports'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['usb_ports'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['usb_ports'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['usb_ports'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>HDMI</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['hdmi'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['hdmi'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['hdmi'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['hdmi'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['hdmi'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['hdmi'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>microphone</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['microphone'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['microphone'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['microphone'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['microphone'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['microphone'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['microphone'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>headphone jack</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['headphone_jack'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['headphone_jack'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['headphone_jack'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['headphone_jack'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['headphone_jack'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['headphone_jack'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
    </tbody>
  </table>
  <div class="dodo_box" style='width:90%;height:100px;margin:8px auto;back'></div>
  <table class="compareBody w-100">
    <thead id="" class="comparenavbar w-100">
      <tr class="w-100 cHead">
      <th class='featureList' ><a>input</a></th>
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
        <td class='featureList'>security lock port</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['security_lock_port'] != ''){ 
              echo $x['security_lock_port'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['security_lock_port'] != ''){ 
              echo $y['security_lock_port'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['security_lock_port'] != ''){ 
              echo $z['security_lock_port'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>fingerprint Sensor</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['fingerprint_sensor'] != ''){ 
              echo $x['fingerprint_sensor'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['fingerprint_sensor'] != ''){ 
              echo $y['fingerprint_sensor'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['fingerprint_sensor'] != ''){ 
              echo $z['fingerprint_sensor'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
          <td class='featureList'>camera</td>
          <td class='featureDetails'>
          <?php
          if (array_key_exists(0, $list)){
            if($x['camera'] != ''){ ?>
                <i class="fa-solid fa-check"></i> <?=$x['camera'] ?></p>
            <?php } else{?>
                <i class="fa-solid fa-xmark"></i> No
            <?php }} ?>
          </td>
          <td class='featureDetails'>
          <?php
          if (array_key_exists(1, $list)){
            if($y['camera'] != ''){ ?>
                <i class="fa-solid fa-check"></i> <?=$y['camera'] ?></p>
            <?php } else{?>
                <i class="fa-solid fa-xmark"></i> No
            <?php }} ?>
          </td>
          <td class='featureDetails'>
          <?php
          if (array_key_exists(2, $list)){
            if($z['camera'] != ''){ ?>
                <i class="fa-solid fa-check"></i> <?=$z['camera'] ?></p>
            <?php } else{?>
                <i class="fa-solid fa-xmark"></i> No
            <?php }} ?>
          </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>keyboard</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['keyboard'] != ''){ 
              echo $x['keyboard'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['keyboard'] != ''){ 
              echo $y['keyboard'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['keyboard'] != ''){ 
              echo $z['keyboard'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>Keyboard backlit</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['keyboard_backlit'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['keyboard_backlit'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['keyboard_backlit'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['keyboard_backlit'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['keyboard_backlit'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['keyboard_backlit'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>touchpad</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['touchpad'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['touchpad'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['touchpad'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['touchpad'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['touchpad'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['touchpad'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>inbuilt microphone</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['inbuilt_microphone'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['inbuilt_microphone'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['inbuilt_microphone'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['inbuilt_microphone'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['inbuilt_microphone'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['inbuilt_microphone'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>speakers</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['speakers'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['speakers'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['speakers'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['speakers'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['speakers'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['speakers'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>sound</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['sound'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['sound'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['sound'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['sound'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['sound'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['sound'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>optical drive</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['optical_drive'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$x['optical_drive'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['optical_drive'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$y['optical_drive'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['optical_drive'] != ''){ ?>
              <i class="fa-solid fa-check"></i> <?=$z['optical_drive'] ?></p>
          <?php } else{?>
              <i class="fa-solid fa-xmark"></i> No
          <?php }} ?>
        </td>
    
      </tr>
      <tr class="w-100 cHead">
        <td class='featureList' ><a>processor</a></td>
        <td class='featureDetails'>
        </td>
        <td  class='featureDetails'>
        </td>
        <td  class='featureDetails'>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>processor</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['processor'] != ''){ 
              echo $x['processor'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['processor'] != ''){ 
              echo $y['processor'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['processor'] != ''){ 
              echo $z['processor'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>speed</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['speed'] != ''){ 
              echo $x['speed'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['speed'] != ''){ 
              echo $y['speed'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['speed'] != ''){ 
              echo $z['speed'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>cache</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['cache'] != ''){ 
              echo $x['cache'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['cache'] != ''){ 
              echo $y['cache'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['cache'] != ''){ 
              echo $z['cache'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>brand</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['processor_brand'] != ''){ 
              echo $x['processor_brand'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['processor_brand'] != ''){ 
              echo $y['processor_brand'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['processor_brand'] != ''){ 
              echo $z['processor_brand'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>series</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['processor_series'] != ''){ 
              echo $x['processor_series'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['processor_series'] != ''){ 
              echo $y['processor_series'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['processor_series'] != ''){ 
              echo $z['processor_series'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>model</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['processor_model'] != ''){ 
              echo $x['processor_model'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['processor_model'] != ''){ 
              echo $y['processor_model'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['processor_model'] != ''){ 
              echo $z['processor_model'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>generation</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['generation'] != ''){ 
              echo $x['generation'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['generation'] != ''){ 
              echo $y['generation'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['generation'] != ''){ 
              echo $z['generation'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>chipset</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['chipset'] != ''){ 
              echo $x['chipset'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['chipset'] != ''){ 
              echo $y['chipset'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['chipset'] != ''){ 
              echo $z['chipset'];
          }} ?>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="dodo_box" style='width:90%;height:100px;margin:8px auto;back'></div>
  <table class="compareBody w-100">
    <thead id="" class="comparenavbar w-100">
      <tr class="w-100 cHead">
      <th class='featureList' ><a>graphics</a></th>
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
        <td class='featureList'>GPU</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['gpu'] != ''){ 
              echo $x['gpu'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['gpu'] != ''){ 
              echo $y['gpu'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['gpu'] != ''){ 
              echo $z['gpu'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>dedicated memory</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['dedicated_memory'] != ''){ 
              echo $x['dedicated_memory'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['dedicated_memory'] != ''){ 
              echo $y['dedicated_memory'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['dedicated_memory'] != ''){ 
              echo $z['dedicated_memory'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>brand</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['gpu_brand'] != ''){ 
              echo $x['gpu_brand'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['gpu_brand'] != ''){ 
              echo $y['gpu_brand'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['gpu_brand'] != ''){ 
              echo $z['gpu_brand'];
          }} ?>
        </td>
      </tr>
      <tr class="w-100 cHead">
        <td class='featureList' ><a>memory</a></td>
        <td class='featureDetails'>
        </td>
        <td  class='featureDetails'>
        </td>
        <td  class='featureDetails'>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>RAM</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['ram'] != ''){ 
              echo $x['ram'];
              if($x['ram_type'] != ''){ echo ' '.$x['ram_type']; }
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['ram'] != ''){ 
              echo $y['ram'];
              if($y['ram_type'] != ''){ echo ' '.$y['ram_type']; }
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['ram'] != ''){ 
              echo $z['ram'];
              if($z['ram_type'] != ''){ echo ' '.$z['ram_type']; }
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>RAM bus speed</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['ram_bus_speed'] != ''){ 
              echo $x['ram_bus_speed'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['ram_bus_speed'] != ''){ 
              echo $y['ram_bus_speed'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['ram_bus_speed'] != ''){ 
              echo $z['ram_bus_speed'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>Harddisk</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['hdd'] != ''){ 
              echo $x['hdd'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['hdd'] != ''){ 
              echo $y['hdd'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['hdd'] != ''){ 
              echo $z['hdd'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>Solid State Drive</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['ssd'] != ''){ 
              echo $x['ssd'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['ssd'] != ''){ 
              echo $y['ssd'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['ssd'] != ''){ 
              echo $z['ssd'];
          }} ?>
        </td>
      </tr>
      <tr class="w-100 cHead">
        <td class='featureList' ><a>battery</a></td>
        <td class='featureDetails'>
        </td>
        <td  class='featureDetails'>
        </td>
        <td  class='featureDetails'>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>battery</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['battery'] != ''){ 
              echo $x['battery'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['battery'] != ''){ 
              echo $y['battery'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['battery'] != ''){ 
              echo $z['battery'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>Adapter Type</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['adapter_type'] != ''){ 
              echo $x['adapter_type'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['adapter_type'] != ''){ 
              echo $y['adapter_type'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['adapter_type'] != ''){ 
              echo $z['adapter_type'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>battery backup</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['battery_backup'] != ''){ 
              echo $x['battery_backup'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['battery_backup'] != ''){ 
              echo $y['battery_backup'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['battery_backup'] != ''){ 
              echo $z['battery_backup'];
          }} ?>
        </td>
      </tr>
      <tr class="w-100 cHead">
        <td class='featureList' ><a>extra</a></td>
        <td class='featureDetails'>
        </td>
        <td  class='featureDetails'>
        </td>
        <td  class='featureDetails'>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>included software</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['included_software'] != ''){ 
              echo $x['included_software'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['included_software'] != ''){ 
              echo $y['included_software'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['included_software'] != ''){ 
              echo $z['included_software'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>sales package</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['sales_package'] != ''){ 
              echo $x['sales_package'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['sales_package'] != ''){ 
              echo $y['sales_package'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['sales_package'] != ''){ 
              echo $z['sales_package'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>others features</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['others_features'] != ''){ 
              echo $x['others_features'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['others_features'] != ''){ 
              echo $y['others_features'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['others_features'] != ''){ 
              echo $z['others_features'];
          }} ?>
        </td>
      </tr>
      <tr class="cd w-100">
        <td class='featureList'>extra</td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(0, $list)){
          if($x['extra'] != ''){ 
              echo $x['extra'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(1, $list)){
          if($y['extra'] != ''){ 
              echo $y['extra'];
          }} ?>
        </td>
        <td class='featureDetails'>
        <?php
        if (array_key_exists(2, $list)){
          if($z['extra'] != ''){ 
              echo $z['extra'];
          }} ?>
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
  $query = "SELECT * FROM laptop ORDER BY RAND() LIMIT 6";
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
        <div style='margin:0 auto;height:100;width:100px;justify-content:center' class="d-flex">
          <div class="w-100 h-100">
            <img style="width:100%;height:auto" src="<?=$url.'admin/upload/category/laptop/image/'.$image ?>" alt="">
          </div>
        </div>
        <a href="<?= base_url('laptop/show/').$row['slug'] ?>" ><p style="text-align:center;color:#27518D;margin-top:10px;font-size:13px"><?= $row['name'] ?></p></a>
          <div class="position-absolute pp" style="bottom:8px;height:25px;width:90%" >
            <div class="position-relative" style='margin:auto;width:100px;height:25px;'>
              <input type="hidden" value="<?= $row['id'] ?>">
              <p class="comparesearchlist btn btn-primary position-relative" style="padding:4px 6px;margin:auto;width:100%;height:100%;" ><i class="fa-solid fa-plus mr-1"></i>compare</p>
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
        $query = "SELECT * FROM comparelist WHERE product_type='laptop'  ORDER BY views DESC LIMIT 6";
        $query_run = mysqli_query($con, $query);
        if(mysqli_num_rows($query_run) > 0){
          foreach($query_run as $row){
            ?>
            <div>
              <a href="<?=base_url('laptop/comparison/'.$row['title']) ?>"><?= $row['product_name'] ?></a>
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
      url:"<?= base_url('laptop/ajax/comparepage') ?>",
      method:"POST",
      data:{singleRemove:'singleRemove',value:value},
      dataType:"JSON",
      success:function(data){
        var title=data.title;
        location.href = "<?= base_url('laptop/comparison/')?>"+title;
        }

  });
  });

  $(document).on("click",".comparesearchlist", function(){
var thisclicked = $(this); 
var value = thisclicked.closest('.pp').find('input').val();
$.ajax({
url:"<?= base_url('laptop/ajax/comparepage') ?>",
method:"POST",
data:{compare:'compare',id:value},
dataType:"JSON",
success:function(data){
  var title=data.title;
  location.href = "<?= base_url('laptop/comparison/')?>"+title;}
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
url:"<?= base_url('laptop/ajax/autofill') ?>",
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
url:"<?= base_url('laptop/ajax/autofill') ?>",
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










