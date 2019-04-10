<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once ('libs/loginAdminUsers.php'); 
include_once 'libs/sessions.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Ngunifed</title>
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Ngunified Mag Dashboard</h3>
                    <strong>ND</strong>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Posts
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="create-post.view.php"><i class="glyphicon glyphicon-edit"></i>Create Post</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>View Posts</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i>
                            Users
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="create-admin.view.php"><i class="glyphicon glyphicon-edit"></i>Create Admin User</a></li>
                            <li><a href="user.view.php"><i class="glyphicon glyphicon-list-alt"></i>View User</a></li>
                            <li><a href="admin.view.php"><i class="glyphicon glyphicon-list-alt"></i>View Admin User</a></li>
                        </ul>
                    </li>
                </ul>

            </nav>
