<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ($_POST) {
    require 'core/database/ManageAdminUsers.php';
    $users = new ManageAdminUsers();

    $email = htmlentities(strip_tags($_POST['user_email']));
    $role = htmlentities(strip_tags($_POST['role']));
    $password = htmlentities(strip_tags($_POST['password']));
    //$repassword = $_POST['repassword'];

    $check_availability = $users->CheckEmailExists($email);


    if ($check_availability == 0) {
        $password = md5($password);
        $register_user = $users->Insert('admin_users', [
            'email' => $email,
            'role' => $role,
            'password' => $password
        ]);

        if ($register_user == 1) {
            header("Location: create-admin.view.php?success");
            exit();
        } else {
            $error = 'There was an Error';
        }
    } else {
        $error = "<span id='userEmail-info' class='info'> $email is already taken!  </span>"; //  not available
    }
}

