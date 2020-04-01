<?php
require_once "User.php";

class Student extends User{
    protected $student_id;
    const USER_TYPE = "Student";

    function __construct($user_name,$password,$email,$first_name,$last_name,$student_id){
        parent::__construct(Student::USER_TYPE,$user_name,$password,$email,$first_name,$last_name);
        $this->student_id = $student_id;

        $sql = "INSERT INTO students (user_name, student_id) VALUES (?, ?)";
        
        if($stmt = mysqli_prepare(($this->link), $sql)){

            mysqli_stmt_bind_param($stmt, "si", $param_user_name, $param_student_id);

            $param_user_name = $user_name;
            $param_student_id = $student_id;

            if(mysqli_stmt_execute($stmt)){

            } else{
                echo " Username: ",$param_user_name;
                echo " Student id: ",$param_student_id;
                echo " Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    function __get($name){
        echo "Asked for " . $name . "<br/>";
        return $this->$name;
    }

    function __set($name, $value){
        switch($name){
            case "user_name":
                $this->user_name = $value;
                break;
            case "password":
                $this->password = $value;
                break;
            case "email":
                $this->email = $value;
                break;
            case "first_name":
                $this->first_name = $value;
                break;
            case "last_name":
                $this->last_name = $value;
                break;
            case "student_id":
                $this->student_id = $value;
                break;
            default:
                echo $name . "Not Found";
        }
        echo "Set " . $name . " to " . $value . "<br/>";
    }
}
?>