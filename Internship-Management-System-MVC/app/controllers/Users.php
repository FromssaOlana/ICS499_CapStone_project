<?php
class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    redirect('pages/index');
  }

  public function registerStudent()
  {
    // Check if logged in
    if ($this->isLoggedIn()) {
      redirect('users/viewUser');
    }

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'usertype' => 'Student',
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'email' => trim($_POST['email']),
        'firstname' => trim($_POST['firstname']),
        'lastname' => trim($_POST['lastname']),
        'student_ID' => trim($_POST['student_ID']),
        'user_name_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'email_err' => '',
        'first_name_err' => '',
        'last_name_err' => '',
        'student_ID_err' => ''
      ];

      // Validate username
      if (empty($data['username'])) {
        $data['user_name_err'] = 'Please enter a Username';
      } else if ($this->userModel->findUserByUserName($data['username'])) {
        $data['user_name_err'] = 'Username is already taken.';
      }

      // Validate password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter a password.';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must have atleast 6 characters.';
      }

      // Validate confirm password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Please confirm password.';
      } else if ($data['password'] != $data['confirm_password']) {
        $data['confirm_password_err'] = 'Passwords do not match.';
      }

      // Validate email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter an email';
      } else if(!($this->validateStudentEmail($data['email']))){
        $data['email_err'] = "Please enter your student email in the following format: ab1080cd@go.minnstate.edu";
      } else if ($this->userModel->findUserByEmail($data['email'])) {
        $data['email_err'] = 'Email is already taken.';
      } 

      // Validate firstname
      if (empty($data['firstname'])) {
        $data['first_name_err'] = 'Please enter a first name';
      } else if (!preg_match("/^[a-zA-Z ]*$/", $data['firstname'])) {
        $data['first_name_err'] = "Only letters and white space are allowed";
      }

      // Validate lastname
      if (empty($data['lastname'])) {
        $data['last_name_err'] = 'Please enter a last name';
      } else if (!preg_match("/^[a-zA-Z ]*$/", $data['lastname'])) {
        $data['last_name_err'] = "Only letters and white space are allowed";
      }

      // Validate student ID
      if (empty($data['student_ID'])) {
        $data['student_ID_err'] = 'Please enter a Student ID.';
      } elseif (strlen($data['student_ID']) != 8) {
        $data['student_ID_err'] = 'Student ID must have 8 characters.';
      } else if ($this->userModel->findUserByStudentID($data['student_ID'])) {
        $data['student_ID_err'] = 'Student ID is already taken.';
      }

      // Make sure errors are empty
      if (empty($data['user_name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['email_err']) && empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['student_ID_err'])) {
        // SUCCESS - Proceed to insert

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        //Execute
        if ($this->userModel->registerStudent($data)) {
          // Redirect to login
          flash('register_success', 'You are now registered and can log in');
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load View
        $this->view('users/registerstudent', $data);
      }
    } else {
      // IF NOT A POST REQUEST

      // Init data
      $data = [
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
        'student_ID_err' => ''
      ];

      // Load View
      $this->view('users/registerstudent', $data);
    }
  }

  public function validateStudentEmail($email){
    if(preg_match("/[a-zA-Z]{2}+[0-9]{4}+[a-zA-Z]{2}+@go.minnstate.edu$/", $email)){
      return true;
    } else{
      return false;
    }
  }

  public function registerEmployer()
  {
    // Check if logged in
    if ($this->isLoggedIn()) {
      redirect('users/viewUsers');
    }

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'usertype' => 'Employer',
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
      if (empty($data['username'])) {
        $data['user_name_err'] = 'Please enter a Username';
      } else if ($this->userModel->findUserByUsername($data['username'])) {
        $data['user_name_err'] = 'Username is already taken.';
      }

      // Validate password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter a password.';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must have atleast 6 characters.';
      }

      // Validate confirm password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Please confirm password.';
      } else if ($data['password'] != $data['confirm_password']) {
        $data['confirm_password_err'] = 'Passwords do not match.';
      }

      // Validate email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter an email';
      } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $data['email_err'] = "Invalid email format.";
      } else if ($this->userModel->findUserByEmail($data['email'])) {
        $data['email_err'] = 'Email is already taken.';
      }

      // Validate firstname
      if (empty($data['firstname'])) {
        $data['first_name_err'] = 'Please enter a first name';
      } else if (!preg_match("/^[a-zA-Z ]*$/", $data['firstname'])) {
        $data['first_name_err'] = "Only letters and white space are allowed";
      }

      // Validate lastname
      if (empty($data['lastname'])) {
        $data['last_name_err'] = 'Please enter a last name';
      } else if (!preg_match("/^[a-zA-Z ]*$/", $data['lastname'])) {
        $data['last_name_err'] = "Only letters and white space are allowed";
      }

      // Make sure errors are empty
      if (empty($data['user_name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['email_err']) && empty($data['first_name_err']) && empty($data['last_name_err'])) {
        // SUCCESS - Proceed to insert

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        //Execute
        if ($this->userModel->registerEmployer($data)) {
          // Redirect to login
          flash('register_success', 'You are now registered and can log in');
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load View
        $this->view('users/registeremployer', $data);
      }
    } else {
      // IF NOT A POST REQUEST
      $data = [
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

      // Load View
      $this->view('users/registeremployer', $data);
    }
  }

  public function application($application_id)
  {
    if ($this->isLoggedInStudent()) {
      // Check if POST
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'student_name' => trim($_POST['student_name']),
          'student_ID' => trim($_POST['student_ID']),
          'student_address' => trim($_POST['student_address']),
          'student_city' => trim($_POST['student_city']),
          'student_state' => trim($_POST['student_state']),
          'student_zip_code' => trim($_POST['student_zip_code']),
          'student_home_phone' => trim($_POST['student_home_phone']),
          'student_work_phone' => trim($_POST['student_work_phone']),
          'metrostate_advisor' => trim($_POST['metrostate_advisor']),
          'student_email' => trim($_POST['student_email']),
          'company_name' => trim($_POST['company_name']),
          'company_email' => trim($_POST['company_email']),
          'company_address' => trim($_POST['company_address']),
          'company_city' => trim($_POST['company_city']),
          'company_state' => trim($_POST['company_state']),
          'company_zip_code' => trim($_POST['company_zip_code']),
          'site_supervisor_name' => trim($_POST['site_supervisor_name']),
          'site_supervisor_phone' => trim($_POST['site_supervisor_phone']),
          'site_supervisor_email' => trim($_POST['site_supervisor_email']),
          'internship_evaluator_name' => trim($_POST['internship_evaluator_name']),
          'internship_evaluator_phone' => trim($_POST['internship_evaluator_phone']),
          'internship_evaluator_email' => trim($_POST['internship_evaluator_email']),
          'internship_title' => trim($_POST['internship_title']),
          'academic_focus' => trim($_POST['academic_focus']),
          'requested_credits' => trim($_POST['requested_credits']),
          'academic_major' => trim($_POST['academic_major']),
          'academic_minor' => trim($_POST['academic_minor']),
          'start_date' => trim($_POST['start_date']),
          'end_date' => trim($_POST['end_date']),
          'hours_per_week' => trim($_POST['hours_per_week']),
          'competence_statement' => trim($_POST['competence_statement']),
          'learning_strategy' => trim($_POST['learning_strategy']),
          'evaluation' => trim($_POST['evaluation']),
          'student_signature' => trim($_POST['student_signature']),
          'student_name_err' => '',
          'student_ID_err' => '',
          'student_address_err' => '',
          'student_city_err' => '',
          'student_state_err' => '',
          'student_zip_code_err' => '',
          'student_home_phone_err' => '',
          'student_work_phone_err' => '',
          'metrostate_advisor_err' => '',
          'student_email_err' => '',
          'company_name_err' => '',
          'company_email_err' => '',
          'company_address_err' => '',
          'company_city_err' => '',
          'company_state_err' => '',
          'company_zip_code_err' => '',
          'site_supervisor_name_err' => '',
          'site_supervisor_phone_err' => '',
          'site_supervisor_email_err' => '',
          'internship_evaluator_name_err' => '',
          'internship_evaluator_phone_err' => '',
          'internship_evaluator_email_err' => '',
          'internship_evaluator_resume_err' => '',
          'internship_title_err' => '',
          'academic_focus_err' => '',
          'graduate_or_undergraduate_err' => '',
          'grading_scale_err' => '',
          'requested_credits_err' => '',
          'college_err' => '',
          'academic_major_err' => '',
          'academic_minor_err' => '',
          'start_date_err' => '',
          'end_date_err' => '',
          'hours_per_week_err' => '',
          'compensation_err' => '',
          'competence_statement_err' => '',
          'learning_strategy_err' => '',
          'evaluation_err' => '',
          'student_signature_err' => '',
        ];

        $student_full_name = $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];

        //Validate student name
        if (empty($data['student_name'])) {
          $data['student_name_err'] = "Please Enter Student Name.";
        } else if ($data['student_name'] != $student_full_name) {
          $data['student_name_err'] = "Please Enter your first name followed by your last name that is associated with this account";
        }

        // Validate studentID
        if (empty($data['student_ID'])) {
          $data['student_ID_err'] = "Please Enter a Student ID.";
        } else if ($data['student_ID'] != $_SESSION['student_id']) {
          $data['student_ID_err'] = "Please enter the Student ID associated with this account.";
        }

        //Validate student address
        if (empty($data['student_address'])) {
          $data['student_address_err'] = "Please Enter Student's Address.";
        } else if (!preg_match('/^(\d{2,})\s?(\w{0,5})\s([a-zA-Z]{2,30})\s([a-zA-Z]{2,15})\s?(\w{0,5})\s?([a-zA-Z]{0,15})\.?\s?(\d{0,5})$/', $data['student_address'])) {
          $data['student_address_err'] = "Please enter a valid Address";
        }

        //Validate student city
        if (empty($data['student_city'])) {
          $data['student_city_err'] = "Please Enter Student's City'.";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $data['student_city'])) {
          $data['student_city_err'] = "Only letters and white space are allowed";
        }

        //Validate student state
        if (empty($data['student_state'])) {
          $data['student_state_err'] = "Please Enter a state.";
        } else if (!preg_match("/^((AL)|(AK)|(AS)|(AZ)|(AR)|(CA)|(CO)|(CT)|(DE)|(DC)|(FM)|(FL)|(GA)|(GU)|(HI)|(ID)|(IL)|(IN)|(IA)|(KS)|(KY)|(LA)|(ME)|(MH)|(MD)|(MA)|(MI)|(MN)|(MS)|(MO)|(MT)|(NE)|(NV)|(NH)|(NJ)|(NM)|(NY)|(NC)|(ND)|(MP)|(OH)|(OK)|(OR)|(PW)|(PA)|(PR)|(RI)|(SC)|(SD)|(TN)|(TX)|(UT)|(VT)|(VI)|(VA)|(WA)|(WV)|(WI)|(WY))$/", $data['student_state'])) {
          $data['student_state_err'] = "Please Enter a valid State's abbreviation.";
        }

        //Validate student zipcode
        if (empty($data['student_zip_code'])) {
          $data['student_zip_code_err'] = "Please Enter a Zip-Code.";
        } else if (strlen($data['student_zip_code']) != 5) {
          $data['student_zip_code_err'] = "Please Enter a valid Zip-Code of 5 digits.";
        } else if (!preg_match("/^\d+$/", $data['student_zip_code'])) {
          $data['student_zip_code_err'] = "Only numbers are allowed";
        }

        //Validate student homephone
        if (empty($data['student_home_phone'])) {
          $data['student_home_phone_err'] = "Please Enter a Home Phone number.";
        } else if (!preg_match("/^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/", $data['student_home_phone'])) {
          $data['student_home_phone_err'] = "Please enter a valid home phone number.";
        }

        //Validate student workphone
        if (empty($data['student_work_phone'])) {
          $data['student_work_phone_err'] = "Please Enter a work phone number.";
        } else if (!preg_match("/^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/", $data['student_work_phone'])) {
          $data['student_work_phone_err'] = "Please enter a valid work phone number.";
        }

        //Validate metrostate advisor name
        if (empty($data['metrostate_advisor'])) {
          $data['metrostate_advisor_err'] = "Please Enter your Metrostate Advisor's name.";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $data['metrostate_advisor'])) {
          $data['metrostate_advisor_err'] = "Only letters and white space are allowed";
        }

        // Validate student email
        if (empty($data['student_email'])) {
          $data['student_email_err'] = "Please Enter your Student Email Address.";
        } else if ($data['student_email'] != $_SESSION['user_email']) {
          $data['student_email_err'] = "Please enter the email associated with this account";
        }

        //Validate company name
        if (empty($data['company_name'])) {
          $data['company_name_err'] = "Please Enter your Company's name.";
        }

        // Validate company email
        if (empty($data['company_email'])) {
          $data['company_email_err'] = "Please Enter your Company's Email Address.";
        } else if (!filter_var($data['company_email'], FILTER_VALIDATE_EMAIL)) {
          $data['company_email_err'] = "Invalid email format.";
        }

        //Validate company address
        if (empty($data['company_address'])) {
          $data['company_address_err'] = "Please Enter Company's Address.";
        } else if (!preg_match('/^(\d{2,})\s?(\w{0,5})\s([a-zA-Z]{2,30})\s([a-zA-Z]{2,15})\s?(\w{0,5})\s?([a-zA-Z]{0,15})\.?\s?(\d{0,5})$/', $data['company_address'])) {
          $data['company_address_err'] = "Please enter a valid address";
        }

        //Validate company city
        if (empty($data['company_city'])) {
          $data['company_city_err'] = "Please Enter Company's City.";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $data['company_city'])) {
          $data['company_city_err'] = "Only letters and white space are allowed";
        }

        //Validate company state
        if (empty($data['company_state'])) {
          $data['company_state_err'] = "Please Enter a state.";
        } else if (!preg_match("/^((AL)|(AK)|(AS)|(AZ)|(AR)|(CA)|(CO)|(CT)|(DE)|(DC)|(FM)|(FL)|(GA)|(GU)|(HI)|(ID)|(IL)|(IN)|(IA)|(KS)|(KY)|(LA)|(ME)|(MH)|(MD)|(MA)|(MI)|(MN)|(MS)|(MO)|(MT)|(NE)|(NV)|(NH)|(NJ)|(NM)|(NY)|(NC)|(ND)|(MP)|(OH)|(OK)|(OR)|(PW)|(PA)|(PR)|(RI)|(SC)|(SD)|(TN)|(TX)|(UT)|(VT)|(VI)|(VA)|(WA)|(WV)|(WI)|(WY))$/", $data['company_state'])) {
          $data['company_state_err'] = "Please Enter a valid State's abbreviation.";
        }

        //Validate company zipcode
        if (empty($data['company_zip_code'])) {
          $data['company_zip_code_err'] = "Please Enter a Zip-Code.";
        } elseif (strlen($data['company_zip_code']) != 5) {
          $data['company_zip_code_err'] = "Please Enter a valid Zip-Code of 5 digits.";
        } else if (!preg_match("/^\d+$/", $data['company_zip_code'])) {
          $data['company_zip_code_err'] = "Only numbers are allowed";
        }

        //Validate site supervisor name
        if (empty($data['site_supervisor_name'])) {
          $data['site_supervisor_name_err'] = "Please Enter your Site supervisor's name.";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $data['site_supervisor_name'])) {
          $data['site_supervisor_name_err'] = "Only letters and white space are allowed";
        }

        //Validate site supervisor phone
        if (empty($data['site_supervisor_phone'])) {
          $data['site_supervisor_phone_err'] = "Please Enter a Phone number.";
        } else if (!preg_match("/^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/", $data['site_supervisor_phone'])) {
          $data['site_supervisor_phone_err'] = "Please enter a valid phone number";
        }

        // Validate site supervisor email
        if (empty($data['site_supervisor_email'])) {
          $data['site_supervisor_email_err'] = "Please Enter your Site supervisor's Email Address.";
        } else if (!filter_var($data['site_supervisor_email'], FILTER_VALIDATE_EMAIL)) {
          $data['site_supervisor_email_err'] = "Invalid email format.";
        }


        //Validate internship evaluator name
        if (empty($data['internship_evaluator_name'])) {
          $data['internship_evaluator_name_err'] = "Please Enter your Internship Evaluator's name.";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $data['internship_evaluator_name'])) {
          $data['internship_evaluator_name_err'] = "Only letters and white space are allowed";
        }

        //Validate internship evaluator phone
        if (empty($data['internship_evaluator_phone'])) {
          $data['internship_evaluator_phone_err'] = "Please Enter a Phone number.";
        } else if (!preg_match("/^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/", $data['internship_evaluator_phone'])) {
          $data['internship_evaluator_phone_err'] = "Please enter a valid phone number";
        }

        // Validate internship evaluator email
        if (empty($data['internship_evaluator_email'])) {
          $data['internship_evaluator_email_err'] = "Please Enter your Internship Evaluator's Email Address.";
        } else if (!filter_var($data['internship_evaluator_email'], FILTER_VALIDATE_EMAIL)) {
          $data['internship_evaluator_email_err'] = "Invalid email format.";
        }

        //Validate resume
        if (isset($_FILES['internship_evaluator_resume'])) {
          $file = $_FILES['internship_evaluator_resume'];

          $fileName = $_FILES['internship_evaluator_resume']['name'];
          $tmpName  = $_FILES['internship_evaluator_resume']['tmp_name'];
          $fileSize = $_FILES['internship_evaluator_resume']['size'];
          $fileError = $_FILES['internship_evaluator_resume']['error'];
          $fileType = $_FILES['internship_evaluator_resume']['type'];

          $fileExt = explode('.', $fileName);
          $fileActualExt = strtolower(end($fileExt));
          $allowed = array('pdf', 'doc', 'docx');

          if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
              if ($fileSize < 10000000) {
                $fileNameNew = sha1_file($_FILES['internship_evaluator_resume']['tmp_name']) . "." . $fileActualExt;
                $fileDestination = '../app/uploads/'.$fileNameNew;
                $data['internship_evaluator_resume'] = $fileDestination;
              } else {
                $data['internship_evaluator_resume_err'] = "Your file was too big.";
              }
            } else {
              $data['internship_evaluator_resume_err'] = "There was an error uploading your file.";
            }
          } else {
            $data['internship_evaluator_resume_err'] = "Please upload a valid resume in PDF, DOC, or DOCX format.";
          }
        } else {
          $data['internship_evaluator_resume_err'] = "Please upload a resume in PDF, DOC, or DOCX format.";
        }

        //Validate internship title
        if (empty($data['internship_title'])) {
          $data['internship_title_err'] = "Please Enter your Internship Title.";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $data['internship_title'])) {
          $data['internship_title_err'] = "Only letters and white space are allowed";
        }

        //Validate academic focus
        if (empty($data['academic_focus'])) {
          $data['academic_focus_err'] = "Please Enter your Academic Focus.";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $data['academic_focus'])) {
          $data['academic_focus_err'] = "Only letters and white space are allowed";
        }

        //Validate graduate or undergraduate
        if (empty($_POST['graduate_or_undergraduate'])) {
          $data['graduate_or_undergraduate_err'] = "Please select whether you are a graduate or undergraduate.";
        } else {
          $data['graduate_or_undergraduate'] = trim($_POST['graduate_or_undergraduate']);
        }

        //Validate grading scale
        if (empty($_POST['grading_scale'])) {
          $data['grading_scale_err'] = "Please select your requested Grading Scale for this internship.";
        } else {
          $data['grading_scale'] = trim($_POST['grading_scale']);
        }

        //Validate requested credits
        if (empty($data['requested_credits'])) {
          $data['requested_credits_err'] = "Please Enter your requested credits.";
        } elseif (strlen($data['requested_credits']) != 1) {
          $data['requested_credits_err'] = "Please Enter a valid requested credit amount of 0-9.";
        } else if (!preg_match("/^\d+$/", $data['requested_credits'])) {
          $data['requested_credits_err'] = "Only numbers are allowed";
        }

        //Validate college
        if (empty($_POST['college'])) {
          $data['college_err'] = "Please select your College.";
        } else {
          $data['college'] = trim($_POST['college']);
        }

        //Validate Academic major
        if (empty($data['academic_major'])) {
          $data['academic_major_err'] = "Please Enter your Academic Major.";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $data['academic_major'])) {
          $data['academic_major_err'] = "Only letters and white space are allowed";
        }

        //Validate Academic minor
        if (empty($data['academic_minor'])) {
          $data['academic_minor_err'] = "Please Enter your Academic Minor.";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $data['academic_minor'])) {
          $data['academic_minor_err'] = "Only letters and white space are allowed";
        }

        //Validate start date
        if (empty($data['start_date'])) {
          $data['start_date_err'] = "Please Enter your start date.";
        } else {
          $temp_start_date = $data['start_date'];
          $date_arr  = explode('/', $temp_start_date);
          if (checkdate($date_arr[0], $date_arr[1], $date_arr[2])) {
            $current_date = date('m/d/y');
            $temp_start_date = date('m/d/y', strtotime($data['start_date']));
            if ($current_date >= $temp_start_date) {
              $data['start_date_err'] = "Please Enter a valid start date, that is after todays date.";
            } else {
              $data['start_date'] = date('m/d/y', strtotime($data['start_date']));
            }
          } else {
            $data['start_date_err'] = "Please enter a valid date in this format MM/DD/YYYY";
          }
        }

        //Validate end date
        if (empty($data['end_date'])) {
          $data['end_date_err'] = "Please Enter your end date.";
        } else {
          $temp_end_date = $data['end_date'];
          $date_arr  = explode('/', $temp_end_date);
          if (checkdate($date_arr[0], $date_arr[1], $date_arr[2])) {
            $current_date = date('m/d/y');
            $temp_end_date = date('m/d/y', strtotime($data['end_date']));
            if ($current_date >= $temp_end_date) {
              $data['end_date_err'] = "Please Enter a valid end date, that is after todays date.";
            } else {
              $data['end_date'] = date('m/d/y', strtotime($data['end_date']));
            }
          } else {
            $data['end_date_err'] = "Please enter a valid date in this format MM/DD/YYYY";
          }
        }

        //validate start and end date
        if (!empty($data['start_date']) && !empty($data['end_date'])) {
          if ($data['start_date'] > $data['end_date']) {
            $data['start_date_err'] = "The start date is after the end date";
            $data['end_date_err'] = "The end date is before the start date";
          } else if ($data['start_date'] == $data['end_date']) {
            $data['start_date_err'] = "The start date is equal to the end date";
            $data['end_date_err'] = "The end date is equal to the start date";
          }
        }

        //Validate hours per week
        if (empty($data['hours_per_week'])) {
          $data['hours_per_week_err'] = "Please Enter your hours per week.";
        } else if (!preg_match("/^\d+$/", $data['hours_per_week'])) {
          $data['hours_per_week_err'] = "Only numbers are allowed";
        } else if ($data['hours_per_week'] > 40) {
          $data['hours_per_week_err'] = "Please enter a value of 40 or less.";
        }

        if (empty($_POST['compensation'])) {
          $data['compensation_err'] = "Please Enter your compensation.";
        } else {
          $data['compensation'] = trim($_POST['compensation']);
        }

        //Validate competence statement
        if (strlen($data['competence_statement']) < 100 || strlen($data['competence_statement']) > 1000) {
          $data['competence_statement_err'] = "Please Enter a valid competence statement of atleast 100 characters and less than 1000 characters.";
        }

        //Validate learning strategy
        if (strlen($data['learning_strategy']) < 100 || strlen($data['learning_strategy']) > 1000) {
          $data['learning_strategy_err'] = "Please Enter a valid learning strategy of atleast 100 characters and less than 1000 characters.";
        }

        //Validate evaluation
        if (strlen($data['evaluation']) < 100 || strlen($data['evaluation']) > 1000) {
          $data['evaluation_err'] = "Please Enter a valid evaluation of atleast 100 characters and less than 1000 characters.";
        }

        //Validate student signature
        if (empty($data['student_signature'])) {
          $data['student_signature_err'] = "Please sign your full name.";
        } else if ($data['student_signature'] != $student_full_name) {
          $data['student_signature_err'] = "Please sign your first name followed by your last name that is associated with this account";
        }

        // Make sure errors are empty
        if (
          empty($data['student_name_err']) && empty($data['student_ID_err']) && empty($data['student_address_err']) && empty($data['student_city_err']) && empty($data['student_state_err']) && empty($data['student_zip_code_err']) && empty($data['student_home_phone_err']) &&
          empty($data['student_work_phone_err']) && empty($data['metrostate_advisor_err']) && empty($data['student_email_err']) && empty($data['company_name_err']) && empty($data['company_email_err']) && empty($data['company_address_err']) && empty($data['company_city_err']) &&
          empty($data['company_state_err']) && empty($data['company_zip_code_err']) && empty($data['site_supervisor_name_err']) && empty($data['site_supervisor_phone_err']) && empty($data['site_supervisor_email_err']) && empty($data['internship_evaluator_name_err']) &&
          empty($data['internship_evaluator_phone_err']) && empty($data['internship_evaluator_email_err']) && empty($data['internship_evaluator_resume_err']) && empty($data['internship_title_err']) && empty($data['academic_focus_err']) &&
          empty($data['graduate_or_undergraduate_err']) && empty($data['grading_scale_err']) && empty($data['requested_credits_err']) && empty($data['college_err']) && empty($data['academic_major_err']) && empty($data['academic_minor_err']) && empty($data['start_date_err']) &&
          empty($data['end_date_err']) && empty($data['hours_per_week_err']) && empty($data['compensation_err']) && empty($data['competence_statement_err']) && empty($data['learning_strategy_err']) && empty($data['evaluation_err'])
        ) {
          // SUCCESS - Proceed to insert

          //Execute
          if($application_id == -1){
            if($this->userModel->findApplication($data['student_ID'], $data['company_email'])){
              echo "<script type='text/javascript'>alert('This account currently has an application associated with this company!');</script>";
              // Load View
              $this->view('users/application', $data);
            } else{
              if ($this->userModel->createApplication($data)) {
                // Redirect to manageapplications
                move_uploaded_file($tmpName, $fileDestination);
                echo "<script type='text/javascript'>alert('Your application has been submitted and can now be reviewed');</script>";
                flash('application_submitted', 'Your application has been submitted and can now be reviewed.');
                redirect('users/manageApplications');
              } else {
                die('Something went wrong');
              }
            }
          } else{

            $data['application_id'] = $application_id;
            $data['submitted'] = date('m/d/y');
            $data['submitted'] = date("Y-m-d H:i:s",strtotime($data['submitted']));
            $data['start_date'] = date("Y-m-d H:i:s",strtotime($data['start_date']));
            $data['end_date'] = date("Y-m-d H:i:s",strtotime($data['end_date']));

            $this->userModel->editApplication($data);

            $application = $this->userModel->getApplicationByApplicationID($application_id);

            if($application->Internship_Evaluator_Resume != $fileDestination){
              move_uploaded_file($tmpName, $fileDestination);
            }
              
            echo "<script type='text/javascript'>alert('Your application has been edited and can now be reviewed');</script>";
            flash('application_submitted', 'Your application has been submitted and can now be reviewed.');
            redirect('users/manageApplications');
          }
        } else {
          // Load View
          $this->view('users/application', $data);
        }
      } else {
        $data = [
          'student_name' => '',
          'student_ID' => '',
          'student_address' => '',
          'student_city' => '',
          'student_state' => '',
          'student_zip_code' => '',
          'student_home_phone' => '',
          'student_work_phone' => '',
          'metrostate_advisor' => '',
          'student_email' => '',
          'company_name' => '',
          'company_email' => '',
          'company_address' => '',
          'company_city' => '',
          'company_state' => '',
          'company_zip_code' => '',
          'site_supervisor_name' => '',
          'site_supervisor_phone' => '',
          'site_supervisor_email' => '',
          'internship_evaluator_name' => '',
          'internship_evaluator_phone' => '',
          'internship_evaluator_email' => '',
          'internship_evaluator_resume' => '',
          'internship_title' => '',
          'academic_focus' => '',
          'graduate_or_undergraduate' => '',
          'grading_scale' => '',
          'requested_credits' => '',
          'college' => '',
          'academic_major' => '',
          'academic_minor' => '',
          'start_date' => '',
          'end_date' => '',
          'hours_per_week' => '',
          'compensation' => '',
          'competence_statement' => '',
          'learning_strategy' => '',
          'evaluation' => '',
          'student_signature' => '',
          'student_name_err' => '',
          'student_ID_err' => '',
          'student_address_err' => '',
          'student_city_err' => '',
          'student_state_err' => '',
          'student_zip_code_err' => '',
          'student_home_phone_err' => '',
          'student_work_phone_err' => '',
          'metrostate_advisor_err' => '',
          'student_email_err' => '',
          'company_name_err' => '',
          'company_email_err' => '',
          'company_address_err' => '',
          'company_city_err' => '',
          'company_state_err' => '',
          'company_zip_code_err' => '',
          'site_supervisor_name_err' => '',
          'site_supervisor_phone_err' => '',
          'site_supervisor_email_err' => '',
          'internship_evaluator_name_err' => '',
          'internship_evaluator_phone_err' => '',
          'internship_evaluator_email_err' => '',
          'internship_evaluator_resume_err' => '',
          'internship_title_err' => '',
          'academic_focus_err' => '',
          'graduate_or_undergraduate_err' => '',
          'grading_scale_err' => '',
          'requested_credits_err' => '',
          'college_err' => '',
          'academic_major_err' => '',
          'academic_minor_err' => '',
          'start_date_err' => '',
          'end_date_err' => '',
          'hours_per_week_err' => '',
          'compensation_err' => '',
          'competence_statement_err' => '',
          'learning_strategy_err' => '',
          'evaluation_err' => '',
          'student_signature_err' => '',
        ];
        // Load View
        $this->view('users/application', $data);
      }
    } else {
      redirect('users/login');
    }
  }

  public function manageApplications(){
    if ($this->isLoggedIn()) {
      $data = $this->userModel->getApplications();
      $this->view('users/manageapplications',$data);
    } else {
      redirect('users/login');
    }
  }

  public function viewApplication($application_id){
    if ($this->isLoggedIn()) {
      $data = $this->getApplicationData($application_id);
      $this->view('users/viewapplication',$data);
    } else {
      redirect('users/login');
    }
  }

  public function postComment($application_id){
    if ($this->isLoggedIn()) {
      $data = $this->getApplicationData($application_id);
      // Check if POST
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data['comment'] = trim($_POST['comment']);
        $data['date'] = trim($_POST['date']);


        if($this->userModel->comment($data)){
          redirect('users/manageApplications');
          //or this to redirect to view again
          //$data = $this->getApplicationData($application_id);
          //$this->view('users/viewapplication',$data);
        } else{
          $this->view('users/viewapplication',$data);
        }
      } else{
        $this->view('users/viewapplication',$data);
      }
    } else {
      redirect('users/login');
    }
  }

  public function deleteApplication($application_id){
    $data = [
      'application_id' => $application_id,
    ];

    if ($this->isLoggedInStudent()){
      $this->view('users/deleteapplication',$data);
    } else{
      redirect('users/login');
    }
  }

  public function deleteApplicationConfirmation($application_id){
    if ($this->isLoggedInStudent()){
      if($this->userModel->deleteApplication($application_id,$_SESSION['student_id'])){
        redirect('users/manageApplications');
      } else{
        redirect('users/manageApplications');
      }
    } else{
      redirect('users/login');
    }
  }

  public function editApplication($application_id){
    $data = $this->getApplicationToEdit($application_id);
    if ($this->isLoggedInStudent()){
      $this->view('users/editapplication',$data);
    } else{
      redirect('users/login');
    }
  }

  public function signApplication($application_id){
    if ($this->isLoggedIn()) {
      $data = $this->getApplicationData($application_id);
      // Check if POST
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $user_full_name = $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];

        $data['signature'] = trim($_POST['signature']);
        $data['approve_or_decline'] = trim($_POST['approve_or_decline']);
        
        if (empty($data['signature'])) {
          $data['signature_err'] = "Please sign your full name.";
        } else if ($data['signature'] != $user_full_name) {
          $data['signature_err'] = "Please sign your first name followed by your last name that is associated with this account";
        }

        if( empty($data['signature_err']) ){
          $this->userModel->updateApplicationSignature($data);
          redirect('users/manageApplications');
          //or this to redirect to view again
          // $data = $this->getApplicationData($application_id);
          // $this->view('users/viewapplication',$data);
        } else{
          $this->view('users/viewapplication',$data);
        }
      } else{
        $this->view('users/viewapplication',$data);
      }
    } else {
      redirect('users/login');
    }
  }

  public function getApplicationToEdit($application_id){
    $row = $this->userModel->getApplicationByApplicationID($application_id);
    $start_date_string = strtotime($row->Start_Date);
    $end_date_string = strtotime($row->End_Date);
    $format_start_date = date("m/d/y", $start_date_string);  
    $format_end_date = date("m/d/y", $end_date_string);  

    $data = [
      'application_id' => $row->Application_ID,
      'student_name' => $row->Student_Name,
      'student_ID' => $row->Student_ID,
      'student_address' => $row->Student_Address,
      'student_city' => $row->Student_City,
      'student_state' => $row->Student_State,
      'student_zip_code' => $row->Student_Zip_Code,
      'student_home_phone' => $row->Student_Home_Phone,
      'student_work_phone' => $row->Student_Work_Phone,
      'metrostate_advisor' => $row->Metrostate_Advisor,
      'student_email' => $row->Student_Email,
      'company_name' => $row->Company_Name,
      'company_email' => $row->Company_Email,
      'company_address' => $row->Company_Address,
      'company_city' => $row->Company_City,
      'company_state' => $row->Company_State,
      'company_zip_code' => $row->Company_Zip_Code,
      'site_supervisor_name' => $row->Site_Supervisor_Name,
      'site_supervisor_phone' => $row->Site_Supervisor_Phone,
      'site_supervisor_email' => $row->Site_Supervisor_Email,
      'internship_evaluator_name' => $row->Internship_Evaluator_Name,
      'internship_evaluator_phone' => $row->Internship_Evaluator_Phone,
      'internship_evaluator_email' => $row->Internship_Evaluator_Email,
      'internship_evaluator_resume' => $row->Internship_Evaluator_Resume,
      'internship_title' => $row->Internship_Title,
      'academic_focus' => $row->Academic_Focus,
      'graduate_or_undergraduate' => $row->Graduate_Or_Undergraduate,
      'grading_scale' => $row->Grading_Scale,
      'requested_credits' => $row->Requested_Credits,
      'college' => $row->College,
      'academic_major' => $row->Academic_Major,
      'academic_minor' => $row->Academic_Minor,
      'start_date' => $format_start_date,
      'end_date' => $format_end_date,
      'hours_per_week' => $row->Hours_Per_Week,
      'compensation' => $row->Compensation,
      'competence_statement' => $row->Competence_Statement,
      'learning_strategy' => $row->Learning_Strategy,
      'evaluation' => $row->Evaluation,
      'submitted' => $row->Submitted,
      'student_signature' => '',
      'student_name_err' => '',
      'student_ID_err' => '',
      'student_address_err' => '',
      'student_city_err' => '',
      'student_state_err' => '',
      'student_zip_code_err' => '',
      'student_home_phone_err' => '',
      'student_work_phone_err' => '',
      'metrostate_advisor_err' => '',
      'student_email_err' => '',
      'company_name_err' => '',
      'company_email_err' => '',
      'company_address_err' => '',
      'company_city_err' => '',
      'company_state_err' => '',
      'company_zip_code_err' => '',
      'site_supervisor_name_err' => '',
      'site_supervisor_phone_err' => '',
      'site_supervisor_email_err' => '',
      'internship_evaluator_name_err' => '',
      'internship_evaluator_phone_err' => '',
      'internship_evaluator_email_err' => '',
      'internship_evaluator_resume_err' => '',
      'internship_title_err' => '',
      'academic_focus_err' => '',
      'graduate_or_undergraduate_err' => '',
      'grading_scale_err' => '',
      'requested_credits_err' => '',
      'college_err' => '',
      'academic_major_err' => '',
      'academic_minor_err' => '',
      'start_date_err' => '',
      'end_date_err' => '',
      'hours_per_week_err' => '',
      'compensation_err' => '',
      'competence_statement_err' => '',
      'learning_strategy_err' => '',
      'evaluation_err' => '',
      'student_signature_err' => '',
    ];

    return $data;
  }

  public function getApplicationData($application_id){
    $row = $this->userModel->getApplicationByApplicationID($application_id);
    $status = $this->userModel->getApplicationStatus($application_id);
    $comments = $this->userModel->getApplicationsComments($application_id);
    
    $data = [
      'application_id' => $row->Application_ID,
      'student_name' => $row->Student_Name,
      'student_ID' => $row->Student_ID,
      'student_address' => $row->Student_Address,
      'student_city' => $row->Student_City,
      'student_state' => $row->Student_State,
      'student_zip_code' => $row->Student_Zip_Code,
      'student_home_phone' => $row->Student_Home_Phone,
      'student_work_phone' => $row->Student_Work_Phone,
      'metrostate_advisor' => $row->Metrostate_Advisor,
      'student_email' => $row->Student_Email,
      'company_name' => $row->Company_Name,
      'company_email' => $row->Company_Email,
      'company_address' => $row->Company_Address,
      'company_city' => $row->Company_City,
      'company_state' => $row->Company_State,
      'company_zip_code' => $row->Company_Zip_Code,
      'site_supervisor_name' => $row->Site_Supervisor_Name,
      'site_supervisor_phone' => $row->Site_Supervisor_Phone,
      'site_supervisor_email' => $row->Site_Supervisor_Email,
      'internship_evaluator_name' => $row->Internship_Evaluator_Name,
      'internship_evaluator_phone' => $row->Internship_Evaluator_Phone,
      'internship_evaluator_email' => $row->Internship_Evaluator_Email,
      'internship_evaluator_resume' => $row->Internship_Evaluator_Resume,
      'internship_title' => $row->Internship_Title,
      'academic_focus' => $row->Academic_Focus,
      'graduate_or_undergraduate' => $row->Graduate_Or_Undergraduate,
      'grading_scale' => $row->Grading_Scale,
      'requested_credits' => $row->Requested_Credits,
      'college' => $row->College,
      'academic_major' => $row->Academic_Major,
      'academic_minor' => $row->Academic_Minor,
      'start_date' => $row->Start_Date,
      'end_date' => $row->End_Date,
      'hours_per_week' => $row->Hours_Per_Week,
      'compensation' => $row->Compensation,
      'competence_statement' => $row->Competence_Statement,
      'learning_strategy' => $row->Learning_Strategy,
      'evaluation' => $row->Evaluation,
      'submitted' => $row->Submitted,
      'student_signature' => $status->Student_Signature,
      'employer_signature' => $status->Employer_Signature,
      'faculty_liaison_signature' => $status->Faculty_Liaison_Signature,
      'dean_signature' => $status->Dean_Signature,
      'internship_coordinator_signature' => $status->Internship_Coordinator_Signature,
      'application_status' => $status->Application_Status,
      'signature_err' => '',
      'signature' => '',
      'approve_or_decline' => '',
      'approve_or_decline_err' => '',
      'employer_comments' => '',
      'dean_comments' => '',
      'faculty_liaison_comments' => '',
      'internship_coordinator_comments' => '',
    ];

    $user_signature_types = [
      'Employer' => 'employer_signature',
      'Dean' => 'dean_signature',
      'FacultyLiaison' => 'faculty_liaison_signature',
      'InternshipCoordinator' => 'internship_coordinator_signature',
    ];

    $written_signature_types = [
      'Employer' => 'Employer Signature',
      'Dean' => 'Dean Signature',
      'FacultyLiaison' => 'Faculty Liaison Signature',
      'InternshipCoordinator' => 'Internship Coordinator Signature',
    ];
    
    if($_SESSION['user_type'] != 'Student'){
      $data['string_user_type'] = $user_signature_types[$_SESSION['user_type']];
      $data['user_type_signature'] = $written_signature_types[$_SESSION['user_type']];
    }

    $user_type_to_data_type = [
      'Employer' => 'employer_comments',
      'Dean' => 'dean_comments',
      'FacultyLiaison' => 'faculty_liaison_comments',
      'InternshipCoordinator' => 'internship_coordinator_comments',
    ];

    foreach($comments as $a_comment){
      $user = $this->userModel->getUserByUserID($a_comment->User_ID);
      $data[$user_type_to_data_type[$user->User_Type]] = $a_comment->Comment;
    }

    $data['user_comment'] = $data[$user_type_to_data_type[$_SESSION['user_type']]];

    return $data;
  }

  public function viewUser()
  {
    if ($this->isLoggedIn()) {
      $row = $this->userModel->getUserByUserId($_SESSION['user_id']);
      $data = [
        'username' => $row->User_Name,
        'usertype' => $row->User_Type,
        'created' => $row->Created,
        'email' => $row->Email,
        'firstname' => $row->First_Name,
        'lastname' => $row->Last_Name,
      ];
      $this->view('users/userinfo', $data);
    } else {
      redirect('users/login');
    }
  }

  public function viewEvaluatorResume($application_id){
    $data = $this->getApplicationData($application_id);
    $this->returnUploaded($data['internship_evaluator_resume']);
  }

  

  public function login()
  {
    // Check if logged in
    if ($this->isLoggedIn()) {
      redirect('users/viewUser');
    }

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'user_name_err' => '',
        'password_err' => '',
      ];

      // Check for username
      if (empty($data['username'])) {
        $data['user_name_err'] = 'Please enter username.';
      }

      // Check for user
      if ($this->userModel->findUserByUserName($data['username'])) {
        // User Found
      } else {
        // No User
        $data['user_name_err'] = 'This username is not registered.';
      }

      // Make sure errors are empty
      if (empty($data['user_name_err']) && empty($data['password_err'])) {

        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['username'], $data['password']);

        if ($loggedInUser) {
          // User Authenticated!
          $this->createUserSession($loggedInUser);
          redirect('users/viewUser');
        } else {
          $data['user_name_err'] = 'Username does not exist.';
          // Load View
          $this->view('users/login', $data);
        }
      } else {
        // Load View
        $this->view('users/login', $data);
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
      $this->view('users/login', $data);
    }
  }

  // Create Session With User Info
  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->User_ID;
    $_SESSION['user_email'] = $user->Email;
    $_SESSION['user_name'] = $user->User_Name;
    $_SESSION['user_type'] = $user->User_Type;
    $_SESSION['first_name'] = $user->First_Name;
    $_SESSION['last_name'] = $user->Last_Name;
    if ($_SESSION['user_type'] == 'Student') {
      $row = $this->userModel->findStudentByUserID($_SESSION['user_id']);
      $_SESSION['student_id'] = $row->Student_ID;
    }
  }

  // Logout & Destroy Session
  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_type']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    if(isset($_SESSION['student_id'])){
      unset($_SESSION['student_id']);
    }
    session_destroy();
    redirect('users/login');
  }

  // Check Logged In
  public function isLoggedIn()
  {
    if (isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }

  public function isLoggedInStudent(){
    if (isset($_SESSION['student_id'])) {
      return true;
    } else {
      return false;
    }
  }
}
