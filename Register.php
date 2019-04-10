<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
if (isset($_POST['register'])) {
    include_once ('core/database/ManageUsers.php');
    $users = new ManageUsers();

    $firstname = $_POST['FirstName'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $repassword = $_POST['repassword'];

    if (empty($username) || empty($email) || empty($password) || empty($repassword)) {
        $error = 'All fields are required';
    } elseif ($password != $repassword) {
        $error = 'Passwords do not match';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email is invalid';
    } elseif (strlen($password) < 6) {
        $error ='password to short';
    } elseif(strlen($username) < 6){
        $error = 'username should be atleast 6 characters long';
    }else {
        $check_availability = $users->GetUserInfo($username);

        if ($check_availability == 0) {
             $password = md5($password);
            $register_user = $users->registerUsers($firstname,$username,$email,$password);
            if ($register_user == 1) {
                $make_sessions = $users->GetUserInfo($username);
                foreach ($make_sessions as $userSessions) {
                     $_SESSION['admin_name'] = $userSessions['Username'];
                    if (isset($_SESSION['admin_name'])) {
                        header("location: index.php");
                    }
                }
            }
        } else {
            $error = 'Username or Email already in use';
        }
    }
}

?>
<html lang="en">
    <head>
        <!-- Theme Made By www.w3schools.com - No Copyright -->
        <title>Jonas Crud System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link rel="stylesheet" href="css/custom.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            .btn-success {
                color: #fff;
                background-color: #bcd727 !important;
                border-color: #bcd727;
            }
            .cal{
                color: #bcd727 !important;
            }

        </style>


    </head>
    <body>
        <div id="mainWrapper">
           <br/><br/><br/>
            <div class="container">


                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6">
                      <div class="register_form">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Register Here</h3>
                                </div>

                                <div class="panel-body">
                                    <?php
                                    if (isset($error)) {
                                        echo '<div class="alert-danger">' . $error . '</div><br/>';
                                    }
                                    ?>

                                    <form method="post" id="form" action="Register.php" role="form">
                                        <div class="form-group">
                                            <label for="FirstName">First Name</label>
                                            <input type="text" name="FirstName" class="form-control" id="username" placeholder="Enter Username"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Username">Username</label>
                                            <input type="text" name="Username" class="form-control" id="username" placeholder="Enter Username"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="email" name="Email" class="form-control" id="email" placeholder="Enter Email"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="password" name="Password" class="form-control" id="password" placeholder="Enter Password"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password Again</label>
                                            <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Enter Password Again"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Register" name="register" class="form-control btn btn-success" id="register"/>
                                        </div>
                                        <p><a href="login.php" id="show_login">Already have an account ?</a></p>
                                    </form>
                                </div>
                            </div>
                        </div><!--end register_form-->
                    </div>
                </div>
            </div><!--End Container-->
        </div><!--End mainWrapper-->
    </body>
</html>