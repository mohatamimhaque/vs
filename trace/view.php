<?php
session_start();
if(isset($_GET['title'])){
 $page_title = ucwords(preg_replace('/-/'," ",$_GET['title']));
}
include('includes/header.php');
include('includes/navbar.php');
?>
<?php
if(isset($_GET['title'])){
    $title = $_GET['title'];
    if(isset($_SESSION[$title])){
    }
    else{
      $_SESSION[$title] = $title;
      mysqli_query($con, "UPDATE news SET views=views+1 WHERE slug='$title'");
    }
  ?>
  
  
        <section class="section wb view">
            <?php  
               $query = "SELECT * FROM news WHERE slug='$title' LIMIT 1";
                $query_run = mysqli_query($con, $query);
                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $row){
                        ?>
                <div class="page-wrapper">
                    <div class="blog-title-area">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="<?= base_url('trace') ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('trace/section') ?>">Section</a></li>
                            <li class="breadcrumb-item active"><?=$row['title'] ?></li>
                        </ol>

                        <span class="color-aqua"><a href="<?= base_url('trace/section/'.$row['category']) ?>" title=""><?=ucwords(preg_replace('/_/', ' ', $row['category'] )) ?></a></span>

                        <h3 class="single-post-title"><?= $row['title'] ?></h3>

                        <div class="blog-meta big-meta">
                            <small><a><?= date('d-M-Y',strtotime($row['created_at'])); ?></a></small>
                            <small>
                                <a>by 
                                    <?php
                                        $id = $row['author_id'];
                                        $author = "SELECT name FROM users WHERE id='$id' LIMIT 1";
                                        $author_run = mysqli_query($con, $author);
                                            foreach( $author_run as $a){
                                                echo $a['name'];
                                            }
                                        ?>
                                </a>
                            </small>
                            <small><a title=""><i class="fa fa-eye"></i> <?=$row['views'] ?></a></small>
                            <small>
                                <a href="#discussion" id="total_discussion" title="">
                                <i class="fa-solid fa-comment"></i>
                                <?= mysqli_num_rows(mysqli_query($con, "SELECT * FROM comment WHERE url = '$title'"));?>
                            </a>
                            </small>
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="pt-button btn btn-primary" style="background-color:#cb2027"><i class="fa fa-pinterest"></i> <span class="down-mobile">Pin Pinterest</span></a></li>
                                <li><a href="#" class="ln-button btn btn-primary" style="background-color:#007bb5"><i class="fa fa-linkedin"></i> <span class="down-mobile">Linkedin</span></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end title -->

                    <div class="single-post-media">
                        <img src="<?= base_url('admin/upload/category/news/image/').$row['image'] ?>" alt="" class="img-fluid">
                    </div><!-- end media -->

                    <div class="blog-content" style='text-align:justify'>  
                        <?= $row['description'] ?>
                    </div><!-- end content -->
    
    
        <input type="hidden" class="curl" value="<?= $row['slug']?>" id="curl">
        <div class="commentSection shadowdiv" id='discussion'>
          <div class="commentSectionHeader shadowdiv">
            <h3>Discussions</h3>
          </div>
          <div style='padding:16px;'>
            <div class="form-group col-md-12 shadowdiv pt-2">
                <div class="d-flex">                  
                  <?php if(isset($_SESSION['auth_user'])) : ?>
                <div>
                <?php
                          $id = $_SESSION['auth_user']['user_id'];
                          foreach(mysqli_query($con,"SELECT * FROM users WHERE id = '$id'") as $r){
                          }
                          ?>
                    <div class="comment-user-image">
                        <img style="width:100%;height:100%;border-radius:50%" src="<?=$url.'admin/upload/user/image/'.$r['user_photo'];?>" alt=""> 
                    </div>
                </div>
                <div class="form-group col-md-10 mt-3">
                    <input type="text" class="mt-3" placeholder="Add a comment..." name="comment" id="comment">
                    <hr>
                    <input type="hidden" class="comment_user_id" value="<?= $_SESSION['auth_user']['user_id'];?>" id="comment_user_id">
                    <div class="comment-btn-group" style="margin-top:5px;">
                        <button type="button" class="btn btn-primary" id="comment_btn">comment</button>
                    </div>
                </div>
                <?php else :?>
                    <div class="p-3">
                        <p style='margin:0;padding:0'>Please <a style='color:red;pointer-events:fill' class="loginModalActive">sign in</a> to post or reply to a comment. New users <a style='color:red;pointer-events:fill' class="registerModalActive">create a free account</a>.</p>
                    </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="commentShow ml-3">
           <!----------autofill from ajax/comment------------------>
          </div>


          <div>

          </div>


             </div>
                    
                </div><!-- end page-wrapper -->
                <?php
                    }}
                ?>
                
            <div class="sidebar">
                
                <div class="widget shadowdiv p-3">
                    <h2 class="widget-title">Popular News</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            <?php
                        $query = "SELECT * FROM news WHERE status = '0' ORDER BY views desc LIMIT 8";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            $category = array();
                            foreach($query_run as $row){
                                ?>
                                <a href="<?=base_url('trace/show/'.$row['slug'])?>" class="shadowdiv mb-2 list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 d-flex justify-content-between">
                                        <img src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" alt="" style='width:80px;height:80px' class="img-fluid shadowdiv">
                                        <div>
                                            <h5 class="mb-1"><?=$row['title'] ?></h5>
                                            <small><?= date('d-M-Y',strtotime($row['created_at'])); ?></small>
                                    </div>
                                    </div>
                                </a>
                                <?php
                            }}
                                ?>


                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            
                <div class="widget shadowdiv p-3">
                    <h2 class="widget-title">Latest News</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            <?php
                        $query = "SELECT * FROM news WHERE status = '0' ORDER BY id desc LIMIT 8";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            $category = array();
                            foreach($query_run as $row){
                                ?>
                                <a href="<?=base_url('trace/show/'.$row['slug'])?>" class="shadowdiv mb-2 list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 d-flex justify-content-between">
                                        <img src="<?=base_url('admin/upload/category/news/image/').$row['image'] ?>" alt="" style='width:80px;height:80px' class="img-fluid shadowdiv">
                                        <div>
                                            <h5 class="mb-1"><?=$row['title'] ?></h5>
                                            <small><?= date('d-M-Y',strtotime($row['created_at'])); ?></small>
                                    </div>
                                    </div>
                                </a>
                                <?php
                            }}
                                ?>


                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            

            
            </div><!-- end sidebar -->
        </section>

             
        <style>
        #registerModal .card,#loginModal .card{width:400px;}
        .form-control-position{position:absolute;right:8px;top:-12px}
    </style>
    <?php
}
?>
<script>
$(document).ready(function(){
    $('#comment_btn').click(function(){
         
      
          var comment = $('#comment').val();
          var user_id = $('#comment_user_id').val();
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
                   success:function(data){
                       load_comment_data();
                       document.getElementById('comment').value = "";
                   }
               })
           }
     
       });

load_comment_data();
function load_comment_data(){
    var url = $('#curl').val();
$.ajax({
        url:" <?= base_url('trace/ajax/comment') ?>",
        method:"POST",
    data:{commentShow:'load_data',url:url},
        success:function(data){
            $(".commentShow").html(data);
            }
        })
    }




    });
  
      </script>
<?php
include('includes/script.php');
?>
        <script src="<?= base_url('trace/assets/js/socialshare.js') ?>"></script>
        <?php
include('includes/footer.php');
?>
