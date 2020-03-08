!function (document, window, $) {
    "use strict";
    var Site = window.Site;
    $(document).ready(function ($) {
        Site.run()
    }),
        // Init Datatable
        (function () {
            $(document).ready(function () {
                var defaults = $.components.getDefaults("dataTable"),
                    options = $.extend(!0, {}, defaults, {
                        'aoColumnDefs': [{
                            'bSortable': !1,
                            'aTargets': [-1]
                        }],
                        //'responsive': {
                        //    'details': false
                        //},
                        'responsive': false,
                        'iDisplayLength': 10,
                        'aLengthMenu': [
                            [5, 10, 25, 50, -1],
                            [5, 10, 25, 50, "All"]
                        ],
                        "scrollX": true,
                        'sDom': '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
                        'oTableTools': {
                            sSwfPath: baseUrl + "/global/vendor/datatables-tabletools/swf/copy_csv_xls_pdf.swf"
                        }
                    });
                $(".with-export").dataTable(options)
            })
        })(),

        // Delete Business
        (function () {
            $(document).on('click', '.delete-directory-item', function () {
                var id = $(this).data('id');
                swal({
                    title: "Delete Business ?",
                    text: "You will not be able to recover the data!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, I am sure!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        if (id > 0) {
                            $.ajax({
                                url: baseUrl + "/directory/delete",
                                type: 'post',
                                data: {
                                    id: id,
                                },
                                success: function (data) {
                                    if (data == 'true') {
                                        typeAlert('Success', 'Business Deleted form listing. Reloading Page...', 'success');
                                        window.setTimeout(function () {
                                            location.reload();
                                        }, 1000);
                                    } else {
                                        typeAlert('Error', 'Sorry, Could not delete selected business.', 'error');
                                    }
                                },
                                error: function () {
                                    typeAlert('Error', 'Sorry, Server error has occurred. ', 'error');
                                }
                            });
                        }
                    }
                });


            });
        })(),

        // Categories Select
        (function () {
            // BUTTONS
            $('.fg-button').hover(
                function () {
                    $(this).removeClass('ui-state-default').addClass('ui-state-focus');
                },
                function () {
                    $(this).removeClass('ui-state-focus').addClass('ui-state-default');
                }
            );
            var hierarchy = $('#hierarchy');
            hierarchy.menu({
                content: hierarchy.next().html(),
                width: 300,
                //flyOut:true
                // maxHeight: 180
            });
        })(),

        // Add more phone fax url email
        (function () {
            var count = {
                phone : ($('[data-item = "phone"]').find('li').length) ? $('[data-item = "phone"]').find('li').length : 0,
                fax: ($('[data-item = "fax"]').find('li').length) ? $('[data-item = "fax"]').find('li').length : 0,
                email: ($('[data-item = "email"]').find('li').length) ? $('[data-item = "email"]').find('li').length : 0,
                url: ($('[data-item = "url"]').find('li').length) ? $('[data-item = "url"]').find('li').length : 0
            };
            $('.add-more').click(function () {
                var panel = $(this).parents('.panel').find('.panel-body').find('ul');

                var type = panel.data('type');
                var r = '<li>' +
                    '<div class = "form-group">' +
                    '<div class = "row">' +
                    '<div class = "col-xs-11">' +
                    '<input type = "text" class = "form-control " name = "" placeholder = "" value = ""/>' +
                    '</div>' +
                    '<div class = "col-xs-1">' +
                    '<a class = "pull-right delete-item" href = "javascript:void(0);">' +
                    '<i class = "icon fa-trash red padding-top-10"></i>' +
                    '</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</li>';

                var row = $(r);
                var text = row.find('input[type="text"]');
                console.log(count[row]);
                text.attr('name', type + "[" + count[type] + "][value]");
                row.find(".delete-item").on("click", function () {
                    $(this).parents('li').remove();
                });

                panel.prepend(row);


            });

        })(),

        // Delete Phone Fax Email or URL
        (function () {
            $('body').on('click', '.delete-item', function () {
                var item = $(this);
                var parent = item.parents('li');
                var id = item.data('id');
                var type = item.data('type');
                var position = item.data('position');
                var value = parent.find('input').val();
                if (id > 0 && type != '' && position >= 0) {
                    $.ajax({
                        url: baseUrl + "/directory/delete-item",
                        type: 'post',
                        data: {
                            id: id,
                            type: type,
                            value: value,
                            position: position
                        },
                        success: function (data) {
                            if (data == 'true') {
                                parent.remove();
                                typeAlert('Success', 'Data has been deleted.', 'success');
                            } else {
                                typeAlert('Error', 'Sorry, Data could not be deleted.', 'error');
                            }
                        },
                        error: function () {
                            typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                    });
                }
                else {
                    parent.remove();
                }
            });
        })(),

        // Directory list Toggle Featured
        (function () {

            $('body').on('change', '.directory-featured', function () {

                var id = $(this).parents('tr').data('id');
                var status = $(this).prop('checked');
                $.ajax({
                    url: baseUrl + "/directory/toggle-featured",
                    type: 'post',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function (data) {
                        if (data == 'true') {
                            typeAlert('Success', 'Data has been saved.', 'success');
                        } else {
                            typeAlert('Error', 'Sorry, Data could not be saved.', 'error');
                        }
                    },
                    error: function () {
                        typeAlert('Error', 'Sorry, Server error has occurred. ', 'error');
                    }
                });
            });
        })(),

        // Directory list Toggle Status
        (function () {
            $('body').on('change', '.directory-status', function () {

                var id = $(this).parents('tr').data('id');
                var status = $(this).prop('checked');
                $.ajax({
                    url: baseUrl + "/directory/toggle-status",
                    type: 'post',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function (data) {
                        if (data == 'true') {
                            typeAlert('Success', 'Data has been saved.', 'success');
                        } else {
                            typeAlert('Error', 'Sorry, Data could not be saved.', 'error');
                        }

                    },
                    error: function () {
                        typeAlert('Error', 'Sorry, Server error has occurred. ', 'error');
                    }
                });
            });
        })(),

        // Extend Expiry
        (function () {
            $('.extend-date').click(function () {
                var id = $(this).data('business');
                $.ajax({
                    url: baseUrl + "/directory/extend-date",
                    type: 'post',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function (data) {
                        if (data == 'true') {
                            typeAlert('Success', 'Date extended for a year.', 'success');
                        } else {
                            typeAlert('Error', 'Sorry, Date could not be extended.', 'error');
                        }

                        //window.setTimeout(function () {
                        //    location.reload();
                        //}, 1000);
                    },
                    error: function () {
                        typeAlert('Error', 'Sorry, Server error has occurred. ', 'error');
                    }
                });

            });
        })(),

        // Sortable Events
        (function () {
            var sortable = $('.featured-sortable').sortable({
                forcePlaceholderSize: true,
                placeholderClass: 'placeholder',
                dragImage: null
            }).on('sortupdate', function (e, obj) {
                //alert( "Index: " + li.index() );
                var order = [];
                $('.featured-sortable li').each(function (e, obj) {
                    order.push($(this).data('id'));
                });
                $.ajax({
                    url: baseUrl + '/directory/update-featured-index',
                    type: 'POST',
                    data: {order: order},
                    success: function (response) {
                        //result = $.parseJSON(response);
                        if (response == 'true') {
                            typeAlert('Success', 'Status set to viewed', 'success');
                        } else {
                            typeAlert('Error', 'Sorry, Data could not be saved.', 'error');
                        }
                    },
                    error: function (error) {
                        typeAlertRedirect('Error', 'Sorry, Server error. Please reload and try again', 'error', '');
                    }


                });
                //location.reload();
            });

        })(),

        // Nestable

        $(function () {
            var nestable = $('*[list-type = "nested"]');
            // var dd = nestable.find('dd');
            nestable.nestable();

        });
    // Edit Categories

    //category drill down
    $(function () {

        var drilldown = $('#drilldown').children('ul');
        drilldown.drilldown({
            wrapper_class: 'drilldown panel panel-success',
            menu_class: 'drilldown-menu',
            submenu_class: 'nav ',
            parent_class: 'dd-parent',
            parent_class_link: 'dd-parent-a',
            active_class: 'active',
            header_class_list: 'breadcrumb',
            header_class: 'breadcrumbwrapper',
            class_selected: 'selected',
            event_type: 'click',
            hover_delay: 300,
            speed: 'fast',
            save_state: true,
            show_count: false,
            count_class: 'dd-count',
            icon_class: 'fa fa-chevron-right pull-right dd-icon',
            link_type: 'breadcrumb', //breadcrumb , link, backlink
            reset_text: '<span class="fa fa-home"></span>', // All
            default_text: 'Choose Category',
            show_end_nodes: true, // drill to final empty nodes
            hide_empty: true, // hide empty menu when menu_height is set, header no effected
            menu_height: '200px', // '200px' , false for auto height
            show_header: false,
            header_tag: 'div',// h3
            header_tag_class: 'list-group-item active' // hidden list-group-item active
        });

        drilldown.find('a').on('click', function (e) {
            $('#menuSelectedId').val($(this).data('id'));
        });

    });

    (function () {

        $(document).on('click', '.edit-category', function () {
            var id = $(this).parents('li').data('id');
            $.ajax({
                url: baseUrl + "/directory/edit-category",
                type: 'post',
                data: {
                    id: id,
                },
                success: function (data) {
                    if (data != 'false') {
                        var category = jQuery.parseJSON(data);
                        $('#modal-title').html(category.type);
                        $('#cat_id').val(category.id);
                        $('#cat_type').val(category.type);
                        $("#cat_parent").val(category.parent);
                        $('#cat_parent').change(function () {
                            $('#cat_type').trigger('change');
                        });
                        $('#cat_type').change(function () {

                        });
                        $("#cat_modal").modal("show");

                    } else {
                        typeAlert('Error', 'Sorry, Could not retrieve category.', 'error');
                    }
                },
                error: function () {
                    typeAlert('Error', 'Sorry, Server error has occurred. ', 'error');
                }
            });
        });
    })()
}(document, window, jQuery);