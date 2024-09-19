<?php
session_start();
include("../admin/config/dbcon.php");
include("../includes/baseurl.php");
if(isset($_POST["user_photo"])){
    ?>
    <img style="width:100%;height:100%;border-radius:2px;" src="<?= base_url('admin/upload/user/image/'.$_SESSION['auth_user']['user_photo']) ?>" alt="Avatar" class="tm-avatar img-fluid mb-4"/>
  <?php

}
if(isset($_FILES['image']['name'])){
    $old_image = $_POST["old_image"];
    $id = $_POST["id"];
    $image = $_FILES['image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;
    $allowTypes = array('jpg','png','jpeg','gif','jfif'); 
    if(in_array($image_extension, $allowTypes)){
        $query = mysqli_query($con, "UPDATE users SET user_photo ='$filename' WHERE id = '$id'");
        if($query){
            if(file_exists('../admin/upload/user/image/'.$old_image)){
                unlink('../admin/upload/user/image/'.$old_image);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], '../admin/upload/user/image/'.$filename);
            $_SESSION['auth_user']['user_photo'] = $filename;
        }
   }

}

?>

<?php

if(isset($_POST["account_info"])){
  $id = $_SESSION['auth_user']['user_id'];
    $q = mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
    foreach ($q as $r){
      ?>
    
    <div class="form-group col-lg-6">
      <label for="name">Name</label>
      <div class="position-relative has-icon-right">
        <input type="text" name="name" value="<?= $r['name'] ?>" class="form-control" id="account_name">
        <div class="form-control-position" style="top:6px;right:10px;z-index:10">
          <i class="icon-user name_icon"
          ></i>
        </div>
      </div>
    </div>
    <div class="form-group col-lg-6">
      <label for="name">username</label>
      <div class="position-relative has-icon-right">
        <input type="text" name="email" value="<?= $r['uname'] ?>" class="form-control" id="user_name">
        <div class="form-control-position" style="top:6px;right:10px;z-index:10">
          <i class="icon-user uname-icon"></i>
        </div>
      </div>
    </div>
    <div class="form-group col-lg-6">
      <label for="email">Email</label>
      <div class="position-relative has-icon-right">
        <input type="text" name="email" value="<?= $r['email'] ?>" class="form-control" id="user_email">
        <div class="form-control-position" style="top:6px;right:10px;z-index:10">
          <i class="icon-envelope-open email-icon"></i>
        </div>
      </div>
    </div>
    <div class="form-group col-lg-6">
      <label for="password">Password</label>
      <div class="position-relative has-icon-right">
      <input type="password" name="passowrd" value="<?= $r['password'] ?>" class="form-control" id="user_password">
        <div class="form-control-position" style="top:6px;right:10px;z-index:10">
          <i class="icon-lock register_lock3"></i>
        </div>
      </div>
    </div>
    <div class="form-group col-lg-6">
      <label for="gender">gender</label>
      <div class="position-relative has-icon-right">
        <select name="user_gender" class="form-control validate" id="user_gender" style='-webkit-appearance: none;'>
          <option value="<?= $r['gender'] ?>"><?= $r['gender'] ?></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Custom">Custom</option>
        </select>
        <div class="form-control-position" style="top:6px;right:10px;z-index:10">
          <i class="fa-solid fa-genderless gender-icon" style="font-size:22px"></i>
        </div>
      </div>
    </div>


       <div class="form-group col-lg-6">
         <label class="tm-hide-sm">&nbsp;</label>
         <button
           class="btn btn-block btn-primary update_profile text-uppercase"
           >
           Update Your Profile
         </button>
       </div>
       <div class="form-group col-lg-6">
         <button
           class="btn btn-block btn-primary text-uppercase"
         >
           Delete Your Account
         </button>
       </div>
      
                  
<?php
}
}




?>
<?php
if(isset($_POST["update"])){
  $name = $_POST["name"];
  $uname = $_POST["uname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $gender = $_POST["gender"];
  $id = $_SESSION['auth_user']['user_id'];
  $query = mysqli_query($con, "UPDATE users SET name='$name',uname='$uname',email='$email',password='$password',gender='$gender' WHERE id='$id'");
}



?>

</style>

<script>
    $(document).ready(function(){
      const register_lock3 = document.querySelector(".register_lock3");
      const spassword = document.querySelector("#user_password");
      register_lock3.addEventListener("click", function(){
          const type = spassword.getAttribute("type") === "password" ? "text" : "password";
          spassword.setAttribute("type", type);
        })
      });
</script>
