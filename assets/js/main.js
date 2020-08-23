$(document).ready(function () {
 $(document).on( 'submit', '#register-form', function(e){
        e.preventDefault();

        $("#register-status").html(
            '<div class="alert alert alert-info">Please wait!</div>'
        );
        $(this).hide();

        var form                            =   {
            _wpnonce:                           $("#_wpnonce").val(),
            action:                             "r_create_account",
            name:                               $("#register-form-name").val(),
            username:                           $("#register-form-username").val(),
            email:                              $("#register-form-email").val(),
            pass:                               $("#register-form-password").val(),
            confirm_pass:                       $("#register-form-repassword").val()
        };

        $.post( recipe_obj.ajax_url, form ).always(function(data){
            if( data.status == 2 ){
                $("#register-status").html(
                    '<div class="alert alert-success">Account created!</div>'
                );
                // create user and then login the user using login.php which processes the ajax request
                // once logged in we send the user to the homepage 
                location.href               =   recipe_obj.home_url;
            }else{
                $("#register-status").html(
                    '<div class="alert alert-danger">Unable to create an account.</div>'
                );
                $("#register-form").show();
            }
        });
    });

    $(document).on( 'submit', '#login-form', function(e){
        e.preventDefault();

        $("#login-status").html('<div class="alert alert-info">Please wait while we log you in.</div>');
        $(this).hide();

        var form                                    =   {
            _wpnonce:                                   $("#_wpnonce").val(),
            action:                                     "r_user_login",
            username:                                   $("#login-form-username").val(),
            pass:                                       $("#login-form-password").val()
        };

        $.post( recipe_obj.ajax_url, form ).always(function(data){
            if( data.status == 2 ){
                $("#login-status").html('<div class="alert alert-success">Success!</div>');
                location.href                       =   recipe_obj.home_url;
            }else{
                $("#login-status").html(
                    '<div class="alert alert-danger">Unable to login.</div>'
                );
                $("#login-form").show();
            }
        });
    });
});



