function section() {
    $(document).on('change', '.check-this', function (e) {
        if ($(this).is(':checked')) {
            $(this).parents('.check-parent').find('.check-child').show().fadeIn();
        }
        else {
            $(this).parents('.check-parent').find('.check-child').hide().fadeOut();
        }
    });

    $(document).on('submit', '.section-config', function (e) {
        e.preventDefault();
        var form = $(this);
        if(form.valid()) {
            submitForm(form);
        }     
    });

    $(document).on('click', '.change-status', function (e) {
        e.preventDefault();
        var $this = $(this);
        var id = $this.parents('tr').data('id'); 
        if ($this.parents('tr').find('.page-section-status').attr('id') == 1) {
            msgText     = 'Do you want to deactive this page section?';
            successMsg  = 'This page section is deactive now.';
            errorMsg    = 'Sorry, Could not deactive the page section at this time. Please try again.';
            content     = '<span class="label label-danger">Inactive</span>';
            new_val     = 0; 
        }
        else {
            msgText     = 'Do you want to Active this page section?';
            successMsg  = 'This page section is active now.';
            errorMsg    = 'Sorry, Could not Active the page section at this time. Please try again.';
            content     = '<span class="label label-success">Active</span>';
            new_val     = 1; 
        }

        swal({
            title: 'Are You Sure?',
            text: msgText,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "rgb(190, 92, 73)",
            confirmButtonText: 'Yes, Change it.',
            closeOnConfirm: false
        }, function() { 
            $.ajax({
                url: baseUrl+'/section/change-status',
                data: {id: id},
                type: 'POST',
                async: false,
                success: function (response) { 
                    var data = $.parseJSON(response); 
                    if(data != false){
                        typeAlert('Success', successMsg, 'success');  
                        $this.parents('tr').find('.page-section-status').html(content); 
                        $this.parents('tr').find('.page-section-status').attr('id', new_val);               
                    }
                    else{
                        typeAlert('Error!', errorMsg, 'warning');
                    }
                }
            });            
        });
    });
    var media = "<?php echo Yii::$app->request->baseUrl;?>/media";

    $(document).on('click', '.add-list-btn', function (e) {
        e.preventDefault();
        var listCount = $(this).data('listindex');
        var rowCount = $(this).parents('.list-container-parent').find('.list-container').find('.list-content').length + 1;
        content = '<div class="padding-bottom-20 padding-top-20 list-content" '+((rowCount > 1) ? 'style="border-top:1px solid #ccc;" ' : '')+'>'+
                        '<div class="row row-lg">'+
                            '<div class="col-sm-12 col-lg-12">'+
                                '<h4>List Content '+rowCount+'<a href="#" class="pull-right remove-list-btn"><i class="icon fa-times margin-right-0 color-red"></i></a></h4>'+
                                '<input class="form-control icp icp-auto txt-icon" value="-- Select Icon --" type="text" name="list['+listCount+']['+rowCount+'][icon]"/>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row row-lg margin-top-20">'+
                            '<div class="col-sm-12 col-lg-12">'+
                                '<input name="list['+listCount+']['+rowCount+'][title]" type="text" class="form-control" placeholder="Enter Title">'+
                            '</div>'+
                        '</div>'+
                        '<div class="row row-lg margin-top-20">'+
                            '<div class="col-sm-12 col-lg-12">'+
                                '<textarea class="form-control" rows="3" name="list['+listCount+']['+rowCount+'][value]"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row row-lg margin-top-20">'+
                            '<div class="col-sm-12 col-lg-12">'+
                                '<div class="panel">'+
                                    '<div class="panel-body container-fluid">'+
                                        '<div data-role="container">'+
                                            '<div data-role="content" class="image-parent">'+
                                                '<h5>Featured Image</h5>'+
                                                    '<div class="featured-image-wrapper" >'+
                                                        '<div class="remove-image" data-toggle="tooltip" data-original-title="Remove Image" data-placement="left"  style="top:30px;">'+
                                                            '<i class="icon fa-close"></i>'+
                                                        '</div>'+
                                                        '<div class="cover" style="width:50%; margin:0 auto;">'+
                                                            '<img class="width-full image-display" src="" alt="No Image Available.">'+
                                                            '<input type="hidden" name="list['+listCount+']['+rowCount+'][image]" class="image-id" value="0">'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<a href="" class="add-from-media-library">'+
                                                        '<i class="icon ti-plus margin-right-10"></i> Update Featured Image '+
                                                    '</a>'+
                                                    '<br/><small>* You can add new images from <a href="'+media+'">Media Manager</a></small>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';

        $(this).parents('.list-container-parent').find('.list-container').append(content);
        $('select').selectpicker('refresh'); 
        $('.icp-auto').iconpicker();
    });

    $(document).on('click', '.remove-list-btn', function (e) {
        e.preventDefault();
        $(this).parents('.list-content').hide('slow', function (e) { $(this).remove(); });
    });

    $(document).on('click', '.add-tab-btn', function (e) {
        e.preventDefault();
        var tabCount = $(this).data('tabindex');
        var rowCount = $(this).parents('.tab-container-parent').find('.tab-container').find('.tab-content').length + 1;
        content = '<div class="col-md-6 tab-content">'+
                        '<div style="background-color: #fafafa; border-radius:5px; padding:20px; margin-bottom:20px">'+
                            '<div class="row row-lg">'+
                                '<div class="col-sm-12 col-lg-12">'+
                                    '<h4>Tab Content '+rowCount+'<a href="#" class="pull-right remove-tab-btn"><i class="icon fa-times margin-right-0 color-red"></i></a></h4>'+
                                    '<input class="form-control icp icp-auto txt-icon" value="-- Select Icon --" type="text" name="tab['+tabCount+']['+rowCount+'][icon]"/>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row row-lg margin-top-20">'+
                               '<div class="col-sm-12 col-lg-12">'+
                                    '<input name="tab['+tabCount+']['+rowCount+'][title]" type="text" class="form-control" placeholder="Enter Title">'+
                               '</div>'+
                            '</div>'+
                            '<div class="row row-lg margin-top-20">'+
                                '<div class="col-sm-12 col-lg-12">'+
                                    '<textarea class="form-control ckeditor" rows="5" name="tab['+tabCount+']['+rowCount+'][description]"></textarea>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row row-lg margin-top-20">'+
                                '<div class="col-sm-12 col-lg-12">'+
                                    '<div class="panel">'+
                                        '<div class="panel-body container-fluid">'+
                                            '<div data-role="container">'+
                                                '<div data-role="content" class="image-parent">'+
                                                    '<h5>Featured Image</h5>'+
                                                    '<div class="featured-image-wrapper">'+
                                                        '<div class="remove-image" data-toggle="tooltip" data-original-title="Remove Image" data-placement="left"  style="top:30px;">'+
                                                            '<i class="icon fa-close"></i>'+
                                                        '</div>'+
                                                        '<div class="cover" style="width:50%; margin:0 auto;">'+
                                                            '<img class="width-full image-display" src="" alt="No Image Available.">'+
                                                                '<input type="hidden" name="tab['+tabCount+']['+rowCount+'][image]" class="image-id" value="0">'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<a href="" class="add-from-media-library">'+
                                                        '<i class="icon ti-plus margin-right-10"></i> Update Featured Image '+
                                                    '</a>'+
                                                    '<br/><small>* You can add new images from <a href="<?php echo Yii::$app->request->baseUrl;?>/media">Media Manager</a></small>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';

        $(this).parents('.tab-container-parent').find('.tab-container').append(content);
        $('select').selectpicker('refresh'); 
        createCKeditor('tab['+tabCount+']['+rowCount+'][description]');
        $('.icp-auto').iconpicker();
    });

    $(document).on('click', '.remove-tab-btn', function (e) {
        e.preventDefault();
        $(this).parents('.tab-content').hide('slow', function (e) { $(this).remove(); });
    });

    $(document).on('submit', '.section-content', function (e) {
        e.preventDefault();
        var form = $(this);
        if(form.valid()) {
            submitForm(form);
        }     
    });

    $('.icp-auto').iconpicker();
}

section();