// palang sign up
// $("#submit_sign_up").click(function(event) {
//     event.preventDefault();
//     $('#exampleModal').modal('show');
// });

// var clicks = 0;

// function subsClick() {
//     clicks += 1;
//     if (clicks == 7) {
//         // alert('go to subscription');
//         // trial works
//         $("#tosubscription").click();
//     }
// };

// palang trial
// $("#trial_sign_up").click(function(event) {
//     event.preventDefault();
//     $('#exampleModal2').modal('show');
// });

// var clicks2 = 0;

// function trialClick() {
//     clicks2 += 1;
//     if (clicks2 == 7) {
//         // alert('go to trial');
//         // trial works
//         $("#totrial").click();
//     }
// };

var email = false;
var emailNotExist = false;
var company = false;
var password123 = false;
var username = false;
var captcha = false;

$(document).ready(function () {
    $("#username").attr('autocomplete', 'off');
    $("#companyname").attr('autocomplete', 'off');
    $("#email").attr('autocomplete', 'off');
    $("#passwordTF").attr('autocomplete', 'off');
    $("#passwordTFconfirm").attr('autocomplete', 'off');
    $('#submit_sign_up').prop('disabled', true);
    $('#trial_sign_up').prop('disabled', true);
    $("#passwordTFconfirm").keyup(checkPasswordMatch);
    $('#passwordTF').keyup(function () {
        if ($(this).val()) {
            $('#passwordTFconfirm').val('');
        }
    });

    if (localStorage.lang == 1) {
        document.getElementsByName("username")[0].placeholder = "Nama Pengguna";
        document.getElementsByName("companyname")[0].placeholder = "Nama Perusahaan";
        document.getElementsByName("email")[0].placeholder = "Alamat Email";
        document.getElementsByName("pwd")[0].placeholder = "Kata Sandi";
        document.getElementsByName("pwdcheck")[0].placeholder = "Konfirmasi Kata Sandi";
        document.getElementById("submit_sign_up").value = "Daftar";
        document.getElementById("trial_sign_up").value = "Coba";
    } else if (localStorage.lang == 0) {
        document.getElementsByName("username")[0].placeholder = "Username";
        document.getElementsByName("companyname")[0].placeholder = "Company Name";
        document.getElementsByName("email")[0].placeholder = "Email";
        document.getElementsByName("pwd")[0].placeholder = "Password";
        document.getElementsByName("pwdcheck")[0].placeholder = "Confirm Password";
        document.getElementById("submit_sign_up").value = "Sign Up";
        document.getElementById("trial_sign_up").value = "Trial";
    }
});

$("input").on('change', doCheck);
$("#username").on('input', function () {
    checkEmptyUname();
    doCheck();
});
$("#companyname").on('input', function () {
    checkEmptyCompany();
    doCheck();
});
$("#passwordTFconfirm").on('input', function () {
    checkPasswordMatch();
    doCheck();
});
$("#passwordTFconfirm").on('blur', function () {
    checkExistingEmail();
    doCheck();
});
$("#passwordTF").on('input', function () {
    checkPasswordMatch();
    doCheck();
});
$("#email").on('input', function () {
    checkEmail();
    doCheck();
});
$("#email").blur(function () {
    console.log('email lose focus');
    checkExistingEmail();
    doCheck();
});

function recaptcha_callback() {

    captcha = true;

    function doCheck() {
        if (email == true && emailNotExist == true && company == true && password123 == true && username == true && pw_strength >= 50 && pwValidChar == true && captcha == true) {
            $('#submit_sign_up').prop('disabled', false);
            $('#trial_sign_up').prop('disabled', false);
        } else {
            $('#submit_sign_up').prop('disabled', true);
            $('#trial_sign_up').prop('disabled', true);
        }
        // alert("horray");
    }
    doCheck();
};

function doCheck() {
    if (email == true && emailNotExist == true && company == true && password123 == true && username == true && pw_strength >= 50 && pwValidChar == true && captcha == true) {
        let email_clean = DOMPurify.sanitize($("#email").val());
        let company_clean = DOMPurify.sanitize($("#companyname").val());
        let password_clean = DOMPurify.sanitize($("#passwordTF").val());
        let passwordconfirm_clean = DOMPurify.sanitize($("#passwordTFconfirm").val());
        let username_clean = DOMPurify.sanitize($("#username").val());

        $("#email").val(email_clean);
        $("#company").val(company_clean);
        $("#passwordTF").val(password_clean);
        $("#passwordTFconfirm").val(passwordconfirm_clean);
        $("#username").val(username_clean);

        $('#submit_sign_up').prop('disabled', false);
        $('#trial_sign_up').prop('disabled', false);
    } else {
        $('#submit_sign_up').prop('disabled', true);
        $('#trial_sign_up').prop('disabled', true);
    }
    // alert("horray");
}

function checkEmail() {
    var val = $("#email").val();

    var regExEmail = /^[A-Z0-9._-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

    if (regExEmail.test(val)) {
        if (val != "") {
            $("#alertEmail").hide();
            $("#alertExisting").hide();
            email = true;
        } else {
            $("#alertEmail").show();
            $("#alertExisting").hide();
            email = false;
        }
    } else {
        $("#alertEmail").show();
        $("#alertExisting").hide();
        email = false;
    }

}

function checkExistingEmail() {
    if (email == true) {

        var val = $("#email").val();

        var formData = {
            email: val,
        };

        $.ajax({
            type: 'POST',
            url: 'jsTargetTest.php',
            data: formData,
            encode: true,
            timeout: 1000,
            success: function (response, status, xhr) {
                console.log(response);
                if (response == 0) {
                    $("#alertExisting").text("This email is available.");
                    $("#alertExisting").addClass("text-success");
                    $("#alertExisting").removeClass("text-danger");
                    $("#alertExisting").show();
                    $("#alertEmail").hide();
                    emailNotExist = true;
                } else {
                    $("#alertExisting").text("This email has already been registered. Please use a different email");
                    $("#alertExisting").addClass("text-danger");
                    $("#alertExisting").removeClass("text-success");
                    $("#alertExisting").show();
                    $("#alertEmail").hide();
                    emailNotExist = false;
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
                alert('Please check your internet connection to make sure your email is available.');
            }
        });
    }
}

function checkEmptyUname() {

    var val = $('#username').val();

    var regExEmptyUname = /\S+/i;

    if (regExEmptyUname.test(val)) {

        $('#alertEmpty1').css('display', 'none');
        username = true;

    } else {

        $('#alertEmpty1').css('display', 'block');
        username = false;
    }
}

function checkEmptyCompany() {

    var val = $('#companyname').val();

    var regExEmpty = /\S+/i;

    if (regExEmpty.test(val)) {

        $('#alertEmpty2').css('display', 'none');
        company = true;
    } else {

        $('#alertEmpty2').css('display', 'block');
        company = false;
    }
}

function checkPasswordMatch() {
    var password = $("#passwordTF").val();
    var confirmPassword = $("#passwordTFconfirm").val();

    if (password != confirmPassword) {
        $("#alertPasswordMatch").css('display', 'block');
        // $('#submit_sign_up').prop('disabled',true);
        password123 = false;
    } else {
        $("#alertPasswordMatch").css('display', 'none');
        // $('#submit_sign_up').prop('disabled',false);
        password123 = true;
    }
}

var pw_strength;
var pwValidChar = false;
var password = document.getElementById("passwordTF");
password.addEventListener('keyup', function () {

    var pwd = password.value;

    if (pwd.length === 0) {
        document.getElementById("progresslabel").innerHTML = "";
        document.getElementById("progress").value = "0";
        return;
    }

    var prog = [/[$@!%*#?&]/, /[A-Z]/, /[0-9]/, /[a-z]/]
        .reduce((memo, test) => memo + test.test(pwd), 0);

    var invalidChar = /[\"'`´’‘;=-]/;

    if (invalidChar.test(pwd)) {
        $('#passForbiddenChar').css('display', 'block');
        pwValidChar = false;
    } else {
        $('#passForbiddenChar').css('display', 'none');
        pwValidChar = true;
    }

    if (prog > 2 && pwd.length > 7) {
        prog++;
    }

    // Display it
    var progress = "";
    var strength = "";
    switch (prog) {
        case 0:
        case 1:
            strength = "<span style='color: red;'>25% - Weak</span>";
            progress = "25";
            pw_strength = 25;
            $('#passwarn').css('display', 'block');
            break;
        case 2:
            strength = "50% - Medium";
            progress = "50";
            pw_strength = 50;
            $('#passwarn').css('display', 'none');
            break;
        case 3:
        case 4:
            strength = "75% - Medium";
            progress = "75";
            pw_strength = 75;
            $('#passwarn').css('display', 'none');
            break;
        case 5:
            strength = "100% - Strong";
            progress = "100";
            pw_strength = 100;
            $('#passwarn').css('display', 'none');
            break;
    }
    document.getElementById("progresslabel").innerHTML = strength;
    document.getElementById("progress").value = progress;
    console.log("strength: " + pw_strength);
});

/** sign up bottom */
/* <script type="text/javascript">
        

        $(document).ready(function() {
            <?php if ($_SESSION['geolocSts'] == 0 && $_SESSION['language'] == 1) { ?>
                $("#country_code").val('ID');
            <?php } else if ($_SESSION['geolocSts'] == 0 && $_SESSION['language'] == 0){ ?>
                $("#country_code").val('EN');
            <?php } else if ($_SESSION['geolocSts'] == 1){ ?>
                if (localStorage.country_code == 'ID') {
                    $("#country_code").val('ID');
                } else if (localStorage.country_code != 'ID') {
                    $("#country_code").val('EN');
                }
            <?php } ?>
        });

        
    </script>

    <?php if (!empty($msg)) : ?>
        <script type="text/javascript">
            $(document).ready(function() {

                $("#myModal").modal("show");
                checkEmptyUname();
                checkEmptyCompany();
                checkPasswordMatch();
                checkEmail();
                doCheck();
            });
        </script>
    <?php endif; ?> */

    // if (window.history.replaceState) {
    //     window.history.replaceState(null, null, window.location.href);
    // }