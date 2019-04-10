<?php

require 'core/database/ManageAdminUsers.php';

$users = new ManageAdminUsers();
$email = htmlentities(strip_tags($_POST['user_email']));
$check_availability = $users->checkAvalibility('admin_users',$email);

    
?>
