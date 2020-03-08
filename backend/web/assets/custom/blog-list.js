$(document).on('click', '.delete-blog', function (e) {
    e.preventDefault();
    var $this = $(this);
    var id = $this.parents('tr').data('id'); 
    var img = $this.parents('tr').data('img'); 
    msgText     = 'Do you want to delete this Blog ?';
    successMsg  = 'Blog Successfully deleted.';
    errorMsg    = 'Sorry, Could not delete the Blog at this time. Please try again.';

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
            url: baseUrl+'/blogs/delete-blog',
            data: {id: id, img:img},
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