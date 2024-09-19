        <!-- =============== START OF SLIDER REVOLUTION SECTION =============== -->
        <section id="slider" class="full-slider" style="position:relative;overflow:hidden">
            <div class="rev-slider-wrapper fullscreen-container overlay-gradient">
                <div id="fullscreen-slider" class="rev_slider fullscreenbanner" style="display:none" data-version="5.4.1">
                    <ul>
                     <?php
                       $query = "SELECT * FROM category WHERE status='0' ORDER BY views DESC LIMIT 6";
                       $query_run = mysqli_query($con, $query);
                       
                       if(mysqli_num_rows($query_run) > 0){
                          foreach($query_run as $item){
                             ?>
                        <li data-transition="fade"
                            data-slotamount="7"
                            data-easein="default"
                            data-easeout="default"
                            data-masterspeed="2000">
                            <!-- MAIN IMAGE -->
                            <img src="<?=base_url('admin/upload/category/image/'.$item['image']) ?>"
                                 alt="Image"
                                 title="slider-bg"
                                 data-bgposition="center top"
                                 data-bgfit="cover"
                                 data-bgrepeat="no-repeat"
                                 data-bgparallax="10"
                                 class="rev-slidebg"
                                 data-no-retina="">
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-resizeme"
                                 data-x="center"
                                 data-hoffset=""
                                 data-y="center"
                                 data-voffset="['-30','-30','-30','-30']"
                                 data-responsive_offset="on"
                                 data-fontsize="['60','50','40','30']"
                                 data-lineheight="['60','50','40','30']"
                                 data-whitespace="nowrap"
                                 data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 style="z-index: 5; color: #fff; font-weight: 900;">Search Products
                            </div>
                        </li>
                                <?php
                                }
                               }
                  
                             ?>

                    </ul>
                </div>
            </div>
            <!-- ===== END OF REV SLIDER WRAPPER ===== -->


            <!-- ===== START OF SEARCH FORM WRAPPER ===== -->
            <div class="search-form-wrapper search-form-rev" style="z-index:155">

                    <!-- ===== START OF SEARCH FORM ===== -->
                    <form class="nav-link m-auto  d-lg-flex search" >
                        <div style="background-color: #e3edf7;" class="mt-2 d-flex InputContainer"> 
                            <input type="search" name="search" tabindex="0" id="homesearch" class="" style='box-shadow:none'  placeholder="Search products">
                            <a href="#" class="search-btn">
                            <i class="fas fa-search"></i>      
                            </a>
                        </div>
                        <div class="bbb" style="position:absolute;top:10vh;width:100%;border-radius:8px;z-index:152;">
                        </div>
                    </form>
                    <!-- ===== END OF SEARCH FORM ===== -->

                </div>
            <!-- ===== END OF SEARCH FORM WRAPPER ===== --
            <div style="position:absolute;bottom:-50px;left:0;width:100%;height:200px;z-index:150;">
                <img src="<?= base_url('assets/wave.png') ?>" alt="" style="height:100%;width:100%">
            </div>
                            -->
</section>
        <!-- =============== START OF SLIDER REVOLUTION SECTION =============== -->
<style>
    #navbar-main{
        height:0;
        overflow:hidden;
        transition:.2s
    }
    #navbar-main.navmain{
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1000;
    position: absolute;
    top: 0;
    height:12vh;
    width: 100%;
    z-index: 100;
    background: none;
    box-shadow: none;
    display: flex;
    justify-content: space-between;
    transition:.2s;
    overflow:visible;
    }


    #navbar-main.navmain .navsearch{
        display:none;
    }
    #navbar-main.navmain span{
        background-color:rgb(0,2,5);
    }
    #navbar-main.navmain h2,
    #navbar-main.navmain p,
    #navbar-main.navmain .d-flex button.fa-user,
    #navbar-main.navmain .d-flex,
    #navbar-main.navmain i{
        color:rgb(0,2,5)
    }
    #navbar-main.navmain .d-flex button{
        color:rgb(0, 3, 159)
    }
    #navbar-main.navmain .dropmenu i,
    #navbar-main.navmain .dropmenu p{
        color:white;
    }
    #navbar-main.navmain2{
        height:12vh;
        transition:.2s;
        overflow:visible;

    }
    .search-form-wrapper{
        width:500px;
        margin:auto;
        position:relative
    }
    .search-form-wrapper .InputContainer{
        height:50px;
    }
    .search-form-wrapper #homesearch{
        width:calc(100% - 20px);
    }
    .search-form-wrapper i.fa-search{
        position:absolute;
        top:17px;
        right:12px
    }
    .overlay-gradient .slotholder:after,

    .overlay-gradient:after {

        content:  '';

        position: absolute;

        display: block;

        top: 0;

        left: 0;

        width: 100%;

        height: 100%;

        opacity: .6;

    }

    .full-slider .search-form-wrapper {

    position: absolute;

    top: 50%;

    left: 0;

    right: 0;

    margin-top: 20px;

    z-index: 90;

    }
    .rev-slider-wrapper {

    left: 0 !important;

    }

</style>


<script>
    $(document).ready(function(){
    const add = document.querySelector('#navbar-main');
    $(window).scroll(function(){
        if ($(this).scrollTop() > 600) {
            add.classList.remove('navmain');
            add.classList.add('navmain2');

        } else {
            add.classList.add('navmain');
            add.classList.remove('navmain2');
        }
    });
   
    })

</script>
