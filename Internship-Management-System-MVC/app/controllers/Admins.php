<?php

  class Admins extends Controller{
    private $user_types = array("Admin","Student","Employer","Dean","FacultyLiaison","InternshipCoordinator");
    
    public function __construct(){
      $this->adminModel = $this->model('Admin');
    }

    public function index(){
      redirect('pages/index');
    }

    public function createUser($user_type){
      // Check if logged in as admin
      if($this->isLoggedInAdmin()){
        // Check if POST
        if($_SERVER['REQUEST_METHOD'] == 'POST' && in_array($user_type, $this->user_types)){
          // Sanitize POST
          $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
          $data = [
            'usertype' => $user_type,
            'username' => trim($_POST['username']),
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm_password']),
            'email' => trim($_POST['email']),
            'firstname' => trim($_POST['firstname']),
            'lastname' => trim($_POST['lastname']),
            'user_name_err' => '',
            'password_err' => '',
            'confirm_password_err' => '',
            'email_err' => '',
            'first_name_err' => '',
            'last_name_err' => '',
          ];

          // Validate username
          if(empty($data['username'])){
            $data['user_name_err'] = 'Please enter a Username';
          } else{
            // Check username
            if($this->adminModel->findUserByUsername($data['username'])){
              $data['user_name_err'] = 'Username is already taken.';
            }
          }

          // Validate password
          if(empty($data['password'])){
            $data['password_err'] = 'Please enter a password.';     
          } elseif(strlen($data['password']) < 6){
            $data['password_err'] = 'Password must have atleast 6 characters.';
          }

          // Validate confirm password
          if(empty($data['confirm_password'])){
            $data['confirm_password_err'] = 'Please confirm password.';     
          } else{
              if($data['password'] != $data['confirm_password']){
                  $data['confirm_password_err'] = 'Passwords do not match.';
              }
          }

          // Validate email
          if($data['usertype'] == "Student"){
            if (empty($data['email'])) {
              $data['email_err'] = 'Please enter an email';
            } else if(!($this->validateStudentEmail($data['email']))){
              $data['email_err'] = "Please enter your student email in the following format: ab1080cd@go.minnstate.edu";
            } else if ($this->adminModel->findUserByEmail($data['email'])) {
              $data['email_err'] = 'Email is already taken.';
            } 
          } else{
            if(empty($data['email'])){
              $data['email_err'] = 'Please enter an email';
            } else{
              // Check Email
              if($this->adminModel->findUserByEmail($data['email'])){
                $data['email_err'] = 'Email is already taken.';
              }
            }
          }

          // Validate firstname
          if(empty($data['firstname'])){
              $data['first_name_err'] = 'Please enter a first name';
          } else{
            // Check firstname
            if (!preg_match("/^[a-zA-Z ]*$/",$data['firstname'])) {
              $data['first_name_err'] = "Only letters and white space are allowed";
            }
          }

          // Validate lastname
          if(empty($data['lastname'])){
              $data['last_name_err'] = 'Please enter a last name';
          } else{
            // Check lastname
            if (!preg_match("/^[a-zA-Z ]*$/",$data['lastname'])) {
              $data['last_name_err'] = "Only letters and white space are allowed";
            }
          }

          if($data['usertype'] == "Student"){
            $data['student_ID'] = trim($_POST['student_ID']);
            $data['student_ID_err'] = '';
            // Validate student ID
            if(empty($data['student_ID'])){
              $data['student_ID_err'] = 'Please enter a Student ID.';     
            } elseif(strlen($data['student_ID']) != 8){
              $data['student_ID_err'] = 'Student ID must have 8 characters.';
            } else{
              // Check student ID
              if($this->adminModel->findUserByStudentID($data['student_ID'])){
                $data['student_ID_err'] = 'Student ID is already taken.';
              }
            }
          }
          
          // Make sure errors are empty
          if(empty($data['user_name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['email_err']) 
            && empty($data['first_name_err']) && empty($data['last_name_err']) ){

            if( ($data['usertype'] == 'Student') && (empty($data['student_ID_err'])) ){
              // SUCCESS - Proceed to insert

              // Hash Password
              $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

              //Execute
              if($this->adminModel->create($data)){
                // Redirect to login
                flash('create_success', $data['usertype'].' has been created.');
                redirect('admins/manageusers');
              } else {
                die('Something went wrong');
              }
            } else if( ($data['usertype'] == 'Student') && (!empty($data['student_ID_err'])) ){
              $this->view('admins/createuser', $data);
            } else{
              // SUCCESS - Proceed to insert

              // Hash Password
              $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

              //Execute
              if($this->adminModel->create($data)){
                // Redirect to login
                flash('create_success', $data['usertype'].' has been created.');
                redirect('admins/manageUsers');
              } else {
                die('Something went wrong');
              }
            }
          } else {
            // Load View
            $this->view('admins/createuser', $data);
          }
        } else {
          // IF NOT A POST REQUEST
          if(in_array($user_type, $this->user_types) && $user_type != 'Student'){
            // Init data
            $data = [
              'usertype' => $user_type,
              'username' => '',
              'password' => '',
              'confirm_password' => '',
              'email' => '',
              'firstname' => '',
              'lastname' => '',
              'user_name_err' => '',
              'password_err' => '',
              'confirm_password_err' => '',
              'email_err' => '',
              'first_name_err' => '',
              'last_name_err' => '',
            ];
          } else{
            // Init data
            $data = [
              'usertype' => 'Student',
              'username' => '',
              'password' => '',
              'confirm_password' => '',
              'email' => '',
              'firstname' => '',
              'lastname' => '',
              'student_ID' => '',
              'user_name_err' => '',
              'password_err' => '',
              'confirm_password_err' => '',
              'email_err' => '',
              'first_name_err' => '',
              'last_name_err' => '',
              'student_ID_err' => '',
            ];
          }
          // Load View
          $this->view('admins/createuser', $data);
        }
      } else{
        redirect('admins/adminLogin');
      }
    }

  public function validateStudentEmail($email){
    if(preg_match("/[a-zA-Z]{2}+[0-9]{4}+[a-zA-Z]{2}+@go.minnstate.edu$/", $email)){
      return true;
    } else{
      return false;
    }
  }

  public function manageUsers(){
    if($this->isLoggedInAdmin()){
      $data = $this->adminModel->getAllUsers();
      $this->view('admins/manageusers',$data);
    } else{
      redirect('admins/adminLogin');
    }
  }

  public function viewUser(){
    if($this->isLoggedInAdmin()){
      $row = $this->adminModel->getUserByUserId($_SESSION['user_id']);
      $data = [
        'username' => $row->User_Name,
        'usertype' => $row->User_Type,
        'created' => $row->Created,
        'email' => $row->Email,
        'firstname' => $row->First_Name,
        'lastname' => $row->Last_Name,
      ];
      $this->view('admins/userinfo',$data);
    } else{
      redirect('admins/adminLogin');
    }
  } 

  public function viewAUser($user_name){
    if($this->isLoggedInAdmin()){
      $row = $this->adminModel->getUserByUserName($user_name);
      $data = [
        'username' => $row->User_Name,
        'usertype' => $row->User_Type,
        'created' => $row->Created,
        'email' => $row->Email,
        'firstname' => $row->First_Name,
        'lastname' => $row->Last_Name,
      ];
      $this->view('admins/userinfo',$data);
    } else{
      redirect('admins/adminLogin');
    }
  }

  public function deleteUser($user_name){
    if($this->isLoggedInAdmin()){
      $data = [
        'username' => $user_name,
      ];
      $this->view('admins/deleteuser',$data);
    } else{
      redirect('admins/adminLogin');
    }
  }

  public function deleteUserFunction($user_name){
    if($this->isLoggedInAdmin()){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $this->adminModel->deleteUserByUserName($user_name);
        redirect('admins/manageUsers');
      } 
    } else{
      redirect('admins/adminLogin');
    }
  }

    public function adminLogin(){
      // Check if logged in
      if($this->isLoggedInAdmin()){
        redirect('admins/viewUser');
      }

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [       
          'username' => trim($_POST['username']),
          'password' => trim($_POST['password']),        
          'user_name_err' => '',
          'password_err' => '',       
        ];

        // Check for username
        if(empty($data['username'])){
          $data['user_name_err'] = 'Please enter username.';
        }

        // Check for user
        if($this->adminModel->findUserByUserName($data['username'])){
          // User Found
        } else {
          // No User
          $data['user_name_err'] = 'This username is not registered.';
        }

        // Make sure errors are empty
        if(empty($data['user_name_err']) && empty($data['password_err'])){

          // Check and set logged in user
          $loggedInUser = $this->adminModel->loginAdmin($data['username'], $data['password']);

          if($loggedInUser){
            // User Authenticated!
            $this->createAdminSession($loggedInUser);
            redirect('admins/viewUser');
          } else {
            $data['user_name_err'] = 'Username does not exist.';
            // Load View
            $this->view('admins/adminLogin', $data);
          }
           
        } else {
          // Load View
          $this->view('admins/adminLogin', $data);
        }

      } else {
        // If NOT a POST

        // Init data
        $data = [
          'username' => '',
          'password' => '',
          'user_name_err' => '',
          'password_err' => '',
        ];

        // Load View
        $this->view('admins/adminLogin', $data);
      }
    }

    // Create Session With Admin Info
    public function createAdminSession($user){
      $_SESSION['Admin'] = true;
      $_SESSION['user_type'] = $user->User_Type;
      $_SESSION['user_id'] = $user->User_ID;
      $_SESSION['user_email'] = $user->Email; 
      $_SESSION['user_name'] = $user->User_Name;
    }

    // Logout & Destroy Session
    public function logoutAdmin(){
      unset($_SESSION['Admin']);
      unset($_SESSION['user_type']);
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('admins/adminLogin');
    }

    // Check Logged In
    public function isLoggedInAdmin(){
      if(isset($_SESSION['Admin'])){
        return true;
      } else {
        return false;
      }
    }
  }