$(document).ready(function() {
    
    var form = $(".signup-form");
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

    submit.on('click', function(e){
      
        e.preventDefault();
        if(valid()){
        
            $.ajax({
                type: "post",
                url:  "../php/signup.php",
                data: {userName: userName.val(), password: password.val(), fName: fName.val(), lName: lName.val(), email: email.val()}
            }).done(function(data){
                $("#message").html(data);
            }).fail(function(jqXHR) {console.log("Error: " + jqXHR.status);});

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