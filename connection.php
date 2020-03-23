<?php

class Connection {

/* Host address for the database */
 protected static $DB_HOST = "127.0.0.1";
    /* Database username */
 protected static $DB_USERNAME = "root";
    /* Database password */
 protected static $DB_PASSWORD = "rootpassword";
    /* Name of database */
 protected static $DB_DATABASE = "wp_eatery"; 
 
 private $username;
 private $password;
 private $adminID;
 private $lastlogin;
 private $mysqli;
 private $dbError;
 private $authenticated = false;
 
 
 
 function __construct() {
        $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME, 
                self::$DB_PASSWORD, self::$DB_DATABASE);
        if($this->mysqli->errno){
            $this->dbError = true;
        }else{
            $this->dbError = false;
        }
    }

  public function authenticate($username, $password){
        $sql = "SELECT * FROM adminusers WHERE username = ? AND password = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $temp = $result->fetch_assoc();
            $this->username = $username;
            $this->password = $password;
            $this->lastlogin = $temp['lastlogin'];
            $this->adminID = $temp['adminID'];
            $this->authenticated = true;
            $q = 'UPDATE adminusers SET lastlogin = now() WHERE adminID = ?';
            $stmt = $this->mysqli->prepare($q);
            $stmt->bind_param('i', $this->adminID);
            $stmt->execute();
        }
        $stmt->free_result();
  }	
public function isAuthenticated(){
     return $this->authenticated;
    }
	
public function hasDbError(){
     return $this->dbError;
    }
	
public function getUsername(){
     return $this->username;
    }
 
 public function getlastLogin(){
	 return $this->lastlogin;
 }
 
 public function getadminID(){
	 return $this->adminID;
 }
 
}
?>