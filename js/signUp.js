$(document).ready(function() {

    var userName = $("#userName");
    var password = $("#password");
    var confirmPassword = $("#confirmPassword");
    var fName = $("#fName");
    var lName = $("#lName");
    var email = $("#email");
    var submit = $("#signUp-btn");

    var elements = [userName, password, fName, lName, email, confirmPassword];
    // remove red highlighting once input changed
    $.each(elements, function() {
        $(this).on('change', function(){
            if($(this).hasClass("error")){
                $(this).removeClass("error");
            }
        })
    });
    // when attempting submit makes sure data is valid then sends async request to php to attempt to sign user up
    submit.on('click', function(e){
        e.preventDefault();
        if(valid()){
            $.ajax({
                type: "post",
                url:  "../php/signUp.php",
                data: {userName: userName.val(), password: password.val(), fName: fName.val(), lName: lName.val(), email: email.val()}
            }).done(function(data){
                if(data == "success"){
                    // submit form which will redirect to index.phps
                    // will only work on local machine
                    window.location.replace("http://localhost/Group32ProjectCosc360/index.php");
                  }
                //returns message if not sucessful
                $("#message").html(data);
            }).fail(function(jqXHR) {
                // if ajax request fails, display error
                console.log("Error: " + jqXHR.status);});
        }
    });

    // make sure fields are not empty highlights them red if they are
    function valid(){
        var valid = true;
        for(i = 0; i < elements.length; i++ ){
            // if empty string highlight red
            if(!elements[i].val()){
                elements[i].addClass("error");
                valid = false;
                $("#message").html("All fields must be filled!");
            }
        }
        // make sure passwods match
        if(password.val() != confirmPassword.val()){
            $("#message").html("Passwords must must match!")
            valid = false
        }
        return valid;
    }
});
