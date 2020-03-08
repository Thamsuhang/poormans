$(document).on('submit', '.portfolio-form', function (e) {
    e.preventDefault();
    var form = $(this);
    var desc = $('.ckeditor').val();
    if (desc == null || desc == '' || desc == 'undefined') {
        typeAlert('Error', 'Please enter the description to proceed.', 'warning');
        return false;
    }

    if(form.valid()) {
        submitForm(form);
    }     
});

$(document).on('click', '.remove-image', function (e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).parents('.image-logo-parent').find('.featured-image-wrapper').hide();
    $(this).parents('.image-logo-parent').find('.image-display').attr('src', '');
    $('.image-parent1').find('.image-val').val(0);
});

$(document).on('click', '.remove-snap-image', function (e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).parents('.image-parent-snap').find('.snap-image-wrapper').hide();
    $(this).parents('.image-parent-snap').find('.snap-image-display').attr('src', '');
    $('.image-parent-snap').find('.image-snap-val').val(0);
});

uploads('portfolio');
uploads('images');
uploads('snap');

$('#portfolio-datetimepicker').datepicker({format: 'yyyy-mm-dd'});
