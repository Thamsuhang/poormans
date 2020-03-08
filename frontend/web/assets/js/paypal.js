paypal.Button.render({
    // env: 'production',
    env: 'sandbox',
    commit: true,

    client: {
        sandbox: 'AX_vo2yyQavSfgq9IqrO7-7XuDEWUFJQrWBDVPQzDzVf47L8HdTlg3phKx5o7KzZvXDlpSTGXoFd_ZYu',
        production: '<?php echo PayPal_CLIENT_ID; ?>'
    },

    payment: function (data, actions) {

        return actions.payment.create({
            payment: {
                transactions: [
                    {
                        amount: {
                            total: $total,
                            currency: 'USD'
                        }
                    }
                ]
            }
        });
    },

    onAuthorize: function (data, actions) {

        return actions.payment.execute().then(function () {
            window.location = "<?php echo APP_URL ?>" + "execute-payment.php?payment_id=" + data.paymentID + "&payer_id=" + data.payerID + "&token=" + data.paymentToken;
        });
    }
}, '#paypal-button');
