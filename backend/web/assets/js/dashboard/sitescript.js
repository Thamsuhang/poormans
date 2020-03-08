/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

$(document).ready(function ($) {
    Site.run(),
            function () { // set ajax async to true 
                $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
                    options.async = true;
                });
            }(),
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
                $('.owl-carousel').owlCarousel();
            }()

});