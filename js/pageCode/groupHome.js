var name;

// $(function(){
//     //alert( getGroup());
// });

$(".who-btn").click(function() {
    name = $(this).html();
    var userID = $(this).attr("userID");
    var groupCode = $(this).attr("groupCode");


    // set the action's id to the userid
    $("#registerForm").attr("action", "../func/handleSetDetails.php?id=" + userID + "&groupCode=" + groupCode);
    $("#loginForm").attr("action", "../func/handleUserLogin.php?id=" + userID + "&groupCode=" + groupCode);

    $('.modal-title').each(function() {
        var firstName;
        if(name.indexOf(' ')!=-1) {
            firstName = name.substr(0, name.indexOf(' '));
        } else {
            firstName = name;
        }

        // just get their first name
        $(this).html("Hey, " + firstName);
    });
});