<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
include_once ('libs/loginAdminUsers.php');
include 'includes/login_header.php';

?>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('dist/img/bg-01.jpg');">
            <div class="wrap-login100">
                <form method="Post" action="admin_login.php" class="login100-form validate-form">
                    <span class="login100-form-logo">
                        <img src="dist/img/logo.png" style="width: 100px"/>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span>
                    <?php
                    if (isset($error)) {
                        echo '<div class="alert-danger">' . $error . '</div><br/>';
                    }
                    ?>
                      

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input class="input100" type="email" name="email" placeholder="email">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="login">
                            Login
                        </button>
                        
                    </div>

                    <div class="text-center p-t-30">
                        <a class="txt1" href="#">
                            Forgot Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>