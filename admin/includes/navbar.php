

   <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar" >
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="<?= base_url('admin') ?>"><img src="<?=$url.'admin/assets/images/logo.svg' ?>" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="<?= base_url('admin') ?>"><img src="<?=$url.'admin/assets/images/logo-mini.svg' ?>" alt="logo" /></a>
      </div>
    
      <ul class="nav">
      <?php if(isset($_SESSION['auth_user'])) : ?>
        <li class="user">
          <div class="photo">
            <img src="<?=$url.'admin/upload/user/image/'.$_SESSION['auth_user']['user_photo'];?>">
          </div>
          <div class="info">
            <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <span>
              <?= $_SESSION['auth_user']['name'];?>                
               <?php
                 if($user_level == "Administrator"){
                   ?>
                  <span class="user-level">Administrator</span>
                   <?php
                 }
                 else if($_SESSION['auth_role'] == "2"){
                   ?>
                  <span class="user-level">Editor</span>

                   <?php
                 }
                ?>           

                <span class="caret"><i class="fa-solid fa-caret-down" style="color:grey"></i></span>
              </span>
            </a>
            <div class="clearfix"></div>

            <div class="collapse in" id="collapseExample" aria-expanded="true" style="padding:0">
              <ul class="nav" style="padding-top : 5px;margin-bottom: 0;">
                <li>
                  <a href="<?= $url.'id/'.$_SESSION['auth_user']['user_id'];?>">
                    <span class="link-collapse">My Profile</span>
                  </a>
                </li>
                <li>
                  <a href="<?= $url.'id/'.$_SESSION['auth_user']['user_id'];?>">
                    <span class="link-collapse">Edit Profile</span>
                  </a>
                </li>
                <li>
                  <a href="#settings">
                    <span class="link-collapse">Settings</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <?php endif; ?>
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="<?= base_url('admin') ?>">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Category</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              
              <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/category/add') ?>">Add Category</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/category/list') ?>">View Category</a></li>
              <?php
                 if($user_level == "Administrator"){
                   ?>
                      <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/category/trash') ?>">Trash</a></li>
                   <?php
                 }
                ?>           


            </ul>
          </div>
        </li>








        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#mobile" aria-expanded="false" aria-controls="mobile">
            <span class="menu-icon">
            <i class="fa-solid fa-mobile"></i>
            </span>
            <span class="menu-title">Mobile</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="mobile">
            <ul class="nav flex-column sub-menu">
              
              <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/mobile/add') ?>">Add Mobile</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/mobile/list') ?>">View Mobile List</a></li>
              <?php
                 if($user_level == "Administrator"){
                   ?>
                      <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/mobile/trash') ?>">Trash</a></li>
                   <?php
                 }
                ?>           


            </ul>
          </div>




        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#news" aria-expanded="false" aria-controls="news">
            <span class="menu-icon">
            <i class="fa-solid fa-laptop-code"></i>
            </span>
            <span class="menu-title">laptop</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="news">
            <ul class="nav flex-column sub-menu">
              
              <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/laptop/add') ?>">Add Laptop</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/laptop/list') ?>">View Laptop List</a></li>
              <?php
                 if($user_level == "Administrator"){
                   ?>
                      <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/laptop/trash') ?>">Trash</a></li>
                   <?php
                 }
                ?>           


            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#news" aria-expanded="false" aria-controls="news">
            <span class="menu-icon">
              <i class="fa-solid fa-newspaper"></i>
            </span>
            <span class="menu-title">News</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="news">
            <ul class="nav flex-column sub-menu">
              
              <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/news/add') ?>">Add News</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/news/list') ?>">View News List</a></li>
              <?php
                 if($user_level == "Administrator"){
                   ?>
                      <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/news/trash') ?>">Trash</a></li>
                   <?php
                 }
                ?>           


            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="pages/forms/basic_elements.html">
            <span class="menu-icon">
              <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Form Elements</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="pages/tables/basic-table.html">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Tables</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="pages/charts/chartjs.html">
            <span class="menu-icon">
              <i class="mdi mdi-chart-bar"></i>
            </span>
            <span class="menu-title">Charts</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="pages/icons/mdi.html">
            <span class="menu-icon">
              <i class="mdi mdi-contacts"></i>
            </span>
            <span class="menu-title">Icons</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <span class="menu-icon">
              <i class="mdi mdi-security"></i>
            </span>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
            <span class="menu-icon">
              <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">Documentation</span>
          </a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="navbar-brand brand-logo-mini" href="<?= base_url('admin') ?>"><img src="<?=$url.'admin/assets/images/logo-mini.svg' ?>" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>




          <ul class="navbar-nav w-100">
            <li class="nav-item w-100">
              <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
<div style="width:330px;"> 
<input type="search" name="search" id="search" class="form-control search" placeholder="Search products">
</div>
<div class="bbb" style="position:absolute;top:10vh;width:250px;border-radius:8px;">


</div>

            </form>
            </li>
          </ul>




          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-lg-block">
              <a class="nav-link btn btn-success create-new-button d-none" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">+ Create New Project</a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                <h6 class="p-3 mb-0">Projects</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-file-outline text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">Software Development</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-web text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">UI Development</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-layers text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">Software Testing</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center">See all projects</p>
              </div>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-view-grid"></i>
              </a>
            </li>
            <li class="nav-item dropdown border-left">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email"></i>
                <span class="count bg-success"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="<?=$url.'admin/assets/images/faces/face4.jpg' ?>" alt="image" class="rounded-circle profile-pic">
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                    <p class="text-muted mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="<?=$url.'admin/assets/images/faces/face2.jpg' ?>" class="rounded-circle profile-pic">
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                    <p class="text-muted mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="<?=$url.'admin/assets/images/faces/face3.jpg' ?>" class="rounded-circle profile-pic">
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                    <p class="text-muted mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center">4 new messages</p>
              </div>
            </li>
            <li class="nav-item dropdown border-left">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell"></i>
                <span class="count bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Event today</p>
                    <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Settings</p>
                    <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-link-variant text-warning"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Launch Admin</p>
                    <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center">See all notifications</p>
              </div>
            </li>
            <?php if(isset($_SESSION['auth_user'])) : ?>
            <li class="nav-item dropdown dropdown-profile">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="<?=$url.'admin/upload/user/image/'.$_SESSION['auth_user']['user_photo'];?>" alt="user-img" width="36" height="36" class="img-circle"><span ><?= $_SESSION['auth_user']['name'];?></span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="<?=$url.'admin/upload/user/image/'.$_SESSION['auth_user']['user_photo'];?>" alt="user"></div>
										<div class="u-text">
											<h4><?= $_SESSION['auth_user']['name'];?></h4>
											<p class="text-muted"><?= $_SESSION['auth_user']['user_email'];?></p><a href="<?= $url.'id/'.$_SESSION['auth_user']['user_id'];?>" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?= $url.'id/'.$_SESSION['auth_user']['user_id'];?>" style="display:flex;align-items:center"><i class="ti-settings material-icons" style="font-size:18px;margin:0padding:0;margin-right:4px">person</i> My Profile</a>
									<a class="dropdown-item" href="#" style="display:flex;align-items:center"><i class="ti-email material-icons" style="font-size:18px;margin:0padding:0;margin-right:4px">mail </i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" style="display:flex;align-items:center"><i class="ti-settings material-icons" style="font-size:18px;margin:0padding:0;margin-right:4px"> settings</i> Account Setting</a>
									<div class="dropdown-divider"></div>
                  <form action="allcode.php" method="POST">
									  <button class="dropdown-item" type="submit" name="logout_btn"></i> Logout</button>
                  </form>
								</ul>
                
                
								<!-- /.dropdown-user -->
							</li>
              <?php endif; ?>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
      <div class="main-panel" style="backgound-color:none">