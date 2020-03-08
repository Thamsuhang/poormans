
$(document).on('submit', '.testimonial', function (e) {
    e.preventDefault();
    var form = $(this);
    if(form.valid()) {
        submitForm(form);
    }     
});

$(document).on('click', '.delete-testimonial', function (e) {
    e.preventDefault();
    var $this = $(this);
    var id = $this.parents('tr').data('id'); 
    msgText     = 'Do you want to delete this Testimonial?';
    successMsg  = 'Testimonial Successfully deleted.';
    errorMsg    = 'Sorry, Could not delete the testimonial at this time. Please try again.';

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
            url: baseUrl+'/testimonials/delete-testimonial',
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

    
if (action == 'add' || action == 'edit') {
    createCKeditor('quote');
}