<?php
session_start();
include("admin/config/dbcon.php");
if(isset($_SESSION['auth'])){
  if(!isset($_SESSION['message'])){
    $_SESSION["message"] = "You Are Already Logged in";
  }
  header("Location: index.php");
  exit(0);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="admin/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet"/>
  
  <link href="admin/assets/css/app-style.css" rel="stylesheet"/>
  
  <link rel="stylesheet" href="admin/assets/css/style.css">
  <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  <link href="admin/assets/css/dataTables.jqueryui.min.css" rel="stylesheet"/>


  
</head>

<body class="bg-theme bg-theme1">
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>






<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
    <?php
      include("admin/message.php");
    ?>
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="admin/assets/images/logo-icon.png" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Sign In</div>
      <form action="logincode.php" method="POST">
          <div class="form-group">
          <label for="exampleInputEmailId" class="sr-only">Email Or Username</label>
           <div class="position-relative has-icon-right">
              <input type="text" id="exampleInputEmailId" name="email" class="form-control input-shadow" placeholder="Enter Your Email Or Username">
              <div class="form-control-position">
                  <i class="icon-envelope-open"></i>
              </div>
           </div>
          </div>
          <div class="form-group">
           <label for="password" class="sr-only">Password</label>
           <div class="position-relative has-icon-right">
              <input type="text" id="password" name="password" class="form-control input-shadow" placeholder="Enter Password">
              <div class="form-control-position">
                  <i class="icon-lock"></i>
              </div>
           </div>
          </div>
			<div class="form-row">
			 <div class="form-group col-6">
			   <div class="icheck-material-white">
                <input type="checkbox" id="user-checkbox" checked="" />
                <label for="user-checkbox">Remember me</label>
			  </div>
			 </div>
			 <div class="form-group col-6 text-right">
			  <a href="reset-password.html">Reset Password</a>
			 </div>
			</div>
			 <button type="submit" class="btn btn-light btn-block" name="login_btn">Sign In</button>
			  <div class="text-center mt-3">Sign In With</div>
			  
			 <div class="form-row mt-4">
			  <div class="form-group mb-0 col-6">
			   <button type="button" class="btn btn-light btn-block"><i class="fa fa-facebook-square"></i> Facebook</button>
			 </div>
			 <div class="form-group mb-0 col-6 text-right">
			  <button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i> Twitter</button>
			 </div>
			</div>
			 
			 </form>
		   </div>
		  </div>
		  <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">Do not have an account? <a href="register.php"> Sign Up here</a></p>
		  </div>
	     </div>















  <script src="admin/assets/js/jquery.min.js"></script>
  <script src="admin/assets/js/bootstrap.min.js"></script>
  <script src="admin/assets/js/sidebar-menu.js"></script>
  <script src="admin/assets/js/app-script.js"></script>

  <script src="admin/assets/js/off-canvas.js"></script>
  <script src="admin/assets/js/misc.js"></script>
  <script src="admin/assets/js/dashboard.js"></script>
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="admin/assets/js/jquery.dataTables.min.js"></script>
  <script src="admin/assets/js/dataTables.jqueryui.min.js"></script>
  
  
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> 

  
  
</body>


