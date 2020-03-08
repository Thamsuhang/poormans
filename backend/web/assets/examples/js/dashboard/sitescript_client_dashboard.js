/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
/*
function initialize_owl(el) {
    el.owlCarousel({
        // Most important owl features
        items: 6,
        //Basic Speeds
        slideSpeed: 200,
        paginationSpeed: 800,
        rewindSpeed: 1000,
        //Autoplay
        autoPlay: true,
        stopOnHover: true,
        // Navigation
        navigation: true,
        navigationText: ["prev", "next"],
        rewindNav: true,
        scrollPerPage: false,
        //Lazy load
        lazyLoad: false,
        lazyFollow: false,
        lazyEffect: "fade",
        //Auto height
        autoHeight: false,
    });
}

function destroy_owl(el) {
    el.data('owlCarousel').destroy();
}
*/

function initialize_slick(el){
    el.slick({
          dots: true,
          infinite: false,
          speed: 300,
          slidesToShow: 4,
          slidesToScroll: 4,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
        });
}

function destroy_slick(el) {
    el.data('slickCarousel').slick('unslick');
}
$(document).ready(function ($) {
    Site.run(),
            //function () {
            //    var snow = new Skycons({
            //        color: $.colors("blue-grey", 500)
            //    });
            //    snow.set(document.getElementById("widgetSnow"), "snow"), snow.play();
            //    var sunny = new Skycons({
            //        color: $.colors("blue-grey", 700)
            //    });
            //    sunny.set(document.getElementById("widgetSunny"), "clear-day"), sunny.play()
            //}(),
            function () {
                initialize_slick($('.slick-services'));
                $('.all-services-tab .nav-tabs a').on('shown.bs.tab', function () {
                    $('.slick-services').each(function () {
                        $(this).owlCarousel('update');
                        //  $(this).trigger('refresh.owl.carousel');
                        //  initialize_slick($(this));
                    });

                });
                /*
                 .on('hide.bs.tab', function () {
                 // alert('ok');
                 $('.owl-services').each(function () {
                 // destroy_owl($(this));
                 $(this).trigger('refresh.owl.carousel');
                 });
                 });
                 */
            }()

});