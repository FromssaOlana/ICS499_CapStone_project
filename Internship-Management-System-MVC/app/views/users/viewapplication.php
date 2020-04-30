<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/generalstylesheet.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/viewapplication.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">

<?php require APPROOT . '/views/inc/header.php'; ?>
 
        <?php if($data == null){ ?>
            <div id='centered'><h2>No Application</h2></div>
        <?php } else{ ?>
            <div id='top'>
              <h1><?php echo $data['student_name']; ?>'s Application</h1>
              <?php if(isset($_SESSION['student_id'])){ ?>
                <?php if($_SESSION['student_id'] == $data['student_ID']){ ?>
                  <div id='centered'><a style="text-decoration:none" href="<?php echo URLROOT; ?>/users/editApplication/<?php echo $data['application_id']?>">Edit Application</a>
                  <a style="text-decoration:none" href="<?php echo URLROOT; ?>/users/deleteApplication/<?php echo $data['application_id']?>">Delete Application</a></div>
                <?php } ?>
              <?php } ?>
            </div>

            <div id='container'>
              <table class='application'>
              <thead>
              <tr>
              <th>Column</th>
              <th>Information</th>
              </tr>
              </thead>
                <tr><td>Student Name </td><td><?php echo $data['student_name'] ?></td></tr>
                <tr><td>Student ID </td><td><?php echo $data['student_ID'] ?></td></tr>
                <tr><td>Student Address </td><td><?php echo $data['student_address'] ?></td></tr>
                <tr><td>Student City </td><td><?php echo $data['student_city'] ?></td></tr>
                <tr><td>Student State</td><td><?php echo $data['student_state'] ?></td></tr>
                <tr><td>Student Zip-Code</td><td><?php echo $data['student_zip_code'] ?></td></tr> 
                <tr><td>Student Home Phone </td><td><?php echo $data['student_home_phone'] ?></td></tr>
                <tr><td>Student Work Phone </td><td><?php echo $data['student_work_phone'] ?></td></tr>
                <tr><td>Metropolitan State Advisor </td><td><?php echo $data['metrostate_advisor'] ?></td></tr>
                <tr><td>Student Email </td><td><?php echo $data['student_email'] ?></td></tr>
                <tr><td>Company Name </td><td><?php echo $data['company_name'] ?></td></tr>
                <tr><td>Company Email </td><td><?php echo $data['company_email'] ?></td></tr>
                <tr><td>Company Address </td><td><?php echo $data['company_address'] ?></td></tr>
                <tr><td>Company City </td><td><?php echo $data['company_city'] ?></td></tr>
                <tr><td>Company State </td><td><?php echo $data['company_state'] ?></td></tr>
                <tr><td>Company Zip-Code </td><td><?php echo $data['company_zip_code'] ?></td></tr>
                <tr><td>Site Supervisor Name </td><td><?php echo $data['site_supervisor_name'] ?></td></tr>
                <tr><td>Site Supervisor Phone Name </td><td><?php echo $data['site_supervisor_phone'] ?></td></tr>
                <tr><td>Site Supervisor Email Name </td><td><?php echo $data['site_supervisor_email'] ?></td></tr>
                <tr><td>Internship Evaluator Name </td><td><?php echo $data['internship_evaluator_name'] ?></td></tr>
                <tr><td>Internship Evaluator Phone </td><td><?php echo $data['internship_evaluator_phone'] ?></td></tr>
                <tr><td>Internship Evaluator Email </td><td><?php echo $data['internship_evaluator_email'] ?></td></tr>
                <tr><td>Internship Evaluator Resume </td><td><a href='<?php echo URLROOT ?>/users/viewEvaluatorResume/<?php echo $data['application_id'] ?>'>Internship Evaluator Resume </a></td></tr>
                <tr><td>Internship Title </td><td><?php echo $data['internship_title'] ?></td></tr>
                <tr><td>Academic Focus </td><td><?php echo $data['academic_focus'] ?></td></tr>
                <tr><td>Graduate or Undergraduate </td><td><?php echo $data['graduate_or_undergraduate'] ?></td></tr>
                <tr><td>Grading Scale </td><td><?php echo $data['grading_scale'] ?></td></tr>
                <tr><td>Requested Credits </td><td><?php echo $data['requested_credits'] ?></td></tr>
                <tr><td>College </td><td><?php echo $data['college'] ?></td></tr>
                <tr><td>Academic Major </td><td><?php echo $data['academic_major'] ?></td></tr>
                <tr><td>Academic Minor </td><td><?php echo $data['academic_minor'] ?></td></tr>
                <tr><td>Start Date </td><td><?php echo $data['start_date'] ?></td></tr>
                <tr><td>End Date </td><td><?php echo $data['end_date'] ?></td></tr>
                <tr><td>Hours Per Week </td><td><?php echo $data['hours_per_week'] ?></td></tr>
                <tr><td>Compensation </td><td><?php echo $data['compensation'] ?></td></tr>
                <tr><td>Competence Statement </td><td><?php echo $data['competence_statement'] ?></td></tr>
                <tr><td>Learning Strategy </td><td><?php echo $data['learning_strategy'] ?></td></tr>
                <tr><td>Evaluation </td><td><?php echo $data['evaluation'] ?></td></tr>
                <tr><td>Employer's Comments </td><td><?php echo $data['employer_comments'] ?></td></tr>
                <tr><td>Dean's Comments </td><td><?php echo $data['dean_comments'] ?></td></tr>
                <tr><td>Faculty Liaison's Comments </td><td><?php echo $data['faculty_liaison_comments'] ?></td></tr>
                <tr><td>Internship Coordinator's Comments </td><td><?php echo $data['internship_coordinator_comments'] ?></td></tr>
                <?php if ( $_SESSION['user_type'] != 'Student') { ?>
                <tr><td><?php echo $data['user_type_signature'];?>
                </td><td>
                  <?php if(is_null($data[$data['string_user_type']])) { 
                    echo '';
                  ?>    
                  <?php 
                    } else { 
                      echo $data[$data['string_user_type']];
                    } 
                  ?>
                </td></tr> 
            <?php } ?>
            <tr><td>Date Submitted </td><td><?php echo $data['submitted'] ?></td></tr>
            <tr><td>Application Status </td><td><?php echo $data['application_status'] ?></td></tr>
            </table><br>
            <?php if($_SESSION['user_type'] != 'Student'){ ?>

              <form action="<?php echo URLROOT; ?>/users/postComment/<?php echo $data['application_id']?>" method="post">
                <?php date_default_timezone_set('America/Chicago');?>
                <input type='hidden' name='date' value= '<?php echo date('Y-m-d H:i:s'); ?>'>
                <textarea name='comment' required = true spellcheck = true wrap = hard><?php echo $data['user_comment'] ?></textarea><br>
                <button type='submit' class='button' title='Post or edit comments about the application.' name='submit'>Comment</button>
              </form>

              <div class = "signature">
               <form action="<?php echo URLROOT; ?>/users/signApplication/<?php echo $data['application_id']?>" method="post">
                  <h3><?php echo $data['user_type_signature']  ?></h3>
                  <input type = 'text' title= 'Sign your full name.' name = 'signature' value = "<?php echo $data['signature']; ?>" placeholder='First Name Last Name'>
                  <br>
                  <span class="error"><?php echo $data['signature_err']; ?></span>
                  <br>
                  <input type = 'radio' title= 'Check this box if you accept and approve this application.' value= 'Approve' name = 'approve_or_decline' id= 'Approve' required = true>Approve
                  <input type = 'radio' title= 'Check this box if you decline and disapprove this application.' value= 'Decline' name = 'approve_or_decline' id= 'Decline'> Decline
                  <br>
                  <input type='submit' title ='Please make sure you sign your full name check approve or decline.' class='button' value='Submit'>
                </form>
              </div>
            <?php } ?>
            </div>
        <?php } ?>
        

<?php require APPROOT . '/views/inc/footer.php'; ?>