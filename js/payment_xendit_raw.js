$(function () {
    transactionid = transaction_id.toString();
    var fileEnv = "production";

    if (fileEnv !== 'production') {
        Xendit._useIntegrationURL(true);
    }

    var $form = $('#credit-card-form');

    $form.submit(function (event) {

        event.preventDefault();

        $('#creditModalCenter').modal('show');

        // TEST MODE
        Xendit.setPublishableKey('xnd_public_development_QToOEG2Dx1gvrMjuOjwbWKcOttQTwjhPtjI3JYUMzv7mzAzRTmT9iHQonH12');

        // LIVE MODE
        // Xendit.setPublishableKey('xnd_public_production_qoec6uRBSVSb4n0WwIijVZgDJevwSZ5xKuxaTRh4YBix0nMSsKgxi226yxtTd7');

        // Disable the submit button to prevent repeated clicks:
        // $form.find('.submit').prop('disabled', true);

        // Request a token from Xendit:
        var tokenData = getTokenData();

        Xendit.card.createToken(tokenData, xenditResponseHandler);

        // Prevent the form from being submitted:
        return false;
    });

    function xenditResponseHandler(err, creditCardCharge) {
        // $form.find('.submit').prop('disabled', false);

        $('#creditModalCenter').modal('hide');

        if (err) {
            return displayError(err);
        }

        if (creditCardCharge.status === 'APPROVED' || creditCardCharge.status === 'VERIFIED') {
            displaySuccess(creditCardCharge);
        } else if (creditCardCharge.status === 'IN_REVIEW') {
            window.open(creditCardCharge.payer_authentication_url, 'sample-inline-frame');
            $('.overlay').show();
            $('#three-ds-container').show();
        } else if (creditCardCharge.status === 'FRAUD') {
            displayError(creditCardCharge);
        } else if (creditCardCharge.status === 'FAILED') {
            displayError(creditCardCharge);
        }
    }

    function displayError(err) {
        $('#three-ds-container').hide();
        $('.overlay').hide();
        alert('Request Credit Card Charge Failed');

    };

    function displaySuccess(creditCardCharge) {
        $('#three-ds-container').hide();
        $('.overlay').hide();
        $('#creditModalCenter').modal('show');
        var js = {
            company_id: company_id,
            transaction_id: transactionid,
            token_id: creditCardCharge["id"],
            amount: $form.find('#credit-card-amount').val(),
            cvv: $form.find('#credit-card-cvv').val()
        };
        $.post((typeof topup !== 'undefined') ? "xendit_creditcard_charge_topup.php" : "xendit_creditcard_charge.php",
            js, async function (data, status) {
                try {
                    console.log(data);
                    if (data.status == "CAPTURED") {
                        $('#creditModalCenter').modal('hide');
                        window.onbeforeunload = null;
                        localStorage.removeItem('in_checkout');
                        window.open("thankyou.php", "_self");
                    }
                    else {
                        $('#creditModalCenter').modal('hide');
                        alert("Credit card transaction failed");
                    }
                }
                catch (err) {
                    $('#creditModalCenter').modal('hide');
                    console.log(err);
                    alert("Error occured");
                }
            }, 'json'
        );
    }

    function getTokenData() {

        // expiry date
        var fields = $form.find('#credit-card-expiry-date').val().split('/');
        var month = fields[0];
        var year = fields[1];

        return {
            amount: $form.find('#credit-card-amount').val(),
            card_number: $form.find('#credit-card-number').val(),
            // card_exp_month: $form.find('#credit-card-exp-month').val(),
            // card_exp_year: $form.find('#credit-card-exp-year').val(),
            card_exp_month: month,
            card_exp_year: year,
            card_cvn: $form.find('#credit-card-cvv').val(),
            is_multiple_use: false,
            should_authenticate: true
        };
    }

    function getFraudData() {
        return JSON.parse($form.find('#meta-json').val());
    }
});