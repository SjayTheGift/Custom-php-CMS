<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginUsers
 *
 * @author dell notebook
 */

require 'core/database/ManageAdminUsers.php';
if (isset($_POST['login'])) {
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($username) && empty($password)) {
        $error = "All fields are requied";
    } else {
        $password = md5($password);
        $login_user = new ManageAdminUsers();
        $auth_user = $login_user->loginUsers($email, $password);
        if ($auth_user == 1) {
            $make_sessions = $login_user->GetUserInfo($email);
            foreach ($make_sessions as $userSessions) {
                $_SESSION['admin_name'] = $userSessions['email'];
                if (isset($_SESSION['admin_name'])) {
                    header("location: index.php");
                }
            }
        } else {
            $error = 'Invalid credetintials';
        }
    }
}