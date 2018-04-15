$( document ).ready(function() {
    $('#connectUser').hide();
    $('#connectOrg').hide();
    $('#signupOrg').hide();
    $('#signupbtn').hide();
    $('#usrswitchbtn').hide();
    
    $('#orgswitchbtn').click(function() {
        if($('#connectUser').css('display') == 'none') {
            $('#signupUser').hide();
            $('#signupOrg').show();
        }
        else {
           $('#connectUser').hide();
           $('#connectOrg').show();
        }
    });

    console.log( "ready!" );
});
