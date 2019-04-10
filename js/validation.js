/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function validateRegisterForm() {
    var valid = true;

    $(".info").html("");
    $(".input-field").css('border', '#e0dfdf 1px solid');
    var Username = $("#username").val();
    var FirstName = $("#firstname").val();
    var LastName = $("#lastname").val();
    var userEmail = $("#user_email").val();
    var role = $("#role").val();
    var password = $("#password").val();
    var repassword = $("#repassword").val();
    var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;


    if (Username == "") {
        $("#username-info").html("Required.");
        $("#username").css('border', '#e66262 1px solid');
        valid = false;
    }
    if (FirstName.length < 3) {
        $("#firstname-info").html("Name to short, must be atleast 3 characters long");
        $("#firstname").css('border', '#e66262 1px solid');
        valid = false;
    }
    if (LastName.length < 3) {
        $("#lastname-info").html("LastName to short, must be atleast 3 characters long");
        $("#lastname").css('border', '#e66262 1px solid');
        valid = false;
    }

    if (userEmail == "") {
        $("#userEmail-info").html("Required.");
        $("#user_email").css('border', '#e66262 1px solid');
        valid = false;
    } else if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        $("#userEmail-info").html("Invalid Email Address.");
        $("#email").css('border', '#e66262 1px solid');
        valid = false;
    }

    if (role == "") {
        $("#role-info").html("Required.");
        $("#role").css('border', '#e66262 1px solid');
        valid = false;
    }


    if (password == "") {
        $("#password-info").html("Required.");
        $("#password").css('border', '#e66262 1px solid');
        valid = false;
    } else if (password.search(/[a-z]/i) < 0) {
        $("#password-info").html("Your password must contain at least one letter.");
        $("#password").css('border', '#e66262 1px solid');
        valid = false;
    } else if (password.search(/[0-9]/) < 0) {
        $("#password-info").html("Your password must contain at least one digit.");
        $("#password").css('border', '#e66262 1px solid');
        valid = false;
    } else if (password.search(/[!@#$%^&*]/) < 0) {
        $("#password-info").html("Your password must contain at least one Special Character.");
        $("#password").css('border', '#e66262 1px solid');
        valid = false;
    }


    else if (password.length < 6) {
        $("#password-info").html("Password to short, must be atleast 6 characters long");
        $("#password").css('border', '#e66262 1px solid');
        valid = false;
    }



    if (repassword == "") {
        $("#repassword-info").html("Required.");
        $("#repassword").css('border', '#e66262 1px solid');
        valid = false;
    }
    if (repassword != password) {
        $("#password-info").html("Password do not match.");
        $("#repassword-info").html("Password do not match.");
        $("#password").css('border', '#e66262 1px solid');
        $("#repassword").css('border', '#e66262 1px solid');
        valid = false;
    }



    return valid;
}

function checkemailAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data: 'user_email=' + $("#user_email").val(),
        type: "POST",
        success: function (data) {

            if (data) {
                $("#userEmail-info").html(data);
            }

        },
        error: function () {
        }
    });
}

function checkUserEmail() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_user_availability.php",
        data: 'user_email=' + $("#user_email").val(),
        type: "POST",
        success: function (data) {

            if (data) {
                $("#userEmail-info").html(data);
            }

        },
        error: function () {
        }
    });
}