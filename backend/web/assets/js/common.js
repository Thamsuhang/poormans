/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


!function (document, window, $) {
    "use strict";
    var Site = window.Site;
    $(document).ready(function ($) {
        Site.run()
    }),
            function () {

                $(document).ready(function () {
                    $('body').on('click', '.reload-page', function (e) {
                        location.reload();
                    });
                })
            }()

}(document, window, jQuery);