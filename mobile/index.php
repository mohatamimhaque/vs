<?php
session_start();


if(isset($_GET['brand'])){
  $brand =ucfirst($_GET['brand']);
  $page_title = "$brand"." Mobile";
}
else{
  $page_title = "Mobile";
}

include('includes/header.php');
include('includes/navbar.php');
//if(isset($_SESSION['mobile_compare'])){
//print_r($_SESSION['mobile_compare']);
//}
?>


<div class="productPage" style="min-width:800px">

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
                    <div class="d-flex mt-2 form-check">
                      <input type="checkbox" id="<?= $brand['brand']?>" value="<?= $brand['brand']?>" name=brand_item[] class="form-check-input brand_item common_selector">
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
                    <div class="d-flex mt-2 form-check">
                      <input type="checkbox" id="<?= $type['device_type']?>" value="<?= $type['device_type']?>" class="form-check-input device_type_item common_selector">
                      <label class="form-check-label" for="<?= $type['device_type']?>"><?= $type['device_type']?></label>
                    </div>
             <?php    
 }}
                ?>



              </div>
            </div>
          </div>
          

          

          <div class="card mt-1">
            <div class="card-header d-flex" >
                <h3>ram</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="ram_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
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
                    <div class="d-flex mt-2 form-check form-check">
                      <input type="checkbox" id="<?= $ram['ram']?>" value="<?= $ram['ram']?>" class="form-check-input ram_item common_selector">
                      <label class="form-check-label" class="form-check-label" for="<?= $ram['ram']?>"><?= $ram['ram']; echo 'GB & Above'?></label>
                    </div>
             <?php    
 }}
                ?>



              </div>
            </div>
          </div>
          



          
          
          <div class="card mt-1">
            <div class="card-header d-flex" >
                <h3>camera</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="camera_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>            </div>
            <div class="card-body">
              <div class="camera-list" style="max-height: 220px;overflow: auto;">
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="rear_camera" value="rear_camera" class="form-check-input camera_item common_selector">
                  <label class="form-check-label" for="rear_camera">rear camera</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="front_camera" value="front_camera" class="form-check-input camera_item common_selector">
                  <label class="form-check-label" for="front_camera">front camera</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="5mp" value="5_MP_Above" class="form-check-input camera_item common_selector">
                  <label class="form-check-label" for="5mp">5mp & Above</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="8mp" value="8_MP_Above" class="form-check-input camera_item common_selector">
                  <label class="form-check-label" for="8mp">8mp & Above</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="13mp" value="13_mp_Above" class="form-check-input camera_item common_selector">
                  <label class="form-check-label" for="13mp">13mp & Above</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="16mp" value="16_MP_Above" class="form-check-input camera_item common_selector">
                  <label class="form-check-label" for="16mp">16mp & Above</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="48mp" value="32_MP_Above" class="form-check-input camera_item common_selector">
                  <label class="form-check-label" for="48mp">48mp & Above</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="64mp" value="64_MP_Above" class="form-check-input camera_item common_selector">
                  <label class="form-check-label" for="64mp">64mp & Above</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="108mp" value="108_MP_Above" class="form-check-input camera_item common_selector">
                  <label class="form-check-label" for="108mp">108mp & Above</label>
                </div>
              
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="flash" value="flash" class="form-check-input camera_item common_selector">
                  <label class="form-check-label" for="flash">flash</label>
                </div>
                
              </div>
            </div>
          </div>
          <div class="card mt-1">
            <div class="card-header d-flex" >
                <h3>connectivity</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="connectivity_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>            
              </div>
            <div class="card-body">
              <div class="connectivity-list" style="max-height: 220px;overflow: auto;">
                
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="g3" value="3g" class="form-check-input connectivity_item common_selector">
                  <label class="form-check-label" for="g3">3g</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="g4" value="4g" class="form-check-input connectivity_item common_selector">
                  <label class="form-check-label" for="g4">4g</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="g5" value="5g" class="form-check-input connectivity_item common_selector">
                  <label class="form-check-label" for="g5">5g</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="wifi" value="wifi" class="form-check-input connectivity_item common_selector">
                  <label class="form-check-label" for="wifi">wifi</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="volte" value="volte" class="form-check-input connectivity_item common_selector">
                  <label class="form-check-label" for="volte">volte</label>
                </div>    
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="jack" value="headphone_jack" class="form-check-input connectivity_item common_selector">
                  <label class="form-check-label" for="jack">3.5mm jack</label>
                </div>
                
              </div>
            </div>
          </div>
          <div class="card mt-1">
            <div class="card-header d-flex" >
                <h3>Features</h3>           
              </div>
            <div class="card-body">
              <div class="feature-list" style="max-height: 220px;overflow: auto;">
                
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="card_slot" value="card_slot" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="card_slot">Memory Card Supported</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="touch" value="touch" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="touch">touch</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="notch" value="notch" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="notch">notch</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="torch" value="flash" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="torch">Torch</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="face_unlock" value="face_unlock" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="face_unlock">Face Unlock</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="fingerprint" value="fingerprint" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="fingerprint">Fingerprint</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="fm_radio" value="fm_radio" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="fm_radio">fm radio</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="java" value="java" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="java">java</label>
                </div>
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="gps" value="gps" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="gps">GPS</label>
                </div>    
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="edge" value="edge" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="edge">edge</label>
                </div>    
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="gprs" value="gprs" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="gprs">GPrS</label>
                </div>    
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="mail" value="email" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="mail">email</label>
                </div>    
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="document_reader" value="document_reader" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="document_reader">document reader</label>
                </div>    
                <div class="d-flex mt-2 form-check">
                  <input type="checkbox" id="fast_charging" value="fast_charging" class="form-check-input feature_item common_selector">
                  <label class="form-check-label" for="fast_charging">fast charging</label>
                </div>    
               
                
              </div>
            </div>
          </div>
          <div class="card mt-1">
            <div class="card-header d-flex" >
                <h3>inbuilt memory</h3>
                <div class="absolute">
                    <input type="checkbox" style="width:" class="memory_clear common_selector" value="">
                    <small class="btn mr-2" style="">clear</small>
                </div>
              </div>
            <div class="card-body">
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
                    <div class="d-flex mt-2 form-check">
                      <input type="checkbox" id="<?= $storage['storage']?>" value="<?= $storage['storage']?>" class="form-check-input memory_item common_selector">
                      <label class="form-check-label" for="<?= $storage['storage']?>"><?= $storage['storage']; echo 'GB & Above'?></label>
                    </div>
             <?php    
 }}
                ?>



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
             Mobile Phones
            </div>
          </h2>
          <hr style="background-color: rgb(154, 255, 205);padding-top:0;margin-top:10px">

        </div>
        <div class="sort-page">
              <div class="d-flex justify-content-between viewstyle">
                <div class="page-type position-relative">
                  <div class="page-grid d-flex">
                    <div class="page-grid-icon">
                      <div class="bar"></div>
                      <div class="bar"></div>
                    </div>
                    <p>Grid</p>
                  </div>
                  <div class="page-list page-active position-relative d-flex">
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

if(isset($_GET['brand'])){
    $brand = mysqli_real_escape_string($con, $_GET['brand']); 
    ?>
    <input type="hidden" value="<?=$brand ?>" id="brand">

<style>
  .card.brand-list input[type=checkbox]{
  pointer-events:none;
}
.card.brand-list label{
  pointer-events:none;
}
</style>
<?php
} 

else{
  ?>
    <input type="hidden" value="" id="brand">
  <?php
}
include('includes/comparecart.php');
include('includes/title.php');


?>








<script>
  
  $(document).ready(function(){
    var category = document.getElementById("brand").value;
    if(category != ''){
      $('.brand-name').text(category);
    }
  })
  $(document).ready(function(){

    if( $(window).width() < 700 ){
    var limit =12;
  }
  else if( $(window).width() < 1100 ){
    var limit =21;
  }
  else{
    var limit =24;
  }
  load_data(1,limit);
  function load_data(page, limit, query = ''){
    filter_data();
    function filter_data(){
      var action = 'fetch_data';
      var minimum_price = $('#hidden_minimum_price').val();
      var maximum_price = $('#hidden_maximum_price').val();
      var brand = get_filter('brand_item');
      var ram = get_filter('ram_item');
      var criteria = get_filter('criteria_result');
      var storage = get_filter('memory_item');
      var sort = get_filter('sort');
      var connectivity = get_filter('connectivity_item');
      var camera = get_filter('camera_item');
      var type = get_filter('device_type_item');
      var feature = get_filter('feature_item');
      var category = document.getElementById("brand").value;

      $.ajax({
        url:"<?= base_url('mobile/ajax/mobile') ?>",
        method:"POST",
        datatype: 'JSON',
        data:{page:page,limit:limit, query:query,action:action,category:category,sort:sort,minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage, criteria:criteria,connectivity:connectivity,camera:camera,type:type,feature:feature},
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
  <script src="<?= base_url('mobile/js/select.js') ?>"></script>
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
  $(".search-container .search-input").on("keyup", function(){
  var search = $(this).val();
  if (search !=="") {
  $.ajax({
  url:" <?= base_url('mobile/ajax/autofill') ?>",
  type:"POST",
  cache:false,
  data:{query:search},
  success:function(data){
  $(".bbb2").html(data);
  $(".bbb2").fadeIn();
  }  
  });
  }else{
  $(".bbb2").html("");  
  $(".bbb2").fadeOut();
  }
  });
 
  });
  
     </script>
  <script type="text/javascript">
  $(document).ready(function(){
  $("#criteria").on("keyup", function(){
  var criteria = $(this).val();
  if (criteria !=="") {
  $.ajax({
  url:"<?= base_url('mobile/ajax/autofill') ?>",
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
  if(check.checked=false){
    document.getElementById('criteria').value="";
  }
  });

  // click one particular search name it's fill in textbox
  $(document).on("click",".criteria-list", function(){
  $('#criteria').val($(this).text());
  $('.aaa').fadeOut("fast");
  });
  });
  
     </script>
   


</body>
</html>

