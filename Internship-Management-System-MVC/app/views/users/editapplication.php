<!DOCTYPE HTML>
<html lang = "en">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/generalstylesheet.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/application.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">

    <?php require APPROOT . '/views/inc/header.php'; ?>

    <div id='heading'>
        <h1>Edit Academic Internship Agreement</h1>
        <p><strong> Please read the following guidelines to ensure your success in getting this Academic Internship approved</strong></p>
        <a style="text-decoration:none" href='<?php echo URLROOT?>/pages/guidelines'>Academic Internship Guidelines</a>
    </div>
    <div class="form">
      <form enctype="multipart/form-data" action="<?php echo URLROOT; ?>/users/application/<?php echo $data['application_id'] ?>" method="post">
      <fieldset>  
        <legend>Student Information</legend>

        <div>
          <label>Name: </label>
          <input type= "text" title="Please use your full name. This name needs to match with your Student ID number. " name= "student_name" value="<?php echo $data['student_name'] ?>" placeholder="FirstName LastName">
          <br>
          <span class="error"><?php echo $data['student_name_err'] ?></span>
        </div>

        <div>
          <label>Student ID: </label>
          <input type = "text" title="Enter your 8 digit Student ID number. " name = "student_ID" value = "<?php echo $data['student_ID'] ?>" placeholder="Student ID">
          <br>
          <span class="error"><?php echo $data['student_ID_err'] ?></span>
        </div>

        <div>
          <label>Street Address: </label>
          <input type = "text" title="Enter your full street address including Apt, Unit, etc. " name = "student_address" value = "<?php echo $data['student_address'] ?>" placeholder="Street Address">
          <br>
          <span class="error"><?php echo $data['student_address_err'] ?></span>
        </div>

        <div>
          <label>City: </label>
          <input type = "text" title="Enter the City corresponding to your street address entered above." name = "student_city" value = "<?php echo $data['student_city'] ?>" placeholder="City">
          <br>
          <span class="error"><?php echo $data['student_city_err'] ?></span>
        </div>

        <div>
          <label>State: </label>
          <input type = "text" title="Enter the State Abbreviation corresponding to your street address entered above. ( Ex: MN )" name = "student_state" value = "<?php echo $data['student_state'] ?>" placeholder="State Abbreviation">
          <br>
          <span class="error"><?php echo $data['student_state_err'] ?></span>
        </div>

        <div>
          <label>Zip-Code: </label>
          <input type = "text" title="Enter your 5 digit zip-code corresponding to your street address entered above." name = "student_zip_code" value = "<?php echo $data['student_zip_code'] ?>" placeholder="Zip-Code">
          <br>
          <span class="error"><?php echo $data['student_zip_code_err'] ?></span>
        </div>

        <div>
          <label>Home Phone: </label>
          <input type = "text" title="Enter your home phone number." name = "student_home_phone" value = "<?php echo $data['student_home_phone'] ?>" placeholder="XXX-XXX-XXXX">
          <br>
          <span class="error"><?php echo $data['student_home_phone_err'] ?></span>
        </div>

        <div>
          <label>Work Phone: </label>
          <input type = "text" title="Enter your work phone number." name = "student_work_phone" value = "<?php echo $data['student_work_phone'] ?>" placeholder="XXX-XXX-XXXX">
          <br>
          <span class="error"><?php echo $data['student_work_phone_err'] ?></span>
        </div>

        <div>
          <label>Metropolitan State Advisor: </label>
          <input type = "text" title="Enter the full name of your Metrostate Advisor." name = "metrostate_advisor" value = "<?php echo $data['metrostate_advisor'] ?>" placeholder="FirstName LastName">
          <br>
          <span class="error"><?php echo $data['metrostate_advisor_err'] ?></span>
        </div>

        <div>
          <label>Student Email: </label>
          <input type = "text" title="Enter your student email. ( Ex: ab1234cd@go.minnstate.edu )" name = "student_email" value = "<?php echo $data['student_email'] ?>" placeholder="Student Email">
          <br>
          <span class="error"><?php echo $data['student_email_err'] ?></span>
        </div>
      </fieldset>

      <br>

      <fieldset>
        <legend>Employer Information</legend>
        <div>
          <label>Company Name: </label>
          <input type = "text" title="Enter the full name of the Company/Organization." name = "company_name" value = "<?php echo $data['company_name'] ?>" placeholder="Company Name">
          <br>
          <span class="error"><?php echo $data['company_name_err'] ?></span>
        </div>

        <div>
          <label>Email: </label>
          <input type = "text" title="Enter the email address of the Company/Organization." name = "company_email" value = "<?php echo $data['company_email'] ?>" placeholder="Email">
          <br>
          <span class="error"><?php echo $data['company_email_err'] ?></span>
        </div>

        <div>
          <label>Address: </label>
          <input type = "text" title="Enter the street address of the Company/Organization." name = "company_address" value = "<?php echo $data['company_address'] ?>" placeholder="Address">
          <br>
          <span class="error"><?php echo $data['company_address_err'] ?></span>
        </div>

        <div>
          <label>City: </label>
          <input type = "text" title="Enter the cit of the Company/Organization." name = "company_city" value = "<?php echo $data['company_city'] ?>" placeholder="City">
          <br>
          <span class="error"><?php echo $data['company_city_err'] ?></span>
        </div>

        <div>
          <label>State: </label>
          <input type = "text" title="Enter the state of the Company/Organization. ( Ex: MN )" name = "company_state" value = "<?php echo $data['company_state'] ?>" placeholder="State Abbreviation">
          <br>
          <span class="error"><?php echo $data['company_state_err'] ?></span>
        </div>

        <div>
          <label>Zip-Code: </label>
          <input type = "text" title="Enter the 5 digit zip-code of the Company/Organization." name = "company_zip_code" value = "<?php echo $data['company_zip_code'] ?>" placeholder="Zip-Code">
          <br>
          <span class="error"><?php echo $data['company_zip_code_err'] ?></span>
        </div>

        <div>
          <label>Site Supervisor: </label>
          <input type = "text" 
          title=
"Enter the full name of your Site Supervisor. At times, 
the site supervisor and internship evaluator are the same 
person (see specific college/department guidelines). If 
no one at the site has expertise in the area of concentration 
for your internship, call the Internship Office for assistance. 
Some college/department guidelines specify that the faculty 
liaison will be the internship evaluator." name = "site_supervisor_name" value = "<?php echo $data['site_supervisor_name'] ?>" placeholder="FirstName LastName">
          <br>
          <span class="error"><?php echo $data['site_supervisor_name_err'] ?></span>
        </div>

        <div>
          <label>Site Supervisor Phone: </label>
          <input type = "text" title="Enter your Site Supervisor's phone number." name = "site_supervisor_phone" value = "<?php echo $data['site_supervisor_phone'] ?>" placeholder="XXX-XXX-XXXX">
          <br>
          <span class="error"><?php echo $data['site_supervisor_phone_err'] ?></span>
        </div>

        <div>
          <label>Site Supervisor Email: </label>
          <input type = "text" title="Enter your Site Supervisor's email address." name = "site_supervisor_email" value = "<?php echo $data['site_supervisor_email'] ?>" placeholder="Site Supervisor Email">
          <br>
          <span class="error"><?php echo $data['site_supervisor_email_err'] ?></span>
        </div>

        <div>
          <label>Internship Evaluator Name: </label>
          <input type = "text" title="Enter your Internship Evaluator's full name. " name = "internship_evaluator_name" value = "<?php echo $data['internship_evaluator_name'] ?>" placeholder="FirstName LastName">
          <br>
          <span class="error"><?php echo $data['internship_evaluator_name_err'] ?></span>
        </div>

        <div>
          <label>Internship Evaluator Phone: </label>
          <input type = "text" title="Enter your Internship Evaluator's phone number." name = "internship_evaluator_phone" value = "<?php echo $data['internship_evaluator_phone'] ?>" placeholder="XXX-XXX-XXXX">
          <br>
          <span class="error"><?php echo $data['internship_evaluator_phone_err'] ?></span>
        </div>

        <div>
          <label>Internship Evaluator Email: </label>
          <input type = "text" title="Enter your Internship Evaluator's email address. This email will allow your internship evaluator to access your application to sign off on it." name = "internship_evaluator_email" value = "<?php echo $data['internship_evaluator_email'] ?>" placeholder="Internship Evaluator Email">
          <br>
          <span class="error"><?php echo $data['internship_evaluator_email_err'] ?></span>
        </div>

        <div>
          <label>Internship Evaluator resume: </label>
          <input type="hidden" name="MAX_FILE_SIZE" value="500000" /> 
          <input type="file" title=
"Submit your Internship Evaluator's resume. If no resume is available, you must
minimally list education and work experience on the form. If the faculty liaison 
is the internship evaluator, you only need to submit the on-site supervisor’s resume." name= "internship_evaluator_resume"/>
          <br>
          <span class="error"><?php echo $data['internship_evaluator_resume_err'] ?></span>
        </div>
        </fieldset>
        <br>

        <fieldset>
        <legend>Academic Internship Information </legend>
        <div>
          <label>Internship Title: </label>
          <input type = "text" title=
"If this were a classroom course, what would you name it? Examples: Applications of
Historical Research, Resource and Curriculum Development, Public Relations Planning.
This will also be the title for the internship course that will appear on your transcript.
NOTE: Do not use a class/course title that is listed in Metropolitan State’s Catalog or
Class Schedule as the title of your internship; this could cause you to “double transcript”
and create problems in graduation planning." name = "internship_title" value = "<?php echo $data['internship_title'] ?>" placeholder="Internship Title">
          <br>
          <span class="error"><?php echo $data['internship_title_err'] ?></span>
        </div>

        <div>
          <label>Academic Focus: </label>
          <input type = "text" title=
"The academic focus should be the academic program, department or major in which the
learning will take place. Examples: market research for an advertising firm--academic
focus is marketing; counseling and case management--academic focus is psychology;
human resource/personnel office of a non-profit organization—academic focus is
human resources; State Senate legislative internship--academic focus is
government/political science; designing a brochure for a grassroots political campaign--
academic focus is public relations/communications." name = "academic_focus" value = "<?php echo $data['academic_focus'] ?>" placeholder="Academic Focus">
          <br>
          <span class="error"><?php echo $data['academic_focus_err'] ?></span>
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
                    $('.checkgradingscale').not(this).prop('checked', false);
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

        <div>
          <label>Graduate or Undergraduate: </label>
          <input name= "graduate_or_undergraduate" title="Check if you're a student in a Master's program" type="checkbox" class="checkgraduateorundergraduate" value= "Graduate">Graduate
          &emsp;
          <input name= "graduate_or_undergraduate" title="Check if you're a student in a Bachelor's program" type="checkbox" class="checkgraduateorundergraduate" value= "Undergraduate">Undergraduate
          <br>
          <span class="error"><?php echo $data['graduate_or_undergraduate_err'] ?></span>
        </div>

        <div>
          <label>Grading Scale: </label>
          <input name= "grading_scale" type="checkbox" title="Check if you wish to be graded on the standard grading scale ranging from A+ through F" class="checkgradingscale" value= "Letter Grade">Letter Grade
          &emsp;
          <input name= "grading_scale" type="checkbox" title=
"Some colleges/departments allow only S/N; check the appropriate guidelines.
Check if you wish to be graded on a S/N grading scale. S: Pass/satisfactory: given 
for grades equivalent to or better than “C-”: you receive credit for the course. 
N: Fail/not satisfactory: given for grades equivalent to or below “D+”: you are 
NOT granted credit." class="checkgradingscale" value= "S/N">S/N
          <br>
          <span class="error"><?php echo $data['grading_scale_err'] ?></span>
        </div>

        <div>
          <label>Requested Credits: </label>
          <input type = "text" title= "Enter the amount of credits you want from this Academic Internship." name = "requested_credits" value = "<?php echo $data['requested_credits'] ?>" placeholder="Requested Credits">
          <br>
          <span class="error"><?php echo $data['requested_credits_err'] ?></span>
        </div>

        <div>
          <label>I have read and meet the required guidelines of: </label>
          <input name= "college" type="checkbox" class="checkcollege" value= "College of Community Studies and Public Affairs" title=
"I have read and meet the required guidelines of College of Community Studies and Public Affairs.">College of Community Studies and Public Affairs
          <br>
          <input name= "college" type="checkbox" class="checkcollege" value= "College of Individualized Studies" title=
"I have read and meet the required guidelines of College of Individualized Studies.">College of Individualized Studies
          <br>
          <input name= "college" type="checkbox" class="checkcollege" value= "College of Management" title=
"I have read and meet the required guidelines of College of Management.">College of Management
          <br>
          <input name= "college" type="checkbox" class="checkcollege" value= "College of Sciences" title=
"I have read and meet the required guidelines of College of Sciences.">College of Sciences
          <br>
          <span class="error"><?php echo $data['college_err'] ?></span>
        </div>

        <div>
          <label>Academic Major: </label>
          <input type = "text" title="Enter your current Major." name = "academic_major" value = "<?php echo $data['academic_major'] ?>" placeholder="Academic Major">
          <br>
          <span class="error"><?php echo $data['academic_major_err'] ?></span>
        </div>

        <div>
          <label>Academic Minor: </label>
          <input type = "text" title="Enter your current Minor." name = "academic_minor" value = "<?php echo $data['academic_minor'] ?>" placeholder="Academic Minor">
          <br>
          <span class="error"><?php echo $data['academic_minor_err'] ?></span>
        </div>

        <div>
          <label>Start Date: </label>
          <input type = "text" title="Enter the start date of the internship. This date must be after today's date and before your internship's end date." name = "start_date" value = "<?php echo $data['start_date'] ?>" placeholder="MM/DD/YYYY">
          <br>
          <span class="error"><?php echo $data['start_date_err'] ?></span>
        </div>

        <div>
          <label>End Date: </label>
          <input type = "text" title="Enter the end date of the internship. This date must be after today's date and after your internship's start date." name = "end_date" value = "<?php echo $data['end_date']; ?>" placeholder="MM/DD/YYYY">
          <br>
          <span class="error"><?php echo $data['end_date_err']; ?></span>
        </div>

        <div>
          <label>Hours Per Week: </label>
          <input type = "text" title="Enter the amount of hours you will be working at this internship per week." name = "hours_per_week" value = "<?php echo $data['hours_per_week']; ?>" placeholder="Hours Per Week">
          <br>
          <span class="error"><?php echo $data['hours_per_week_err']; ?></span>
        </div>

        <div>
          <label>Compensation: </label>
          <input type="checkbox" title="Check if you will not be receiving compensation during this internship." class="checkcompensation" id="Unpaid" name= "compensation" value="Unpaid"> Unpaid
          &emsp;
          <input type="checkbox" title="Check if the Company/Organization is paying you hourly." class="checkcompensation" id="Wages" name= "compensation" value="Wages"> Wages
          &emsp;
          <input type="checkbox" title="Check if the Company/Organization is paying you a fixed sum as a salary or allowance." class="checkcompensation" id="Stipend" name= "compensation" value="Stipend"> Stipend
          &emsp;
          <input type="checkbox" title="Check if the Company/Organization is paying your tuition or expenses." class="checkcompensation" id="Reimbursement" name= "compensation" value="Reimbursement"> Reimbursement  
          <br>
          <span class="error"><?php echo $data['compensation_err']; ?></span>
          <br>
        </div>
        </fieldset>

        <br>

        <fieldset>
          <legend>Academic Internship Evaluation</legend>
          <div>
            <label>Competence Statement: </label>
            <textarea name = "competence_statement" required = "true" maxlength = 1000 spellcheck = true wrap = hard
placeholder="The anticipated learning outcomes format, what you intend to learn. 

Examples:

“Knows basic concepts and procedures of arts administration and can apply this knowledge in planning and coordinating performing arts programs.”

“Knows and can apply the principles and techniques of individual and group counseling within a chemical dependency treatment program at the level of a beginning professional counselor.”

“Knows and can apply federal laws/regulations and sponsor’s reporting requirements well enough to appropriately monitor and facilitate compliance in administration of research grants and contracts.”"

title = "This is the “goal” or ultimate outcome you will accomplish; what you
will know when you complete the internship. See “How to Write a Competence 
Statement” in academic internship handbook or on-line."><?php echo $data['competence_statement']; ?></textarea>
            <span class="error"><?php echo $data['competence_statement_err']; ?></span>
          </div>

          <div>
            <label>Learning Strategies: </label>
            <textarea name = "learning_strategy" required = "true" maxlength = 1000 spellcheck = true wrap = hard
placeholder="Describe what you are planning to do include practical and theoretical applications. 
Be sure to include any college/dept. deliverables such as journals, papers, group meetings.

Examples:

“Read Jeff Pope’s book Practical marketing Research and write a three-page paper integrating his book with field work.”

“Will know the federal and sponsoring agency requirements, monitor fiscal and programmatic aspects monthly, prepare records for audit and communicate with the appropriate departments.”

“Create and submit a critical analysis journal noting activities, observations, reflections and analyses that have made a significant impact.”

“Actively participate in and understand the full cycle of a marketing plan.”"
title = "Most internships will have three to four learning strategies. These address
the activities you will complete to meet the goal stated in the Competence Statement. At the
conclusion of the internship, each of these will be evaluated by the supervisor/evaluator and
rated “excellent,” “good,” “adequate,” “partially adequate” or “inadequate.” Be sure to include
what you will be reading (include titles and authors) or reviewing; who you might interview (a
particular person or population); or what projects or procedures will be involved in the
internship. The learning strategies must provide evidence of some theoretical learning. They
must also include any deliverables required by the specific college/department guidelines
(examples: group meetings/seminars, bibliography, log of readings, summary paper)."><?php echo $data['learning_strategy']; ?></textarea>
            <span class="error"><?php echo $data['learning_strategy_err']; ?></span>
          </div>

          <div>
            <label>Evaluation: </label>
            <textarea name = "evaluation" required = "true" maxlength = 1000 spellcheck = true wrap = hard
placeholder="Describe how the evaluator will evaluate and document the learning. 

Examples:

“Weekly meetings to plan activities and evaluate afterward; discussion of readings and tapes.”

“Situational observation in group meetings and one-to-one work with investigators and other personnel.”

“Written log with reflections on experiences.”

“Attendance at the Internship Group Meetings and successful completion of all assignments.”"

title = "Be specific about the procedures used. Examples: oral interview, written test,
performance test, situational observation, product evaluation, reflective paper/essay, 
journalingor a rating scale. This must also include any requirements stipulated by the 
specificcollege/department guidelines (examples: group meetings/seminars, bibliography, 
log of readings, summary paper, post-test). Who will evaluate the internship and how will 
it be supervised (i.e. face to face meetings)? What will be the method(s) of evaluation?"><?php echo $data['evaluation']; ?></textarea>
            <span class="error"><?php echo $data['evaluation_err']; ?></span>
          </div>
        </fieldset>

        <div>
          <label>Student Signature: </label>
          <input type = "text" name = "student_signature" required = "true" value = "<?php echo $data['student_signature']; ?>" placeholder="First Name Last Name"
title = "By signing this form I agree to have read and agreed to the terms and conditions of the Academic 
Internship. Sign your full name that is associated with this account and student id number.">
          <br>
          <span class="error"><?php echo $data['student_signature_err']; ?></span>
        </div>

        <div>
			<input type="submit" class="button" value="Confirm Edit">
		</div>
      </form>
    
    <?php require APPROOT . '/views/inc/footer.php'; ?>