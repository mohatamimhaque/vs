
$(document).ready(function(){

    //nagigation bar start
    var hamburger_menu1 = document.querySelector(".hamburger-menu.a");
    var hamburger_menu2 = document.querySelector(".hamburger-menu.b");
    var hamburger_menu3 = document.querySelector(".hamburger-menu.c");
    var filter_menu = document.querySelector(".menu-filter");
    hamburger_menu1.onclick = function(){
        hamburger_menu1.classList.add("active");
        filter_menu.classList.add("active");
        hamburger_menu3.classList.remove("active");
        
    }
    hamburger_menu2.onclick = function(){
        hamburger_menu2.classList.add("active");
        filter_menu.classList.add("active");
        hamburger_menu3.classList.remove("active");
    
    }
    hamburger_menu3.onclick = function(){
        hamburger_menu1.classList.remove("active");
        hamburger_menu2.classList.remove("active");
        hamburger_menu3.classList.add("active");
        filter_menu.classList.remove("active");
    
    
    }
       
    function showTime(){
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";
        
        if(h == 0){
            h = 12;
        }
        
        if(h > 12){
            h = h - 12;
            session = "PM";
        }
        
        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;
        
        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("time").innerText = time;
        document.getElementById("time").textContent = time;
        setTimeout(showTime, 1000);
    
        var d = new Date();
          
          var date = d.getDate();
          
          var month = d.getMonth();
          var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
          month=montharr[month];
          
          var year = d.getFullYear();
          
          var day = d.getDay();
          var dayarr =["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];
          day=dayarr[day];
          
          var hour =d.getHours();
          var min = d.getMinutes();
          var sec = d.getSeconds();
        
          document.getElementById("date").innerHTML=date+" "+month+" "+year;
        
        
    }
    
    showTime();
    })
    
    
    
    
    
    
    
    
    
    
    $(document).ready(function(){
        
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } 
            else {
                $('.scrollToTop').fadeOut();
            }
            
        });
        
    })
    
    
    $(document).ready(function(){
        const main_nav = document.querySelector('header');
        $(window).bind('mousewheel', function(event) {
            var a = $(window).scrollTop();
            if (event.originalEvent.wheelDelta >= 0 && a > 100) {
                main_nav.classList.add('fixed');
            }
            else {
                main_nav.classList.remove('fixed');
            }
            });
        })
    
    
    
    
    
    
        $(document).ready(function(){
            (function ($) {
                    $('.tn-slider').slick({
                    autoplay: true,
                    infinite: true,
                    dots: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
                
                
                // Category News Slider
                $('.cn-slider').slick({
                    autoplay: false,
                    infinite: true,
                    dots: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 1
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                    ]
                });
                
                
                // Related News Slider
                $('.sn-slider').slick({
                    autoplay: false,
                    infinite: true,
                    dots: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            })(jQuery);
            
            });
            
            
            $(document).ready(function(){
            // Tranding carousel
            (function ($) {
                "use strict";
            
            
            
                // Carousel item 1
                $(".carousel-item-1").owlCarousel({
                    autoplay: true,
                    smartSpeed: 1500,
                    items: 1,
                    dots: false,
                    loop: true,
                    nav : true,
                    navText : [
                        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    ]
                });
            
                // Carousel item 2
                $(".carousel-item-2").owlCarousel({
                    autoplay: true,
                    smartSpeed: 1000,
                    margin: 30,
                    dots: false,
                    loop: true,
                    nav : true,
                    navText : [
                        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    ],
                    responsive: {
                        0:{
                            items:1
                        },
                        576:{
                            items:1
                        },
                        768:{
                            items:2
                        }
                    }
                });
            
            
                // Carousel item 3
                $(".carousel-item-3").owlCarousel({
                    autoplay: true,
                    smartSpeed: 1000,
                    margin: 30,
                    dots: false,
                    loop: true,
                    nav : true,
                    navText : [
                        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    ],
                    responsive: {
                        0:{
                            items:1
                        },
                        576:{
                            items:1
                        },
                        768:{
                            items:2
                        },
                        992:{
                            items:3
                        }
                    }
                });
                
            
                // Carousel item 4
                $(".carousel-item-4").owlCarousel({
                    autoplay: true,
                    smartSpeed: 1000,
                    margin: 30,
                    dots: false,
                    loop: true,
                    nav : true,
                    navText : [
                        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    ],
                    responsive: {
                        0:{
                            items:1
                        },
                        576:{
                            items:1
                        },
                        768:{
                            items:2
                        },
                        992:{
                            items:3
                        },
                        1200:{
                            items:4
                        }
                    }
                });
                
            })(jQuery);
            
            });
    
    
    
    
    
    
    
    
    
    
    
            