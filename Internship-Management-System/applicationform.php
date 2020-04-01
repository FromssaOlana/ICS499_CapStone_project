<?php
session_start();
include('loginfunctions.php');

require_once "config.php";
require_once "Application.php";

$student_name = $student_ID = $student_address = $student_city = $student_state = $student_zip_code = $student_home_phone = 
$student_work_phone = $metrostate_advisor = $student_email = $company_name = $company_email = $company_address = $company_city =
$company_state = $company_zip_code = $site_supervisor_name = $site_supervisor_phone = $site_supervisor_email = $internship_evaluator_name =
$internship_evaluator_phone = $internship_evaluator_email = $internship_evaluator_resume = $internship_title = $academic_focus = 
$graduate_or_undergraduate = $grading_scale = $requested_credits = $college = $academic_major = $academic_minor = $start_date = $end_date =
$hours_per_week = $compensation = $competence_statement = $learning_strategy = $evaluation = $student_signature = "";

$student_name_err = $student_ID_err = $student_address_err = $student_city_err = $student_state_err = $student_zip_code_err = $student_home_phone_err = 
$student_work_phone_err = $metrostate_advisor_err = $student_email_err = $company_name_err = $company_email_err = $company_address_err = $company_city_err =
$company_state_err = $company_zip_code_err = $site_supervisor_name_err = $site_supervisor_phone_err = $site_supervisor_email_err = $internship_evaluator_name_err =
$internship_evaluator_phone_err = $internship_evaluator_email_err = $internship_evaluator_resume_err = $internship_title_err = $academic_focus_err = 
$graduate_or_undergraduate_err = $grading_scale_err = $requested_credits_err = $college_err = $academic_major_err = $academic_minor_err = $start_date_err = $end_date_err =
$hours_per_week_err = $compensation_err = $competence_statement_err = $learning_strategy_err = $evaluation_err = $student_signature_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //Validate student name
	if(empty(trim($_POST["studentname"]))){
        $student_name_err = "Please Enter Student Name.";
  } else {
		if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST["studentname"]))) {
			$student_name_err = "Only letters and white space are allowed";
		} else {
			$student_name = trim($_POST["studentname"]);
		}
  }

  // Validate studentID
  if(empty(trim($_POST["studentID"]))){
    $student_ID_err = "Please Enter a Student ID.";
  } else{
	    if(strlen(trim($_POST["studentID"])) != 8){
        $student_ID_err = "Please enter a valid Student ID.";
      } else if (!preg_match("/^\d+$/", trim($_POST["studentID"]))) {
			  $student_ID_err = "Only numbers are allowed";
		  } else {
			  $student_ID = trim($_POST["studentID"]);
		  }
  }

  //Validate student address
	if(empty(trim($_POST["studentaddress"]))){
      $student_address_err = "Please Enter Student's Address.";
  } else {
		if (preg_match('/^(?:\\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/',trim($_POST["studentaddress"]))) {
			$student_address_err = "Only letters and white space are allowed";
		} else {
			$student_address = trim($_POST["studentaddress"]);
		}
  }

  //Validate student city
	if(empty(trim($_POST["studentcity"]))){
      $student_city_err = "Please Enter Student's City'.";
  } else {
		if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST["studentcity"]))) {
			$student_city_err = "Only letters and white space are allowed";
		} else {
			$student_city = trim($_POST["studentcity"]);
		}
  }

    //Validate student state
    if(empty(trim($_POST["studentstate"]))){
        $student_state_err = "Please Enter a state.";
    } elseif(strlen(trim($_POST["studentstate"])) != 2){
        $student_state_err = "Please Enter a valid State's initials.";
    } else if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST["studentstate"]))) {
        $student_state_err = "Only characters are allowed";
    } else{
        $student_state = trim($_POST["studentstate"]);
    }

    //Validate student zipcode
    if(empty(trim($_POST["studentzipcode"]))){
        $student_zip_code_err = "Please Enter a Zip-Code.";
    } elseif(strlen(trim($_POST["studentzipcode"])) != 5){
        $student_zip_code_err = "Please Enter a valid Zip-Code of 5 digits.";
    } else if (!preg_match("/^\d+$/", trim($_POST["studentzipcode"]))) {
        $student_zip_code_err = "Only numbers are allowed";
    } else{
        $student_zip_code = trim($_POST["studentzipcode"]);
    }

    //Validate student homephone
    if(empty(trim($_POST["studenthomephone"]))){
        $student_home_phone_err = "Please Enter a Home Phone number.";
    } else{
      if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", trim($_POST["studenthomephone"]))) {
        $student_home_phone = trim($_POST["studenthomephone"]);
      } else{
        $student_home_phone_err = "Please enter your home phone number in this format XXX-XXX-XXXX";
      }
    }

    //Validate student workphone
    if(empty(trim($_POST["studentworkphone"]))){
      $student_work_phone_err = "Please Enter a work phone number.";
  } else{
    if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", trim($_POST["studentworkphone"]))) {
      $student_work_phone = trim($_POST["studentworkphone"]);
    } else{
      $student_work_phone_err = "Please enter your work phone number in this format XXX-XXX-XXXX";
    }
  }
         
    //Validate metrostate advisor name
	  if(empty(trim($_POST["metrostateadvisor"]))){
        $metrostate_advisor_err = "Please Enter your Metrostate Advisor's name.";
    } else {
		  if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST["metrostateadvisor"]))) {
			  $metrostate_advisor_err = "Only letters and white space are allowed";
		  } else {
			  $metrostate_advisor = trim($_POST["metrostateadvisor"]);
		  }
    }

  // Validate student email
  if(empty(trim($_POST["studentemail"]))){
    $student_email_err = "Please Enter your Student Email Address.";
  } else{
	    if(!filter_var(trim($_POST["studentemail"]), FILTER_VALIDATE_EMAIL)) {
        $student_email_err = "Invalid email format.";
      } else{
        $student_email = trim($_POST["studentemail"]);
      }
  }

    //Validate company name
	  if(empty(trim($_POST["companyname"]))){
      $company_name_err = "Please Enter your Company's name.";
    } else {
			$company_name = trim($_POST["companyname"]);
    }

    // Validate company email
  if(empty(trim($_POST["companyemail"]))){
    $company_email_err = "Please Enter your Company's Email Address.";
  } else{
	    if(!filter_var(trim($_POST["companyemail"]), FILTER_VALIDATE_EMAIL)) {
        $company_email_err = "Invalid email format.";
      } else{
        $company_email = trim($_POST["companyemail"]);
      }
  }

  //Validate company address
  if(empty(trim($_POST["companyaddress"]))){
      $company_address_err = "Please Enter Company's Address.";
  } else {
		if (preg_match('/^(?:\\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/',trim($_POST["companyaddress"]))) {
			$company_address_err = "Only letters and white space are allowed";
		} else {
			$company_address = trim($_POST["companyaddress"]);
		}
  }

  //Validate company city
  if(empty(trim($_POST["companycity"]))){
    $company_city_err = "Please Enter Company's City.";
  } else {
    if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST["companycity"]))) {
      $company_city_err = "Only letters and white space are allowed";
    } else {
      $company_city = trim($_POST["companycity"]);
    }
  }

  //Validate company state
  if(empty(trim($_POST["companystate"]))){
      $company_state_err = "Please Enter a state.";
  } elseif(strlen(trim($_POST["companystate"])) != 2){
      $company_state_err = "Please Enter a valid State's initials.";
  } else if (!preg_match("/^[a-zA-Z ]*$/", $company_state)) {
      $company_state_err = "Only characters are allowed";
  } else{
      $company_state = trim($_POST["companystate"]);
  }

  //Validate company zipcode
  if(empty(trim($_POST["companyzipcode"]))){
      $company_zip_code_err = "Please Enter a Zip-Code.";
  } elseif(strlen(trim($_POST["companyzipcode"])) != 5){
      $company_zip_code_err = "Please Enter a valid Zip-Code of 5 digits.";
  } else if (!preg_match("/^\d+$/", trim($_POST["companyzipcode"]))) {
      $company_zip_code_err = "Only numbers are allowed";
  } else{
      $company_zip_code = trim($_POST["companyzipcode"]);
  }

    //Validate site supervisor name
	  if(empty(trim($_POST["sitesupervisorname"]))){
        $site_supervisor_name_err = "Please Enter your Site supervisor's name.";
    } else {
		  if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST["sitesupervisorname"]))) {
			  $site_supervisor_name_err = "Only letters and white space are allowed";
		  } else {
			  $site_supervisor_name = trim($_POST["sitesupervisorname"]);
		  }
    }

    //Validate site supervisor phone
    if(empty(trim($_POST["sitesupervisorphone"]))){
        $site_supervisor_phone_err = "Please Enter a Phone number.";
    } else{
      if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", trim($_POST["sitesupervisorphone"]))) {
        $site_supervisor_phone = trim($_POST["sitesupervisorphone"]);
      } else{
        $site_supervisor_phone_err = "Please enter the phone number in this format XXX-XXX-XXXX";
      }
    }

    // Validate site supervisor email
  if(empty(trim($_POST["sitesupervisoremail"]))){
      $site_supervisor_email_err = "Please Enter your Site supervisor's Email Address.";
  } else{
	    if(!filter_var(trim($_POST["sitesupervisoremail"]), FILTER_VALIDATE_EMAIL)) {
        $site_supervisor_email_err = "Invalid email format.";
      } else{
        $site_supervisor_email = trim($_POST["sitesupervisoremail"]);
      }
  }


  //Validate internship evaluator name
	  if(empty(trim($_POST["internshipevaluatorname"]))){
        $internship_evaluator_name_err = "Please Enter your Internship Evaluator's name.";
    } else {
		  if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST["internshipevaluatorname"]))) {
			  $internship_evaluator_name_err = "Only letters and white space are allowed";
		  } else {
			  $internship_evaluator_name = trim($_POST["internshipevaluatorname"]);
		  }
    }

    //Validate internship evaluator phone
    if(empty(trim($_POST["internshipevaluatorphone"]))){
        $internship_evaluator_phone_err = "Please Enter a Phone number.";
    } else{
      if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", trim($_POST["internshipevaluatorphone"]))) {
        $internship_evaluator_phone = trim($_POST["internshipevaluatorphone"]);
      } else{
        $internship_evaluator_phone_err = "Please enter the phone number in this format XXX-XXX-XXXX";
      }
    }

    // Validate internship evaluator email
  if(empty(trim($_POST["internshipevaluatoremail"]))){
    $internship_evaluator_email_err = "Please Enter your Internship Evaluator's Email Address.";
  } else{
	    if(!filter_var(trim($_POST["internshipevaluatoremail"]), FILTER_VALIDATE_EMAIL)) {
        $internship_evaluator_email_err = "Invalid email format.";
      } else{
        $internship_evaluator_email = trim($_POST["internshipevaluatoremail"]);
      }
  }

      //Validate resume
    if (isset($_FILES['internshipevaluatorresume'] ) ) {
      $file = $_FILES['internshipevaluatorresume'];

      $fileName = $_FILES['internshipevaluatorresume']['name'];
      $tmpName  = $_FILES['internshipevaluatorresume']['tmp_name'];
      $fileSize = $_FILES['internshipevaluatorresume']['size'];
      $fileError = $_FILES['internshipevaluatorresume']['error'];
      $fileType = $_FILES['internshipevaluatorresume']['type'];

      $fileExt = explode('.',$fileName);
      $fileActualExt = strtolower(end($fileExt));
      $allowed = array('pdf','doc','docx');

      if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
          if($fileSize < 1000000){
            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNameNew;
            $internship_evaluator_resume = $fileDestination;
            move_uploaded_file($tmpName,$fileDestination);

            $content = $fileDestination;

            $sql = "INSERT INTO upload (name, type, size, content) VALUES (?,?,?,?)";
              
            if($stmt = mysqli_prepare($link, $sql)){
              mysqli_stmt_bind_param($stmt, "ssis", $param_fileName, $param_fileType, $param_fileSize, $param_content);
      
              $param_fileName = $fileName;
              $param_fileSize = $fileSize;
              $param_fileType = $fileType;
              $param_content = $content;
      
              if(mysqli_stmt_execute($stmt)){
                echo "Resume Submitted!";
              } else{
                echo " File Name: ",$param_fileName;
                echo " File Size: ",$param_fileSize;
                echo " File Type: ",$param_fileType;
                echo " Content: ",$param_content;
                echo " Something went wrong. Please try again later.";
                die('execute() failed: ' . htmlspecialchars($stmt->error));
              }
                mysqli_stmt_close($stmt);
            }
          } else{
            $internship_evaluator_resume_err = "Your file was too big.";
          }
        } else{
          $internship_evaluator_resume_err = "There was an error uploading your file.";
        }
      } else{
        $internship_evaluator_resume_err = "Please upload a valid resume in PDF, DOC, or DOCX format.";
      }
    } else{
      $internship_evaluator_resume_err = "Please upload a resume in PDF, DOC, or DOCX format.";
    }

    //Validate internship title
	  if(empty(trim($_POST["internshiptitle"]))){
        $internship_title_err = "Please Enter your Internship Title.";
    } else {
		  if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST["internshiptitle"]))) {
			  $internship_title_err = "Only letters and white space are allowed";
		  } else {
			  $internship_title = trim($_POST["internshiptitle"]);
		  }
    }

    //Validate academic focus
	  if(empty(trim($_POST["academicfocus"]))){
        $academic_focus_err = "Please Enter your Academic Focus.";
    } else {
		  if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST["academicfocus"]))) {
			  $academic_focus_err = "Only letters and white space are allowed";
		  } else {
			  $academic_focus = trim($_POST["academicfocus"]);
		  }
    }

    //Validate graduate or undergraduate
	  if(isset($_POST["graduateorundergraduate"])){
      $graduate_or_undergraduate = $_POST["graduateorundergraduate"];
    } else {
			$graduate_or_undergraduate_err = "Please select whether you are a graduate or undergraduate.";
    }

    //Validate grading scale
	  if(isset($_POST["gradingscale"])){
      $grading_scale = $_POST["gradingscale"];
    } else {
			$grading_scale_err = "Please select your requested Grading Scale for this internship.";
    }

    //Validate requested credits
  if(empty(trim($_POST["requestedcredits"]))){
      $requested_credits_err = "Please Enter your requested credits.";
  } elseif(strlen(trim($_POST["requestedcredits"])) != 1){
      $requested_credits_err = "Please Enter a valid requested credit amount of 0-9.";
  } else if (!preg_match("/^\d+$/", trim($_POST["requestedcredits"]))) {
      $requested_credits_err = "Only numbers are allowed";
  } else{
      $requested_credits = trim($_POST["requestedcredits"]);
  }

    //Validate college
	  if(isset($_POST["college"])){
      $college = $_POST["college"];
    } else {
		  $college_err = "Please select your College.";
    }

    //Validate Academic major
	  if(empty(trim($_POST["academicmajor"]))){
      $academic_major_err = "Please Enter your Academic Major.";
    } else {
      if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST["academicmajor"]))) {
       $academic_major_err = "Only letters and white space are allowed";
      } else {
        $academic_major = trim($_POST["academicmajor"]);
      }
    }

  //Validate Academic minor
	  if(empty(trim($_POST["academicminor"]))){
      $academic_minor_err = "Please Enter your Academic Minor.";
    } else {
      if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST["academicminor"]))) {
        $academic_minor_err = "Only letters and white space are allowed";
      } else {
        $academic_minor = trim($_POST["academicminor"]);
      }
    }

  //Validate start date
	  if(empty(trim($_POST["startdate"]))){
      $start_date_err = "Please Enter your start date.";
    } else {
      $temp_start_date = trim($_POST["startdate"]);
      $test_arr  = explode('/', $temp_start_date);
      if (checkdate($test_arr[0], $test_arr[1], $test_arr[2])) {
        $current_date = date('m/d/y');
        $temp_start_date = date('m/d/y',strtotime(trim($_POST["startdate"])));
        if($current_date > $temp_start_date || $current_date == $temp_start_date){
          $start_date_err = "Please Enter a valid start date, that is after todays date.";
        } else{
          $start_date = date('m/d/y',strtotime(trim($_POST["startdate"])));
        }
      } else{
        $start_date_err = "Please enter a valid date in this format MM/DD/YYYY";
      }
    }

  //Validate end date
	  if(empty(trim($_POST["enddate"]))){
      $end_date_err = "Please Enter your end date.";
    } else {
      $temp_end_date = trim($_POST["enddate"]);
      $test_arr  = explode('/', $temp_end_date);
      if (checkdate($test_arr[0], $test_arr[1], $test_arr[2])) {
        $current_date = date('m/d/y');
        if($current_date > $temp_end_date || $current_date == $temp_end_date){
          $end_date_err = "Please Enter a valid end date, that is after todays date.";
          $temp_end_date = date('m/d/y',strtotime(trim($_POST["enddate"])));
        } else{
          $end_date = date('m/d/y',strtotime(trim($_POST["enddate"])));
        }
      } else{
        $end_date_err = "Please enter a valid date in this format MM/DD/YYYY";
      }
    }

    //validate start and end date
    if ($start_date > $end_date){
      $start_date_err = "The start date is after the end date";
      $end_date_err = "The end date is before the start date";
    } else if($start_date == $end_date){
      $start_date_err = "The start date is equal to the end date";
      $end_date_err = "The end date is equal to the start date";
    }

    //Validate hours per week
  if(empty(trim($_POST["hoursperweek"]))){
      $hours_per_week_err = "Please Enter your hours per week.";
  } else if (!preg_match("/^\d+$/", trim($_POST["hoursperweek"]))) {
      $hours_per_week_err = "Only numbers are allowed";
  } else if(trim($_POST["hoursperweek"]) > 40){
      $hours_per_week_err = "Please enter a value of 40 or less.";
  } else{
      $hours_per_week = trim($_POST["hoursperweek"]);
  }

  //Validate compensation
  // if(empty(trim($_POST["compensation"]))){
  //     $compensation_err = "Please Enter your compensation.";
  // } elseif(strlen(trim($_POST["compensation"])) != 2){
  //     $compensation_err = "Please Enter a valid compensation amount of $0-99.";
  // } else if (!preg_match("/^\d+$/", trim($_POST["compensation"]))) {
  //     $compensation_err = "Only numbers are allowed";
  // } else{
  //     $compensation = trim($_POST["compensation"]);
  // }

  if(isset($_POST["compensation"])){
    $compensation = $_POST["compensation"];
  } else{
    $compensation_err = "Please Enter your compensation.";
  }

  //Validate competence statement
  if(strlen(trim($_POST["competencestatement"])) < 100 || strlen(trim($_POST["competencestatement"])) > 1000){
      $competence_statement_err = "Please Enter a valid competence statement of atleast 100 characters and less than 1000 characters.";
  } else{
      $competence_statement = trim($_POST["competencestatement"]);
  }

  //Validate learning strategy
  if(strlen(trim($_POST["learningstrategy"])) < 100 || strlen(trim($_POST["learningstrategy"])) > 1000){
      $learning_strategy_err = "Please Enter a valid learning strategy of atleast 100 characters and less than 1000 characters.";
  } else{
      $learning_strategy = trim($_POST["learningstrategy"]);
  }

  //Validate evaluation
  if(strlen(trim($_POST["evaluation"])) < 100 || strlen(trim($_POST["evaluation"])) > 1000){
      $evaluation_err = "Please Enter a valid evaluation of atleast 100 characters and less than 1000 characters.";
  } else{
      $evaluation = trim($_POST["evaluation"]);
  }

  //Validate student signature
	if(empty(trim($_POST["studentsignature"]))){
        $student_signature_err = "Please sign your full name.";
  } else {
		if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST["studentsignature"]))) {
			$student_signature_err = "Only letters and white space are allowed";
		} else {
			$student_signature = trim($_POST["studentsignature"]);
		}
  }
    

    if(empty($student_name_err) && empty($student_ID_err) && empty($student_address_err) && empty($student_city_err) && empty($student_state_err) && empty($student_zip_code_err) && empty($student_home_phone_err) && 
    empty($student_work_phone_err) && empty($metrostate_advisor_err) && empty( $student_email_err) && empty($company_name_err) && empty( $company_email_err) && empty( $company_address_err) && empty($company_city_err) && 
    empty($company_state_err) && empty($company_zip_code_err) && empty( $site_supervisor_name_err) && empty($site_supervisor_phone_err) && empty( $site_supervisor_email_err) && empty($internship_evaluator_name_err) && 
    empty($internship_evaluator_phone_err) && empty($internship_evaluator_email_err) && empty($internship_evaluator_resume_err) && empty($internship_title_err) && empty($academic_focus_err) && 
    empty($graduate_or_undergraduate_err) && empty($grading_scale_err) && empty($requested_credits_err) && empty($college_err) && empty($academic_major_err) && empty($academic_minor_err) && empty($start_date_err) && 
    empty($end_date_err) && empty($hours_per_week_err) && empty($compensation_err) && empty($competence_statement_err) && empty($learning_strategy_err) && empty($evaluation_err)){
      new Application($student_name, $student_ID, $student_address, $student_city, $student_state, $student_zip_code, $student_home_phone, 
      $student_work_phone, $metrostate_advisor, $student_email, $company_name, $company_email, $company_address, $company_city,
      $company_state, $company_zip_code, $site_supervisor_name, $site_supervisor_phone, $site_supervisor_email, $internship_evaluator_name,
      $internship_evaluator_phone, $internship_evaluator_email, $internship_evaluator_resume, $internship_title, $academic_focus, 
      $graduate_or_undergraduate, $grading_scale, $requested_credits, $college, $academic_major, $academic_minor, $start_date, $end_date,
      $hours_per_week, $compensation, $competence_statement, $learning_strategy, $evaluation,$student_signature);
      header("Location: index.php?applicationsubmitted");
    } 

    mysqli_close($link);
}
?>

<!DOCTYPE HTML>
<html lang = "en">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/generalstylesheet.css">
	  <link rel="stylesheet" type="text/css" href="css/application.css">
	  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>
  <body>
  <div id="page-container">
   <div id="content-wrap">
      <?php if(isLoggedIn()){
       include('header.html');} ?>

    <h1>Academic Internship Agreement</h1>
    <div class="form">
      <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <fieldset>  
        <legend>Student Information</legend>

        <div <?php echo (!empty($student_name_err)) ? 'has-error' : ''; ?>>
          <label>Name: </label>
          <input type= "text" name= "studentname" value="<?php echo $student_name; ?>" placeholder="FirstName LastName">
          <br>
          <span class="error"><?php echo $student_name_err; ?></span>
        </div>

        <div <?php echo (!empty($student_ID_err)) ? 'has-error' : ''; ?>>
          <label>Student ID: </label>
          <input type = "text" name = "studentID" value = "<?php echo $student_ID; ?>" placeholder="Student ID">
          <br>
          <span class="error"><?php echo $student_ID_err; ?></span>
        </div>

        <div <?php echo (!empty($student_address_err)) ? 'has-error' : ''; ?>>
          <label>Address: </label>
          <input type = "text" name = "studentaddress" value = "<?php echo $student_address; ?>" placeholder="Address">
          <br>
          <span class="error"><?php echo $student_address_err; ?></span>
        </div>

        <div <?php echo (!empty($student_city_err)) ? 'has-error' : ''; ?>>
          <label>City: </label>
          <input type = "text" name = "studentcity" value = "<?php echo $student_city; ?>" placeholder="City">
          <br>
          <span class="error"><?php echo $student_city_err; ?></span>
        </div>

        <div <?php echo (!empty($student_state_err)) ? 'has-error' : ''; ?>>
          <label>State: </label>
          <input type = "text" name = "studentstate" value = "<?php echo $student_state; ?>" placeholder="State">
          <br>
          <span class="error"><?php echo $student_state_err; ?></span>
        </div>

        <div <?php echo (!empty($student_zip_code_err)) ? 'has-error' : ''; ?>>
          <label>Zip-Code: </label>
          <input type = "text" name = "studentzipcode" value = "<?php echo $student_zip_code; ?>" placeholder="Zip-Code">
          <br>
          <span class="error"><?php echo $student_zip_code_err; ?></span>
        </div>

        <div <?php echo (!empty($student_home_phone_err)) ? 'has-error' : ''; ?>>
          <label>Home Phone: </label>
          <input type = "text" name = "studenthomephone" value = "<?php echo $student_home_phone; ?>" placeholder="Home Phone">
          <br>
          <span class="error"><?php echo $student_home_phone_err; ?></span>
        </div>

        <div <?php echo (!empty($student_work_phone_err)) ? 'has-error' : ''; ?>>
          <label>Work Phone: </label>
          <input type = "text" name = "studentworkphone" value = "<?php echo $student_work_phone; ?>" placeholder="Work Phone">
          <br>
          <span class="error"><?php echo $student_work_phone_err; ?></span>
        </div>

        <div <?php echo (!empty($metrostate_advisor_err)) ? 'has-error' : ''; ?>>
          <label>Metropolitan State Advisor: </label>
          <input type = "text" name = "metrostateadvisor" value = "<?php echo $metrostate_advisor; ?>" placeholder="FirstName LastName">
          <br>
          <span class="error"><?php echo $metrostate_advisor_err; ?></span>
        </div>

        <div <?php echo (!empty($student_email_err)) ? 'has-error' : ''; ?>>
          <label>Student Email: </label>
          <input type = "text" name = "studentemail" value = "<?php echo $student_email; ?>" placeholder="Student Email">
          <br>
          <span class="error"><?php echo $student_email_err; ?></span>
        </div>
      </fieldset>

      <br>

      <fieldset>
        <legend>Employer Information</legend>
        <div <?php echo (!empty($company_name_err)) ? 'has-error' : ''; ?>>
          <label>Company Name: </label>
          <input type = "text" name = "companyname" value = "<?php echo $company_name; ?>" placeholder="Company Name">
          <br>
          <span class="error"><?php echo $company_name_err; ?></span>
        </div>

        <div <?php echo (!empty($company_email_err)) ? 'has-error' : ''; ?>>
          <label>Email: </label>
          <input type = "text" name = "companyemail" value = "<?php echo $company_email; ?>" placeholder="Email">
          <br>
          <span class="error"><?php echo $company_email_err; ?></span>
        </div>

        <div <?php echo (!empty($company_address_err)) ? 'has-error' : ''; ?>>
          <label>Address: </label>
          <input type = "text" name = "companyaddress" value = "<?php echo $company_address; ?>" placeholder="Address">
          <br>
          <span class="error"><?php echo $company_address_err; ?></span>
        </div>

        <div <?php echo (!empty($company_city_err)) ? 'has-error' : ''; ?>>
          <label>City: </label>
          <input type = "text" name = "companycity" value = "<?php echo $company_city; ?>" placeholder="City">
          <br>
          <span class="error"><?php echo $company_city_err; ?></span>
        </div>

        <div <?php echo (!empty($company_state_err)) ? 'has-error' : ''; ?>>
          <label>State: </label>
          <input type = "text" name = "companystate" value = "<?php echo $company_state; ?>" placeholder="State">
          <br>
          <span class="error"><?php echo $company_state_err; ?></span>
        </div>

        <div <?php echo (!empty($company_zip_code_err)) ? 'has-error' : ''; ?>>
          <label>Zip-Code: </label>
          <input type = "text" name = "companyzipcode" value = "<?php echo $company_zip_code; ?>" placeholder="Zip-Code">
          <br>
          <span class="error"><?php echo $company_zip_code_err; ?></span>
        </div>

        <div <?php echo (!empty($site_supervisor_name_err)) ? 'has-error' : ''; ?>>
          <label>Site Supervisor: </label>
          <input type = "text" name = "sitesupervisorname" value = "<?php echo $site_supervisor_name; ?>" placeholder="FirstName LastName">
          <br>
          <span class="error"><?php echo $site_supervisor_name_err; ?></span>
        </div>

        <div <?php echo (!empty($site_supervisor_phone_err)) ? 'has-error' : ''; ?>>
          <label>Site Supervisor Phone: </label>
          <input type = "text" name = "sitesupervisorphone" value = "<?php echo $site_supervisor_phone; ?>" placeholder="Site Supervisor Phone">
          <br>
          <span class="error"><?php echo $site_supervisor_phone_err; ?></span>
        </div>

        <div <?php echo (!empty($site_supervisor_email_err)) ? 'has-error' : ''; ?>>
          <label>Site Supervisor Email: </label>
          <input type = "text" name = "sitesupervisoremail" value = "<?php echo $site_supervisor_email; ?>" placeholder="Site Supervisor Email">
          <br>
          <span class="error"><?php echo $site_supervisor_email_err; ?></span>
        </div>

        <div <?php echo (!empty($internship_evaluator_name_err)) ? 'has-error' : ''; ?>>
          <label>Internship Evaluator Name: </label>
          <input type = "text" name = "internshipevaluatorname" value = "<?php echo $internship_evaluator_name; ?>" placeholder="FirstName LastName">
          <br>
          <span class="error"><?php echo $internship_evaluator_name_err; ?></span>
        </div>

        <div <?php echo (!empty($internship_evaluator_phone_err)) ? 'has-error' : ''; ?>>
          <label>Internship Evaluator Phone: </label>
          <input type = "text" name = "internshipevaluatorphone" value = "<?php echo $internship_evaluator_phone; ?>" placeholder="Internship Evaluator Phone">
          <br>
          <span class="error"><?php echo $internship_evaluator_phone_err; ?></span>
        </div>

        <div <?php echo (!empty($internship_evaluator_email_err)) ? 'has-error' : ''; ?>>
          <label>Internship Evaluator Email: </label>
          <input type = "text" name = "internshipevaluatoremail" value = "<?php echo $internship_evaluator_email; ?>" placeholder="Internship Evaluator Email">
          <br>
          <span class="error"><?php echo $internship_evaluator_email_err; ?></span>
        </div>

        <div <?php echo (!empty($internship_evaluator_resume_err)) ? 'has-error' : ''; ?>>
          <label>Internship Evaluator resume: </label>
          <input type="hidden" name="MAX_FILE_SIZE" value="500000" /> 
          <input type="file" name="internshipevaluatorresume"/>
          <br>
          <span class="error"><?php echo $internship_evaluator_resume_err; ?></span>
        </div>
        </fieldset>

        <br>

        <fieldset>
        <legend>Academic Internship Information </legend>
        <div <?php echo (!empty($internship_title_err)) ? 'has-error' : ''; ?>>
          <label>Internship Title: </label>
          <input type = "text" name = "internshiptitle" value = "<?php echo $internship_title; ?>" placeholder="Internship Title">
          <br>
          <span class="error"><?php echo $internship_title_err; ?></span>
        </div>

        <div <?php echo (!empty($academic_focus_err)) ? 'has-error' : ''; ?>>
          <label>Academic Focus: </label>
          <input type = "text" name = "academicfocus" value = "<?php echo $academic_focus; ?>" placeholder="Academic Focus">
          <br>
          <span class="error"><?php echo $academic_focus_err; ?></span>
        </div>
        
        <br>

        <script>
            $(document).ready(function(){
                $('.checkgraduateorundergraduate').click(function() {
                    $('.checkgraduateorundergraduate').not(this).prop('checked', false);
                });
            });
            $(document).ready(function(){
                $('.checkgradingscale').click(function() {
                    $('.gradingscale').not(this).prop('checked', false);
                });
            });
            $(document).ready(function(){
                $('.checkcollege').click(function() {
                    $('.checkcollege').not(this).prop('checked', false);
                });
            });
            $(document).ready(function(){
                $('.checkcompensation').click(function() {
                    $('.checkcompensation').not(this).prop('checked', false);
                });
            });
        </script>

        <div <?php echo (!empty($graduate_or_undergraduate_err)) ? 'has-error' : ''; ?>>
          <label>Graduate or Undergraduate: </label>
          <input name="graduateorundergraduate" type="checkbox" class="checkgraduateorundergraduate" value= "Graduate">Graduate
          &emsp;
          <input name="graduateorundergraduate" type="checkbox" class="checkgraduateorundergraduate" value= "Undergraduate">Undergraduate
          <br>
          <span class="error"><?php echo $graduate_or_undergraduate_err; ?></span>
        </div>

        <div <?php echo (!empty($grading_scale_err)) ? 'has-error' : ''; ?>>
          <label>Grading Scale: </label>
          <input name="gradingscale" type="checkbox" class="checkgradingscale" value= "Letter Grade">Letter Grade
          &emsp;
          <input name="gradingscale" type="checkbox" class="checkgradingscale" value= "S/N">S/N
          <br>
          <span class="error"><?php echo $grading_scale_err; ?></span>
        </div>

        <div <?php echo (!empty($requested_credits_err)) ? 'has-error' : ''; ?>>
          <label>Requested Credits: </label>
          <input type = "text" name = "requestedcredits" value = "<?php echo $requested_credits; ?>" placeholder="Requested Credits">
          <br>
          <span class="error"><?php echo $requested_credits_err; ?></span>
        </div>

        <div <?php echo (!empty($college_err)) ? 'has-error' : ''; ?>>
          <label>College: </label>
          <input name="college" type="checkbox" class="checkcollege" value= "College of Community Studies and Public Affairs">College of Community Studies and Public Affairs
          <br>
          <input name="college" type="checkbox" class="checkcollege" value= "College of Individualized Studies">College of Individualized Studies
          <br>
          <input name="college" type="checkbox" class="checkcollege" value= "College of Management">College of Management
          <br>
          <input name="college" type="checkbox" class="checkcollege" value= "College of Sciences">College of Sciences
          <br>
          <span class="error"><?php echo $college_err; ?></span>
        </div>

        <div <?php echo (!empty($academic_major_err)) ? 'has-error' : ''; ?>>
          <label>Academic Major: </label>
          <input type = "text" name = "academicmajor" value = "<?php echo $academic_major; ?>" placeholder="Academic Major">
          <br>
          <span class="error"><?php echo $academic_major_err; ?></span>
        </div>

        <div <?php echo (!empty($academic_minor_err)) ? 'has-error' : ''; ?>>
          <label>Academic Minor: </label>
          <input type = "text" name = "academicminor" value = "<?php echo $academic_minor; ?>" placeholder="Academic Minor">
          <br>
          <span class="error"><?php echo $academic_minor_err; ?></span>
        </div>

        <div <?php echo (!empty($start_date_err)) ? 'has-error' : ''; ?>>
          <label>Start Date: </label>
          <input type = "text" name = "startdate" value = "<?php echo $start_date; ?>" placeholder="MM/DD/YYYY">
          <br>
          <span class="error"><?php echo $start_date_err; ?></span>
        </div>

        <div <?php echo (!empty($end_date_err)) ? 'has-error' : ''; ?>>
          <label>End Date: </label>
          <input type = "text" name = "enddate" value = "<?php echo $end_date; ?>" placeholder="MM/DD/YYYY">
          <br>
          <span class="error"><?php echo $end_date_err; ?></span>
        </div>

        <div <?php echo (!empty($hours_per_week_err)) ? 'has-error' : ''; ?>>
          <label>Hours Per Week: </label>
          <input type = "text" name = "hoursperweek" value = "<?php echo $hours_per_week; ?>" placeholder="Hours Per Week">
          <br>
          <span class="error"><?php echo $hours_per_week_err; ?></span>
        </div>

        <div <?php echo (!empty($compensation_err)) ? 'has-error' : ''; ?>>
          <label>Compensation: </label>
          <input type="checkbox" class="checkcompensation" id="Unpaid" name="compensation" value="Unpaid"> Unpaid
          &emsp;
          <input type="checkbox" class="checkcompensation" id="Wages" name="compensation" value="Wages"> Wages
          &emsp;
          <input type="checkbox" class="checkcompensation" id="Stipend" name="compensation" value="Stipend"> Stipend
          &emsp;
          <input type="checkbox" class="checkcompensation" id="Reimbursement" name="compensation" value="Reimbursement"> Reimbursement  
          <br>
          <span class="error"><?php echo $compensation_err; ?></span>
        </div>
        </fieldset>

        <br>

        <fieldset>
          <legend>Academic Internship Evaluation</legend>
          <div <?php echo (!empty($competence_statement_err)) ? 'has-error' : ''; ?>>
            <label>Competence Statement: </label>
            <textarea name = "competencestatement" rows = "5" cols = "60" required = "true" maxlength = 1000
            placeholder="The anticipated learning outcomes format, what you intend to learn. See Handbook on how to write a competence statement." spellcheck = true wrap = hard><?php echo $competence_statement; ?></textarea>
            <span class="error"><?php echo $competence_statement_err; ?></span>
          </div>

          <div <?php echo (!empty($learning_strategy_err)) ? 'has-error' : ''; ?>>
            <label>Learning Strategies: </label>
            <textarea name = "learningstrategy" rows = "5" cols = "60" required = "true" maxlength = 1000
            placeholder="Describe what you are planning to do; include practical and theoretical applications. Be sure to include any college/dept. deliverables such as journals, papers, group meetings" spellcheck = true wrap = hard><?php echo $learning_strategy; ?></textarea>
            <span class="error"><?php echo $learning_strategy_err; ?></span>
          </div>

          <div <?php echo (!empty($evaluation_err)) ? 'has-error' : ''; ?>>
            <label>Evaluation: </label>
            <textarea name = "evaluation" rows = "5" cols = "60" required = "true" maxlength = 1000
            placeholder="Describe how the evaluator will evaluate and document the learning." spellcheck = true wrap = hard><?php echo $evaluation; ?></textarea>
            <span class="error"><?php echo $evaluation_err; ?></span>
          </div>
        </fieldset>

        <div <?php echo (!empty($student_signature_err)) ? 'has-error' : ''; ?>>
          <label>Student Signature: </label>
          <input type = "text" name = "studentsignature" value = "<?php echo $student_signature; ?>" placeholder="First Name Last Name">
          <br>
          <span class="error"><?php echo $student_signature_err; ?></span>
        </div>

        <div>
					<input type="submit" class="button" value="Submit">
					<input type="reset" class="button" value="Reset">
				</div>
      </form>
    </div>
    </div>
    <?php include('footer.html');?>
    </div>
  </body>
</html>