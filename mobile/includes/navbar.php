


<body style="background-color: azure;">
<?php
include('../basic.php');
?>


    

  <nav id="navbar-main">  
    <div class="logo menu-item">
        <a href="<?=base_url('') ?>" style="width:40px">
            <img style="width:100%" src="<?=base_url('admin/assets/images/logo-icon.png') ?>" alt="">
        </a>
    </div>
    <div class="category menu-item" title="Category">
        <div class="category-icon m-auto">
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
        </div>
        <div class="ca">
          <h2 class="ml-2 mt-3">Categories</h2>
        </div>
        
        <div class="category-menu">
           <?php
            $query = "SELECT * FROM category WHERE status='0'";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    ?>
                  <a class="" href="<?= base_url($row['slug']);?>">
                    <h4 style='text-decoration: none;' ><?= $row["name"] ;?></h4>
                    <div class="category-img">
                      <img src="<?=$url.'admin/upload/category/image/'.$row["image"] ;?>" alt="<?= $row["name"] ;?>">
                    </div>
                  </a>
             <?php
             }}
             ?>
        </div> 
    </div>
    <div class="menu-item news">
        <a href="<?=base_url('trace') ?>" title="news" class="mt-2 d-flex"><i style="font-size:21px" class="fa-solid fa-newspaper mt-1 mr-1"></i><p style="margin:0;padding:0;text-transform:uppercase">News</p></a>
    </div>
    <ul class="menu-item navbar-nav">
      <li class="nav-item" >
        <form class="nav-link m-auto  d-lg-flex search">
          <div style="background-color: #e3edf7;" class="mt-2 d-flex InputContainer"> 
            <input type="search" name="search" tabindex="0" id="search" class="" style='box-shadow:none'  placeholder="Search products">
            <a href="#" class="search-btn">
              <i class="fas fa-search"></i>      
            </a>
          </div>
          <div class="bbb" style="position:absolute;top:12vh;width:250px;border-radius:8px;z-index:1110000;">
          </div>
        </form>
      </li>
    </ul>
    <div class="menu-item account">
    <?php if(isset($_SESSION['auth_user'])) : ?>
      <?php
      $id = $_SESSION['auth_user']['user_id'];
      $q = mysqli_query($con, "SELECT * FROM users where id='$id'");
      if(mysqli_num_rows($q) > 0){
        foreach($q as $r){
      ?>
      <div class="signbefore">
        <div class="signinfo">
              <div class="avatar">
                  <div style="width:38px;height:38px;border-radius:50%">
                      <img src="<?=$url.'admin/upload/user/image/'.$r['user_photo'];?>" alt="avatar" style="width:100%;height:100%;border-radius:50%">
                  </div>
              </div>
              <p class="sm-none"><?= $r['name'];?></p>
              <i class="fa-solid sm-none fa-caret-down"></i>
         </div>
         <div class="dropmenu">
              <div class="dropitem">
                  <div style="width:45px;height:35px;">
                      <img src="<?=$url.'admin/upload/user/image/'.$r['user_photo'];?>" alt="avatar" style="width:100%;height:100%;border-radius:8px">
                  </div>
                  <div class="ml-1">
                      <p><?= $r['name']; ?></p>
                      <p style="text-transform:none"><?= $r['email'];?></p>
                      <a href="<?= base_url('edit-profile')?>">edit profile</a>
                  </div>
              </div>
              <hr>
              <div class="dropitem2">
                  <a href="<?=base_url('account')?>">
                      <i class="fa-solid fa-user"></i>
                      <p>my profile</p>
                  </a>
              </div>
              <div class="dropitem3">
                  <i class="fa-solid fa-power-off"></i>
                  <button id="logout_btn">Logout</button>
              </div>
         </div>
      </div>
      <?php }} ?>
      <?php else :?>
      <div class="signafter d-flex">
        <button class="loginModalActive fa-solid fa-user"></button>
        <div class='sm-none'>
          <p class="loginModalActive">Account</p>
          <div class="d-flex">
            <button class="registerModalActive">Sign up</button> / <button class="loginModalActive">Sign in</button>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </nav>

<div class="main-panel" style="backgound-color:none;margin-top:12vh">