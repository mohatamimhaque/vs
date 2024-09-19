if ($("#fullscreen-slider").length > 0) {

    var tpj = jQuery;

    var revapi24;



    tpj(document).ready(function () {

    if (tpj("#fullscreen-slider").revolution == undefined) {

        revslider_showDoubleJqueryError("#fullscreen-slider");

    } else {

        revapi24 = tpj("#fullscreen-slider").show().revolution({

            sliderType: "standard",

            jsFileLocation:"assets/revolution/js/",

            sliderLayout: "fullscreen",

            dottedOverlay: "none",

            delay: 9000,

            spinner: 'spinner2',

            navigation: {

                keyboardNavigation: "on",

                keyboard_direction: "horizontal",

                mouseScrollNavigation: "off",

                mouseScrollReverse: "default",

                onHoverStop: "off",

                touch: {

                    touchenabled: "off",

                    swipe_threshold: 75,

                    swipe_min_touches: 1,

                    swipe_direction: "vertical",

                    drag_block_vertical: false

                },

                bullets: {

                    enable: true,

                    hide_onmobile: true,

                    hide_under: 1024,

                    style: "uranus",

                    hide_onleave: false,

                    direction: "vertical",

                    h_align: "right",

                    v_align: "center",

                    h_offset: 30,

                    v_offset: 0,

                    space: 20,

                    tmp: '<span class="tp-bullet-inner"></span>'

                }

            },

            viewPort: {

                enable: true,

                outof: "wait",

                visible_area: "80%"

            },

            responsiveLevels: [1200, 992, 768, 480],

            visibilityLevels: [1200, 992, 768, 480],

            gridwidth: [1200, 992, 768, 480],

            lazyType: "single",

            parallax: {

                type: "scroll",

                origo: "enterpoint",

                speed: 400,

                levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],

            },

            disableProgressBar: "on",

            shadow: 0,

            spinner: "off",

            stopLoop: "on",

            stopAfterLoops: 1,

            stopAtSlide: 1,

            shuffle: "off",

            autoHeight: "off",

            hideThumbsOnMobile: "off",

            hideSliderAtLimit: 0,

            hideCaptionAtLimit: 0,

            hideAllCaptionAtLilmit: 0,

            debugMode: false,

            fallbacks: {

                simplifyAll: "off",

                nextSlideOnWindowFocus: "off",

                disableFocusListener: false,

            }

        });

        }

        

        //if(revapi24) revapi24.revSliderSlicey();

    });

    };

    
$(document).ready(function () {
    // owl-crousel for blog
    $('.owl-carousel').owlCarousel({
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
                        items:2
                    },
                    576:{
                        items:2
                    },
                    768:{
                        items:2
                    },
                    992:{
                        items:3
                    },
                    1200:{
                        items:4
                    },
                    1500:{
                        items:5
                    },
                    1800:{
                        items:6
                    }
                }
    })


   

    // AOS Instance
    AOS.init();

});


