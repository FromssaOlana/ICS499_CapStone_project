<?php
require_once "config.php";

class Application {
    protected $application_ID;
    protected $student_name;
    protected $student_ID;
    protected $student_address;
    protected $student_city;
    protected $student_state;
    protected $student_zip_code;
    protected $student_home_phone;
    protected $student_work_phone;
    protected $metrostate_advisor;
    protected $student_email;
    protected $company_name;
    protected $company_email;
    protected $company_address;
    protected $company_city;
    protected $company_state;
    protected $company_zip_code;
    protected $site_supervisor_name;
    protected $site_supervisor_phone;
    protected $site_supervisor_email;
    protected $internship_evaluator_name;
    protected $internship_evaluator_phone;
    protected $internship_evaluator_email;
    protected $internship_evaluator_resume;
    protected $internship_title;
    protected $academic_focus;
    protected $graduate_or_undergraduate;
    protected $grading_scale;
    protected $requested_credits;
    protected $college;
    protected $academic_major;
    protected $academic_minor;
    protected $start_date;
    protected $end_date;
    protected $hours_per_week;
    protected $compensation;
    protected $competence_statement;
    protected $learning_strategy;
    protected $evaluation;
    protected $student_signature;
    protected $employer_signature;
    protected $faculty_liason_signature;
    protected $dean_signature;
    protected $internship_coordinator_signature;
    protected $application_status;
    public static $number_of_applications = 0;

    function __construct($student_name, $student_ID, $student_address, $student_city, $student_state, $student_zip_code, $student_home_phone, 
        $student_work_phone, $metrostate_advisor, $student_email, $company_name, $company_email, $company_address, $company_city,
        $company_state, $company_zip_code, $site_supervisor_name, $site_supervisor_phone, $site_supervisor_email, $internship_evaluator_name,
        $internship_evaluator_phone, $internship_evaluator_email, $internship_evaluator_resume, $internship_title, $academic_focus, 
        $graduate_or_undergraduate, $grading_scale, $requested_credits, $college, $academic_major, $academic_minor, $start_date, $end_date,
        $hours_per_week, $compensation, $competence_statement, $learning_strategy, $evaluation, $student_signature){
        Application::updateNumOfApplications();
        $this->application_ID = Application::$number_of_applications;
        $this->student_name =$student_name; 
        $this->student_ID = $student_ID; 
        $this->student_address = $student_address; 
        $this->student_city = $student_city; 
        $this->student_state = $student_state; 
        $this->student_zip_code = $student_zip_code; 
        $this->student_home_phone = $student_home_phone; 
        $this->student_work_phone = $student_work_phone; 
        $this->metrostate_advisor = $metrostate_advisor; 
        $this->student_email = $student_email; 
        $this->company_name = $company_name; 
        $this->company_email = $company_email; 
        $this->company_address = $company_address; 
        $this->company_city = $company_city;
        $this->company_state = $company_state; 
        $this->company_zip_code = $company_zip_code; 
        $this->site_supervisor_name = $site_supervisor_name; 
        $this->site_supervisor_phone = $site_supervisor_phone; 
        $this->site_supervisor_email = $site_supervisor_email; 
        $this->internship_evaluator_name = $internship_evaluator_name;
        $this->internship_evaluator_phone = $internship_evaluator_phone; 
        $this->internship_evaluator_email = $internship_evaluator_email; 
        $this->internship_evaluator_resume = $internship_evaluator_resume; 
        $this->internship_title = $internship_title; 
        $this->academic_focus = $academic_focus; 
        $this->graduate_or_undergraduate = $graduate_or_undergraduate; 
        $this->grading_scale = $grading_scale; 
        $this->requested_credits = $requested_credits; 
        $this->college = $college; 
        $this->academic_major = $academic_major; 
        $this->academic_minor = $academic_minor; 
        $this->start_date = $start_date; 
        $this->end_date = $end_date;
        $this->hours_per_week = $hours_per_week; 
        $this->compensation = $compensation; 
        $this->competence_statement = $competence_statement; 
        $this->learning_strategy = $learning_strategy; 
        $this->evaluation = $evaluation;
        $this->student_signature = $student_signature;
        $this->employer_signature = $employer_signature = null;
        $this->faculty_liason_signature = $faculty_liason_signature = null;
        $this->dean_signature = $dean_signature = null;
        $this->internship_coordinator_signature = $internship_coordinator_signature = null;
        $this->application_status = 'in progress';

        $sql = "INSERT INTO applications (application_ID, student_name, student_ID, student_address, student_city, student_state, student_zip_code, student_home_phone,
        student_work_phone, metrostate_advisor, student_email, company_name, company_email, company_address, company_city,
        company_state, company_zip_code, site_supervisor_name, site_supervisor_phone, site_supervisor_email, internship_evaluator_name,
        internship_evaluator_phone, internship_evaluator_email, internship_evaluator_resume, internship_title, academic_focus, 
        graduate_or_undergraduate, grading_scale, requested_credits, college, academic_major, academic_minor, start_date, end_date,
        hours_per_week, compensation, competence_statement, learning_strategy, evaluation, student_signature, employer_signature,
        faculty_liaison_signature, dean_signature, internship_coordinator_signature, application_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $link = OpenCon();

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "isisssisssssssssisssssssssssisssssissssssssss", $param_application_ID, $param_student_name, $param_student_ID, $param_student_address,
            $param_student_city, $param_student_state, $param_student_zip_code, $param_student_home_phone, $param_student_work_phone, $param_metrostate_advisor,$param_student_email,
            $param_company_name,$param_company_email, $param_company_address,$param_company_city,$param_company_state,$param_company_zip_code,$param_site_supervisor_name, $param_site_supervisor_phone,
            $param_site_supervisor_email,$param_internship_evaluator_name,$param_internship_evaluator_phone,$param_internship_evaluator_email,$param_internship_evaluator_resume,$param_internship_title,
            $param_academic_focus,$param_graduate_or_undergraduate,$param_grading_scale, $param_requested_credits,$param_college,$param_academic_major,$param_academic_minor,$param_start_date,
            $param_end_date,$param_hours_per_week,$param_compensation,$param_competence_statement,$param_learning_strategy, $param_evaluation, $param_student_signature, 
            $param_employer_signature, $param_faculty_liaison_signature, $param_dean_signature, $param_internship_coordinator_signature,$param_application_status);
            
            $param_application_ID = $this->application_ID;
            $param_student_name =$student_name; 
            $param_student_ID = $student_ID; 
            $param_student_address = $student_address; 
            $param_student_city = $student_city; 
            $param_student_state = $student_state; 
            $param_student_zip_code = $student_zip_code; 
            $param_student_home_phone = $student_home_phone; 
            $param_student_work_phone = $student_work_phone; 
            $param_metrostate_advisor = $metrostate_advisor; 
            $param_student_email = $student_email; 
            $param_company_name = $company_name; 
            $param_company_email = $company_email; 
            $param_company_address = $company_address; 
            $param_company_city = $company_city;
            $param_company_state = $company_state; 
            $param_company_zip_code = $company_zip_code; 
            $param_site_supervisor_name = $site_supervisor_name; 
            $param_site_supervisor_phone = $site_supervisor_phone; 
            $param_site_supervisor_email = $site_supervisor_email; 
            $param_internship_evaluator_name = $internship_evaluator_name;
            $param_internship_evaluator_phone = $internship_evaluator_phone; 
            $param_internship_evaluator_email = $internship_evaluator_email; 
            $param_internship_evaluator_resume = $internship_evaluator_resume; 
            $param_internship_title = $internship_title; 
            $param_academic_focus = $academic_focus; 
            $param_graduate_or_undergraduate = $graduate_or_undergraduate; 
            $param_grading_scale = $grading_scale; 
            $param_requested_credits = $requested_credits; 
            $param_college = $college; 
            $param_academic_major = $academic_major; 
            $param_academic_minor = $academic_minor; 
            $param_start_date = date("Y-m-d H:i:s",strtotime($start_date)); 
            $param_end_date = date("Y-m-d H:i:s",strtotime($end_date));
            $param_hours_per_week = $hours_per_week; 
            $param_compensation = $compensation; 
            $param_competence_statement = $competence_statement; 
            $param_learning_strategy = $learning_strategy; 
            $param_evaluation = $evaluation;
            $param_student_signature = $student_signature;
            $param_employer_signature = $employer_signature;
            $param_faculty_liaison_signature = $faculty_liason_signature;
            $param_dean_signature = $dean_signature;
            $param_internship_coordinator_signature = $internship_coordinator_signature;
            $param_application_status = $this->application_status;

            if(mysqli_stmt_execute($stmt)){
                
            } else{
                die('execute() failed: ' . htmlspecialchars($stmt->error));
            }
            mysqli_stmt_close($stmt);
        } else{
            die('prepare() failed: ' . htmlspecialchars($link->error));
        }
    }

    static function updateNumOfApplications(){
        $link = OpenCon();
        $count = $link->query("SELECT Count(*) as cnt FROM applications")->fetch_object()->cnt;
        Application::$number_of_applications += $count+1;
    }
}
?>