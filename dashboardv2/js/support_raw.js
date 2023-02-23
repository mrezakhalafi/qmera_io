$(document).ready(function() {

    $('.carousel').carousel('pause');
    // var rows = document.getElementsByClassName('monthly-bill');
    // var row_array = toArray(rows);
    // chunks(row_array, 3);
    // $("#chatbot").prop("disabled", true);
    $("#chatbot").click(function(event) {
        event.preventDefault();
    });

    var tickets = document.getElementsByClassName('monthly-bill');
    if (tickets.length != 0) {
        $('#no-tickets').css('display', 'none');
    }
});

var titleChar = false;
var invalidChar = /[\"'`´’‘;=-]/;

$('#ticketTitle').keyup(function() {
    
    if (invalidChar.test($(this).val())) {
        $('#submit-ticket').prop('disabled', true);
        $('#forbiddenChar').show();
        console.log('ada char');
        titleChar = false;
    } else {
        $('#submit-ticket').prop('disabled', false);
        $('#forbiddenChar').hide();
        titleChar = true;
    }
});

var detailChar = false;

$('#ticketDetail').keyup(function() {

    if (invalidChar.test($(this).val())) {
        $('#submit-ticket').prop('disabled', true);
        $('#forbiddenChar').show();
        console.log('ada char');
        detailChar = false;
    } else {
        $('#submit-ticket').prop('disabled', false);
        $('#forbiddenChar').hide();
        detailChar = true;
    }
});



var $rows = $('.monthly-bill');
$('#search-ticket').keyup(function() {

    var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
        reg = RegExp(val, 'i'),
        text;

    $rows.show().filter(function() {
        text = $(this).text().replace(/\s+/g, ' ');
        return !reg.test(text);
    }).hide();
});

$('#search-ticket').keyup(function() {

    var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
        reg = RegExp(val, 'i'),
        text;

    $rows.show().filter(function() {
        text = $(this).text().replace(/\s+/g, ' ');
        return !reg.test(text);
    }).hide();
});

function validateForm() {
    //get all form elements
    var summary = document.getElementsByName('summary');
    var radios = document.getElementsByName('method');
}

function checkFunction(elem) {
    if (elem.checked) {
        service_length = document.querySelectorAll('input[type="checkbox"]:checked').length;
        // console.log(service_length);
        if (service_length == 0) {
            alert("You must check at least one checkbox.");
            $("#selectall").prop("checked", true);
            return false;
        }
    } else {
        service_length = document.querySelectorAll('input[type="checkbox"]:checked').length;
        // console.log(service_length);
        if (service_length == 0) {
            alert("You must check at least one checkbox.");
            $("#selectall").prop("checked", true);
            return false;
        }
    }
}


// script paling bawah
$('a.nav-link[href="billpayment.php"]').removeClass('active');
$('a.nav-link[href="index.php"]').removeClass('active');
$('a.nav-link[href="usage.php"]').removeClass('active');
$('a.nav-link[href="support.php"]').addClass('active');
$('a.nav-link[href="mailbox.php"]').removeClass('active');