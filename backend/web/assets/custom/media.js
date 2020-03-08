
$(document).on('click', '.delete-image', function (e) {
    e.preventDefault();
    var $this = $(this);
    var id = $this.parents('tr').data('id'); 
    msgText     = 'Do you want to delete this Image?';
    successMsg  = 'Image Successfully deleted.';
    errorMsg    = 'Sorry, Could not delete the image at this time. Please try again.';

    swal({
        title: 'Are You Sure?',
        text: msgText,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "rgb(190, 92, 73)",
        confirmButtonText: 'Yes, Delete it.',
        closeOnConfirm: false
    }, function() { 
        $.ajax({
            url: baseUrl+'/media/delete-image',
            data: {id: id},
            type: 'POST',
            async: false,
            success: function (response) { 
                var data = $.parseJSON(response); 
                if(data != false){
                    typeAlert('Success', successMsg, 'success');  
                    $this.parents('tr').remove();                   
                }
                else{
                    typeAlert('Error!', errorMsg, 'warning');
                }
            }
        });            
    });
});


uploads('images');
initEditable();
cropper();