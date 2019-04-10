<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegisterUser
 *
 * @author ejonas
 */
if (isset($_POST['register'])) {
    require 'core/database/ManageUsers.php';
    $users = new ManageUsers();
    
    $firstname = $_POST['firstname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$%^&]).*$/";
    //$ip_address = $_SERVER['REMOTE_ADDR'];

    if (empty($firstname)|| empty($username) || empty($email) || empty($password) || empty($repassword)) {
        $error = 'All fields are required';
    } elseif ($password != $repassword) {
        $error = 'Passwords do not match';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email is invalid';
    } elseif (strlen($password) < 6) {
        $error ='Password to short';
    }  elseif(strlen($username) < 3){
        $error = 'Username should be atleast 3 characters long';
    }elseif(strlen($firstname) < 3){
        $error = 'Firstname should be atleast 3 characters long';
    }else {
        $check_availability = $users->GetUserInfo($username,$email);

        if ($check_availability == 0) {
             $password = md5($password);
            $register_user = $users->registerUsers($firstname,$username, $email, $password);
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