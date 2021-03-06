/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
!function (document, window, $) {
    "use strict";
    var Site = window.Site;
    $(document).ready(function ($) {
        Site.run()
    }),
            function () {
                $(document).ready(function () {
                    var defaults = $.components.getDefaults("dataTable"),
                            options = $.extend(!0, {}, defaults, {
                                aoColumnDefs: [{
                                        bSortable: !1,
                                        aTargets: [-1]
                                    }],
                                iDisplayLength: 15,
                                aLengthMenu: [
                                    [5, 10, 25, 50, -1],
                                    [5, 10, 25, 50, "All"]
                                ],
                                sDom: '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
                                oTableTools: {
                                    sSwfPath: baseUrl + "/global/vendor/datatables-tabletools/swf/copy_csv_xls_pdf.swf"
                                }
                            });
                    $(".with-export").dataTable(options)
                })
            }()

}(document, window, jQuery);