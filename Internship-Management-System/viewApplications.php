<?php
  session_start();
  include('loginfunctions.php');
  require_once "config.php";
?>

<head>
<title>View Application</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/generalstylesheet.css">
<link rel="stylesheet" href="css/viewuser.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>

<body>
  <div id="page-container">
  <div id="content-wrap">

<?php
    if (isLoggedIn()){
        $student_ID = $_GET['studentid'];
        include('header.html');
        $result = $link->query("SELECT application_ID, student_name, student_ID, student_address, student_city, student_state, student_zip_code, student_home_phone,
        student_work_phone, metrostate_advisor, student_email, company_name, company_email, company_address, company_city,
        company_state, company_zip_code, site_supervisor_name, site_supervisor_phone, site_supervisor_email, internship_evaluator_name,
        internship_evaluator_phone, internship_evaluator_email, internship_evaluator_resume, internship_title, academic_focus, 
        graduate_or_undergraduate, grading_scale, requested_credits, college, academic_major, academic_minor, start_date, end_date,
        hours_per_week, compensation, competence_statement, learning_strategy, evaluation, student_signature, employer_signature,
        faculty_liaison_signature, dean_signature, internship_coordinator_signature, application_status FROM applications WHERE student_ID = '".$student_ID."'");

        while($row = $result->fetch_object()){
          $_SESSION['applicationid'] = $row->application_ID;
          $user_type = $_SESSION['usertype'];
          $user_signature = $_SESSION['usertype']."_signature";
          if($row == null){
            echo "<div id='centered'><h2>No Applications</h2></div>";
            echo "</div>";
          }
          echo "<div id='top'><h1>".$row->student_name."'s Application</h1>";
          if($user_type == "Student"){
            echo "<div id='centered'><a href='deleteapplication.php?applicationid=".$row->application_ID."'>Delete Application</a></div>";
          }
          echo "</div>";

          echo "<div id='container'>";
          echo "<table border='1'>";
          echo "<tr><td>Student Name </td><td>".$row->student_name."</td></tr>";
          echo "<tr><td>Student ID </td><td>".$row->student_ID."</td></tr>";
          echo "<tr><td>Student Address </td><td>".$row->student_address."</td></tr>";
          echo "<tr><td>Student City </td><td>".$row->student_city."</td></tr>";
          echo "<tr><td>Student State</td><td>".$row->student_state."</td></tr>"; 
          echo "<tr><td>Student Zip-Code</td><td>".$row->student_zip_code."</td></tr>"; 
          echo "<tr><td>Student Home Phone </td><td>".$row->student_home_phone."</td></tr>";
          echo "<tr><td>Student Work Phone </td><td>".$row->student_work_phone."</td></tr>"; 
          echo "<tr><td>Metropolitan State Advisor </td><td>".$row->metrostate_advisor."</td></tr>"; 
          echo "<tr><td>Student Email </td><td>".$row->student_email."</td></tr>"; 
          echo "<tr><td>Company Name </td><td>".$row->company_name."</td></tr>"; 
          echo "<tr><td>Company Email </td><td>".$row->company_email."</td></tr>"; 
          echo "<tr><td>Company Address </td><td>".$row->company_address."</td></tr>"; 
          echo "<tr><td>Company City </td><td>".$row->company_city."</td></tr>";
          echo "<tr><td>Company State </td><td>".$row->company_state."</td></tr>"; 
          echo "<tr><td>Company Zip-Code </td><td>".$row->company_zip_code."</td></tr>"; 
          echo "<tr><td>Site Supervisor Name </td><td>".$row->site_supervisor_name."</td></tr>"; 
          echo "<tr><td>Site Supervisor Phone Name </td><td>".$row->site_supervisor_phone."</td></tr>"; 
          echo "<tr><td>Site Supervisor Email Name </td><td>".$row->site_supervisor_email."</td></tr>"; 
          echo "<tr><td>Internship Evaluator Name </td><td>".$row->internship_evaluator_name."</td></tr>";
          echo "<tr><td>Internship Evaluator Phone </td><td>".$row->internship_evaluator_phone."</td></tr>"; 
          echo "<tr><td>Internship Evaluator Email </td><td>".$row->internship_evaluator_email."</td></tr>"; 
          echo "<tr><td>Internship Evaluator Resume </td><td><a href='".$row->internship_evaluator_resume."'>Internship Evaluator Resume </a></td></tr>";
          echo "<tr><td>Internship Title </td><td>".$row->internship_title."</td></tr>"; 
          echo "<tr><td>Academic Focus </td><td>".$row->academic_focus."</td></tr>"; 
          echo "<tr><td>Graduate or Undergraduate </td><td>".$row->graduate_or_undergraduate."</td></tr>"; 
          echo "<tr><td>Grading Scale </td><td>".$row->grading_scale."</td></tr>"; 
          echo "<tr><td>Requested Credits </td><td>".$row->requested_credits."</td></tr>"; 
          echo "<tr><td>College </td><td>".$row->college."</td></tr>"; 
          echo "<tr><td>Academic Major </td><td>".$row->academic_major."</td></tr>"; 
          echo "<tr><td>Academic Minor </td><td>".$row->academic_minor."</td></tr>"; 
          echo "<tr><td>Start Date </td><td>".$row->start_date."</td></tr>"; 
          echo "<tr><td>End Date </td><td>".$row->end_date."</td></tr>";
          echo "<tr><td>Hours Per Week </td><td>".$row->hours_per_week."</td></tr>"; 
          echo "<tr><td>Compensation </td><td>".$row->compensation."</td></tr>"; 
          echo "<tr><td>Competence Statement </td><td>".$row->competence_statement."</td></tr>"; 
          echo "<tr><td>Learning Strategy </td><td>".$row->learning_strategy."</td></tr>"; 
          echo "<tr><td>Evaluation </td><td>".$row->evaluation."</td></tr>"; 

          if($user_type == 'Student'){
            echo "<tr><td>".$user_signature."</td><td>".$row->student_signature."</td></tr>"; 
          } else if($user_type == 'Employer'){
            if($row->employer_signature == null){
              echo 
              "<tr><td>".$user_signature."</td><td>
                  <form method='post' action='sign.php'>

                  <label for= 'signature'> Employer Signature: </label>
                  <input type = text' name = 'signature' oninvalid='alert('Please Sign you First and Last name');' placeholder='First Name Last Name'>
                  <br>

					        <input type='submit' class='button' value='Sign'>
					        <input type='reset' class='button' value='Reset'>
                  </form>
              </td></tr>"; 

            } else {
              echo "<tr><td>".$user_signature."</td><td>".$row->employer_signature."</td></tr>"; 
            }
          } else if($user_type == 'Dean'){
            if($row->dean_signature == null){
              echo 
              "<tr><td>".$user_signature."</td><td>
                  <form method='post' action='sign.php'>

                  <label for= 'signature'> Dean Signature: </label>
                  <input type = text' name = 'signature' oninvalid='alert('Please Sign you First and Last name');' placeholder='First Name Last Name'>
                  <br>

					        <input type='submit' class='button' value='Sign'>
					        <input type='reset' class='button' value='Reset'>
                  </form>
              </td></tr>"; 

            } else {
              echo "<tr><td>".$user_signature."</td><td>".$row->dean_signature."</td></tr>"; 
            }
          } else if($user_type == 'Faculty Liaison'){
            if($row->faculty_liaison_signature == null){
              echo 
              "<tr><td>".$user_signature."</td><td>
                  <form method='post' action='sign.php'>

                  <label for= 'signature'> Faculty Liaison Signature: </label>
                  <input type = text' name = 'signature' oninvalid='alert('Please Sign you First and Last name');' placeholder='First Name Last Name'>
                  <br>

					        <input type='submit' class='button' value='Sign'>
					        <input type='reset' class='button' value='Reset'>
                  </form>
              </td></tr>"; 

            } else {
              echo "<tr><td>".$user_signature."</td><td>".$row->faculty_liaison_signature."</td></tr>"; 
            } 
          } else{
            if($row->internship_coordinator_signature == null){
              echo 
              "<tr><td>".$user_signature."</td><td>
                  <form method='post' action='sign.php'>

                  <label for= 'signature'> Internship Coordinator Signature: </label>
                  <input type = text' name = 'signature' oninvalid='alert('Please Sign you First and Last name');' placeholder='First Name Last Name'>
                  <br>

					        <input type='submit' class='button' value='Sign'>
					        <input type='reset' class='button' value='Reset'>
                  </form>
              </td></tr>"; 

            } else {
              echo "<tr><td>".$user_signature."</td><td>".$row->internship_coordinator_signature."</td></tr>"; 
            } 
          }

          echo "<tr><td>Application Status </td><td>".$row->application_status."</td></tr>";

          echo "</table>";
          echo "</div>";
        }
      $link->close();
    } else {  
      isNotLoggedIn();
    }
  ?>
  </div>
    <?php include('footer.html'); ?>
  </div>
</body>
</html>
