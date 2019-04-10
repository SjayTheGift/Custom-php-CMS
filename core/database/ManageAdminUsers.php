<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ManagerAdminUsers
 *
 * @author ejonas
 */
include_once ('core/database/Connection.php');
include_once ('core/database/QueryBuilder.php');

class ManageAdminUsers extends QueryBuilder {

    //put your code here
    public $link;

    function __construct() {
        parent::__construct();
        $db_connection = new dbConnection();
        $this->link = $db_connection->connect();
        return $this->link;
    }

    function loginUsers($email, $password) {
        $query = $this->link->query("SELECT * FROM admin_users WHERE email = '$email' AND password = '$password' ");
        $rowcount = $query->rowCount();
        return $rowcount;
    }

    function GetUserInfo($email) {
        $query = $this->link->query("SELECT * FROM admin_users WHERE email = '$email'");
        $rowcount = $query->rowCount();
        if ($rowcount == 1) {
            $result = $query->fetchAll();
            return $result;
        } else {
            return $rowcount;
        }
    }

     function editAdminRow($admin_id, $username, $email, $role, $password) {
        $query = $this->pdo->query("UPDATE admin_users SET username ='$username',email = '$email',role ='$role', password = '$password' WHERE id = '$admin_id' Limit 1");
        $query->execute();
        return true;
    }

}
