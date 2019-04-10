<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Database connection info
require 'core/database/QueryBuilder.php';
$pdo = new QueryBuilder();



$pages  = $pdo->get_pagination_number();


if (isset($_GET['search'])) {
  $person = $pdo->selectAllPagination('admin_users');
  $persons =  $pdo->searchData('admin_users', $_GET['search']);
}
?>

<script type="text/javascript" src="js/delete.js"></script>