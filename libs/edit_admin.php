<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'core/database/ManageAdminUsers.php';
$pdo = new ManageAdminUsers();
$id = $_GET['id'];
$persons = $pdo->selectOne('admin_users', 'id', $id);

if (isset($_GET['success']) && empty($_GET['success'])) {
    $success = 'Admin Edited Successfully';
}

if ($_POST) {
    $email = htmlentities(strip_tags($_POST['user_email']));
    $role = htmlentities(strip_tags($_POST['role']));
    $password = htmlentities(strip_tags($_POST['password']));
    //$repassword = $_POST['repassword'];
    $check_availability = $pdo->CheckEmailExists('admin_users', $email);
    if ($check_availability == 0) {
        if (empty($password)) {
            //$password = md5($password);
            $edit = $pdo->UpdateValue('admin_users', ['email' => $email, 'role' => $role], 'id');
            if ($edit == 1) {
                header("Location: admin.view.php?success");
                exit();
            } else {
                $error = 'There was an Error';
            }
        } else {
            $password = md5($password);
            $edit = $pdo->UpdateValue('admin_users', ['email' => $email, 'role' => $role, 'password' => $password], 'id');
            if ($edit == 1) {
                header("Location: admin.view.php?success");
                exit();
            } else {
                $error = 'There was an Error';
            }
        }
    } else {
        foreach ($persons as $person) {
            //var_dump($person->email);
            if ($person->email == $email) {
                if (empty($password)) {
                    //$password = md5($password);
                    $edit2 = $pdo->UpdateValue('admin_users', ['email' => $email, 'role' => $role,'password' => $person->password], 'id');
                    var_dump($edit2);
                    if ($edit2 == 0) {
                        header("Location: admin.view.php?success");
                        exit();
                    } else {
                        $error = 'There was an Error1';
                    }
                } else {
                    $password = md5($password);
                    $edit3 = $pdo->UpdateValue('admin_users', ['email' => $email, 'role' => $role, 'password' => $password], 'id');
                    if ($edit3 == 1) {
                        header("Location: admin.view.php?success");
                        exit();
                    } else {
                        $error = 'Password already in use add new password';
                    }
                }
            } else {
                $emailError = "<span id='userEmail-info' class='info'> $email is already taken!  </span>"; //  not available
            }
        }
    }
}