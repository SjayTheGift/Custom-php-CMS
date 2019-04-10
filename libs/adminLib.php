<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'core/database/QueryBuilder.php';
$pdo = new QueryBuilder();

$persons = $pdo->selectAllPagination('admin_users');

$pages  = $pdo->get_pagination_number();

$page = 1;

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

if (isset($_GET['success']) && empty($_GET['success'])) {
    $success = 'Edited Successfully';
}

if (isset($_GET['delete']) && empty($_GET['delete'])) {
    $success = 'Admin Deleted Successfully';
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = $pdo->DeleteRow('admin_users', 'id', $id);

    if ($delete == 1) {
        $success = 'Deleted Successfully';
        header("Location: admin.view.php?delete");
    }
}
