$(function(){
    $('#navbtn, #actbtn').click(function(e) {

        if(e.target.id === 'navbtn') {
            if($('#dropnav').css('display') === 'none') {
                $('#dropnav').css('display', 'block');
            } else {
                $('#dropnav').css('display', 'none');
            }
        } else if(e.target.id === 'actbtn') {

            if($('#dropact').css('display') === 'none') {
                $('#dropact').css('display', 'block');
            } else {
                $('#dropact').css('display', 'none');
            }
        }
    });
});

$(function() {
    $('body').click(function(e) {
        if ($(e.target).closest('#navbtn').length === 0) {
            $('#dropnav').css('display', 'none');
        }
    });
});

$(function() {
    $('body').click(function(e) {
        if ($(e.target).closest('#actbtn').length === 0) {
            $('#dropact').css('display', 'none');
        }
    });
});