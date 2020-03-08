function seo() {
    $(document).on('submit', '.seo', function (e) {
        e.preventDefault();
        var form = $(this);
        if(form.valid()) {
            submitForm(form);
        }     
    });

    $(document).on('click', '.delete-seo', function (e) {
        e.preventDefault();
        var $this = $(this);
        var id = $this.parents('tr').data('id'); 
        msgText     = 'Do you want to delete this Seo?';
        successMsg  = 'Seo Successfully deleted.';
        errorMsg    = 'Sorry, Could not delete the seo at this time. Please try again.';

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
                url: baseUrl+'/seo/delete-seo',
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
}

seo();