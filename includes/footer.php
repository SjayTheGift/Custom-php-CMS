<footer class="main-footer">
    <strong>COPYRIGHT &copy; NGUNIFIED STUDIO <i class="ion-heart"></i> Ngunified.co.za</a>.</strong> 2019. ALL RIGHT RESERVED.
</footer>
</div>
</div>






<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
            function validateRegisterForm() {
                var valid = true;

                $(".info").html("");
                $(".input-field").css('border', '#e0dfdf 1px solid');
                var userEmail = $("#user_email").val();
                var role = $("#role").val();
                var password = $("#password").val();
                var repassword = $("#repassword").val();
                //var password2 = $("#password-1").val();
                //var repassword2 = $("#re-password").val();
                //var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;


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


                if (password != "") {
                    if (password.search(/[a-z]/i) < 0) {
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

                    } else if (password.length < 6) {
                        $("#password-info").html("Password to short, must be atleast 6 characters long");
                        $("#password").css('border', '#e66262 1px solid');
                        valid = false;
                    }
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

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>
</html>



