/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
function slick_init(x) {
    x.slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 4,
        arrows: true,
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
        ]
    });
}
$(document).ready(function ($) {
    Site.run(),
            function () {
                slick_init($('.slick-services'));
            }(),
            function () {
                $('.all-services-tab .nav-tabs').on('shown.bs.tab', function () {
                    $('.slick-services').slick('setPosition');
                }).on('hide.bs.tab', function () {

                });
            }()
//            ,
//            function () {
//                var snow = new Skycons({
//                    color: $.colors("blue-grey", 500)
//                });
//                snow.set(document.getElementById("widgetSnow"), "snow"), snow.play();
//                var sunny = new Skycons({
//                    color: $.colors("blue-grey", 700)
//                });
//                sunny.set(document.getElementById("widgetSunny"), "clear-day"), sunny.play()
//            }()

});