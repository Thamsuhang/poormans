
if (action == 'create-administrator' || action == 'update-administrator' 
    || action == 'create-client'  || action == 'update-client') {

    createCKeditor('shipping_address');
    createCKeditor('billing_address');
    uploads('doc');
    removeFile();
}
users();