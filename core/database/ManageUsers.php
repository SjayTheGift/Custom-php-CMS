<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MangerUsers
 *
 * @author dell notebook
 */
include_once ('core/database/Connection.php');
include_once ('core/database/QueryBuilder.php');

class ManageUsers extends QueryBuilder{
    public $link;
    
    function __construct() {
        parent::__construct();
        $db_connection = new dbConnection();
        $this->link = $db_connection->connect();
        return $this->link;
    }
    
    public function selectOneUser($table,$id) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = {$id} LIMIT 1");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    
    
    function loginUsers($username,$password){
        $query = $this->link->query("SELECT * FROM Admin WHERE Username = '$username' AND Password = '$password' ");
        $rowcount = $query->rowCount();
        return $rowcount;
    }
    function GetUserInfo($username){
        $query = $this->link->query("SELECT * FROM Admin WHERE Username = '$username'");
        $rowcount = $query->rowCount();
        if($rowcount == 1){
            $result = $query->fetchAll();
            return $result;
        }else{
            return $rowcount;
        }
    }
    
}

//echo $users->registerUsers('esethu','12345','127.0.0.1','4:44','5-20-2016');
