$(document).on('submit', '.blogs', function (e) {
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

uploads('blogs');

$(document).on('click', '.remove-image', function (e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).parents('.image-parent').find('.featured-image-wrapper').hide();
    $(this).parents('.image-parent').find('.image-display').attr('src', '');
    $(this).parents('.image-parent').find('.image-val').val(0);
    // msgText     = 'Do you want to delete this Image ?';
    // successMsg  = 'Image Successfully deleted.';
    // errorMsg    = 'Sorry, Could not delete the Image at this time. Please try again.';
    // var src = $(this).data('src');
    // swal({
    //     title: 'Are You Sure?',
    //     text: msgText,
    //     type: "warning",
    //     showCancelButton: true,
    //     confirmButtonColor: "rgb(190, 92, 73)",
    //     confirmButtonText: 'Yes, Delete it.',
    //     closeOnConfirm: false
    // }, function() { 
    //     $.ajax({
    //         type:"POST",
    //         url:baseUrl+'/portfolio/delete-image',
    //         data:{src:src},
    //         success:function(response) {
    //             var data = $.parseJSON(response);
    //             if(data != false) {
    //                 $(this).parents('.image-parent').find('.featured-image-wrapper').hide();
    //                 $(this).parents('.image-parent').find('.image-display').attr('src', '');
    //                 $(this).parents('.image-parent').find('.image-val').val(0);
    //             }
                
    //         }
    //     });
    // });

});