<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(0);
session_start();
if (isset($_SESSION['admin_name'])) {
    $session_name = $_SESSION['admin_name'];
}else{
     header("location: admin_login.php");
}
 
