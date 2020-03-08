
$(document).on('submit', '.home-slider', function (e) {
    e.preventDefault();
    var form = $(this);
    if (form.find('.image-id').val() == '') {
        typeAlert('Error!', 'Please select an image for the slide', 'warning');
    }
    if (form.valid()) {
        submitForm(form);
    }     
});

$(document).on('click', '.delete-home-slider', function (e) {
    e.preventDefault();
    var $this = $(this);
    var id = $this.parents('tr').data('id'); 
    msgText     = 'Do you want to delete this Slide?';
    successMsg  = 'Home Page Slide Successfully deleted.';
    errorMsg    = 'Sorry, Could not delete the Slide at this time. Please try again.';

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
            url: baseUrl+'/home-slider/delete-home-slider',
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

$(document).on('click', '.change-status', function (e) {
    e.preventDefault();
    var $this = $(this);
    var id = $this.parents('tr').data('id'); 
    
    if ($this.parents('tr').find('.slide-status').attr('id') == 1) {
        msgText     = 'Do you want to deactive this Slide?';
        successMsg  = 'This Slide is deactive now.';
        errorMsg    = 'Sorry, Could not deactive the Slide at this time. Please try again.';
        content     = '<span class="label label-danger">Inactive</span>';
        new_val     = 0; 
    }
    else {
        msgText     = 'Do you want to Active this Slide?';
        successMsg  = 'This Slide is active now.';
        errorMsg    = 'Sorry, Could not Active the Slide at this time. Please try again.';
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
            url: baseUrl+'/home-slider/change-status',
            data: {id: id},
            type: 'POST',
            async: false,
            success: function (response) { 
                var data = $.parseJSON(response); 
                if(data != false){
                    typeAlert('Success', successMsg, 'success');  
                    $this.parents('tr').find('.slide-status').html(content); 
                    $this.parents('tr').find('.slide-status').attr('id', new_val);             
                }
                else{
                    typeAlert('Error!', errorMsg, 'warning');
                }
            }
        });            
    });
});


createCKeditor('description');