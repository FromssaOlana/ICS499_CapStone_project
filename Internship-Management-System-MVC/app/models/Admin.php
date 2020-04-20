<?php
  class Admin {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function create($data){
      // Prepare Query
      if($data['usertype'] == 'Student'){
        if($this->createUser($data)){
          if($this->createStudent($data)){
            return true;
          } else{
            return false;
          }
        } else{
          return false;
        }
      } else{
        if($this->createUser($data)){
          return true;
        } else{
          return false;
        }
      }
    }

    public function createStudent($data){
      $user_name = $data['username'];
      $student_ID = $data['student_ID'];
      $row = $this->getUserByUserName($user_name);
      $this->db->query('INSERT INTO students (user_id,student_id) 
      VALUES (:user_id, :student_id)');
  
      // Bind Values
      $this->db->bind(':user_id', $row->User_ID);
      $this->db->bind(':student_id', $student_ID);
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function createUser($data){
      $this->db->query('INSERT INTO users (user_type,user_name,password, email, first_name, last_name, created) 
      VALUES (:usertype, :username, :password, :email, :firstname, :lastname, Now())');

      // Bind Values
      $this->db->bind(':usertype', $data['usertype']);
      $this->db->bind(':username', $data['username']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':firstname', $data['firstname']);
      $this->db->bind(':lastname', $data['lastname']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Find User BY Email
    public function findUserByEmail($email){
      $this->db->query("SELECT * FROM users WHERE email = :email");
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Find User BY Username
    public function findUserByUserName($username){
      $this->db->query("SELECT * FROM users WHERE user_name = :username");
      $this->db->bind(':username', $username);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Find User BY Student ID
    public function findUserByStudentID($student_id){
      $this->db->query("SELECT * FROM students WHERE student_id = :studentid");
      $this->db->bind(':studentid', $student_id);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Login / Authenticate User
    public function loginAdmin($user_name, $password){
      $this->db->query("SELECT * FROM users WHERE user_name = :username");
      $this->db->bind(':username', $user_name);

      $row = $this->db->single();
      
      $hashed_password = $row->Password;
      if($row->User_Type == 'Admin'){
        if(password_verify($password, $hashed_password)){
          return $row;
        } else {
          return false;
        }
      } else{
        return false;
      }
    }

    // Find User By ID
    public function getUserByUserId($user_id){
      $this->db->query("SELECT * FROM users WHERE user_id = :user_id");
      $this->db->bind(':user_id', $user_id);

      $row = $this->db->single();

      return $row;
    }

    public function getUserByUserName($user_name){
      $this->db->query("SELECT * FROM users WHERE user_name = :username");
      $this->db->bind(':username', $user_name);

      $row = $this->db->single();
      
      return $row;
    }

    public function getAllUsers(){
      $this->db->query("SELECT * FROM users ORDER BY user_id");
      $row = $this->db->resultSet();
      return $row;
    }

    public function deleteUserByUserName($user_name){
      $this->db->query("DELETE FROM users WHERE User_Name = :username");
      $this->db->bind(':username', $user_name);
      $this->db->execute();
    }
  }