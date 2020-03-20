<?php
require_once "User.php";

class Student extends User{
    protected $student_id;

    function __construct($user_name,$password,$email,$first_name,$last_name,$student_id){
        parent::__construct($user_name,$password,$email,$first_name,$last_name);
        $this->student_id = $student_id;

        $sql = "INSERT INTO students (user_id, user_name, password, email, first_name, last_name, student_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        if($stmt = mysqli_prepare(($this->link), $sql)){

            mysqli_stmt_bind_param($stmt, "isssssi", $param_user_id, $param_user_name, $param_password, $param_email, $param_first_name, $param_last_name, $param_student_id);

            $param_user_id = $this->user_id;
            $param_user_name = $user_name;
            $param_password = SHA1($password);
			$param_email = $email;
			$param_first_name = $first_name;
			$param_last_name = $last_name;
            $param_student_id = $student_id;

            if(mysqli_stmt_execute($stmt)){
                echo "User Registered!";
                header("location: login.php");
            } else{
                echo "User_ID: ",$param_user_id;
                echo " Username: ",$param_user_name;
                echo " Password: ",$param_password;
                echo " Email: ",$param_email;
                echo " First Name: ",$param_first_name;
                echo " Last Name: ",$param_last_name;
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