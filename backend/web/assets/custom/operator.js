
if (action == 'edit-profile') {
    createCKeditor('shipping_address');
    createCKeditor('billing_address');
    uploads('doc');
    removeFile();
}
else if (action == 'change-profile-picture') {
    uploads('profile');
}

users();