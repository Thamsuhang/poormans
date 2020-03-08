!function (document, window, $) {
    "use strict";
    var Site = window.Site;
    $(document).ready(function ($) {
        Site.run()
    }),
        function () {
            var account, directory;
            $("#AccountForm").formValidation({
                framework: "bootstrap",
                fields: {
                    username: {
                        validators: {
                            notEmpty: {message: "Username is required"},
                            stringLength: {
                                min: 4,
                                message: "The username must be more than 4 characters."
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: "The username can only consist of alphabetical, number, dot and underscore"
                            },
                            remote: {
                                url: baseUrl + '/setup/check-user',
                                type: 'POST',
                                message: "This username is already taken."
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {message: "Email is required"},
                            emailAddress: {
                                message: 'Enter a valid email address.'
                            }

                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {message: "Password is required"},
                            different: {field: "username", message: "The password cannot be the same as username."}
                        }
                    },
                    repassword: {
                        validators: {
                            identical: {
                                field: 'password',
                                message: 'The password and its confirm are not the same.'
                            }

                        }
                    }
                }
            }),
                $("#DirectoryForm").formValidation({
                    framework: "bootstrap",
                    fields: {
                        businessname: {validators: {notEmpty: {message: "Enter business name."}}},
                        package: {validators: {notEmpty: {message: "Select a Package."}}},
                        status: {validators: {notEmpty: {message: "Select a status."}}}

                    }
                });
            var defaults = $.components.getDefaults("wizard"), options = $.extend(!0, {}, defaults, {buttonsAppendTo: ".panel-body"}), wizard = $("#WizardForm").wizard(options).data("wizard");
            wizard.get("#Account").setValidator(function () {
                var fv = $("#AccountForm").data("formValidation");
                account = $("#AccountForm").serialize();
                return fv.validate(), fv.isValid() ? !0 : !1
            }), wizard.get("#Directory").setValidator(function () {
                var fv = $("#DirectoryForm").data("formValidation");
                directory = $('#DirectoryForm').serialize();
                return fv.validate(), fv.isValid() ? !0 : !1
            });

            // console.log(directory);
            $('[data-wizard="finish"]').click(function () {
                account = $('#AccountForm').serialize();
                directory = $('#DirectoryForm').serialize();
                $.ajax({
                    url: baseUrl + "/setup/new-setup",
                    type: 'post',
                    data: {
                        account: account,
                        directory: directory
                    },
                    success: function (data) {
                        if (data == 'true') {
                            typeAlert('Success', 'New User has been created', 'success');
                        } else {
                            typeAlert('Error', 'Sorry, New user could not be created.', 'error');
                        }
                    },
                    error: function () {
                        typeAlert('Error', 'Sorry, New user could not be created.', 'error');
                    }
                });
            });
        }()


}(document, window, jQuery);