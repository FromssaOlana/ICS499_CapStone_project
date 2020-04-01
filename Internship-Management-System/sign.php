<?php
  session_start();
  include('loginfunctions.php');
  require_once "config.php";
?>

<?php
    $user_type = $_SESSION['usertype'];
    $application_id = $_SESSION['applicationid'];
    $signature = $_POST["signature"];
    if($user_type == 'Employer'){
        $sql = "UPDATE applications SET employer_signature='".$signature."' WHERE application_ID = '".$application_id."'";
        if(mysqli_query($link, $sql)){
            updateApplicationStatus($application_id);
            header("location: manageapplications.php");
        }
    } else if($user_type == 'Dean'){
        $sql = "UPDATE applications SET dean_signature='".$signature."' WHERE application_ID = '".$application_id."'";
        if(mysqli_query($link, $sql)){
            updateApplicationStatus($application_id);
            header("location: manageapplications.php");
        }
    } else if($user_type == 'Faculty Liaison'){
        $sql = "UPDATE applications SET faculty_liaison_signature='".$signature."' WHERE application_ID = '".$application_id."'";
        if(mysqli_query($link, $sql)){
            updateApplicationStatus($application_id);
            header("location: manageapplications.php");
        }
    } else{
        $sql = "UPDATE applications SET internship_coordinator_signature='".$signature."' WHERE application_ID = '".$application_id."'";
        if(mysqli_query($link, $sql)){
            updateApplicationStatus($application_id);
            header("location: manageapplications.php");
        }
    }

    function updateApplicationStatus($application_id){
        $link = OpenCon();
        $result = $link->query("SELECT student_signature, employer_signature, faculty_liaison_signature, dean_signature, internship_coordinator_signature, 
        application_status FROM applications WHERE application_ID = '".$application_id."'");

        while($row = $result->fetch_object()){
            if(!is_null($row->student_signature) && !is_null($row->employer_signature) && 
            !is_null($row->faculty_liaison_signature) && !is_null($row->dean_signature) && !is_null($row->internship_coordinator_signature)){
                $status = "Approved";
                $sql = "UPDATE applications SET application_status='".$status."' WHERE application_ID = '".$application_id."'";
                if(mysqli_query($link, $sql)){
                    
                }    
            }   
        }
    }
?>