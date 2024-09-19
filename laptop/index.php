<?php
session_start();


if(isset($_GET['brand'])){
  $brand =ucfirst($_GET['brand']);
  $page_title = "$brand"." Laptop";
}
else{
  $page_title = "Laptop";

}

include('includes/header.php');
include('includes/navbar.php');
//if(isset($_SESSION['mobile_compare'])){
//print_r($_SESSION['mobile_compare']);
//}
?>


<div class="productPage">

  <div class="filter"> 
        <div class="close">
          <div class="bar"></div>
        </div>
      <div class="mb-2">
        <h2 style="margin:auto 0;font-size:30px;color:#00275C;">
          Filter result
        </h2>
        <hr style="background-color: rgb(154, 255, 205);padding-top:0;margin-top:10px;z-index:-10">
        <div class="dodo_box" style='width:100%;height:100px'></div>
      </div>           				
				
          <div class="card">
                  <div class="card-header d-flex" >
                    <h3>find criteria</h3>
                    <div class="absolute">
                      <input type="checkbox" id="criteria_result" class="form-check-input criteria_result common_selector">
                      <small class="btn mr-2" style="">clear</small>
                  </div>
                  </div>
            <div class="card-body search position-relative">
              <form action="" method="post">
                <div class="InputContainer">
                     <input class='common_selector' id="criteria" placeholder="Find Criteria"/>
                 </div>

                  <ul class="pt- text-dark aaa position-absolute" style="">
                      
                  </ul>
                
              </form>
            </div>
          </div>

          <div class="card">
            <div class="card-header" style="">
                <h3>price</h3>
            </div>
            <div class="card-body">
            <input type="hidden" id="hidden_minimum_price" value="0" />
                <input type="hidden" id="hidden_maximum_price" value="500000" />
                <p id="price_show">500 - 500000</p>
            <div id="price_range"></div>
            </div>
          </div>
          
          
          <div class="card mt-1 brand-list">
            <div class="card-header d-flex" >
                <h3>brand</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="brand_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">
                <?php
                    $brand = "SELECT brand FROM laptop WHERE status='0'";
                    $brand_run = mysqli_query($con, $brand);
                    $brand_list = array();
                    if(mysqli_num_rows($brand_run) > 0){
                        foreach($brand_run as $brand){
                          if (in_array($brand, $brand_list, TRUE)){
                          }
                          else{
                            $brand_list[]=$brand;
                          }

                        }
                        sort($brand_list);
                        foreach($brand_list as $brand) {
                        
                    ?>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="<?= $brand['brand']?>" value="<?= strtolower(preg_replace('/ /', '_', $brand['brand'])) ?>" name=brand_item[] class="form-check-input brand_item common_selector">
                      <label class="form-check-label" for="<?= $brand['brand']?>"><?= $brand['brand']?></label>
                    </div>
             <?php    
           }}
                ?>



              </div>
            </div>
          </div>
          
          
          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>Device Type</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="device_type_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
                $type = "SELECT device_type FROM laptop WHERE status='0'";
                $type_run = mysqli_query($con, $type);
                $type_list = array();
                if(mysqli_num_rows($type_run) > 0){
                    foreach($type_run as $type){
                      if (in_array($type, $type_list, TRUE)){
                      }
                      else{
                        $type_list[]=$type;
                      }

                    }
                    sort($type_list);
                    foreach($type_list as $type) {
                    
                        
                    ?>
                    <div class="d-flex mt-2 form-check">
                    <input style='text-transform:none' type="checkbox" id="<?= $type['device_type']?>" value="<?= strtolower(preg_replace('/ /', '_', $type['device_type'])) ?>" name=device_type[] class="form-check-input device_type common_selector">
                      <label class="form-check-label" for="<?= $type['device_type']?>"><?= $type['device_type']?></label>
                    </div>
                     <?php    
                          }}
                       ?>



              </div>
            </div>
          </div>
          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>Utility</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="utility_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
                $utility = "SELECT utility FROM laptop WHERE status='0'";
                $utility_run = mysqli_query($con, $utility);
                $utility_list = array();
                if(mysqli_num_rows($utility_run) > 0){
                    foreach($utility_run as $utility){
                      if (in_array($utility, $utility_list, TRUE)){
                      }
                      else{
                        $utility_list[]=$utility;
                      }

                    }
                    sort($utility_list);
                    foreach($utility_list as $utility) {
                    
                        
                    ?>
                    <div class="d-flex mt-2 form-check">
                    <input style='text-transform:none' type="checkbox" id="<?= $utility['utility']?>" value="<?= strtolower(preg_replace('/ /', '_', $utility['utility'])) ?>" name=utility_item[] class="form-check-input utility_item common_selector">
                      <label class="form-check-label" for="<?= $utility['utility']?>"><?= $utility['utility']?></label>
                    </div>
                     <?php    
                          }}
                       ?>



              </div>
            </div>
          </div>
          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>Screen Size</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="screen_size_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
                $query = "SELECT size FROM laptop WHERE status='0'";
                $query_run = mysqli_query($con, $query);
                $list = array();
                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      $s = explode('.',$row['size'])[0];
                      if (in_array($s, $list, TRUE)){
                      }
                      else{
                        
                        $list[]=$s;
                      }

                    }
                    sort($list);
                    foreach($list as $item) {
                    
                     
                    ?>
                   
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="<?= $item ?>" value="<?= strtolower(preg_replace('/ /', '_', $item.'_inches_above')) ?>" name=screen_size_item[] class="form-check-input screen_size_item common_selector">
                      <label class="form-check-label" for="<?= $item ?>"><?= $item.' Inches & above' ?></label>
                    </div>
                   
                     <?php    
                          }}
                       ?>



              </div>
            </div>
          </div>
          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>Screen resolution</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="screen_resolution_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
                $query = "SELECT resolution FROM laptop WHERE status='0'";
                $query_run = mysqli_query($con, $query);
                $list = array();
                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      if (in_array($row['resolution'], $list, TRUE)){
                      }
                      else{
                        $list[]=$row['resolution'];
                      }

                    }
                    sort($list);
                    foreach($list as $item) {
                    
                        
                    ?>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="<?= $item ?>" value="<?= strtolower(preg_replace('/ /', '_', $item)) ?>" name=resolution_item[] class="form-check-input resolution_item common_selector">
                      <label class="form-check-label" for="<?= $item ?>"><?= $item ?></label>
       
                  
                  </div>
                     <?php    
                          }}
                       ?>



              </div>
            </div>
          </div>
          
    
          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>CPU Brand</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="cpu_brand_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
                $query = "SELECT processor_brand FROM laptop WHERE status='0'";
                $query_run = mysqli_query($con, $query);
                $list = array();
                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      if (in_array($row, $list, TRUE)){
                      }
                      else{
                        $list[]=$row;
                      }

                    }
                    sort($list);
                    foreach($list as $item) {
                  
                      if($item['processor_brand'] == 'Apple'){
                    ?>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="mack" value="<?= strtolower(preg_replace('/ /', '_', $item['processor_brand'])) ?>" name=cpu_brand_item[] class="form-check-input cpu_brand_item common_selector">
                      <label class="form-check-label" for="mack"><?= $item['processor_brand']?></label>
                    </div>
                     <?php    
                          }
                        else{
                          ?>
                           <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="<?= $item['processor_brand']?>" value="<?= strtolower(preg_replace('/ /', '_', $item['processor_brand'])) ?>" name=cpu_brand_item[] class="form-check-input cpu_brand_item common_selector">
                      <label class="form-check-label" for="<?= $item['processor_brand']?>"><?= $item['processor_brand']?></label>
                    </div>
                          <?php  
                        }}}
                       ?>



              </div>
            </div>
          </div>
          
          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>CPU Model</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="cpu_model_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
                $query = "SELECT processor FROM laptop WHERE status='0'";
                $query_run = mysqli_query($con, $query);
                $list = array();
                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      if (in_array($row, $list, TRUE)){
                      }
                      else{
                        $list[]=$row;
                      }

                    }
                    sort($list);
                    foreach($list as $item) {
                    
                        
                    ?>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="<?= $item['processor']?>" value="<?= strtolower(preg_replace('/ /', '_', $item['processor'])) ?>" name=cpu_model_item[] class="form-check-input cpu_model_item common_selector">
                      <label class="form-check-label" for="<?= $item['processor']?>"><?= $item['processor']?></label>
                    </div>
                     <?php    
                          }}
                       ?>



              </div>
            </div>
          </div>
          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>cache memory</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="cache_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
                $query = "SELECT cache FROM laptop WHERE status='0'";
                $query_run = mysqli_query($con, $query);
                $list = array();
                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      if (in_array($row, $list, TRUE)){
                      }
                      else{
                        if($row['cache'] != ''){
                          $list[]=$row;
                        }
                      }

                    }
                    sort($list);
                    foreach($list as $item) {
                    
                        
                    ?>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="<?= $item['cache']?>" value="<?= strtolower(preg_replace('/ /', '_', $item['cache'])) ?>" name=cache_item[] class="form-check-input cache_item common_selector">
                      <label class="form-check-label" for="<?= $item['cache']?>"><?= $item['cache']?></label>
                    </div>
                     <?php    
                          }}
                       ?>



              </div>
            </div>
          </div>

          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>CPU Core</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="cpu_core_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="dual_core" value="dual_core" name=cpu_core_item[] class="form-check-input cpu_core_item common_selector">
                      <label class="form-check-label" for="dual_core">Dual Core</label>
                    </div>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="quad_core" value="quad_core" name=cpu_core_item[] class="form-check-input cpu_core_item common_selector">
                      <label class="form-check-label" for="quad_core">quad Core</label>
                    </div>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="hexa_core" value="hexa_core" name=cpu_core_item[] class="form-check-input cpu_core_item common_selector">
                      <label class="form-check-label" for="hexa_core">hexa Core</label>
                    </div>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="octa_core" value="octa_core" name=cpu_core_item[] class="form-check-input cpu_core_item common_selector">
                      <label class="form-check-label" for="octa_core">octa Core</label>
                    </div>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="deca_core" value="deca_core" name=cpu_core_item[] class="form-check-input cpu_core_item common_selector">
                      <label class="form-check-label" for="deca_core">deca Core</label>
                    </div>

              </div>
            </div>
          </div>

          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>RAM</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="ram_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
                $query = "SELECT ram FROM laptop WHERE status='0'";
                $query_run = mysqli_query($con, $query);
                $list = array();
                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      if (in_array($row, $list, TRUE)){
                      }
                      else{
                        $list[]=$row;
                      }

                    }
                    sort($list);
                    foreach($list as $item) {
                    
                        
                    ?>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="<?= $item['ram']?>" value="<?= strtolower(preg_replace('/ /', '_', $item['ram'])).'_above' ?>" name=ram_item[] class="form-check-input ram_item common_selector">
                      <label class="form-check-label" for="<?= $item['ram']?>"><?= $item['ram'].' & Above'?></label>
                    </div>
                     <?php    
                          }}
                       ?>



              </div>
            </div>
          </div>
      
          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>RAM Type</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="ram_type_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
                $query = "SELECT ram_type FROM laptop WHERE status='0'";
                $query_run = mysqli_query($con, $query);
                $list = array();
                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      if (in_array($row, $list, TRUE)){
                      }
                      else{
                        $list[]=$row;
                      }
                    }
                    sort($list);
                    foreach($list as $item) {
                                        ?>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="<?= $item['ram_type']?>" value="<?= strtolower(preg_replace('/ /', '_', $item['ram_type'])) ?>" name=ram_type_item[] class="form-check-input ram_type_item common_selector">
                      <label class="form-check-label" for="<?= $item['ram_type']?>"><?= $item['ram_type']?></label>
                    </div>
                     <?php    
                          }}
                       ?>



              </div>
            </div>
          </div>
          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>HDD</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="hdd_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
                $query = "SELECT hdd FROM laptop WHERE status='0'";
                $query_run = mysqli_query($con, $query);
                $list = array();
                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      if (in_array($row, $list, TRUE)){
                      }
                      else{
                        if($row['hdd'] != ''){
                          $list[]=$row;
                        }
                      }
                    }
                    sort($list);
                    foreach($list as $item) {
                                        ?>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="<?= $item['hdd']?>" value="<?= strtolower(preg_replace('/ /', '_', $item['hdd'])).'_above' ?>" name=hdd_item[] class="form-check-input hdd_item common_selector">
                      <label class="form-check-label" for="<?= $item['hdd']?>"><?= $item['hdd'].' & Above'?></label>
                    </div>
                     <?php    
                          }}
                       ?>



              </div>
            </div>
          </div>
          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>SSD</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="ssd_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
                $query = "SELECT ssd FROM laptop WHERE status='0'";
                $query_run = mysqli_query($con, $query);
                $list = array();
                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                      if (in_array($row, $list, TRUE)){
                      }
                      else{
                        if($row['ssd'] != ''){
                          $list[]=$row;
                        }
                      }
                    }
                    sort($list);
                    foreach($list as $item) {
                                        ?>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="<?= explode(' ',$item['ssd'])[0]?>" value="<?= strtolower(preg_replace('/ /', '_', $item['ssd'])) ?>" name=ssd_item[] class="form-check-input ssd_item common_selector">
                      <label class="form-check-label" for="<?= explode(' ',$item['ssd'])[0]?>"><?= $item['ssd'].' & above'?></label>
                    </div>
                     <?php    
                          }}
                       ?>



              </div>
            </div>
          </div>
       
          
          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>Graphics</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="graphics_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="g1" value="1_gb_above" name=graphics_item[] class="form-check-input graphics_item common_selector">
                      <label class="form-check-label" for="g1">1 gb & above </label>
                    </div>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="g2" value="2_gb_above" name=graphics_item[] class="form-check-input graphics_item common_selector">
                      <label class="form-check-label" for="g2">2 gb & above </label>
                    </div>
                    <div class="d-flex mt-2 form-check">
                      <input style='text-transform:none' type="checkbox" id="g4" value="4_gb_above" name=graphics_item[] class="form-check-input graphics_item common_selector">
                      <label class="form-check-label" for="g4">4 gb & above </label>
                    </div>
                    <div class="d-flex mt-2 form-check">

                      <input style='text-transform:none' type="checkbox" id="g8" value="8_gb_above" name=graphics_item[] class="form-check-input graphics_item common_selector">
                      <label class="form-check-label" for="g8">8 gb & above </label>
                    </div>
                  </div>
                </div>
          </div>

          

          <div class="card mt-1 type-list">
            <div class="card-header d-flex" >
                <h3>operting system</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="os_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="display-list" style="max-height: 220px;overflow: auto;">
               
                <div class="d-flex mt-2 form-check">
                  <input style='text-transform:none' type="checkbox" id="chrome" value="chrome" name=os_item[] class="form-check-input os_item common_selector">
                  <label class="form-check-label oslabel" for="chrome">chrome</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input style='text-transform:none' type="checkbox" id="dos" value="dos" name=os_item[] class="form-check-input os_item common_selector">
                  <label class="form-check-label oslabel" for="dos">dos</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input style='text-transform:none' type="checkbox" id="linux" value="linux" name=os_item[] class="form-check-input os_item common_selector">
                  <label class="form-check-label oslabel" for="linux">linux</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input style='text-transform:none' type="checkbox" id="ubuntu" value="ubuntu" name=os_item[] class="form-check-input os_item common_selector">
                  <label class="form-check-label oslabel" for="ubuntu">ubuntu</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input style='text-transform:none' type="checkbox" id="mac" value="mac" name=os_item[] class="form-check-input os_item common_selector">
                  <label class="form-check-label oslabel" for="mac">mac</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input style='text-transform:none' type="checkbox" id="windows_10" value="windows_10" name=os_item[] class="form-check-input os_item common_selector">
                  <label class="form-check-label oslabel" for="windows_10">windows 10</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input style='text-transform:none' type="checkbox" id="windows_11" value="windows_11" name=os_item[] class="form-check-input os_item common_selector">
                  <label class="form-check-label oslabel" for="windows_11">windows 11</label>
                </div>
              </div>
            </div>
          </div>
          <div class="card mt-1">
            <div class="card-header d-flex" >
                <h3>features</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="feature_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
              <div class="feature-list" style="max-height: 220px;overflow: auto;">
                
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="backlit_keyboard" value="keyboard_backlit" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="backlit_keyboard">backlit keyboard</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="hdmi" value="hdmi" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="hdmi">hdmi</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="optical_drive" value="optical_drive" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="optical_drive">optical drive</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="ssd" value="ssd" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="ssd">ssd</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="fingerprint_sensor" value="fingerprint_sensor" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="fingerprint_sensor">fingerprint sensor</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="anti_glare_screen" value="anti_glare_screen" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="anti_glare_screen">anti glare screen</label>
                </div>
                   
               
                
              </div>
            </div>
          </div>
          
          
          


          
          <div class="dodo_box mt-2 mb-2" style="width:100%;height:100px"></div>
            </div>
            <div class="page list" id="page">
         
            <div class="mb-2">
          <h2 style="margin:auto 0;color:#00275C;display:flex">
            <div class="brand-name mt-auto" style="margin-right:6px">
            </div>
            <div>
          Laptop
            </div>
          </h2>
          <hr style="background-color: rgb(154, 255, 205);padding-top:0;margin-top:10px">

        </div>
        <div class="sort-page">
              <div class="d-flex justify-content-between viewstyle">
                <div class="page-type position-relative">
                  <div class="page-grid d-flex" href="#">
                    <div class="page-grid-icon">
                      <div class="bar"></div>
                      <div class="bar"></div>
                    </div>
                    <p>Grid</p>
                  </div>
                  <div class="page-list page-active position-relative d-flex" href="#">
                    <div class="page-list-icon">
                        <div class="bar"></div>
                    </div>
                    <p class="position-relative">List</p>
                  </div>
                </div>
                <div class="filterBtn">
                  <div class="d-flex">
                    <div class="icon">
                      <div class="bar"></div>
                    </div>
                    <p class='text-dark' >filter</p>
                  </div>
                </div>
                <div class="sort-type d-flex">
                  <p style="color:black">Sort by: </p>
                  <div class="app-cover" style="z-index:1">
                    <div id="select-box" style="z-index:1">
                      <input type="radio" id="options-view-button" name="platform">
                      <div id="select-button" class="brd">
                          <div id="selected-value">
                            <span>Default</span>
                          </div>
                          <div id="chevrons">
                              <i class="fas mb-1 fa-chevron-up"></i>
                            <i class="fas mt-1 fa-chevron-down"></i>
                            </div>
                        </div>
                        <div id="options" style="z-index:1" class="sort_option">
          <div class="option">
            <input class="s-c top sort common_selector" type="radio" name="platform" value="id">
            <input class="s-c bottom sort common_selector" type="radio" name="platform" value="id">
            <span class="label"><p>Default</p></span>
            <span class="opt-val"><p>Default</p></span>
          </div>

          <div class="option">
            <input class="s-c top sort common_selector" type="radio" name="platform" value="price">
            <input class="s-c bottom sort common_selector" type="radio" name="platform" value="price">
            <span class="label">Price: Low to High</span>
            <span class="opt-val"><p>Price: Low to High</p></span>
          </div>
          <div class="option">
            <input class="s-c top sort common_selector" type="radio" name="platform" value="price DESC">
            <input class="s-c bottom sort common_selector" type="radio" name="platform" value="price DESC">
            <span class="label">Price: High to Low</span>
            <span class="opt-val"><p>Price: High to Low</p></span>
          </div>
          <div class="option">
            <input class="s-c top sort common_selector" type="radio" name="platform" value="created_at">
            <input class="s-c bottom sort common_selector" type="radio" name="platform" value="created_at">
            <span class="label">Date: Latest to Oldest</span>
            <span class="opt-val"><p>Date: Latest to Oldest</p></span>
          </div>
          <div class="option">
            <input class="s-c top sort common_selector" type="radio" name="platform" value="created_at DESC">
            <input class="s-c bottom sort common_selector" type="radio" name="platform" value="created_at DESC">
            <span class="label">Date: Oldest to Latest</span>
            <span class="opt-val"><p>Date: Oldest to Latest</p></span>
          </div>
        
          <div id="option-bg"></div>
        </div>
      </div>
    </div>



                  
                
                </div>
              </div>
              <hr style="margin:8px 0 2px 0">
            </div>
            <div class="dodo_box" style='width:90%;height:100px;margin:8px auto'></div>
     <div class="position-relative">
      <div class="filter_data">
      
      </div>
    </div>
  </div>
</div>
</div>


                        
<?php
  include('includes/comparecart.php');
  include('includes/title.php');
  ?>










<script>

  $(document).ready(function(){

    if( $(window).width() < 700 ){
    var limit =12;
  }
  else if( $(window).width() < 1100 ){
    var limit =21;
  }
  else if( $(window).width() > 1100 ){
    var limit =24;
  }
  else{
    var limit =24;
  }
  load_data(1,limit);
  function load_data(page, limit, query = ''){
    filter_data();
    function filter_data(){
      var action = 'fetch_data';
      var criteria = get_filter('criteria_result');
      var minimum_price = $('#hidden_minimum_price').val();
      var maximum_price = $('#hidden_maximum_price').val();
      var brand = get_filter('brand_item');
      var device_type = get_filter('device_type');
      var utility = get_filter('utility_item');
      var screen_size = get_filter('screen_size_item');
      var resolution = get_filter('resolution_item');
      var cpu_brand = get_filter('cpu_brand_item');
      var cpu_model = get_filter('cpu_model_item');
      var cache_memory = get_filter('cache_item');
      var cpu_core = get_filter('cpu_core_item');
      var ram = get_filter('ram_item');
      var ram_type = get_filter('ram_type_item');
      var hdd = get_filter('hdd_item');
      var ssd = get_filter('ssd_item');
      var graphics = get_filter('graphics_item');
      var os = get_filter('os_item');
      var feature = get_filter('feature_item');
      var sort = get_filter('sort');
      const fd = {
        action:action,
        page:page,
        limit:limit, 
        query:query,
        criteria:criteria,
        minimum_price:minimum_price,
        maximum_price:maximum_price,
        brand:brand,
        device_type:device_type,
        utility:utility,
        screen_size:screen_size,
        resolution:resolution,
        cpu_brand:cpu_brand,
        cpu_model:cpu_model,
        cache_memory:cache_memory,
        cpu_core:cpu_core,
        ram:ram,
        ram_type:ram_type,
        hdd:hdd,
        ssd:ssd,
        graphics:graphics,
        os:os,
        feature:feature,
        sort:sort
      };

      $.ajax({
        url:"<?= base_url('laptop/ajax/laptop') ?>",
        method:"POST",
        datatype: 'JSON',
        data:fd,
        success:function(data){
            $('.filter_data').html(data);
          }
        });
        
      }

    function get_filter(class_name){
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
    $('.common_selector').click(function(){
        filter_data();

    });
    $('#price_range').slider({
        range:true,
        min:500,
        max:500000,
        values:[500, 500000],
        step:500,
        stop:function(event, ui){
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
      });


   
    };

    $(document).on('click', '.pagination a', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, limit, query);
    });
    $('.common_selector').click(function(){
      load_data(1, limit, query);
    });
  });
</script>















  <?php
include('includes/footer.php');
  ?>

