<?php

class sql {
    private $db;
    
    function __construct($db_conn) {
        $this->db = $db_conn;
    }
    
    public function processinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    public function insert($email, $password) {
        $stmt = $this->db->prepare("INSERT INTO users(email,password) VALUES(:email,:password)");
        $stmt->bindparam(":email",$email);
        $stmt->bindparam(":password",$password);
        $stmt->execute();
        return true;
    }
    
    public function getID($uid) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE uid = :uid");
        $stmt->execute(array(":uid"=>$uid));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    
    public function update($email,$password,$fname,$lname,$dob,$uid) {
        $stmt = $this->db->prepare("UPDATE users SET email = :email, password = :password,"
                . "firstname = :fname, lastname = :lname, dob = :dob WHERE uid = :uid");
        $stmt->bindparam(":email",$email);
        $stmt->bindparam(":password",$password);
        $stmt->bindparam(":fname",$fname);
        $stmt->bindparam(":lname",$lname);
        $stmt->bindparam(":dob",$dob);
        $stmt->bindparam(":uid",$uid);
        $stmt->execute();
        return true;
    }
    
    public function delete($uid) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE uid = :uid");
        $stmt->bindparam(":uid",$uid);
        $stmt->execute();
    }
    
    public function view() {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        
        return $stmt;
    }
    
    public function login($email,$password) {
        $stmt = $this->db->prepare("SELECT uid FROM users where email = :email AND password = :password");
        $stmt->bindparam(":email",$email);
        $stmt->bindparam(":password",$password);
        $stmt->execute();
        //return $stmt;
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($stmt->rowCount() == 1) {
            $_SESSION['uid'] = $row['uid'];
            return true;
        }
        else {
            return false;           
        }   
    }
    
    public function imgupload($id,$userpic) {
        $stmt = $this->db->prepare("INSERT INTO img_uploaded(uid,file_name) VALUES(:uid,:file)");
        $stmt->bindParam(":uid",$id);
        $stmt->bindParam(":file",$userpic);
        if($stmt->execute()) {
            return true;
        }
    }
    
    public function getImg($id) {
        $stmt = $this->db->prepare("SELECT * FROM img_uploaded WHERE uid = :uid");
        $stmt->bindparam(':uid',$id);
        $stmt->execute();
        
        return $stmt;
    }
}
