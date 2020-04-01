<?php
require_once "User.php";

class Dean extends User{
    const USER_TYPE = "Dean";

    function __construct($user_name,$password,$email,$first_name,$last_name){
        parent::__construct(Dean::USER_TYPE,$user_name,$password,$email,$first_name,$last_name);
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