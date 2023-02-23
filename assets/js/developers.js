$('.to-option-2').click(function(e) {
    e.preventDefault();
    $('#main-activity-1').css('display', 'none');
    $('#main-activity-2').css('display', 'block');
    $('#link-tab-5fb2').text('MainActivity.java (Option 2)');
})

$('.to-option-1').click(function(e) {
    e.preventDefault();
    $('#main-activity-1').css('display', 'block');
    $('#main-activity-2').css('display', 'none');
    $('#link-tab-5fb2').text('MainActivity.java (Option 1)');
})