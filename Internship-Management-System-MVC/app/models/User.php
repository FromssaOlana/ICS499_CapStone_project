<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function createApplication($data){
      $this->db->query('INSERT INTO applications (student_name, student_ID, student_address, student_city, student_state, student_zip_code, 
      student_home_phone, student_work_phone, metrostate_advisor, student_email, company_name, company_email, company_address, company_city, 
      company_state, company_zip_code, site_supervisor_name, site_supervisor_phone, site_supervisor_email, internship_evaluator_name, 
      internship_evaluator_phone, internship_evaluator_email, internship_evaluator_resume, internship_title, academic_focus, 
      graduate_or_undergraduate, grading_scale, requested_credits, college, academic_major, academic_minor, start_date, end_date, 
      hours_per_week, compensation, competence_statement, learning_strategy, evaluation, submitted) VALUES (:student_name, :student_ID, 
      :student_address, :student_city, :student_state, :student_zip_code, :student_home_phone, :student_work_phone, :metrostate_advisor, 
      :student_email, :company_name, :company_email, :company_address, :company_city, :company_state, :company_zip_code, :site_supervisor_name, 
      :site_supervisor_phone, :site_supervisor_email, :internship_evaluator_name, :internship_evaluator_phone, :internship_evaluator_email, 
      :internship_evaluator_resume, :internship_title, :academic_focus, :graduate_or_undergraduate, :grading_scale, :requested_credits, 
      :college, :academic_major, :academic_minor, :start_date, :end_date, :hours_per_week, :compensation, :competence_statement, :learning_strategy, :evaluation, Now())');

      // Bind Values
      $this->db->bind(':student_name', $data['student_name']); 
      $this->db->bind(':student_ID', $data['student_ID']); 
      $this->db->bind(':student_address', $data['student_address']); 
      $this->db->bind(':student_city', $data['student_city']); 
      $this->db->bind(':student_state', $data['student_state']); 
      $this->db->bind(':student_zip_code', $data['student_zip_code']); 
      $this->db->bind(':student_home_phone', $data['student_home_phone']); 
      $this->db->bind(':student_work_phone', $data['student_work_phone']); 
      $this->db->bind(':metrostate_advisor', $data['metrostate_advisor']); 
      $this->db->bind(':student_email', $data['student_email']); 
      $this->db->bind(':company_name', $data['company_name']); 
      $this->db->bind(':company_email', $data['company_email']); 
      $this->db->bind(':company_address', $data['company_address']); 
      $this->db->bind(':company_city', $data['company_city']); 
      $this->db->bind(':company_state', $data['company_state']); 
      $this->db->bind(':company_zip_code', $data['company_zip_code']); 
      $this->db->bind(':site_supervisor_name', $data['site_supervisor_name']); 
      $this->db->bind(':site_supervisor_phone', $data['site_supervisor_phone']); 
      $this->db->bind(':site_supervisor_email', $data['site_supervisor_email']); 
      $this->db->bind(':internship_evaluator_name', $data['internship_evaluator_name']); 
      $this->db->bind(':internship_evaluator_phone', $data['internship_evaluator_phone']); 
      $this->db->bind(':internship_evaluator_email', $data['internship_evaluator_email']); 
      $this->db->bind(':internship_evaluator_resume', $data['internship_evaluator_resume']); 
      $this->db->bind(':internship_title', $data['internship_title']); 
      $this->db->bind(':academic_focus', $data['academic_focus']); 
      $this->db->bind(':graduate_or_undergraduate', $data['graduate_or_undergraduate']); 
      $this->db->bind(':grading_scale', $data['grading_scale']); 
      $this->db->bind(':requested_credits', $data['requested_credits']); 
      $this->db->bind(':college', $data['college']); 
      $this->db->bind(':academic_major', $data['academic_major']); 
      $this->db->bind(':academic_minor', $data['academic_minor']); 
      $this->db->bind(':start_date', date("Y-m-d H:i:s",strtotime($data['start_date'])));
      $this->db->bind(':end_date', date("Y-m-d H:i:s",strtotime($data['end_date'])));
      $this->db->bind(':hours_per_week', $data['hours_per_week']); 
      $this->db->bind(':compensation', $data['compensation']); 
      $this->db->bind(':competence_statement', $data['competence_statement']); 
      $this->db->bind(':learning_strategy', $data['learning_strategy']); 
      $this->db->bind(':evaluation', $data['evaluation']);

      if($this->db->execute()){
        if($this->createApplicationStatus($data)) {
          return true;
        } else{
          return false;
        }
      } else {
        return false;
      }
    }

    public function createApplicationStatus($data){
      $row = $this->getApplicationIdByStudentID($data['student_ID'],$data['company_email']);
      $application_ID = $row->Application_ID;

      $this->db->query('INSERT INTO applications_status (application_id, student_signature, 
      employer_signature, faculty_liaison_signature, dean_signature, internship_coordinator_signature,
      application_status) VALUES (:application_id, :student_signature, :employer_signature, :faculty_liaison_signature, 
      :dean_signature, :internship_coordinator_signature, :application_status)');

      // Bind Values
      $this->db->bind(':application_id', $application_ID);
      $this->db->bind(':student_signature', $data['student_signature']);
      $this->db->bind(':employer_signature', null);
      $this->db->bind(':faculty_liaison_signature', null);
      $this->db->bind(':dean_signature', null);
      $this->db->bind(':internship_coordinator_signature', null);
      $this->db->bind(':application_status', 'Pending');

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function editApplication($data){
      $old_data = $this->getApplicationByApplicationID($data['application_id']);

      $data_mapping = [
        'Application_ID' => 'application_id',
        'Student_Name' => 'student_name', 
        'Student_ID' => 'student_ID', 
        'Student_Address' => 'student_address', 
        'Student_City' => 'student_city', 
        'Student_State' => 'student_state', 
        'Student_Zip_Code' => 'student_zip_code', 
        'Student_Home_Phone' => 'student_home_phone', 
        'Student_Work_Phone' => 'student_work_phone', 
        'Metrostate_Advisor' => 'metrostate_advisor', 
        'Student_Email' => 'student_email', 
        'Company_Name' => 'company_name', 
        'Company_Email' => 'company_email', 
        'Company_Address' => 'company_address', 
        'Company_City' => 'company_city', 
        'Company_State' => 'company_state', 
        'Company_Zip_Code' => 'company_zip_code', 
        'Site_Supervisor_Name' => 'site_supervisor_name', 
        'Site_Supervisor_Phone' => 'site_supervisor_phone', 
        'Site_Supervisor_Email' => 'site_supervisor_email', 
        'Internship_Evaluator_Name' => 'internship_evaluator_name', 
        'Internship_Evaluator_Phone' => 'internship_evaluator_phone', 
        'Internship_Evaluator_Email' => 'internship_evaluator_email', 
        'Internship_Evaluator_Resume' => 'internship_evaluator_resume', 
        'Internship_Title' => 'internship_title', 
        'Academic_Focus' => 'academic_focus', 
        'Graduate_Or_Undergraduate' => 'graduate_or_undergraduate', 
        'Grading_Scale' => 'grading_scale', 
        'Requested_Credits' => 'requested_credits', 
        'College' => 'college', 
        'Academic_Major' => 'academic_major', 
        'Academic_Minor' => 'academic_minor', 
        'Start_Date' => 'start_date', 
        'End_Date' => 'end_date', 
        'Hours_Per_Week' => 'hours_per_week', 
        'Compensation' => 'compensation', 
        'Competence_Statement' => 'competence_statement', 
        'Learning_Strategy' => 'learning_strategy', 
        'Evaluation' => 'evaluation', 
        'Submitted' => 'submitted',
      ];

      foreach($old_data as $column => $value){
        if( $data[$data_mapping[$column]] != $value ){
          $this->updateApplication( $data_mapping[$column], $data[$data_mapping[$column]], $data['application_id']);
        }
      }


    }

    public function updateApplication($column, $value, $application_id){
      $this->db->query("UPDATE applications SET ".$column." = '".$value."' WHERE application_id = ".$application_id."");
      $this->db->execute();
    }

    // Add User / Register
    public function registerStudent($data){
      // Prepare Query
      
      $this->db->query('INSERT INTO users (user_type, user_name, password, email, first_name, last_name, created) 
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
        if($this->createStudent($data['username'],$data['student_ID'])){
          return true;
        } else{
          return false;
        }
  
      } else {
        return false;
      }
    }

    public function createStudent($user_name, $student_id){
      $row = $this->getUserByUserName($user_name);
      $this->db->query('INSERT INTO students (user_id,student_id) 
      VALUES (:user_id, :student_id)');
  
      // Bind Values
      $this->db->bind(':user_id', $row->User_ID);
      $this->db->bind(':student_id', $student_id);
  
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function registerEmployer($data){
      // Prepare Query
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

    public function findApplication($student_id,$company_email){
      $this->db->query("SELECT * FROM applications WHERE student_id = :student_id and company_email = :company_email");
      $this->db->bind(':student_id', $student_id);
      $this->db->bind(':company_email', $company_email);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
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
    public function findUserByUserName($user_name){
      $this->db->query("SELECT * FROM users WHERE user_name = :username");
      $this->db->bind(':username', $user_name);

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

    // Find User BY Student ID
    public function findStudentByUserID($user_id){
      $this->db->query("SELECT * FROM students WHERE user_id = :userid");
      $this->db->bind(':userid', $user_id);

      $row = $this->db->single();

      return $row;
    }

    public function deleteApplication($application_id, $student_id){
      $this->db->query("DELETE FROM applications WHERE application_id = :application_id AND student_id = :student_id");
      $this->db->bind(':application_id', $application_id);
      $this->db->bind(':student_id', $student_id);

      if($this->db->execute()){
        return true;
      } else{
        return false;
      }
    }

    // Login / Authenticate User
    public function login($user_name, $password){
      $this->db->query("SELECT * FROM users WHERE user_name = :username");
      $this->db->bind(':username', $user_name);

      $row = $this->db->single();
      if($row->User_Type != 'Admin'){
        $hashed_password = $row->Password;
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

    public function getApplicationIdByStudentID($student_id, $company_email){
      $this->db->query("SELECT * FROM applications WHERE student_id = :student_id AND company_email = :company_email");
      $this->db->bind(':student_id', $student_id);
      $this->db->bind(':company_email', $company_email);

      $row = $this->db->single();

      return $row;
    }

    public function getApplicationByApplicationID($application_id){
      $this->db->query("SELECT * FROM applications WHERE application_id = :application_id");
      $this->db->bind(':application_id', $application_id);

      $row = $this->db->single();

      return $row;
    }

    public function getApplications(){
      if($_SESSION['user_type'] == 'Student'){
        $this->db->query("SELECT * FROM applications WHERE student_id = :student_id ORDER BY application_id");

        $this->db->bind(':student_id', $_SESSION['student_id']);

        $row = $this->db->resultSet();
        return $row;

      } else if($_SESSION['user_type'] == 'Employer') {
        $this->db->query("SELECT * FROM applications WHERE internship_evaluator_email = :user_email ORDER BY application_id");
        
        $this->db->bind(':user_email', $_SESSION['user_email']);
        
        $row = $this->db->resultSet();
        return $row;

      } else{
        $this->db->query("SELECT * FROM applications ORDER BY application_id");
        
        $row = $this->db->resultSet();
        return $row;
      }
    }

    public function getApplicationStatus($application_id){
      $this->db->query("SELECT * FROM applications_status WHERE application_id = :application_id");
      $this->db->bind(':application_id', $application_id);

      $row = $this->db->single();

      return $row;
    }

    public function comment($data){
      if($this->findComment($data['application_id'],$_SESSION['user_id'])){
        return $this->editComment($data);
      } else{
        return $this->createComment($data);
      }
    }

    public function createComment($data){
      $this->db->query('INSERT INTO applications_comments (application_id, user_id, comment, date) 
      VALUES (:application_id, :user_id, :comment, :date)');

      $this->db->bind(':application_id', $data['application_id']);
      $this->db->bind(':user_id', $_SESSION['user_id']);
      $this->db->bind(':comment', $data['comment']);
      $this->db->bind(':date', $data['date']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function editComment($data){
      $this->db->query("UPDATE applications_comments SET comment = :comment, date = :date WHERE application_id = :application_id AND user_id = :user_id");
      $this->db->bind(':comment', $data['comment']);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':application_id', $data['application_id']);
      $this->db->bind(':user_id', $_SESSION['user_id']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function findComment($application_id,$user_id){
      $this->db->query("SELECT * FROM applications_comments WHERE application_id = :application_id AND user_id = :user_id");
      $this->db->bind(':application_id', $application_id);
      $this->db->bind(':user_id', $user_id);

      $row = $this->db->single();

      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    public function getComment($application_id,$user_id){
      $this->db->query("SELECT * FROM applications_comments WHERE application_id = :application_id AND user_id = :user_id");
      $this->db->bind(':application_id', $application_id);
      $this->db->bind(':user_id', $user_id);

      $row = $this->db->execute();

      return $row;
    }

    public function getUserType($user_id){
      $row = $this->getUserByUserId($user_id);
      $user_type = $row->User_Type;
      return $user_type;
    }

    public function getApplicationsComments($application_id){
      $this->db->query("SELECT * FROM applications_comments WHERE application_id = :application_id");
      $this->db->bind(':application_id', $application_id);

      $row = $this->db->resultSet();

      return $row;
    }

    public function updateApplicationSignature($data){
      $user_signature = '';
      if($_SESSION['user_type'] == 'FacultyLiaison'){
        $user_signature = 'Faculty_Liaison_Signature';
      } else if($_SESSION['user_type'] == 'InternshipCoordinator'){
        $user_signature = 'Internship_Coordinator_Signature';
      } else{
        $user_signature = $_SESSION['user_type'] . '_Signature';
      }
      
      $this->db->query("UPDATE applications_status SET ".$user_signature." = :approve_or_decline WHERE application_ID = :application_id");
      $this->db->bind(':approve_or_decline', $data['approve_or_decline']);
      $this->db->bind(':application_id', $data['application_id']);

      $this->db->execute();
      $this->updateApplicationStatus($data['application_id']);
    }

    public function updateApplicationStatus($application_id){
      $application_status = $this->getApplicationStatus($application_id);
      $this->db->query("SELECT * FROM applications_status WHERE application_id = ".$application_id."");

      $row = $this->db->single();


      $status = $application_status->Application_Status;

      if( ($row->Employer_Signature == 'Approve') && ($row->Faculty_Liaison_Signature == 'Approve') && 
      ($row->Dean_Signature == 'Approve') && ($row->Internship_Coordinator_Signature == 'Approve') ){
        $status = "Approved";
      } else if( ($row->Employer_Signature == 'Decline') ){
        $status = "Declined";
      } else if( ($row->Faculty_Liaison_Signature == 'Decline') && ($row->Dean_Signature == 'Decline') && 
      ($row->Internship_Coordinator_Signature == 'Decline') ){
        $status = "Declined";
      }  else if ( !is_null($row->Employer_Signature) && !is_null($row->Faculty_Liaison_Signature) && 
      !is_null($row->Dean_Signature) && !is_null($row->Internship_Coordinator_Signature) ){
        if(($row->Faculty_Liaison_Signature == 'Decline') || ($row->Dean_Signature == 'Decline') || 
        ($row->Internship_Coordinator_Signature == 'Decline')){
          $status = "Declined";
        }
      } else if( !is_null($row->Employer_Signature) || !is_null($row->Faculty_Liaison_Signature) || 
      !is_null($row->Dean_Signature) || !is_null($row->Internship_Coordinator_Signature) ){
        $status = "In Progress";
      }
      $this->db->query("UPDATE applications_status SET application_status = :status WHERE application_ID = ".$application_id."");
      $this->db->bind(':status', $status);
      $this->db->execute(); 
    }
  }