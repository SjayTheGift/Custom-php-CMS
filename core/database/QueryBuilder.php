<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QueryBuilder
 *
 * @author ejonas
 */
include_once ('core/database/Connection.php');

class QueryBuilder {

    //put your code here
    protected $pdo;

    function __construct() {
        $db_connection = new dbConnection();
        $this->pdo = $db_connection->connect();
        return $this->pdo;
    }
    
    public function selectAll($table) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table}");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectOne($table, $id_name, $id) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$id_name} = '{$id}' LIMIT 1");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function Insert($table, $parameters) {
        $sql = sprintf(
                "INSERT INTO %s (%s) VALUES (%s)", $table, implode(",", array_keys($parameters)), ':' . implode(', :', array_keys($parameters))
        );
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
            $counts = $stmt->rowCount();
            return $counts;
        } catch (PDOException $e) {
            echo "Oops... {$e->getMessage()}";
        }
    }

    public function UpdateValue($table, $parameters, $id) {
        $params = array();
        $items = null;

        $allowed = array();

        foreach ($parameters as $key => $value) {
            $allowed[] = $key;
        }

        foreach ($parameters as $key => $value) {
            if (in_array($key, $allowed)) {
                if ($items)
                    $items .= ', ';
                $items .= "$key=:$key";
                $params[$key] = $value;
            }
        }
        try {
            $sql = sprintf("UPDATE %s SET %s WHERE {$id} = :{$id}", $table, $items);
            $params['id'] = $_GET['id'];
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            $counts = $stmt->rowCount();
            //var_dump($counts);
            return $counts;
        } catch (PDOException $e) {
            echo "Oops... {$e->getMessage()}";
        }
    }
    
    function CheckEmailExists($table,$email) {
        $query = $this->link->query("SELECT * FROM {$table} WHERE email = '$email' ");
        $rowcount = $query->rowCount();
        if ($rowcount == 1) {
            return $rowcount;
        }
    }
    
    function checkAvalibility($table,$email) {
        if (!empty($email)) {

            $user_email = $email;

            $stmt = $this->link->prepare("SELECT * FROM {$table} WHERE email=:email");
            $stmt->execute(array(":email" => $user_email));
            $email_count = $stmt->rowCount();

            if ($email_count > 0) {
                echo "<span id='userEmail-info' class='info'> Email: $user_email is already taken!  </span>";
            } else {
                echo "<span style='color:green'> Email Available.</span>";
            }
        }
    }
    

    function selectAllPagination($table){
        $numberpages = 5;
        //$page = isset($_GET['page']) ? $_GET['page'] : 1;
        
        
        $page = 1;
        
	if(!empty($_GET["page"])) {
            $page = $_GET["page"];
	}
        
        $start = ($page -1 )* $numberpages;
        $stmt = $this->pdo->prepare("SELECT * FROM admin_users LIMIT $start, $numberpages");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    
    
    function get_pagination_number() {
        $numberpages = 5;
        $stmt = $this->pdo->prepare("SELECT count(id) FROM admin_users");
        $stmt->execute();
        $row2 = $stmt->fetch();
        $total= $row2[0];
        $pages = ceil($total/$numberpages);
        return $pages;
    }

    function insertEmployee($table, $employeeNumber, $employedDate, $terminatedDate) {

        $query = $this->pdo->prepare("INSERT INTO employee (PersonId, EmployeeNumber, EmployedDate,TerminatedDate) SELECT  PersonId,?,?,?  FROM person ORDER BY PersonId DESC LIMIT 1");

        $values = array($employeeNumber, $employedDate, $terminatedDate);

        $query->execute($values);
        $counts = $query->rowCount();

        return $counts;
    }

    function editEmployeeRow($table, $employeeid, $employeeNumber, $employedDate, $terminatedDate) {
        $query = $this->pdo->query("UPDATE {$table} SET EmployeeNumber ='$employeeNumber',EmployedDate = '$employedDate',TerminatedDate ='$terminatedDate' WHERE Employeeid = '$employeeid'");
        $counts = $query->rowCount();
        return $counts;
    }

    function checkNameExist($table, $firstName) {
        $stmt = $this->pdo->prepare("SELECT $firstName FROM {$table} Where FirstName = '$firstName'");
        return $stmt->execute();
    }

    function checkPersonIdExist($table, $personId) {
        $stmt = $this->pdo->prepare("SELECT $personId FROM {$table} Where PersonId = '$personId'");
        return $stmt->execute();
    }

    function DeleteRow($table, $id_name, $id) {
        $query = $this->pdo->query("DELETE FROM {$table} WHERE {$id_name} = '$id' LIMIT 1");
        $counts = $query->rowCount();
        return $counts;
    }
    
    
    
    
    
    
   public function searchData($table, $search) {


        try {
            $search = htmlspecialchars($search);
            $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE  role LIKE '%".$search."%' OR email LIKE '%".$search."%' OR created_at LIKE '%".$search."%' OR updated_at LIKE '%".$search."%' OR id LIKE '%".$search."%'");
            
      
            
            
            $search = "%$search%";
            $stmt->execute(array('id'=>$search,'role' => $search,'email'=>$search,'created_at'=>$search,'updated_at'=>$search));
            $persons = $stmt->fetchAll(PDO::FETCH_CLASS);
            //var_dump($persons);
            // show the users on the page
            if (empty($persons)) {
                echo "<tr>";
                echo "<td colspan='6'>There were not records</td>";
                echo "</tr>";
            } else {
                foreach ($persons as $person) {
                    echo "<tr>";
                    echo "<td>" . $person->id . "</td>";
                    echo "<td>" . $person->email . "</td>";
                    echo "<td>" . $person->role . "</td>";
                    echo "<td>" . $person->created_at . "</td>";
                    echo "<td>" . $person->updated_at . "</td>";

                    echo "<td>"
                    . "<a type='button' class='btn btn-warning' href='edit-admin.view.php?id=" . $person->id . "'type='button' class='btn btn-danger'><span class='glyphicon glyphicon-edit'></span></a>  "
                    . "<a id='delete'  href='admin.view.php?delete=" . $person->id . "' type='button' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></a>"
                    . "</td>";
                    echo "</tr>";
                }
            }

            //$stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            echo "Oops... {$e->getMessage()}";
        }
    } 
}
