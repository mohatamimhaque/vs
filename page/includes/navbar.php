<?php
include("header.php");
?>

<body>
  <nav class="navbar p-0 fixed-top d-flex flex-row justify-space-between" style>
      
      <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
              
        <ul class="navbar-nav w-50 m-auto">
          <li class="nav-item w-100 ">
            
          </li>
        </ul>
            <ul class="navbar-nav w-00 category">
              <li class="nav-item">
                <div id="icon3">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </li>
              <li class="nav-item w-100" >
                <h2 class="m-auto">
                  Categories
                </h2>
                <div class="category-menu">
                    <div class="category-list">


                   <?php
$query = "SELECT * FROM category WHERE status='0'";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        ?>

                      <a class="" href="category.php?title=<?= $row['slug'];?>">
                        <h4><?= $row["name"] ;?></h4>
                        <div class="category-img">
                          <img src="../admin/upload/category/image/<?= $row["image"] ;?>" alt="<?= $row["name"] ;?>">
                        </div>
                      </a>
                     <?php
                     }}
                     ?>
                    </div>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav w-100 m-auto">
              <li class="nav-item w-100 m-auto" style="max-width: 500px;">
              <form class="nav-link mt-2 mt-md-0  d-lg-flex search">
<div style="width:400px;"> 
<input type="search" name="search" id="search" class="form-control search" placeholder="Search products">
</div>
<div class="bbb" style="position:absolute;top:10vh;width:250px;border-radius:8px;">


</div>

            </form>
              </li>
            </ul>
            <?php if(isset($_SESSION['auth_user'])) : ?>
            <ul class="navbar-nav mr-5" style="width:350px">
            <li class="nav-item dropdown dropdown-profile">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="../admin/upload/user/image/<?= $_SESSION['auth_user']['user_photo'];?>" alt="user-img" width="36" class="img-circle"><span ><?= $_SESSION['auth_user']['name'];?></span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="../admin/upload/user/image/<?= $_SESSION['auth_user']['user_photo'];?>" alt="user"></div>
										<div class="u-text">
											<h4><?= $_SESSION['auth_user']['name'];?></h4>
											<p class="text-muted"><?= $_SESSION['auth_user']['user_email'];?></p><a href="account.php?=<?= $_SESSION['auth_user']['user_id'];?>" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="account.php?=<?= $_SESSION['auth_user']['user_id'];?>"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
                  <form action="allcode.php" method="POST">
									  <button class="dropdown-item" type="submit" name="logout_btn"></i> Logout</button>
                  </form>
								</ul>
                
                
								<!-- /.dropdown-user -->
							</li>
            </ul>
            
            <?php else :?>
            
            <ul class="navbar-nav " style="width:350px">
              <li class="nav-item w-100 d-flex">
                <div style="margin:auto;margin-right:8px">
                  <i class="fa-solid fa-user" style="font-size: 25px;color:aliceblue"></i>
                </div>
                <div>
                  <div class="account" style="margin:auto;">
                    <a href="login.php" style="font-size: 18px;color:rgb(123, 147, 255)">Account</a>
                  </div>
                  <div style="display: flex;">
                    <small class="d-flex" style="font-size: 14px;"><a href="register.php" style="color:#919191;margin-right:4px">register</a> <small class="m-auto">or</small> <a href="login.php" style="color:#919191;margin-left:4px">sign in</a></small>
                  </div>
                </div>
              </li>
            </ul>
            <?php endif; ?>
           
          </div>
        </nav>



<div class="main-panel" style="backgound-color:none">