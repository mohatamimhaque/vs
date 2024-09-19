
        <header>
            <div class="logo">
                <a href="<?=base_url('trace') ?>" style="width:40px">
                    <img style="width:100%" src="<?=base_url('admin/assets/images/logo-icon.png') ?>" alt="">
                </a>
            </div>
            <div class="menu-item mr-0 mt-3">
                 <ul>
                     <li class="current"><a href="<?=base_url('trace/section/computing') ?>">Computing</a></li>
                     <li><a href="<?=base_url('trace/section/internet') ?>">Internet</a></li>
                     <li><a href="<?=base_url('trace/section/it') ?>">IT</a></li>
                     <li><a href="<?=base_url('trace/section/mobile_tech') ?>">Mobile Tech</a></li>
                     <li><a href="<?=base_url('trace/section/security') ?>">Security</a></li>
                     <li><a href="<?=base_url('trace/section/tech_blog') ?>">Tech Blog</a></li>
                     <li><a href="<?=base_url('trace/section/technology') ?>">Technology</a></li>
                 </ul>
             </div>
             <div class="hamburger-menu a">
                 <div class="bar"></div>
             </div>
        </header>



        <div id="main_wrapper" class="position-relative">
            <nav class="shadowdiv">
                <div class="left" onload="showTime()">
                    <div class="d-flex">
                        <p>Time:</p>
                        <div id="time" class="clock"></div>
                    </div>
                    <div class="d-flex">
                        <p style='font-size:15px'>Date:</p>
                        <div style='font-size:15px' id="date" class="clock"></div>
                    </div>
                </div>
                <div class="right">
                    <div class="searchbar shadowdiv">
                        <input type="search" class='search1' id="search" placeholder="search">
                        <i class="fas fa-search"></i>      
                    </div>
                    <div class="hamburger-menu b">
                        <div class="bar"></div>
                    </div>
                </div>
                <div class="position-absolute bbb shadowdiv" style='width:300px;top:8vh;z-index:11;right:0;background-color:white;'>
                    
                </div>
            </nav>
            <div class="menu-filter">
                <div class="menu-filter-header">
                    <div class="logo">
                        <a href="<?=base_url('trace') ?>" style="width:40px">
                            <img style="width:100%" src="<?=base_url('admin/assets/images/logo-icon.png') ?>" alt="">
                        </a>
                    </div>
                    <div class="hamburger-menu c">
                        <div class="bar"></div>
                    </div>
                </div>
                <div class="menu-filter-body">
                    <div class="tabLeft">
                        <div class="searchbar position-relative">
                            <input type="search" class='search2' id="search" placeholder="search">
                            <i class="fas fa-search"></i>
                            <div class="position-absolute bbb2 shadowdiv" style='width:250px;top:5vh;z-index:11;right:0;background-color:white;'>
                    
                        </div>      
                        </div>
                        <ul id="filter-btns">
                        <li class="active" style='' data-target="all">ALL</li>
                            <li data-target='computing'><p>Computing</p><i class='fas fa-angle-right'></i></li>
                            <li data-target='internet'><p>Internet</p><i class='fas fa-angle-right'></i></li>
                            <li data-target='it'><p>IT</p><i class='fas fa-angle-right'></i></li>
                            <li data-target='mobile_tech'><p>Mobile Tech</p><i class='fas fa-angle-right'></i></li>
                            <li data-target='security'><p>Security</p><i class='fas fa-angle-right'></i></li>
                            <li data-target='technology'><p>Technology</p><i class='fas fa-angle-right'></i></li>
                            <li><a href="<?=base_url('trace/section/tech_blog') ?>">Tech Blog</a></li>
                        </ul>
                    </div>
                    <div class="tabRight">
        


                    <?php

                        $query = "SELECT category FROM news";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                        $category = array();
                        foreach($query_run as $row){
                            $c = $row['category'];
                            if (in_array($c, $category, TRUE)){
                            }
                            else{
                                $category[]=$c;
                                if($c!='tech_blog'){
                                    ?>
                                    <div class="item" data-id="<?=$c ?>">
                                        <div class="tabRight-head">
                                            <p><?=preg_replace('/_/', ' ', $c )?></p>
                                            <a href="<?= base_url('trace/section/'.$c) ?>">See all <?=preg_replace('/_/', ' ', $c )?></a>
                                        </div>
                                        <div class="tabRight-body">
                                    <?php
                                    $search = "SELECT sub_category FROM news WHERE category = '$c'";
                                    $search_run = mysqli_query($con, $search);
                                    if(mysqli_num_rows($search_run) > 0){
                                    $sub_category = array();
                                    foreach($search_run as $item){
                                        $s = $item['sub_category'];
                                        if (in_array($s, $sub_category, TRUE)){
                                        }

                                        else{
                                            $sub_category[]=$s; 
                                            ?>
                                                <a href="<?= base_url('trace/section/'.$c.'/'.$s) ?>"><?=ucwords(preg_replace('/_/', ' ', $s ))?></a>
                                            <?php
                                        }
                                        
                                    }
                                }
                                ?>
                                        </div>
                                    </div>
            
                                <?php
                            }
                        }
                        
                       
                    }
                }
                    ?>
                       
        
                       
        
                    </div>
                </div>
            </div>
            <div id="page_wrapper">