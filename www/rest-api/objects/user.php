<?php

class User {
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $name;
    public $email;

    // constructor
    public function __construct($db) {
        $this->conn = $db;
    }
 
    function create() {
 
        // insert query
        $query = "INSERT INTO " . $this->table_name . "
            SET name = :name, email = :email";
     
        // prepare the query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->email=htmlspecialchars(strip_tags($this->email));
     
        // bind the values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
     
        // execute the query, also check if query was successful
        if ($stmt->execute()) {
            return true;
        }
     
        return false;
    }
    
    function getList() {

        // query to get all data
        $query = "SELECT `name` FROM {$this->table_name}";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
        
        // execute the query
        $stmt->execute();

        $list = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $list[] = $row['name'];
        }
        
        return $list;
    }
    
    function getData($id) {

        // query to check if email exists
        $query = "SELECT `name`, `email`
            FROM " . $this->table_name . "
            WHERE id = ? LIMIT 0,1";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);

        // bind given email value
        $stmt->bindParam(1, $id);
        
        // execute the query
        $stmt->execute();

        // get number of rows
        $num = $stmt->rowCount();
        
        if ($num > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}