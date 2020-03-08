$(document).on('submit', '.reviews', function (e) {
    e.preventDefault();
    var form = $(this);
    var desc = $('.ckeditor-desc').val();
    if (desc == null || desc == '' || desc == 'undefined') {
        typeAlert('Error', 'Please enter the description to proceed.', 'warning');
        return false;
    }

    var image = $('.image-val').val()
    if (image == null || image == '' || image == 'undefined' || image <= 0) {
        typeAlert('Error', 'Please upload a featured image to proceed.', 'warning');
        return false;
    }

    if(form.valid()) {
        submitForm(form);
    }     
});

uploads('review');
uploads('review-gallery');

$(document).on('click', '.remove-image-common', function (e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).parents('.image-parent').find('.featured-image-wrapper').hide();
    $(this).parents('.image-parent').find('.image-display').attr('src', '');
    $(this).parents('.image-parent').find('.image-val').val(0);
});

$(document).on('click', '.add-list-btn', function (e) {
    e.preventDefault();
    var blockCount = $(this).data('listindex');
    var par = isNaN(parseInt($(this).parents('.list-container-parent').find('.list-container').find('.list-content:last-child').data('index'))) ? 1 : parseInt($(this).parents('.list-container-parent').find('.list-container').find('.list-content:last-child').data('index'));
    var listCount = par + 1;
    content = '<div class="padding-bottom-20 padding-top-20 list-content" data-index="'+listCount+'" '+((listCount > 1) ? 'style="border-top:1px solid #ccc;" ' : '')+'>'+
                    '<div class="row row-lg">'+
                        '<div class="col-sm-12 col-lg-12">'+
                            '<h4><a href="#" class="pull-right remove-list-btn"><i class="icon fa-times margin-right-0 color-red"></i></a></h4>'+
                            '<input class="form-control icp icp-auto txt-icon" value="-- Select Icon --" type="text" name="list['+blockCount+']['+listCount+'][icon]"/>'+
                        '</div>'+
                    '</div>'+
                    '<div class="row row-lg margin-top-20">'+
                        '<div class="col-sm-12 col-lg-12">'+
                            '<input name="list['+blockCount+']['+listCount+'][field]" type="text" class="form-control" placeholder="Enter Title">'+
                        '</div>'+
                    '</div>'+
                    '<div class="row row-lg margin-top-20">'+
                        '<div class="col-sm-12 col-lg-12">'+
                            '<textarea class="form-control" rows="3" name="list['+blockCount+']['+listCount+'][value]"></textarea>'+
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

$('.icp-auto').iconpicker();

$(document).on('click', '.add-block-btn', function (e) {
    e.preventDefault();
    var par = isNaN(parseInt($('.review-block-container').find('.review-content:last-child').data('index'))) ? 0 : parseInt($('.review-block-container').find('.review-content:last-child').data('index'));
    var blockCount = par + 1;
    content = '<div class="margin-top-20 review-content" data-index="'+blockCount+'">'+
                    '<div class="col-md-6">'+
                        '<div class="panel">'+
                            '<div class="panel-body container-fluid list-container-parent">'+
                                '<div class="row row-lg">'+
                                    '<div class="col-sm-12 col-lg-12">'+
                                    '<h4>Review Block</h4><a href="#" class="pull-right remove-block-btn"><i class="icon fa-times margin-right-0 color-red"></i></a>'+
                                    '</div>'+
                                    '<div class="col-sm-10 col-lg-8">'+
                                        '<input name="listtitle['+blockCount+'][title]" type="text" class="form-control" placeholder="Enter Title" value=""> '+
                                    '</div>'+
                                    '<div class="col-sm-2 col-lg-4"><a href="#" class="pull-right add-list-btn" data-listindex="'+blockCount+'"><i class="icon fa-plus"></i></a></div>'+
                                    
                                '</div>'+
                                '<div class="padding-20 list-container margin-top-10" style="background-color: #fafafa; border-radius:5px;">'+
                                    '<div class="padding-bottom-20 list-content">'+
                                        '<div class="row row-lg">'+
                                            '<div class="col-sm-12 col-lg-12">'+
                                                '<h4><a href="#" class="pull-right remove-list-btn"><i class="icon fa-times margin-right-0 color-red"></i></a></h4>'+
                                                
                                                '<input class="form-control icp icp-auto txt-icon" type="text" name="list['+blockCount+'][1][icon]" placeholder="--Select icons--"/>'+
                                                '<i class="icon"></i>'+
                                            '</div>'+
                                        '</div>'+
                                        
                                        '<div class="row row-lg">'+
                                            '<div class="col-sm-12 col-lg-12">'+
                                               ' <input name="list['+blockCount+'][1][field]" type="text" class="form-control" placeholder="Enter Field" value="">'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="row row-lg margin-top-20">'+
                                            '<div class="col-sm-12 col-lg-12">'+
                                                '<textarea class="form-control" rows="3" name="list['+blockCount+'][1][value]"></textarea>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';

    $('.review-block-container').append(content);
    $('select').selectpicker('refresh'); 
    $('.icp-auto').iconpicker();
});

$(document).on('click', '.remove-block-btn', function (e) {
    e.preventDefault();
    $(this).parents('.review-content').hide('slow', function (e) { $(this).remove(); });
});

$(document).on('click', '.add-multi-block-btn', function (e) {
    e.preventDefault();

    var par = isNaN(parseInt($('.review-multiblock-container').find('.review-multi-content:last-child').data('index'))) ? 0 : parseInt($('.review-multiblock-container').find('.review-multi-content:last-child').data('index'));
    var blockCount = par + 1;
    var ckid = 'ckid_'+blockCount;
    content = '<div class="margin-top-20 review-multi-content" data-index="'+blockCount+'">'+
                    '<div class="col-md-6">'+
                        '<div class="panel">'+
                            '<div class="panel-body container-fluid">'+
                                '<div class="row row-lg">'+
                                    '<div class="col-sm-12 col-lg-12">'+
                                    '<h4>Review Multi Block</h4><a href="#" class="pull-right remove-multiblock-btn"><i class="icon fa-times margin-right-0 color-red"></i></a>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="padding-20 margin-top-10" style="background-color: #fafafa; border-radius:5px;">'+
                                    '<div class="padding-bottom-20">'+
                                        '<div class="row row-lg">'+
                                            '<div class="col-sm-12 col-lg-12">'+
                                                '<input class="form-control" type="text" name="multi['+blockCount+'][title]" placeholder="Enter Title"/>'+
                                            '</div>'+
                                        '</div>'+
                                        
                                        '<div class="row row-lg margin-top-10">'+
                                            '<div class="col-sm-12 col-lg-12">'+
                                               ' <input name="multi['+blockCount+'][subtitle]" type="text" class="form-control" placeholder="Enter Subtitle">'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="row row-lg margin-top-20">'+
                                            '<div class="col-sm-12 col-lg-12">'+
                                                '<textarea class="form-control ckeditor ckeditor-multi-review" name="multi['+blockCount+'][description]" id="'+ckid+'"></textarea>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';

    $('.review-multiblock-container').append(content);

    $('#'+ckid).ckeditor();
});

$(document).on('click', '.remove-multiblock-btn', function (e) {
    e.preventDefault();
    $(this).parents('.review-multi-content').hide('slow', function (e) { $(this).remove(); });
});

$(document).on('click', '.add-rating-btn', function (e) {
    e.preventDefault();
    var par = isNaN(parseInt($('.rating-container').find('.rating-content:last-child').data('index'))) ? 0 : parseInt($('.rating-container').find('.rating-content:last-child').data('index'));
    var blockCount = par + 1;
    content = '<div class="padding-bottom-20 rating-content" data-index="'+blockCount+'">'+
                '<div class="row row-lg">'+
                    '<div class="col-sm-7">'+
                        '<input class="form-control" type="text" name="rate['+blockCount+'][title]" placeholder="Enter title"/>'+
                    '</div>'+
                    '<div class="col-sm-3">'+
                        '<input min="1" max="10" name="rate['+blockCount+'][rate]" type="number" class="form-control" placeholder="rating" value="">'+
                    '</div>'+
                    '<div class="col-sm-2">'+
                        '<h4><a href="#" class="pull-right remove-rating-btn"><i class="icon fa-times margin-right-0 color-red"></i></a></h4>'+
                    '</div>'+
                '</div>'+
            '</div>';
    $('.rating-container').append(content);
});

$(document).on('click', '.remove-rating-btn', function (e) {
    e.preventDefault();
    $(this).parents('.rating-content').hide('slow', function (e) { $(this).remove(); });
});

$(document).on('click', '.add-cons-btn', function (e) {
    e.preventDefault();
    var par = isNaN(parseInt($('.cons-container').find('.cons-content:last-child').data('index'))) ? 0 : parseInt($('.cons-container').find('.cons-content:last-child').data('index'));
    var blockCount = par + 1;
    content = '<div class="padding-bottom-20 cons-content" data-index="'+blockCount+'">'+
                '<div class="row row-lg">'+
                    '<div class="col-sm-10">'+
                        '<textarea name="cons['+blockCount+'][value]"  rows="3" class="form-control"></textarea>'+
                    '</div>'+
                    '<div class="col-sm-2">'+
                        '<h4><a href="#" class="pull-right remove-cons-btn"><i class="icon fa-times margin-right-0 color-red"></i></a></h4>'+
                    '</div>'+
                '</div>'+
            '</div>';
    $('.cons-container').append(content);
});

$(document).on('click', '.remove-cons-btn', function (e) {
    e.preventDefault();
    $(this).parents('.cons-content').hide('slow', function (e) { $(this).remove(); });
});

$(document).on('click', '.add-pros-btn', function (e) {
    e.preventDefault();
    var par = isNaN(parseInt($('.pros-container').find('.pros-content:last-child').data('index'))) ? 0 : parseInt($('.pros-container').find('.pros-content:last-child').data('index'));
    var blockCount = par + 1;
    content = '<div class="padding-bottom-20 pros-content" data-index="'+blockCount+'">'+
                '<div class="row row-lg">'+
                    '<div class="col-sm-10">'+
                        '<textarea name="pros['+blockCount+'][value]"  rows="3" class="form-control"></textarea>'+
                    '</div>'+
                    '<div class="col-sm-2">'+
                        '<h4><a href="#" class="pull-right remove-pros-btn"><i class="icon fa-times margin-right-0 color-red"></i></a></h4>'+
                    '</div>'+
                '</div>'+
            '</div>';
    $('.pros-container').append(content);
});

$(document).on('click', '.remove-pros-btn', function (e) {
    e.preventDefault();
    $(this).parents('.pros-content').hide('slow', function (e) { $(this).remove(); });
});