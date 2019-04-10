<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'core/database/ManageAdminUsers.php';
$pdo = new ManageAdminUsers();
$id = $_GET['UserID'];
$persons = $pdo->selectOne('users', 'UserID', $id);

if (isset($_GET['success']) && empty($_GET['success'])) {
    $success = 'User Edited Successfully';
}

if ($_POST) {
    
    $firstname = htmlentities(strip_tags($_POST['FirstName']));
    $lastname = htmlentities(strip_tags($_POST['LastName']));
    $username = htmlentities(strip_tags($_POST['Username']));
    $email = htmlentities(strip_tags($_POST['user_email']));
    //$repassword = $_POST['repassword'];
    $check_availability = $pdo->CheckEmailExists('users',$email);
    if ($check_availability == 0) {
        $password = md5($password);
        $edit = $pdo->UpdateValue('users', ['FirstName' => $firstname,'LastName' => $lastname,'Username' => $username,'Email' => $email ], 'UserID');
        if ($edit == 1) {
            header("Location: admin.view.php?success");
            exit();
        } else {
            $error = 'There was an Error';
        }
    } else {
        foreach ($persons as $person) {
            //var_dump($person->email);
            if ($person->email == $email) {
                
                $password = md5($password);
                $edit2 = $pdo->UpdateValue('users', ['FirstName' => $firstname,'LastName' => $lastname,'Username' => $username,'Email' => $email ], 'UserID');
                if ($edit2 == 1) {
                    header("Location: admin.view.php?success");
                    exit();
                }
                
            } else {
                 $error = "<span id='userEmail-info' class='info'> $email is already taken!  </span>"; //  not available
            }
        }
    }
}