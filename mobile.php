<?php 

include('includes/navbar.php');

$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
?>
  <link href="assets/css/product.css" rel="stylesheet" type="text/css"/>

    

<div style="width:92%;margin:auto;margin-top:10px" class="d-flex">

      <div class="filter">    
      <div class="mb-2">
        <h2 style="margin:auto 0;color:rgb(161,161,161);">
          Filter result
        </h2>
        <hr style="background-color: rgb(154, 255, 205);padding-top:0;margin-top:10px">
      </div>           				
				
                <div class="card" style="">
                  <div class="card-header dflex" style="justify-content:space-between;">
                    <h3 style="text-transform: uppercase;font-weight: 600;font-size: 16px;color: rgb(161, 161, 161);">find criteria</h3>
                    <div class="absolute">
                      <input type="checkbox" id="criteria_result" class="mr-1 mt-1 criteria_result common_selector">
                      <small class="btn btn-outline-secondary mr-2" style="">clear</small>
                  </div>
            </div>
            <div class="card-body position-relative"style="padding:12px 16px">
              <form action="" method="post">
                <input type="search" class="search" id="criteria" placeholder="Find Criteria" style="border-radius: 3px;border:1px solid rgb(161,161,161);box-shadow:inset 0 0 3px 0 rgb(161,161,161);font-size: 13px;padding:3px 8px;width:100%">
            
                  <ul class="pt- text-dark aaa position-absolute" style="list-style:none;z-index:100;max-height: 500px;width:100%;background-color: rgb(244, 250, 250);">
                      
                  </ul>
                
              </form>
            </div>
          </div>

                <div class="card" style="">
            <div class="card-header" style="">
                <h3 style="text-transform: uppercase;font-weight: 600;font-size: 16px;color: rgb(161, 161, 161);">price</h3>
            </div>
            <div class="card-body"style="padding:12px 16px">
            <input type="hidden" id="hidden_minimum_price" value="0" />
                <input type="hidden" id="hidden_maximum_price" value="65000" />
                <p id="price_show" style="color:rgb(161,161,161)">1000 - 65000</p>
            <div id="price_range"></div>
            </div>
          </div>




          
          <div class="card mt-1 brand-list" style="color:rgb(161,161,161)">
            <div class="card-header d-flex" style="justify-content:space-between;">
                <h3 style="text-transform: uppercase;font-weight: 600;font-size: 16px;color: rgb(161, 161, 161);">brand</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="brand_clear common_selector" value="">
                    <small class="btn btn-outline-secondary mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body"style="padding:12px 16px">
              <div class="display-list" style="max-height: 220px;overflow: auto;">
                <?php
 $brand = "SELECT brand FROM mobile WHERE status='0'";
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
                    <div class="d-flex mt-2">
                      <input type="checkbox" id="<?= $brand['brand']?>" value="<?= $brand['brand']?>" class="mr-1 mt-1 brand_item common_selector">
                      <label style="color:rgb(161,161,161);margin-top:2px" for="<?= $brand['brand']?>"><?= $brand['brand']?></label>
                    </div>
             <?php    
 }}
                ?>



              </div>
            </div>
          </div>
          

          
          <div class="card mt-1 type-list" style="color:rgb(161,161,161)">
            <div class="card-header d-flex" style="justify-content:space-between;">
                <h3 style="text-transform: uppercase;font-weight: 600;font-size: 16px;color: rgb(161, 161, 161);">Device Type</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="device_type_clear common_selector" value="">
                    <small class="btn btn-outline-secondary mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body"style="padding:12px 16px">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
 $type = "SELECT device_type FROM mobile WHERE status='0'";
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
                    <div class="d-flex mt-2">
                      <input type="checkbox" id="<?= $type['device_type']?>" value="<?= $type['device_type']?>" class="mr-1 mt-1 device_type_item common_selector">
                      <label style="color:rgb(161,161,161);margin-top:2px" for="<?= $type['device_type']?>"><?= $type['device_type']?></label>
                    </div>
             <?php    
 }}
                ?>



              </div>
            </div>
          </div>
          

          

          <div class="card mt-1" style="color:rgb(161,161,161)">
            <div class="card-header d-flex" style="justify-content:space-between;">
                <h3 style="text-transform: uppercase;font-weight: 600;font-size: 16px;color: rgb(161, 161, 161);">ram</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="ram_clear common_selector" value="">
                    <small class="btn btn-outline-secondary mr-2 " style="">clear</small>
                </div>
              </div>
            <div class="card-body"style="padding:12px 16px">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
 $ram = "SELECT ram FROM mobile WHERE status='0'";
 $ram_run = mysqli_query($con, $ram);
 $ram_list = array();
 if(mysqli_num_rows($ram_run) > 0){
    foreach($ram_run as $ram){
      if (in_array($ram, $ram_list, TRUE)){
      }
      else{
        $ram_list[]=$ram;
      }

    }
    sort($ram_list);
    foreach($ram_list as $ram) {
     
    
?>
                    <div class="d-flex mt-2">
                      <input type="checkbox" id="<?= $ram['ram']?>" value="<?= $ram['ram']?>" class="mr-1 mt-1 ram_item common_selector">
                      <label style="color:rgb(161,161,161);margin-top:2px" for="<?= $ram['ram']?>"><?= $ram['ram']; echo 'GB & Above'?></label>
                    </div>
             <?php    
 }}
                ?>



              </div>
            </div>
          </div>
          



          
          
          <div class="card mt-1" style="color:rgb(161,161,161)">
            <div class="card-header d-flex" style="justify-content:space-between;">
                <h3 style="text-transform: uppercase;font-weight: 600;font-size: 16px;color: rgb(161, 161, 161);">camera</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="camera_clear common_selector" value="">
                    <small class="btn btn-outline-secondary mr-2" style="">clear</small>
                </div>            </div>
            <div class="card-body"style="padding:12px 16px">
              <div class="camera-list" style="max-height: 220px;overflow: auto;">
                <div class="d-flex mt-2">
                  <input type="checkbox" id="rear_camera" value="rear_camera" class="mr-1 mt-1 camera_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="rear_camera">rear camera</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="front_camera" value="front_camera" class="mr-1 mt-1 camera_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="front_camera">front camera</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="5mp" value="5MP & Above" class="mr-1 mt-1 camera_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="5mp">5mp & Above</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="8mp" value="8MP & Above" class="mr-1 mt-1 camera_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="8mp">8mp & Above</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="13mp" value="13MP & Above" class="mr-1 mt-1 camera_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="13mp">13mp & Above</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="16mp" value="16MP & Above" class="mr-1 mt-1 camera_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="16mp">16mp & Above</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="48mp" value="48MP & Above" class="mr-1 mt-1 camera_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="48mp">48mp & Above</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="64mp" value="64MP & Above" class="mr-1 mt-1 camera_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="64mp">64mp & Above</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="108mp" value="108MP & Above" class="mr-1 mt-1 camera_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="108mp">108mp & Above</label>
                </div>
              
                <div class="d-flex mt-2">
                  <input type="checkbox" id="flash" value="flash" class="mr-1 mt-1 camera_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="flash">flash</label>
                </div>
                
              </div>
            </div>
          </div>
          <div class="card mt-1" style="color:rgb(161,161,161)">
            <div class="card-header d-flex" style="justify-content:space-between;">
                <h3 style="text-transform: uppercase;font-weight: 600;font-size: 16px;color: rgb(161, 161, 161);">connctivity</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="connectivity_clear common_selector" value="">
                    <small class="btn btn-outline-secondary mr-2" style="">clear</small>
                </div>            
              </div>
            <div class="card-body"style="padding:12px 16px">
              <div class="connctivity-list" style="max-height: 220px;overflow: auto;">
                
                <div class="d-flex mt-2">
                  <input type="checkbox" id="g3" value="3g" class="mr-1 mt-1 connctivity_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="g3">3g</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="g4" value="4g" class="mr-1 mt-1 connctivity_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="g4">4g</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="g5" value="5g" class="mr-1 mt-1 connctivity_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="g5">5g</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="wifi" value="wifi" class="mr-1 mt-1 connctivity_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="wifi">wifi</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="volte" value="volte" class="mr-1 mt-1 connctivity_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="volte">volte</label>
                </div>    
                <div class="d-flex mt-2">
                  <input type="checkbox" id="jack" value="headphone_jack" class="mr-1 mt-1 connctivity_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="jack">3.5mm jack</label>
                </div>
                
              </div>
            </div>
          </div>
          <div class="card mt-1" style="color:rgb(161,161,161)">
            <div class="card-header d-flex" style="justify-content:space-between;">
                <h3 style="text-transform: uppercase;font-weight: 600;font-size: 16px;color: rgb(161, 161, 161);">Features</h3>           
              </div>
            <div class="card-body"style="padding:12px 16px">
              <div class="feature-list" style="max-height: 220px;overflow: auto;">
                
                <div class="d-flex mt-2">
                  <input type="checkbox" id="card_slot" value="card_slot" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="card_slot">Memory Card Supported</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="touch" value="touch" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="touch">touch</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="notch" value="notch" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="notch">notch</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="torch" value="flash" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="torch">Torch</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="face_unlock" value="face_unlock" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="face_unlock">Face Unlock</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="fingerprint" value="fingerprint" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="fingerprint">Fingerprint</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="fm_radio" value="fm_radio" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="fm_radio">fm radio</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="java" value="java" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="java">java</label>
                </div>
                <div class="d-flex mt-2">
                  <input type="checkbox" id="gps" value="gps" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="gps">GPS</label>
                </div>    
                <div class="d-flex mt-2">
                  <input type="checkbox" id="edge" value="edge" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="edge">edge</label>
                </div>    
                <div class="d-flex mt-2">
                  <input type="checkbox" id="gprs" value="gprs" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="gprs">GPrS</label>
                </div>    
                <div class="d-flex mt-2">
                  <input type="checkbox" id="email" value="email" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="email">email</label>
                </div>    
                <div class="d-flex mt-2">
                  <input type="checkbox" id="document_reader" value="document_reader" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="document_reader">document reader</label>
                </div>    
                <div class="d-flex mt-2">
                  <input type="checkbox" id="fast_charging" value="fast_charging" class="mr-1 mt-1 feature_item common_selector">
                  <label style="color:rgb(161,161,161);margin-top:2px" for="fast_charging">fast charging</label>
                </div>    
               
                
              </div>
            </div>
          </div>
          <div class="card mt-1" style="color:rgb(161,161,161)">
            <div class="card-header d-flex" style="justify-content:space-between;">
                <h3 style="text-transform: uppercase;font-weight: 600;font-size: 16px;color: rgb(161, 161, 161);">inbuilt memory</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="memory_clear common_selector" value="">
                    <small class="btn btn-outline-secondary mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body"style="padding:12px 16px">
              <div class="display-list" style="max-height: 220px;overflow: auto;">

                <?php
 $storage = "SELECT storage FROM mobile WHERE status='0'";
 $storage_run = mysqli_query($con, $storage);
 $storage_list = array();
 if(mysqli_num_rows($storage_run) > 0){
    foreach($storage_run as $storage){
      if (in_array($storage, $storage_list, TRUE)){
      }
      else{
        $storage_list[]=$storage;
      }

    }
    sort($storage_list);
    foreach($storage_list as $storage) {
     
    
?>
                    <div class="d-flex mt-2">
                      <input type="checkbox" id="<?= $storage['storage']?>" value="<?= $storage['storage']?>" class="mr-1 mt-1 memory_item common_selector">
                      <label style="color:rgb(161,161,161);margin-top:2px" for="<?= $storage['storage']?>"><?= $storage['storage']; echo 'GB & Above'?></label>
                    </div>
             <?php    
 }}
                ?>



              </div>
            </div>
          </div>
          


          

            </div>
            <div class="page" id="page">
         

        
            <?php

if(isset($_GET['brand'])){
    $brand = mysqli_real_escape_string($con, $_GET['brand']); 
    ?>
    <input type="hidden" value="<?=$brand ?>" id="brand">
    <div class="mb-2">
          <h2 style="margin:auto 0;color:rgb(161,161,161);">
            Mobile Phones
          </h2>
          <hr style="background-color: rgb(154, 255, 205);padding-top:0;margin-top:10px">

        </div>
        <div class="sort-page">
              <div class="d-flex justify-content-between">
                <div class="page-type d-flex position-relative">
                  <div class="page-grid page-active d-flex" href="#">
                    <div class="page-grid-icon">
                      <div class="bar"></div>
                      <div class="bar"></div>
                    </div>
                    <p>Grid</p>
                  </div>
                  <div class="page-list position-relative d-flex" href="#">
                    <div class="page-list-icon">
                        <div class="bar"></div>
                    </div>
                    <p class="position-relative">List</p>
                  </div>

                </div>
                <div class="sort-type d-flex">
                  <p>Sort by: </p>
                  <div class="app-cover">
                    <div id="select-box">
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
                        <div id="options" class="sort_option">
          <div class="option">
            <input class="s-c top sort common_selector" type="radio" name="platform" value="id">
            <input class="s-c bottom sort common_selector" type="radio" name="platform" value="id">
            <span class="label"><p>Deafaul</p></span>
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
      <div class="filter_data">
    
  </div>
    </div>
    </div>
    </div>
    
<style>
  .card.brand-list input[type=checkbox]{
  pointer-events:none;
}
.card.brand-list label{
  pointer-events:none;
}
</style>
        
<script>

  
    $(document).ready(function(){

        filter_data();

        function filter_data()
        {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var category = document.getElementById("brand").value;
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var brand = get_filter('brand_item');
            var ram = get_filter('ram_item');
            var criteria = get_filter('criteria_result');
            var storage = get_filter('memory_item');
            var sort = get_filter('sort');
            var connctivity = get_filter('connctivity_item');
            var camera = get_filter('camera_item');
            var type = get_filter('device_type_item');
            var feature = get_filter('feature_item');


           
              $.ajax({
                url:"ajax/mobile.php",
                method:"POST",
                data:{action:action,category:category, sort:sort,minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage, criteria:criteria,connctivity:connctivity,camera:camera,type:type,feature:feature},
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }

        function get_filter(class_name)
        {
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
            min:1000,
            max:65000,
            values:[1000, 65000],
            step:500,
            stop:function(event, ui)
            {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data();
            }
        });

    });
    </script>
    <?php
}

else{
  ?>
          <div class="mb-2">
        <h2 style="margin:auto 0;color:rgb(161,161,161);">
          Mobile Phones
        </h2>
        <hr style="background-color: rgb(154, 255, 205);padding-top:0;margin-top:10px">

      </div>
      <div class="sort-page">
            <div class="d-flex justify-content-between">
              <div class="page-type d-flex position-relative">
                <div class="page-grid page-active d-flex">
                  <div class="page-grid-icon">
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
  <p>Grid</p>

                </div>
                <div class="page-list position-relative d-flex">
                  <div class="page-list-icon">
                      <div class="bar"></div>
                </div>
                  <p class="position-relative">List</p>
                </div>
              </div>
              <div class="sort-type d-flex">
                <p>Sort by: </p>
                <div class="app-cover">
                  <div id="select-box">
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
                      <div id="options" class="sort_option">
        <div class="option">
          <input class="s-c top sort common_selector" type="radio" name="platform" value="id">
          <input class="s-c bottom sort common_selector" type="radio" name="platform" value="id">
          <span class="label"><p>Deafaul</p></span>
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

    <div class="filter_data">
    
  </div>
    </div>
    </div>
    </div>
  
<script>

  
    $(document).ready(function(){

        filter_data();

        function filter_data()
        {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var brand = get_filter('brand_item');
            var ram = get_filter('ram_item');
            var criteria = get_filter('criteria_result');
            var storage = get_filter('memory_item');
            var sort = get_filter('sort');
            var connctivity = get_filter('connctivity_item');
            var camera = get_filter('camera_item');
            var type = get_filter('device_type_item');
            var feature = get_filter('feature_item');


           
              $.ajax({
                url:"ajax/mobile.php",
                method:"POST",
                data:{action:action,sort:sort,minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage, criteria:criteria,connctivity:connctivity,camera:camera,type:type,feature:feature},
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }

        function get_filter(class_name)
        {
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
            min:1000,
            max:65000,
            values:[1000, 65000],
            step:500,
            stop:function(event, ui)
            {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data();
            }
        });

    });
    </script>
    <?php
}
?>

















<script src=""></script>

    <script src="admin/assets/js/bootstrap.min.js"></script>
    <script src="admin/assets/js/sidebar-menu.js"></script>
    <script src="admin/assets/js/app-script.js"></script>
  
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/dashboard.js"></script>
    
    <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/dataTables.jqueryui.min.js"></script>
   
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> 
  <script src="assets/js/script.js"></script>
  <script src="assets/js/select.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
  $("#search").on("keyup", function(){
  var search = $(this).val();
  if (search !=="") {
  $.ajax({
  url:" ajax/autofill.php",
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
  // click one particular search name it's fill in textbox
  $(document).on("click",".autofill-list-link", function(){
  $('#search').val($(this).text());
  $('.bbb').fadeOut("fast");
  });
  });
  
     </script>
  <script type="text/javascript">
  $(document).ready(function(){
  $("#criteria").on("keyup", function(){
  var criteria = $(this).val();
  if (criteria !=="") {
  $.ajax({
  url:" ajax/autofill.php",
  type:"POST",
  cache:false,
  data:{criteria:criteria},
  success:function(data){
  $(".aaa").html(data);
  $(".aaa").fadeIn();
  var check = document.getElementById('criteria_result') ;
  check.value=criteria;
  check.click();
  check.checked=true;

  }  
  });
  }else{
  $(".aaa").html("");  
  $(".aaa").fadeOut();
  }
  var check = document.getElementById('criteria_result') ;
  check.value="";
  check.click();
  });

  // click one particular search name it's fill in textbox
  $(document).on("click",".criteria-list", function(){
  $('#criteria').val($(this).text());
  $('.aaa').fadeOut("fast");
  });
  });
  
     </script>
   
  
    
  </body>
  
  
  
</body>
</html>