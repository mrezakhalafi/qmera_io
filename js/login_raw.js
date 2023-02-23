$(document).ready(function() {
    $("#emailTF").attr('autocomplete', 'off');
    $("#passwordTF").attr('autocomplete', 'off');
});

$("#emailTF").on('input', function() {
    checkEmail();
});

if (localStorage.lang == 1) {
    document.getElementById("emailTF").placeholder = "Alamat Email";
}
$('#loginForm').submit(function(e) {
    e.preventDefault();
    var email = DOMPurify.sanitize($('#emailTF').val());
    var pass = DOMPurify.sanitize($('#passwordTF').val());
    // alert(email+pass);
    goLogin(email, pass);
});

function checkEmail() {

    var val = $('#emailTF').val();

    var regExEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

    if (regExEmail.test(val)) {

        $('#alertEmail').css('display', 'none');

    } else {

        $('#alertEmail').css('display', 'block');

    }

}

function goLogin(email, password) {
    $.ajax({
        dataType: 'json',
        url: 'checkEmail.php?email=' + email + '&password=' + password,
        type: 'GET',
        success: function(data) {
            // alert(data.response);

            if (data.response == "You already logged in with another account!") {
                alert(data.response);
                window.location.href = "dashboardv2/";
            } else if (data.response == "ok") {
                window.location.replace('dashboardv2/');
            } else if (data.response == "Please Validate Your Email!") {
                window.location.replace('verifyemail.php');
            } else if (data.response == "Please Finish Your Payment!") {
                window.location.replace('paycheckout.php');
            } else if (data.response == "Trial!") {
                window.location.replace('trialcheckout.php');
            } else if (data.response == "expired") {
                alert('Your account has expired. Please subscribe if you would like to continue.');
                window.location.href = 'dashboardv2/';
            } else if (data.response == "Your Password is Incorrect!") {
                $("#myModal").modal("show");
            } else {
                $("#myModal2").modal("show");
            }

        },
        error: function(xhr, status, error) {
            console.log(error);
            $("#myModal").modal("show");
        }
    });
}

/** success/error msg */
// $(document).ready(function() {
//     $("#myModal").modal("show");
// });