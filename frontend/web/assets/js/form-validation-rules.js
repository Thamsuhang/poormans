$.validator.addMethod("required", $.validator.methods.required, "Please enter a value");
$.validator.addMethod("select", $.validator.methods.required, "Please select a value");
$.validator.addMethod("email", $.validator.methods.email, "Please enter proper email");
$.validator.addMethod("url", $.validator.methods.url, "Please enter proper URL");
$.validator.addMethod("confirm", $.validator.methods.required, "Please Confirm");
$.validator.addMethod("checkUser", $.validator.methods.remote, "Username is already taken. ");


$.validator.addClassRules({
    'required': {
        required: true
    },
    'required-select': {
        select: true
    },
    'required-email': {
        required: true,
        email: true
    },
    'required-url': {
        required: true,
        url: true
    },

    "required-confirm": {
        confirm: true
    },
    "required-password": {
        required: true,
        minlength: 4
    },
    "password_again": {
        required: true,
        equalTo: "#password"
    },
    "check-username": {
        checkUser: $baseUrl + '/site/check-user-username'
    }
});

