$( document ).ready(function() {
    $('#loginUsr').hide();
    $('#loginOrg').hide();
    $('#signupOrg').hide();
    $('#signupbtn').hide();
    $('#usrswitchbtn').hide();
    
    $('#loginbtn').click(function() {
            $('#loginbtn').hide();
            $('#signupbtn').show();
        if($('#signupOrg').css('display') == 'none') {
            alert('hide usr signup');
            $('#signupUsr').hide();
            $('#loginUsr').show();
        }
        else {
           $('#signupOrg').hide();
           $('#loginOrg').show();
        }
    });
    $('#signupbtn').click(function() {
            $('#signupbtn').hide();
            $('#loginbtn').show();
        if($('#loginOrg').css('display') == 'none') {
            $('#loginUsr').hide();
            $('#signupUsr').show();
        }
        else {
           $('#signupOrg').show();
           $('#loginOrg').hide();
        }
    });
    $('#usrswitchbtn').click(function() {
            $('#usrswitchbtn').hide();
            $('#orgswitchbtn').show();
        if($('#loginOrg').css('display') == 'none') {
            $('#signupOrg').hide();
            $('#signupUsr').show();
        }
        else {
           $('#loginOrg').hide();
           $('#loginUsr').show();
        }
    });
    $('#orgswitchbtn').click(function() {
            $('#orgswitchbtn').hide();
            $('#usrswitchbtn').show();
        if($('#loginUsr').css('display') == 'none') {
            $('#signupUsr').hide();
            $('#signupOrg').show();
        }
        else {
           $('#loginUsr').hide();
           $('#loginOrg').show();
        }
    });

    console.log( "ready!" );
});
