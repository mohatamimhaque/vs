<?php 
include('includes/navbar.php');
if(isset($_GET['title'])){
  $slug = $_GET['title'];
}
?>
  <link rel="stylesheet" href="assets/css/product.css">
  <link rel="stylesheet" href="assets/css/jquery.prodigal.css">
  <script src="assets/js/jquery.prodigal.js"></script>
  l
<div style="width:92%;margin:auto;margin-top:10px" class="d-flex">
  <div class="view_panel">
    <?php 
        if(isset($_GET['title'])){

          $slug = mysqli_real_escape_string($con, $_GET['title']);

          $query = "SELECT * FROM mobile WHERE slug='$slug' LIMIT 1";

          $query_run = mysqli_query($con, $query);

          if(mysqli_num_rows($query_run) > 0){

              foreach($query_run as $row){
                    
                    ?>
                    <div class="productheader">
                      <h1><?= $row['name']?></h1>
                      <p>by <a href="#"><?= $row['brand']?></a></p>
                      <div class="quick-specification">
                        <hr>
                        <h5><?= $row['name']?> Quick Specifications</h5>
                        <table class="w-100 table table-borderless table-responsive">
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
                                <td><?= $row['cpu'] ?></td>
                              </tr>
                              <tr>
                                <td class="tbold">Rear Camera</td>
                                <td style="width:50%;"><?= $row['rear_camera_details'] ?></td>
                              </tr>
                              <tr>
                                <td class="tbold">Internal Memory</td>
                                <td><?= $row['storage'] ?> GB</td>
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
                          <div>
                          <a class="prodigal-thumbs" href="admin/upload/category/mobile/image/<?=$image[0]?>">
                            <img src="admin/upload/category/mobile/image/<?=$image[0]?>" />
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
                              <div>
                              <a class="prodigal-thumbs" href="admin/upload/category/mobile/image/<?= $image[$key]?>">
                                <img class="thumbnail <?php echo $focused; ?>" src="admin/upload/category/mobile/image/<?= $image[$key]?>" />
                               </a>

                              </div>                                   
                              <?php } ?>
                          </div>

                     

                        </div>
                        <div class="productDetails">
                          <div style="position:relative;height:40px;padding:8px 0">
                            <button style="position:absolute;right:0;right:0;text-transform:none;font-size:13px" class="btn btn-primary"><i class="fa-solid fa-plus">Add to compare</i></button>
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
                                          <p><span id="total_review">0</span> Review</p>
                                     </div>
                                    </div>
                                    
                                    <div class="">
                                      <a  href="#reviews"  name="add_review" style="font-size:13px" id="add_review" style=" text-transform: uppercase;" class="">Write a Review</a>
                                    </div>
                                  </div>
                          </div>
                          <hr>
                          <div class="product_header d-flex justify-content-between">
        <h4 class="text-dark">Product feature</h4>
        <small>        
            <a href="#specification">view all sepecification</a>
        </small>
        </div>


        <div class="row mt-2">
              <div class="col-md-6 col-sm-12">
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
              <div class="col-md-6 col-sm-12">
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

<hr>

                        </div>
                    </div>
                    
              <?php
              }
            }
          }?>
    <?php?>

        <div class="reviews" id="reviews" tabindex="-1" role="dialog">
          <h2>
            Write a review
          </h2>
          <input type="hidden" id="user_name" class="user_name" value="<?= $_SESSION['auth_user']['name'];?>" name="user_name">
          <input type="hidden" id="user_photo" class="user_photo" value="<?= $_SESSION['auth_user']['user_photo'];?>" name="user_photo">
          <input type="hidden" id="url" class="url" value="<?= $slug;?>" name="url">
          <div class="form-group">
            <label for="heading" class="">Heading</label>
            <input type="text" id="heading" class="heading" name="heading" placeholder="review heading goes here">
          </div>
          <div class="form-group">
            <label for="summary" class="">Summary*</label>
            <input type="text" id="summary" class="summary" required name="summary" placeholder="">
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
          <div class="form-group">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
        </div>

        <div class="commentSection">
          <div class="">
            <input type="hidden" class="cuserName" value="<?= $_SESSION['auth_user']['name'];?>" id="cuserName">
            <input type="hidden" class="cuserImage" value="<?= $_SESSION['auth_user']['user_photo'];?>" id="cuserImage">
            <input type="hidden" class="curl" value="<?= $slug?>" id="curl">
            <div class="form-group col-md-12">
              <div class="d-flex">                  
                <div>
                  <div class="comment-user-image">
                    <img style="width:100%;height:100%;border-radius:50%" src="admin/upload/user/image/<?= $_SESSION['auth_user']['user_photo'];?>" alt=""> 
                  </div>
                </div>
                <div class="form-group col-md-10 mt-3">
                  <input type="text" class="mt-3" placeholder="Add a comment..." name="comment" id="comment">
                  <hr>
                  <div class="comment-btn-group" style="margin-top:5px;">
                    <button type="button" class="btn btn-primary" id="comment_btn">comment</button>
                  </div>
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

  </div>


</div>























<script>
  

const quick_btn = document.querySelector(".quick-btn");
const quick_specification = document.querySelector(".quick-specification");

quick_btn.addEventListener("click",() => {
  quick_specification.classList.toggle("active");
  if (quick_btn.innerHTML === "Show More") {
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
        var user_name = $('#cuserName').val();
        var user_photo = $('#cuserImage').val();
        var url = $('#curl').val();
   
         if(comment == '')
         {
             alert("Please Enter something..");
             return false;
         }
         else
         {
             $.ajax({
                 url:"ajax/comment.php",
                 method:"POST",
                 data:{comment:comment,user_name:user_name,user_photo:user_photo,url:url},
                 success:function(data)
                 {
                     alert("Your Comment Successfully Submited");
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
        url:" ajax/comment.php",
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
       

    var user_name = $('#user_name').val();
    var user_photo = $('#user_photo').val();
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
              url:"ajax/submit_rating.php",
              method:"POST",
              data:{rating_data:rating_data,user_name:user_name,user_photo:user_photo,url:url,heading:heading,summary:summary},
              success:function(data)
              {
                  load_rating_data();

                  alert(data);
              }
          })
      }

  });

  load_rating_data();

  function load_rating_data()
  {
    var url = $('#url').val();

      $.ajax({
          url:"ajax/submit_rating.php",
          method:"POST",
          data:{action:'load_data',url:url},
          dataType:"JSON",
          success:function(data)
          {
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