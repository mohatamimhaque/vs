<?php
session_start();
    include("../admin/config/dbcon.php");
    if(isset($_GET['title'])){
      $slug = mysqli_real_escape_string($con, $_GET['title']);
      if(isset($_SESSION[$slug])){
      }
      else{
        $_SESSION[$slug] = $slug;
        mysqli_query($con, "UPDATE laptop SET views=views+1 WHERE slug='$slug'");
      }
      $sql = "SELECT * FROM laptop WHERE slug='$slug'";
      $sql_run = mysqli_query($con, $sql);
      if(mysqli_num_rows($sql_run) > 0){
        $sqlItem= mysqli_fetch_array($sql_run);
        $name=$sqlItem['name'];
        $page_title = "$name";
  }}
    include("includes/header.php");
    include("includes/navbar.php");
    ?>
 <link href="<?= base_url('assets/css/jquery.prodigal.css') ?>" rel="stylesheet" type="text/css"/>
  <script src="<?= base_url('assets/js/jquery.prodigal.js') ?>"></script>
  <div id="product-tabs-wrapper">
    <div class="mb-2 product-tabs">
      <div>
        <a href="#specification"  title="specification"><i class="fas fa-file"></i></a>
      </div>
    </div>
    <div class="mb-2 product-tabs" >
      <div>
        <a href="#review" title="review" ><i class="fa-solid fa-star"></i></a>
      </div>
    </div>
    <div class="mb-2 product-tabs">
      <div>
        <a href="#discussion"  title="discussion"><i class="fa-solid fa-comment"></i></a>
      </div>
    </div>
  </div>
  
<div style="width:calc(100% - 100px);margin:auto;margin-top:10px;position:relative" class="d-flex">
  <div class="view_panel position-relative">
    <?php 
        if(isset($_GET['title'])){

          $slug = mysqli_real_escape_string($con, $_GET['title']);

          $query = "SELECT * FROM laptop WHERE slug='$slug' LIMIT 1";

          $query_run = mysqli_query($con, $query);

          if(mysqli_num_rows($query_run) > 0){

              foreach($query_run as $row){
                    $topCompare = $row['name'];
                    $product_id = $row['id'];
                    ?>
                    <input type="hidden" id="product_id" value="<?= $row['id'] ?>">
                    <div class="shadowdiv p-2">
                    <div class="productheader">
                    <div class="d-flex justify-content-between">
                        <div>
                          <h1><?= $row['name']?></h1>
                          <p>by <a href="index?brand=<?= $row['brand']?>"><?= $row['brand']?></a></p>
                        </div>
                        <div class="favourite">
                        <?php if(isset($_SESSION['auth_user'])) : ?>
                          <label class="like">
                            <input type="checkbox"/ id='hearth_check'>
                            <div class="hearth"/></div>
                          </label>
                          <?php else :?>
                            <label class="like">
                              <div class="hearth"/></div>
                            </label>
                            <?php endif; ?>

                        </div>
                      </div>
                      <div class="quick-specification">
                        <hr>
                        <h5><?= $row['name']?> Quick Specifications</h5>
                        <table class="w-100 table table-borderless">
                          <thead>
                            <tr>
                                <th class="tbold">Specifcation</th>
                                <th class="tbold">value</th>
                            </tr>
                          </thead>
                          <tbody>
                              <tr>
                                <td class="tbold">OS</td>
                                <td><?= $row['os'] ?></td>
                              </tr>
                              <tr>
                                <td class="tbold">CPU</td>
                                <td><?= $row['processor'] ?></td>
                              </tr>
                              <tr>
                                <td class="tbold">GPU</td>
                                <td style="">
                                  <?php
                                  if($row['dedicated_memory'] != ''){
                                    echo $row['dedicated_memory'].' ';
                                  }
                                  ?>
                                  <?= $row['gpu'] ?>
                                </td>
                              </tr>
                              <tr>
                                <td class="tbold">RAM</td>
                                <td>
                                <?php
                                  if($row['ram_type'] != ''){
                                    echo $row['ram_type'].' ';
                                  }
                                  ?>
                                  <?= $row['ram'] ?>
                                </td>
                              </tr>
                              <tr>
                                <td class="tbold">Display</td>
                                <td><?= $row['size'] ?></td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                      <button class="quick-btn">Show More</button>
                    </div>
                    <hr style="margin-bottom:0">
                    <div style="" class="productBox d-flex justify-content-between">
                        <div class="imageGallary">
                        <?php
                        $image = (explode(',',$row['image']));
                        ?>
                        <div class="previewImage">
                          <div style="height:250px">
                          <a style="width:180px;height:140px" class="prodigal-thumbs" href="<?=$url.'admin/upload/category/laptop/image/'.$image[0]?>">
                            <img style="width:100%;height:100%" src="<?=$url.'admin/upload/category/laptop/image/'.$image[0]?>" />
                          </a>
                          </div>
                        </div>
                        <div id="thumbnail-container">
                        <?php
                          foreach ($image as $key => $value) {
                            $focused = "";
                            if ($key == 0) {
                                $focused = "focused";
                            }
                            ?>
                              
                              <a class="prodigal-thumbs" style="width:58px;height:42px" href="<?=$url.'admin/upload/category/laptop/image/'.$image[$key]?>">
                                <img class="thumbnail <?php echo $focused; ?>" style="width:100%;height:100%" src="<?=$url.'admin/upload/category/laptop/image/'.$image[$key]?>" />
                               </a>

                                                           
                              <?php } ?>
                          </div>

                     

                        </div>
                        <div class="productDetails p">
                          <div style="overfolow:hidden;position:relative;padding:8px 0;display:flex;justify-content:space-between">
                            <p style="overfolow:hidden;font-size:22px;margin:auto 0;color:#00275C"><?=$row['price']?> TK</p>
                            <button style="" type='submit'  value="<?= $row['id']?>" name="add_to_compare" class="laptop_compare btn"><i class="fa-solid fa-plus"></i> Add to compare</button>
                          
                          </div>
                          <hr>
                          <div class="container">
                                  <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                      <h1 class="text-warning">
                                        <b><span id="average_rating">0.0</span> / <small>5</small></b>
                                      </h1>
                                     <div class="ml-2">
                                        <div class="">
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                              <i class="fas fa-star star-light mr-1 main_star"></i>
                                              <i class="fas fa-star star-light mr-1 main_star"></i>
                                              <i class="fas fa-star star-light mr-1 main_star"></i>
                                              <i class="fas fa-star star-light mr-1 main_star"></i>
                                          </div>
                                          <p class="text-dark"><span id="total_review">0</span> Review</p>
                                     </div>
                                    </div>
                                    
                                    <div class="">
                                      <a  href="#review"  name="add_review" style="font-size:13px" style=" text-transform: uppercase;">Write a Review</a>
                                    </div>
                                  </div>
                          </div>
                          <hr>
                          <div class="product_header d-flex justify-content-between">
        <h3 class="text-dark">Product feature</h3>
        <small>        
            <a href="#specification" class="text-info">view all specification</a>
        </small>
        </div>


        <div class="row mt-2 text-dark">
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

    <hr>

                        </div>
                    </div>
                    </div>
    <div class="dodo_box" style='width:90%;height:100px;margin:10px auto'></div>
<div class="sub-menu" id="sub-menu">
  <a class="sub-menu-item shadowdiv" href="#specification">specification</a>
  <a class="sub-menu-item shadowdiv" href="#review">review</a>
  <a class="sub-menu-item shadowdiv" href="#discussion">discussion</a>
</div>




                    <?php
                    include("includes/specification.php");
                  }
                }
              }
              ?>
  
  <div class="dodo_box" style='width:90%;height:100px;margin:10px auto'></div>

        <div class="reviews shadowdiv" id="review">
          <h2>
            Write a review
          </h2>
          <div class="form-group d-flex">
            <label for="heading" >Heading</label>
            <div class="input-group w-50">
              <input class='form-control text-dark' type="text" id="heading" >
            </div>
          </div>
          <div class="form-group d-flex">
            <label for="summary" >summary</label>
            <div class="input-group w-50">
              <input class='form-control text-dark' type="text" id="summary" >
            </div>
          </div>
          <div class="form-group d-flex">
            <label for="rating" class="">Rating</label>
            <h4 class="">
	        	<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
           </div>
           <?php if(isset($_SESSION['auth_user'])) : ?>
            <input type="hidden" id="user_name" class="user_name" value="<?= $_SESSION['auth_user']['name'];?>" name="user_name">
            <input type="hidden" id="user_id" class="user_photo" value="<?= $_SESSION['auth_user']['user_id'];?>" name="user_photo">
            <input type="hidden" id="url" class="url" value="<?= $slug;?>" name="url">
            <div class="form-group">
	        	<button type="button" class="btn" id="save_review">Submit</button>
	        </div>
            <?php else :?>
            <div class="form-group">
	        	  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Submit</button>
	        </div>
            <?php endif; ?>
        </div>
        <div class="dodo_box" style='width:90%;height:100px;margin:10px auto'></div>

        <div class="commentSection shadowdiv" id='discussion'>
          <div class="commentSectionHeader shadowdiv">
            <h3>Discussions</h3>
          </div>
          <div style='padding:16px;'>
             <div class="form-group col-md-12 shadowdiv pt-2">
              <div class="d-flex">                  
                <div>
                    <div class="comment-user-image">
                    <input type="hidden" class="curl" value="<?= $slug?>" id="curl">
                        <?php if(isset($_SESSION['auth_user'])) : ?>
                          <?php
                          $id = $_SESSION['auth_user']['user_id'];
                          foreach(mysqli_query($con,"SELECT * FROM users WHERE id = '$id'") as $r){
                          }
                          ?>
                        <img style="width:100%;height:100%;border-radius:50%" src="<?=$url.'admin/upload/user/image/'.$r['user_photo'];?>" alt=""> 
                        <?php else :?>
                            <img style="width:100%;height:100%;border-radius:50%" src="<?=$url.'admin/upload/user/image/avatar.jpg' ?>" alt=""> 
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group col-md-10 mt-3">
                    <input type="text" class="mt-3" placeholder="Add a comment..." name="comment" id="comment">
                    <hr>
                    <?php if(isset($_SESSION['auth_user'])) : ?>
                    <input type="hidden" class="cuserName" value="<?= $_SESSION['auth_user']['name'];?>" id="cuserName">
                    <input type="hidden" class="cuserImage" value="<?= $_SESSION['auth_user']['user_photo'];?>" id="cuserImage">
                    <div class="comment-btn-group" style="margin-top:5px;">
                        <button type="button" class="btn btn-primary" id="comment_btn">comment</button>
                    </div>
                    <?php else :?>
                    <div class="comment-btn-group" style="margin-top:5px;">
                        <button type="button" class="btn btn-primary" class="comment_btn " data-toggle="modal" data-target="#loginModal">comment</button>
                    </div>
                    <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="commentShow ml-3">
           <!----------autofill from ajax/comment------------------>
          </div>


          <div>

          </div>


        </div>
  


  </div>
  <div class="p_sidebar">
    <div class="dodo_box" style="height:240px;"></div>
    <div class="productSuggest">
      <div class="productSuggestHeader bg-green">
        <h3>Related products</h3  >
      </div>
      <div class="productSuggestBody">
        <?php
         $query = "SELECT * FROM laptop ORDER BY RAND() LIMIT 6";
         $query_run = mysqli_query($con, $query);
         if(mysqli_num_rows($query_run) > 0){
           foreach($query_run as $row){
             $files = $row['image']; 
             $file = explode(",",$files);
             $image =$file[0];
        ?>
        <div class="contentbox shadowdiv d-flex">
          <div style="width:110px;height:auto;" class="d-flex align-items-center justify-content-center">
            <div style="width:90px;height:70px;margin:auto">
              <img style="width:100%;height:100%" src="<?= base_url('admin/upload/category/laptop/image/').$image ?>" alt="<?= base_url('admin/upload/category/laptop/image/').$image ?>">
            </div>
          </div>
          <div class="suggestText">
            <div class="">
              <a href="<?= base_url('laptop/show/').$row['slug'] ?>"><p><?= $row['name'] ?></p></a>
              <div class="p">
                <button type='submit' id="" class="laptop_compare btn" value="<?= $row['id'] ?>">
                  <i class="fa-solid fa-plus"></i> add to compare
                </button>
              </div>
            </div>
          </div>
        </div>
        <?php
        }}
        ?>
      </div>
    </div>
    <div class="dodo_box mt-3 mb-3" style="height:240px;"></div>
    <div class="topCompared">
      <div class="topComparedHeader bg-green">
        <p>compred with</p>
      </div>
      <div class="topComparedBody">
        <?php
          $query = "SELECT * FROM comparelist WHERE product_type='laptop' AND product_name LIKE '%".str_replace(" ", "%", $topCompare)."%' ORDER BY views DESC LIMIT 8";
          $query_run = mysqli_query($con, $query);
          if(mysqli_num_rows($query_run) > 0){
            foreach($query_run as $row){
              ?>
              <div class='sdiv'>
                <a href="<?=base_url('laptop/comparison/').$row['title'] ?>"><?= $row['product_name'] ?>  </a>
              </div>
              <?php
              }
            }
          ?>
      </div>
    </div>
    <div class="dodo_box mt-3 mb-3" style="height:240px;"></div>

  </div>


</div>






<?php

include('includes/comparecart.php');
?>




















<input type="hidden" id="surl" class="url" value="<?= $slug;?>" name="url">


<script>
  

const quick_btn = document.querySelector(".quick-btn");
const quick_specification = document.querySelector(".quick-specification");

quick_btn.addEventListener("click",() => {
  quick_specification.classList.toggle("active");
  if (quick_btn.innerHTML === "Show More"){
    quick_btn.innerHTML = "Show Less";
  } else {
    quick_btn.innerHTML = "Show More";
  }
})

$("#thumbnail-container img").click(function() {
    var src = $(this).attr("src");
    $(".previewImage img").attr("src", src);
    $(".previewImage .prodigal-thumbs").attr("href", src);

});


$(function(){
		$('.prodigal-thumbs').prodigal();
});
			

$(document).ready(function(){
  $('#comment_btn').click(function(){
        var comment = $('#comment').val();
        var user_id = $('#user_id').val();
        var url = $('#curl').val();
   
         if(comment == '')
         {
             alert("Please Enter something..");
             return false;
         }
         else
         {
             $.ajax({
                 url:"<?= base_url('ajax/comment') ?>",
                 method:"POST",
                 data:{comment:comment,user_id:user_id,url:url},
                 success:function(data)
                 {
                     load_comment_data();

                 }
             })
         }
   
     });
  
     
load_comment_data();
function load_comment_data(){
    var url = $('#curl').val();
    var user_name = $('#cuserName').val();
    var user_photo = $('#cuserImage').val();
    $.ajax({
        url:" <?= base_url('ajax/comment') ?>",
        type:"POST",
        cache:false,
        data:{commentShow:'load_comment',url:url,user_name:user_name,user_photo:user_photo},
        success:function(data){
        $(".commentShow").html(data);
      
          }  
      });
    }












var rating_data = 0;

  $('#add_review').click(function(){

      $('#reviews').modal('show');

  });

  $(document).on('mouseenter', '.submit_star', function(){

      var rating = $(this).data('rating');

      reset_background();

      for(var count = 1; count <= rating; count++)
      {

          $('#submit_star_'+count).addClass('text-warning');

      }

  });

  function reset_background()
  {
      for(var count = 1; count <= 5; count++)
      {

          $('#submit_star_'+count).addClass('star-light');

          $('#submit_star_'+count).removeClass('text-warning');

      }
  }

  $(document).on('mouseleave', '.submit_star', function(){

      reset_background();

      for(var count = 1; count <= rating_data; count++)
      {

          $('#submit_star_'+count).removeClass('star-light');

          $('#submit_star_'+count).addClass('text-warning');
      }

  });

  $(document).on('click', '.submit_star', function(){

      rating_data = $(this).data('rating');

  });

  $('#save_review').click(function(){
       

    var user_id = $('#user_id').val();
      var url = $('#url').val();
      var heading = $('#heading').val();
      var summary = $('#summary').val();

      if(summary == '')
      {
          alert("Please Fill Both Field");
          return false;
      }
      else
      {
          $.ajax({
              url:"<?= base_url('ajax/submitrating') ?>",
              method:"POST",
              data:{rating_data:rating_data,user_id:user_id,url:url,heading:heading,summary:summary,category:'laptop'},
              success:function(data)
              {
                alert(data);
                  load_rating_data();
                  location.reload();
              }
          })
      }

  });

  load_rating_data();

  function load_rating_data()
  {
    var url = $('#surl').val();

      $.ajax({
            url:"<?= base_url('ajax/submitrating') ?>",
          method:"POST",
          data:{action:'load_data',url:url},
          dataType:"JSON",
          success:function(data){
              $('#average_rating').text(data.average_rating);
              $('#total_review').text(data.total_review);

              var count_star = 0;

              $('.main_star').each(function(){
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

                  $('#review_content').html(html);
              }
          }
      })
  }

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
  $(".search-container .search-input").on("keyup", function(){
  var search = $(this).val();
  if (search !=="") {
  $.ajax({
  url:" <?= base_url('laptop/ajax/autofill') ?>",
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
  url:"<?= base_url('laptop/ajax/autofill') ?>",
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
   
 


   <script>
  window.onscroll = function() {myFunction()};

  var navbar = document.getElementById("sub-menu");
  var tabs = document.getElementById("product-tabs-wrapper");
  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset >= sticky) {
      tabs.classList.add("active")
    } else {
      tabs.classList.remove("active");
    }
  }
</script>
<script>
  $(document).ready(function(){

    const compareChartSearch = document.querySelector('.compareChartSearch');
    $('.compareSearchList').click(function(){
      compareChartSearch.classList.remove('active');
      var thisclicked = $(this); 
	    var value = thisclicked.closest('.pp').find('input').val();
      $.ajax({
              url:"<?= base_url('laptop/ajax/compare') ?>",
              method:"POST",
              data:{compare:'compare',id:value},
              success:function(data){
                load_comparecart_data();
              }
            })
     
   });
    $('.singleRemove').click(function(){
      var thisclicked = $(this); 
	    var value = thisclicked.closest('.compareCartContent').find('input').val();
      $.ajax({
        url:" <?= base_url('laptop/ajax/compare') ?>",
        type:"POST",
        cache:false,
        data:{singleRemove:'singleRemove',value:value},
        success:function(data){
          load_comparecart_data();
          }  
      });
   });
    $('.pRemoveAllBtn').click(function(){
      $.ajax({
        url:" <?= base_url('laptop/ajax/compare') ?>",
        type:"POST",
        cache:false,
        data:{pRemoveAllBtn:'pRemoveAllBtn'},
        success:function(data){
            load_comparecart_data();
          }  
      });
   });

   
    $('.laptop_compare').click(function(){
      var thisclicked = $(this); 
      var id = thisclicked.closest('.p').find('.laptop_compare').val();
      document.querySelector('.compareResultModal').style.display = "block";
      $.ajax({
        url:"<?= base_url('laptop/ajax/compare') ?>",
        method:"POST",
        data:{compare:'compare',id:id},
        success:function(data){
          load_comparecart_data();
          $('.compareResultModal .data').html(data);
        
        }
      })
    });
        



  function load_comparecart_data(){
    $.ajax({
        url:" <?= base_url('laptop/ajax/compare') ?>",
        type:"POST",
        cache:false,
        data:{comparecart:'comparecart'},
        success:function(data){
        $(".compareCart").html(data);
          }  
      });
    }
  })
</script>



<?php if(isset($_SESSION['auth_user'])) : ?>
<script>
  $(document).ready(function(){
    $('.favourite input').click(function(){
      const product_id = $('#product_id').val();
      const user_id = $('#user_id').val();
      const column = 'laptop';
      var fd = new FormData();
      fd.append('product_id',product_id);
      fd.append('user_id',user_id);
      fd.append('column',column);
      var check = document.getElementById('hearth_check');
      if(check.checked==true){
        fd.append('add','add');
        $.ajax({
          url:"<?= base_url('ajax/favourite') ?>",
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
            }
        });
      }
      else{
        fd.append('remove','remove');
        $.ajax({
          url:"<?= base_url('ajax/favourite') ?>",
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
            }
        });
      }

    })

    
  })

  $(document).ready(function(){
    const c = document.getElementById('hearth_check');
    <?php
      $column='laptop';
      $id = $_SESSION['auth_user']['user_id'];
      $check2 = mysqli_query($con, "SELECT laptop from favourite WHERE user_id='$id'");
      if(mysqli_num_rows($check2)>0){
        foreach($check2 as $row){
          if($row[$column] != ''){
            $data = explode(',',$row[$column]);
            if(in_array($product_id, $data, TRUE)){
              ?>
               c.checked=true;
              <?php
            }}
         
        }}
    ?>
  })
</script>
<?php else :?>
<script>
   $(document).ready(function(){
    $('.favourite').click(function(){
      document.querySelector('#loginModal').style.display = "block";
       })
  })
</script>
<?php endif; ?>
</body>
</html>