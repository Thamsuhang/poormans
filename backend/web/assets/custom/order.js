
$(document).on('click', '.change-order-status', function (e) {
    e.preventDefault();
    var $this = $(this);
    var id = $this.parents('tr').data('id'); 
    var val = $this.data('status');
    if (val == 'approved') {
        msgText     = 'Do you want to Approve this order?';
        successMsg  = 'You have successfully approved the order';
        errorMsg    = 'Sorry, Could not approve the order at this time. Please try again.';
        content     = '<span class="label label-success">Approved</span>';
    }
    else if(val == 'delivered') {
        msgText     = 'Do you want to deliver this order?';
        successMsg  = 'You have successfully delivered the order';
        errorMsg    = 'Sorry, Could not deliver the order at this time. Please try again.';
        content     = '<span class="label label-success">Delivered</span>';
    }

    else {
        msgText     = 'Do you want to Cancel this order?';
        successMsg  = 'You have successfully cancelled the order';
        errorMsg    = 'Sorry, Could not cancel the order at this time. Please try again.';
        content     = '<span class="label label-danger">Cancelled</span>';
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
            url: baseUrl+'/order/change-order-status',
            data: {id: id, status: val},
            type: 'POST',
            async: false,
            success: function (response) { 
                var data = $.parseJSON(response); 
                if(data != false) {
                    typeAlert('Success', successMsg, 'success');  
                    $this.parents('tr').find('.status-label').html(content); 
                    $this.parents('td').html('');
                    $('#tr_'+id).hide('slow', function(){ $(this).remove(); });              
                }
                else{
                    typeAlert('Error!', errorMsg, 'warning');
                }
            }
        });            
    });
});

$(document).on('click', '.order-code', function(e) {
    e.preventDefault();
    var img = $(this).data('src');
    var sub_total = '', vat_total ='', grand_total = '';
    $('.order-title').text('Order list of order code:' + $(this).text());
    $.ajax({
            url: baseUrl+'/order/ordered-product',
            data: {id:$(this).data('id')},
            type: 'POST',
            async: false,
            success: function (response) { 
                var data = $.parseJSON(response); 
                console.log(data);
                var ordered = '';
                if(data != false) {
                    for(var i = 0; i < data.length; i++) {
                        ordered +='<div class="row bordered">'+
                                    '<div class="col-md-12">'+
                                        '<div class="product-image-wrapper">'+
                                            '<div class="single-products">'+
                                                '<p><label>Product Name: </label><span>'+data[i].product_name+'</span></p>'+
                                                '<p><img src="'+img+data[i].server_name+'" alt="" width="110"></p>'+
                                                '<div class="ordered-product-list">'+
                                                    '<p><label>Quantity: </label><span>'+ data[i].quantity+'</span></p>'+
                                                    '<p><label>Price: </label><span>'+ numberFormat(data[i].price)+'</span></p>'+
                                                    '<p><label>Total: </label><span>'+ numberFormat(data[i].total)+'</span></p>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '</div>';
                            sub_total = numberFormat(data[i].sub_total);
                            vat_total = numberFormat(data[i].vat_total);
                            grand_total = numberFormat(data[i].grand_total);
                    }
                    ordered += '<div class="row">'+
                                    '<p><strong>Sub Total: </strong><span>'+sub_total+'</span></p>'+
                                    '<p><strong>vat Total: </strong><span>'+vat_total+'</span></p>'+
                                    '<p><strong>Grand Total: </strong><span>'+grand_total+'</span></p>'+
                                '</div>';
                    $('.order-body').html(ordered);
                }
                else{
                    typeAlert('Error!', errorMsg, 'warning');
                }
            }
        });           
});