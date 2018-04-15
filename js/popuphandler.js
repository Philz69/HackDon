$( document ).ready(function() {
    $("#usrswitchbtn").livequery(function(){
    $('#connectUser').hide();
    $('#connectOrg').hide();
    $('#signupOrg').hide();
    $('#signupbtn').hide();
    $('#usrswitchbtn').hide();

    $('#loginbtn').click(function() {
            $('#loginbtn').hide();
            $('#signupbtn').show();
        if($('#signupOrg').css('display') == 'none') {
            $('#signupUser').hide();
            $('#connectUser').show();
        }
        else {
           $('#signupOrg').hide();
           $('#connectOrg').show();
        }
    });
    $('#signupbtn').click(function() {
            $('#signupbtn').hide();
            $('#loginbtn').show();
        if($('#connectOrg').css('display') == 'none') {
            $('#connectUser').hide();
            $('#signupUser').show();
        }
        else {
           $('#signupOrg').show();
           $('#connectOrg').hide();
        }
    });
    $('#usrswitchbtn').click(function() {
            $('#usrswitchbtn').hide();
            $('#orgswitchbtn').show();
        if($('#connectOrg').css('display') == 'none') {
            $('#signupOrg').hide();
            $('#signupUser').show();
        }
        else {
           $('#connectOrg').hide();
           $('#connectUser').show();
        }
    });
    $('#orgswitchbtn').click(function() {
            $('#orgswitchbtn').hide();
            $('#usrswitchbtn').show();
        if($('#connectUser').css('display') == 'none') {
            $('#signupUser').hide();
            $('#signupOrg').show();
        }
        else {
           $('#connectUser').hide();
           $('#connectOrg').show();
        }
    });

});


});
