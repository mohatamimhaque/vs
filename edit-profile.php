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
$page_title = "Edit Profile";
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

<input type="hidden" value="<?= $user_id ?>" id="user_id">
<input type="hidden" value="<?= $user_photo ?>" id="user_photo">
<div id="reportsPage">
    <div class="" id="home">
   
      <div class="container mt-5">
       
        <!-- row -->
          <div class="row tm-content-row">
            <div class="tm-block-col tm-col-avatar">
              <div class="tm-bg-primary-dark tm-block tm-block-avatar shadowdiv">
                <h2 class="tm-block-title">Change Avatar</h2>
                <div class="tm-avatar-container">
                  <div class="tm-user-photo">
                    <!-------------autofill from ajax/account.php------------------>
                  </div>
                  <!-- <a href="#" class="tm-avatar-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                  </a> -->
                </div>
                <button class="btn btn-primary upload-new-photo btn-block text-uppercase">
                  Upload New Photo
                </button>
              </div>
            </div>
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Account Settings</h2>
              <div class="tm-signup-form row">
             
                  <!-------------autofill from ajax/account.php------------------>
              
                  
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    </div>
    <div class="uploadContainer">
      <div class="shadowdiv" style="width:500px;background-color:white;border-radius:5px;padding:50px 25px;position:relative;display:flex;justify-content:center;align-items:center">

        <div class="close">
          <div class="bar">
  
          </div>
        </div>
  
        <div class="uploadModal">
            <div class="uploadWrapper">
                <div class="image">
                  <img src="" alt="">
                </div>
                <div class="content">
                  <div class="icon">
                      <i class="fas fa-cloud-upload-alt"></i>
                  </div>
                  <div class="text">
                      No file chosen, yet!
                  </div>
                </div>
                <div id="cancel-btn">
                  <i class="fas fa-times"></i>
                </div>
                <div class="file-name">
                  File name here
                </div>
            </div>
            <div class="ubtn-group">
              <div>
                <button class="noselect" onclick="defaultBtnActive()" id="custom-btn">Choose a file</button>
              </div>
              <div>
                <button class="noselect" id="changephoto">Change</button>
              </div>
            </div>
            <input id="new_image" accept=".jpg,.jpeg,.png,.gif,.jfif" type="file" hidden>
            <input  style="overflow:hidden" type="file" class="custom-file-input" name='image' id="image">

        </div>
      </div>
      </div>


      <style>
        .tm-user-photo{
          width:280px;
          height:280px;
          border-radius:2px;
          margin-bottom:16px;;
        }
        .uploadContainer .close{position:absolute;width:40px;height:40px;border-radius:50%; right:5px;top:5px; cursor:pointer;display:flex;align-items:center;justify-content: center;}
        .uploadContainer .close .bar{width:1.4rem;height:3px;border-radius:5px;background-color:#eee;transition: 0.5s;position:relative;transform: rotate(360deg);background-color:transparent;}
        .uploadContainer .close .bar:before,.uploadContainer .close .bar:after{content:"";position:absolute;width:inherit;height:inherit;background-color: black;transition: 0.5s;}
        .uploadContainer .close .bar:before{transform: translateY(0) rotate(45deg);}
        .uploadContainer .close .bar:after{transform: translateY(0) rotate(-45deg);}
        .uploadContainer{
          position:fixed;
          background-color:rgba(0,0,0,0.4);
          top:0;
          left:0;
          right:0;
          bottom:0;
          width:100vw;
          height:100vh;
          z-index:1110;
          display:none;justify-content:center;align-items:center
        }
          .uploadModal{
            height: 350px;
            width: 400px;
            position: relative;
          }
          .uploadModal .uploadWrapper{
            position: relative;
            height: 300px;
            width: 100%;
            border-radius: 10px;
            background: #fff;
            border: 2px dashed #c2cdda;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
          }
          .uploadWrapper.active{
            border: none;
          }
          .uploadWrapper .image{
            position: absolute;
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index:100;
          }
          .uploadWrapper img{
            height: 100%;
            width: 100%;
            object-fit: cover;
          }
          .uploadWrapper .icon{
            font-size: 100px;
            color: #9658fe;
            z-index:101;
          }
          .uploadWrapper .text{
            font-size: 20px;
            font-weight: 500;
            color: #5B5B7B;
            z-index:101;
          }
          .uploadWrapper #cancel-btn i{
            position: absolute;
            font-size: 20px;
            right: 15px;
            top: 15px;
            color: #9658fe;
            cursor: pointer;
            display: none;
            z-index:101;

          }
          .uploadWrapper.active:hover #cancel-btn i{
            display: block;
          }
          .uploadWrapper #cancel-btn i:hover{
            color: #e74c3c;
          }
          .uploadWrapper .file-name{
            position: absolute;
            bottom: 0px;
            width: 100%;
            padding: 8px 0;
            font-size: 18px;
            color: #fff;
            display: none;
            z-index:101;
            background: linear-gradient(135deg,#3a8ffe 0%,#9658fe 100%);
          }
          .uploadWrapper.active:hover .file-name{
            display: block;
          }
          .ubtn-group{
            margin-top: 10px;
            display:flex;
            justify-content:space-between;

          }
  
          .ubtn-group div{
              width:45%;
              height: 40px;
              background-color: #2b1331;
              background-image: linear-gradient(315deg, #2b1331 0%, #b9abcf 74%);
              border-radius: 25px;
            }

            .noselect {
              -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                  -moz-user-select: none;
                    -ms-user-select: none;
                        user-select: none;
                -webkit-tap-highlight-color: transparent;
            }

            .ubtn-group button {
              width:100%;
              height:100%;
              cursor: pointer;
              border: none;
              color: rgba(255,255,255,0.5);
              font-size: 20px;
              box-shadow: inset 0px 3px 5px rgba(255,255,255,0.5), 0px 0px 10px rgba(0,0,0,0.15);
              background: rgb(2,0,36);
              background: linear-gradient(45deg, rgba(2,0,36,0) 5%, rgba(255,255,255,.5) 6%, rgba(255,255,255,0) 9%, rgba(255,255,255,.5) 10%, rgba(255,255,255,0) 17%, rgba(255,255,255,.5) 19%, rgba(255,255,255,0) 21%);
              background-size: 150%;
              background-position: right;
              transition: 1s;
              border-radius: 25px;
            }

            button:hover {
              background-position: left;
              color: white;
              border-radius: 25px;
              box-shadow: inset 0px 3px 5px rgba(255,255,255,1), 0px 0px 10px rgba(0,0,0,0.25);
            }

            button:focus {
              outline: none;
            }
          
      </style>
      <script>
        var  uploadContainer = document.querySelector(".uploadContainer");
        var close = document.querySelector(".uploadContainer .close");
        var block = document.querySelector(".upload-new-photo");
        close.onclick = function(){
          uploadContainer.style.display='none'; 
          uploadContainer.style.transition='all 0.3s';                   
        }
        block.onclick = function(){
          uploadContainer.style.display='flex';         
          uploadContainer.style.transition='all 0.3s';         
        }
      </script>
      <script>
         const wrapper = document.querySelector(".uploadWrapper");
         const fileName = document.querySelector(".file-name");
         const defaultBtn = document.querySelector("#new_image");
         const customBtn = document.querySelector("#custom-btn");
         const cancelBtn = document.querySelector("#cancel-btn i");
         const img = document.querySelector(".uploadWrapper img");
         let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
         function defaultBtnActive(){
           defaultBtn.click();
         }
         defaultBtn.addEventListener("change", function(){
           const file = this.files[0];
           if(file){
             const reader = new FileReader();
             reader.onload = function(){
               const result = reader.result;
               img.src = result;
               wrapper.classList.add("active");
             }
             cancelBtn.addEventListener("click", function(){
               img.src = "";
               wrapper.classList.remove("active");
             })
             reader.readAsDataURL(file);
           }
           if(this.value){
             let valueStore = this.value.match(regExp);
             fileName.textContent = valueStore;
           }
         });
      </script>



<script>
  
$(document).ready(function(){
  $('#changephoto').click(function(){
    var image = $('#new_image')[0].files;
    var photo = $('#user_photo').val();
    var id = $('#user_id').val();
    var fd = new FormData();
    if(image.length > 0 ){
      fd.append('image',image[0]);
      fd.append('old_image',photo);
      fd.append('id',id);
      $.ajax({
        url:"<?= base_url('ajax/account') ?>",
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response){
            document.querySelector(".uploadContainer").style.display = "none";
            load_user_photo();

          },
      });
    }
    else{
      alert('Please Select a Photo...')
    }

     });

    
load_user_photo();
function load_user_photo(){
    $.ajax({
        url:" <?= base_url('ajax/account') ?>",
        type:"POST",
        cache:false,
        data:{user_photo:'photo'},
        success:function(data){
        $(".tm-user-photo").html(data);
          }  
      });
    }
  });
</script>
<script>
  $(document).ready(function(){
    load_account_info();
    function load_account_info(){
        $.ajax({
            url:"<?= base_url('ajax/account') ?>",
            method:"POST",
            data:{account_info:'account_info'},
            success:function(response){
            $(".tm-signup-form").html(response);
              }  
          });
        }
    $(document).on('click', '.update_profile', function(){
      var name = $('#account_name').val();
      var uname = $('#user_name').val();
      var email = $('#user_email').val();
      var password = $('#user_password').val();
      var gender = $('#user_gender').val();
      if(password.length>=8 && password.length<=20 && password.match(/[a-z]+/) && password.match(/[A-Z]+/) && password.match(/[0-9]+/) && password.match(/[$@#&!]+/)){
        if(name !='' && uname !='' && email !=''){
          var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if(email.match(mailformat)){
            var fd = new FormData();
            fd.append('update','update');
            fd.append('name',name);
            fd.append('uname',uname);
            fd.append('email',email);
            fd.append('password',password);
            fd.append('gender',gender); 
            $.ajax({
            url:"<?= base_url('ajax/account') ?>",
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                load_account_info();
              }
          });
          }
          else{
            alert("Please Enter Coorect Email...");
          }
        }
          else{
            alert("Please Fill Form Completely...");
          }
        }
        else{
          alert("Please Use Strong Password...");
        }
    })
    })
     
</script>





   
<?php
include("includes/footer.php")
?>

