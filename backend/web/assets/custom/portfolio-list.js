$(document).on('click', '.delete-portfolio', function (e) {
    e.preventDefault();
    var $this = $(this);
    var id = $this.parents('tr').data('id');
    var src = $(this).data('src');
    msgText     = 'Do you want to delete this Portfolio ?';
    successMsg  = 'Portfolio Successfully deleted.';
    errorMsg    = 'Sorry, Could not delete the Portfolio at this time. Please try again.';

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
            url: baseUrl+'/portfolio/delete-portfolio',
            data: {id: id, src:src},
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