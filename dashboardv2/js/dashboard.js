if (localStorage.country_code == 'ID') {
    $('#trialprice').html('[TRIAL] [Package: TRIAL Rp0.00]');
} else {
    $('#trialprice').html('[TRIAL] [Package: TRIAL $0.00]');
}
$('a.nav-link[href="billpayment.php"]').removeClass('active');
$('a.nav-link[href="index.php"]').addClass('active');
$('a.nav-link[href="usage.php"]').removeClass('active');
$('a.nav-link[href="support.php"]').removeClass('active');
$('a.nav-link[href="mailbox.php"]').removeClass('active');

function showHide() {
    var $pwd = $("#adminPass");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
        $('#showHide').removeClass('fa-eye-slash');
        $('#showHide').addClass('fa-eye');
    } else {
        $pwd.attr('type', 'password');
        $('#showHide').removeClass('fa-eye');
        $('#showHide').addClass('fa-eye-slash');
    }
}

/**
 * Show / Hide Input Type Confirm Password
 **/
function showHide2() {
    var $pwd = $("#newpass_priv");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
        $('#showHide2').removeClass('fa-eye-slash');
        $('#showHide2').addClass('fa-eye');
    } else {
        $pwd.attr('type', 'password');
        $('#showHide2').removeClass('fa-eye');
        $('#showHide2').addClass('fa-eye-slash');
    }
}

window.addEventListener('resize', function () {
    if ($(window).width() > 768) {
        $('#billing.card').css('height', $('#account.card').innerHeight());
    }
});

if ($(window).width() > 768) {
    $('#billing.card').css('height', $('#account.card').innerHeight());
}

$(document).ready(function () {

    var $rows = $('.monthly-bill');
    $('#search-bill').keyup(function() {

        var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
            reg = RegExp(val, 'i'),
            text;

        $rows.show().filter(function() {
            text = $(this).text().replace(/\s+/g, ' ');
            return !reg.test(text);
        }).hide();
    });

    $('#search-mbl').keyup(function() {

        var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
            reg = RegExp(val, 'i'),
            text;

        $rows.show().filter(function() {
            text = $(this).text().replace(/\s+/g, ' ');
            return !reg.test(text);
        }).hide();
    });

    if ($("#um_check").val() == 1) {
        $("#um_check").prop('checked', true);
    } else {
        $("#um_check").prop('checked', false);
    }

    if ($("#voip_check").val() == 1) {
        $("#voip_check").prop('checked', true);

    } else {
        $("#voip_check").prop('checked', false);
    }

    if ($("#ls_check").val() == 1) {
        $("#ls_check").prop('checked', true);
    } else {
        $("#ls_check").prop('checked', false);
    }

    if ($("#web_check").val() == 1) {
        $("#web_check").prop('checked', true);
    } else {
        $("#web_check").prop('checked', false);
    }

    $('#um_check').on('change', function () {
        this.value = this.checked ? 1 : 0;
    }).change();

    $('#voip_check').on('change', function () {
        this.value = this.checked ? 1 : 0;
    }).change();

    $('#ls_check').on('change', function () {
        this.value = this.checked ? 1 : 0;
    }).change();

    $('#web_check').on('change', function () {
        this.value = this.checked ? 1 : 0;
    }).change();

    var maven_uname = "Copy this username to replace maven username in the Qmera Lite app level build.gradle file.";
    var maven_pw = "Copy this password to replace maven password in the Qmera Lite app level build.gradle file.";
    var qmera_acc = "Copy this value to replace Qmera Account in MainActivity file";

    $(".credit-hint#maven-uname").attr("title", maven_uname);
    $(".credit-hint#maven-pass").attr("title", maven_pw);
    $(".credit-hint#qmera-acc").attr("title", qmera_acc);

    $(".credit-hint").tooltip({
        placement: 'right'
    });




    var services = $("#services").text();

    var res = services.replace("LS", "Live Streaming").replace("VC", "Video Call").replace("AC", "Audio Call").replace("UM", "Unified Messaging").replace("SS", "Screen Sharing").replace("WB", "Whiteboard").replace("CB", "Smart Features");

    $("#services").text(res);

   
});

function copyElementText() {
    var text = document.getElementById("apikey").innerText.trim();
    // console.log(text);
    var elem = document.createElement("textarea");
    document.body.appendChild(elem);
    elem.value = text;
    elem.select();
    document.execCommand("copy");
    document.body.removeChild(elem);
    $("#copied-acc").show();
    let timeout = setTimeout(function () {
        $("#copied-acc").hide();
    }, 3000);
    // $('#copyapi').attr('value', 'Copied').attr("disabled", "disabled");
}

function copyElementText2() {
    var text = document.getElementById("adminpass").innerText.trim();
    // console.log(text);
    var elem = document.createElement("textarea");
    document.body.appendChild(elem);
    elem.value = text;
    elem.select();
    document.execCommand("copy");
    document.body.removeChild(elem);
    $("#copied-int-pass").show();
    let timeout = setTimeout(function () {
        $("#copied-int-pass").hide();
    }, 3000);
    // $('#copyinternalpass').attr('value', 'Copied').attr("disabled", "disabled");
}

function copyElementText3() {
    var text = document.getElementById("maven_username").innerText.trim();
    // console.log(text);
    var elem = document.createElement("textarea");
    document.body.appendChild(elem);
    elem.value = text;
    elem.select();
    document.execCommand("copy");
    document.body.removeChild(elem);
    $("#copied-maven-uname").show();
    let timeout = setTimeout(function () {
        $("#copied-maven-uname").hide();
    }, 3000);
    // $('#copyusername').attr('value', 'Copied').attr("disabled", "disabled");
}

function copyElementText4() {
    var text = document.getElementById("maven_password").innerText.trim();
    // console.log(text);
    var elem = document.createElement("textarea");
    document.body.appendChild(elem);
    elem.value = text;
    elem.select();
    document.execCommand("copy");
    document.body.removeChild(elem);
    $("#copied-maven-pass").show();
    let timeout = setTimeout(function () {
        $("#copied-maven-pass").hide();
    }, 3000);
    // $('#copypassword').attr('value', 'Copied').attr("disabled", "disabled");
}



$('#new_supp_email').keyup(function () {
    var suppEmail = $("#new_supp_email").val();

    var regExEmail = /^[A-Z0-9._-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

    if (suppEmail.length > 0 && regExEmail.test(suppEmail)) {
        $("#emailWarning").hide();
        $("#submitSuppEmail").prop('disabled', false);
        // console.log('suppEmail: ' + support_email);
    } else {
        $("#emailWarning").show();
        $("#submitSuppEmail").prop('disabled', true);
        // console.log('suppEmail: ' + support_email);
    }
});

var invalidChar = /[\"'`´’‘;=-]/;

$('#companyname').keyup(function () {
    if (invalidChar.test($(this).val())) {
        $('#submitCompName').prop('disabled', true);
        $('#compNameWarning').show();
    } else {
        $('#submitCompName').prop('disabled', false);
        $('#compNameWarning').hide();
    }
});

$('#username').keyup(function () {
    if (invalidChar.test($(this).val())) {
        $('#submitUserName').prop('disabled', true);
        $('#userNameWarning').show();
    } else {
        $('#submitUserName').prop('disabled', false);
        $('#userNameWarning').hide();
    }
});

// admin pass
var pw_strength;
var pwValidChar = false;
var password = document.getElementById("adminPass");
password.addEventListener('keyup', function () {

    var pwd = password.value;

    if (pwd.length === 0) {
        document.getElementById("progresslabel").innerHTML = "";
        // document.getElementById("progress").value = "0";
        return;
    }

    var prog = [/[$@!%*#?&]/, /[A-Z]/, /[0-9]/, /[a-z]/]
        .reduce((memo, test) => memo + test.test(pwd), 0);

    var invalidChar = /[\"'`´’‘;=-]/;

    if (prog > 2 && pwd.length > 7) {
        prog++;
    }

    // Display it
    // var progress = "";
    var strength = "";
    switch (prog) {
        case 0:
        case 1:
            strength = "<span style='color: red;'>Strength: 25% - Weak</span>";
            pw_strength = 25;
            $('#passwarn').css('display', 'block');
            $('#submitAdmPass').prop('disabled', true);
            break;
        case 2:
            strength = "Strength: 50% - Medium";
            // progress = "50";
            pw_strength = 50;
            $('#passwarn').css('display', 'none');
            $('#submitAdmPass').prop('disabled', true);
            break;
        case 3:
        case 4:

            if (!invalidChar.test(pwd)) {
                strength = "Strength: 75% - Medium";
                // progress = "75";
                pw_strength = 75;
                $('#passwarn').css('display', 'none');
                $('#submitAdmPass').prop('disabled', false);
                $('#passForbiddenChar').css('display', 'none');
            } else {
                strength = "Strength: 75% - Medium";
                // progress = "75";
                pw_strength = 75;
                $('#passForbiddenChar').css('display', 'block');
                $('#submitAdmPass').prop('disabled', true);
            }
            break;
        case 5:

            if (!invalidChar.test(pwd)) {
                strength = "Strength: 100% - Strong";
                // progress = "100";
                pw_strength = 100;
                $('#passwarn').css('display', 'none');
                $('#submitAdmPass').prop('disabled', false);
                $('#passForbiddenChar').css('display', 'none');
            } else {
                strength = "Strength: 100% - Strong";
                // progress = "100";
                pw_strength = 100;
                $('#passForbiddenChar').css('display', 'block');
                $('#submitAdmPass').prop('disabled', true);
            }
            break;
    }
    document.getElementById("progresslabel").innerHTML = strength;
    // console.log("strength: " + pw_strength);
});

// int pass
var pw_strength_1;
var pwValidChar_1 = false;
var passwordInt = document.getElementById("newpass_priv");
passwordInt.addEventListener('keyup', function () {

    var pwd = passwordInt.value;

    if (pwd.length === 0) {
        document.getElementById("progresslabel2").innerHTML = "";
        // document.getElementById("progress2").value = "0";
        return;
    }

    var prog = [/[$@!%*#?&]/, /[A-Z]/, /[0-9]/, /[a-z]/]
        .reduce((memo, test) => memo + test.test(pwd), 0);

    var invalidChar = /[\"'`´’‘;=-]/;

    if (prog > 2 && pwd.length > 7) {
        prog++;
    }

    // Display it
    // var progress = "";
    var strength = "";
    switch (prog) {
        case 0:
        case 1:
            strength = "<span style='color: red;'>Strength: 25% - Weak</span>";
            pw_strength = 25;
            $('#passwarn2').css('display', 'block');
            $('#submitIntPass').prop('disabled', true);
            break;
        case 2:
            strength = "Strength: 50% - Medium";
            // progress = "50";
            pw_strength = 50;
            $('#passwarn2').css('display', 'none');
            $('#submitIntPass').prop('disabled', true);

            break;
        case 3:
        case 4:

            if (!invalidChar.test(pwd)) {
                strength = "Strength: 75% - Medium";
                // progress = "75";
                pw_strength = 75;
                $('#passwarn2').css('display', 'none');
                $('#submitIntPass').prop('disabled', false);
                $('#passForbiddenChar2').css('display', 'none');
            } else {
                strength = "Strength: 75% - Medium";
                // progress = "75";
                pw_strength = 75;
                $('#passForbiddenChar2').css('display', 'block');
                $('#submitIntPass').prop('disabled', true);
            }
            break;
        case 5:

            if (!invalidChar.test(pwd)) {
                strength = "Strength: 100% - Strong";
                // progress = "100";
                pw_strength = 100;
                $('#passwarn2').css('display', 'none');
                $('#submitIntPass').prop('disabled', false);
                $('#passForbiddenChar2').css('display', 'none');
            } else {
                strength = "Strength: 100% - Strong";
                // progress = "100";
                pw_strength = 100;
                $('#passForbiddenChar2').css('display', 'block');
                $('#submitIntPass').prop('disabled', true);
            }
            break;
    }
    document.getElementById("progresslabel2").innerHTML = strength;
    // console.log("strength: " + pw_strength);
});

$("#company_logo_first").change(function (e) {
    var file = e.target.files[0]; //FileList object
    var reader = new FileReader();

    new Compressor(file, {
        quality: 0.9,
        maxWidth: 640,
        maxHeight: 480,
        success(result) {
            // see preview of the compressed image
            var imageUrl = URL.createObjectURL(result);
            document.querySelector("#companyLogo_img").src = imageUrl;

            // //Read the image
            reader.readAsDataURL(result);
        },
        error(err) {
            // console.log(err.message);
        },
    });
    // reader.readAsDataURL(e.target.files[0]);
});



$("#company-logo").change(function (e) {
    var file = e.target.files[0]; //FileList object
    var picReader = new FileReader();

    var fileSize = $(this).get(0).files[0].size;
    // // console.log("img size: " + fileSize);

    // if file > 2 MB
    if (fileSize > 2097152) {
        alert("Please limit your file size to 2 MB or less.");
        // $("#uploadLogo").attr('disabled', 'true');
        $(this).val(null);
    } else {

        // $("#uploadLogo").attr('disabled', 'false');
        //Only pics
        if (!file.type.match('image'))
            return;

        // base64 the image
        picReader.addEventListener("load", function (event) {
            var picFile = event.target;
            var base64result = picFile.result.split(",")[1]

        });

        // compress the image
        new Compressor(file, {
            quality: 0.9,
            maxWidth: 640,
            maxHeight: 480,
            success(result) {
                // see preview of the compressed image
                var imageUrl = URL.createObjectURL(result);
                document.querySelector("#logo-preview").src = imageUrl;

                // //Read the image
                picReader.readAsDataURL(result);
            },
            error(err) {
                // console.log(err.message);
            },
        });
    }

});