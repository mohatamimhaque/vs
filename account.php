<?php
session_start();
if(isset($_SESSION['auth'])){
  $user_id = $_SESSION['auth_user']['user_id'];
  $user_photo = $_SESSION['auth_user']['user_photo'];
}
else{
  header("Location: index");
  exit(0);
}
$page_title = "Profile";
include("includes/header.php");
?>
 <style>
   .main-panel{
     margin-top:20vh;
    }
    </style>
<?php
include("includes/navbar.php");
?>
<div class="container-fluid d-flex justify-content-between">
    <div class="accountSection shadowdiv">
        <?php
        $query = mysqli_query($con,"SELECT * FROM users WHERE id='$user_id'");
        if(mysqli_num_rows($query) > 0){
            foreach($query as $row){
                ?>
                    <div class="d-flex justify-content-center">
                       <div class="mt-4 mb-3">
                            <div class="" style="width:120px;height:120px;padding:12px;background-color:white;border-radius:3px;border:1px dotted rgba(0,0,0,0.5)">
                                <img src="<?= base_url('admin/upload/user/image/'.$row['user_photo']) ?>" alt="" style="width:100%;height:100%;border:none;border-radius:2px;">
                            </div>
                            <p style="margin:0;padding:0;text-align:center;font-size:20px;color:black"><?=$row['name'] ?></p>
                            <p style="margin:0;padding:0;text-align:center;font-size:14px;color:rgba(0,0,0,0.6);text-transform:lowercase">@<?=$row['uname'] ?></p>
                            <a href="<?php base_url('edit-profile') ?>" class="btn btn-primary" style="width:120px;margin:5px auto;padding:4px 16px;border-radius:50px;font-size:17px;color:blue">Edit Profile</a>
                            <p style="margin:0;padding:0;text-align:center;font-size:14px;color:rgba(0,0,0,0.6)">Joined <?= date('d-M-Y',strtotime($row['created_at'])); ?></p>
                       </div>
                    </div>
                <?php
            }
        }

        ?>
    </div>
    <div class="data-container shadowdiv">
        <!---------- autofill from ajax/activity---------------->
        
    </div>
    <div class="accountsubmenu shadowdiv">
       <button class='favourite common active' type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">favourite <i class="fa-solid fa-favourite fa-caret-down"></i></button>
       <div class="collapse" id="collapseExample">
            <div class="subdropmenu ml-3">
                <button class='mobile common'>mobile</button>
                <button class='laptop common'>laptop</button>
            </div>
        </div>
       <button class='comments common'>comments</button>
       <button class='replies common'>replies</button>
       <button class='reviews common'>reviews</button>
    </div>
</div>

<style>
    .fa-favourite.active{
        transform:rotate(180deg);
        transition:1s;
    }
    .fa-favourite{
        transition:1s;
    }
    .container-fluid{
        width:92%;
        margin:auto
    }
    
    .accountSection{
        width:300px;
        height:320px;
        padding:25px;
    }
    .data-container{
        width:calc(100% - 600px);
        padding:25px;
    }
    .accountsubmenu{
        width:250px;
        padding:25px;
        height:auto;
        height:300px;
        display:flex;
        flex-direction:column
    }
    @media all and (max-width:1100px){
        .accountSection{
            display:none;
        }
        .data-container{
            width:calc(100% - 280px);
        }
    }
    @media all and (max-width:80px){
        .container-fluid{
            width:800px;
        }
            .data-container{
            width:calc(100% - 220px);
            }
            .accountsubmenu{
                width:200px;
        }
        
    }
   
    .accountsubmenu button{
        padding:5px 3px;
        margin:3px 0;
        border:none;
        background:none;
        font-size:17px;
        color:black;
        text-align:start;
        font-weight:250;
        text-transform:capitalize
    }
    .accountsubmenu button.active{
        color:blue
    }
   .dataheader{
       width:100%;
       background-color:white;
       margin-bottom:8px;
       border-radius:2px;
       padding:12px 8px
   }
    .databody{
        width:100%;
        background-color:white;
        border-radius:2px;
        padding:12px 8px
   }
   .subdropmenu{
        display:flex;
        flex-direction:column

   }
    .subdropmenu button{
        padding:2px;
        margin:1px 0;
        font-size:15px;
    }
</style>

<script>
    $(document).ready(function(){
        const nodeList = document.querySelectorAll(".accountsubmenu .common");
            for (let i = 0; i < nodeList.length; i++) {
                nodeList[i].addEventListener("click", function() {
                    document.querySelector(".accountsubmenu .active").classList.remove('active');
                    this.classList.add('active');
            })
        }
    });
    $('.favourite').click(function(){
        
        document.querySelector('.fa-favourite').classList.toggle("active");

    })
</script>
<script>
    $(document).ready(function(){
        $('.reviews').click(function(){
            load_reviews(1)
        })
        function load_reviews(page){
            $.ajax({
                url:"<?= base_url('ajax/activity/reviews') ?>",
                type:"POST",
                cache:false,
                data:{load_data:'reviews',page:page},
                success:function(data){
                    $(".data-container").html(data);
                }  
            })
            }
            $(document).on('click', '.pagination a', function(){
                var page = $(this).data('page_number');
                load_reviews(page);
            });
    
        });
</script>
<script>
    $(document).ready(function(){
        $('.comments').click(function(){
            load_comments(1)
        })
        function load_comments(page){
            $.ajax({
                url:"<?= base_url('ajax/activity/comment') ?>",
                type:"POST",
                cache:false,
                data:{load_data:'comment',page:page},
                success:function(data){
                    $(".data-container").html(data);
                }  
            })
            }
            $(document).on('click', '.pc a', function(){
                var page = $(this).data('comment_page_number');
                load_comments(page);
            });
    
        });
</script>
<script>
    $(document).ready(function(){
        $('.replies').click(function(){
            load_replies(1)
        })
        function load_replies(page){
            $.ajax({
                url:"<?= base_url('ajax/activity/reply') ?>",
                type:"POST",
                cache:false,
                data:{load_data:'reply',page:page},
                success:function(data){
                    $(".data-container").html(data);
                }  
            })
            }
            $(document).on('click', '.rc a', function(){
                var page = $(this).data('reply_page_number');
                load_replies(page);
            });
        });
</script>
<script>
    $(document).ready(function(){
        const table = 'mobile';
        load_favourite(1,table);
        $(document).on('click', '.mobile a', function(){
                var page = $(this).data('favourite_page_number');
                load_favourite(page,table);
            });
        $('.laptop').click(function(){
            const table = 'laptop';
            load_favourite(1,table);
            $(document).on('click', '.laptop a', function(){
                var page = $(this).data('favourite_page_number');
                load_favourite(page,table);
            });
        })
        $('.mobile').click(function(){
            const table = 'mobile';
            load_favourite(1,table);
            $(document).on('click', '.mobile a', function(){
                var page = $(this).data('favourite_page_number');
                load_favourite(page,table);
            });
        })
        function load_favourite(page,table){
            $.ajax({
                url:"<?= base_url('ajax/activity/favourite') ?>",
                type:"POST",
                cache:false,
                data:{table:table,page:page},
                success:function(data){
                    $(".data-container").html(data);
                }  
            })
            }
           
           
            
        });
</script>

<?php
include("includes/footer.php");
?>