function page() {
    $(document).on('submit', '.page-form', function (e) {
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
        if ($this.parents('tr').find('.page-status').attr('id') == 1) {
            msgText     = 'Do you want to deactive this page?';
            successMsg  = 'This page is deactive now.';
            errorMsg    = 'Sorry, Could not deactive the page at this time. Please try again.';
            content     = '<span class="label label-danger">Inactive</span>';
            new_val     = 0; 
        }
        else {
            msgText     = 'Do you want to Active this page?';
            successMsg  = 'This page is active now.';
            errorMsg    = 'Sorry, Could not Active the page at this time. Please try again.';
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
                url: baseUrl+'/page/change-status',
                data: {id: id},
                type: 'POST',
                async: false,
                success: function (response) { 
                    var data = $.parseJSON(response); 
                    if(data != false){
                        typeAlert('Success', successMsg, 'success');  
                        $this.parents('tr').find('.page-status').html(content); 
                        $this.parents('tr').find('.page-status').attr('id', new_val);               
                    }
                    else{
                        typeAlert('Error!', errorMsg, 'warning');
                    }
                }
            });            
        });
    });
}

page();