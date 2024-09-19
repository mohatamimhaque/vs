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
    });
  
    // click one particular search name it's fill in textbox
    $(document).on("click",".criteria-list", function(){
    $('#criteria').val($(this).text());
    $('.aaa').fadeOut("fast");
    });
    });
  
    



    $(document).ready(function(){
        $("#search").on("keyup", function(){
        var search = $(this).val();
        if (search !=="") {
        $.ajax({
        url:" <?= base_url('mobile/ajax/autofill') ?>",
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
                   url:"<?= base_url('mobile/ajax/comment') ?>",
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
          url:" <?= base_url('mobile/ajax/comment') ?>",
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
                url:"<?= base_url('mobile/ajax/submit_rating.php') ?>",
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
              url:"<?= base_url('mobile/ajax/submit_rating') ?>",
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