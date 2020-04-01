<?php
require_once "User.php";

class Employer extends User{
    protected $company_name;
    const USER_TYPE = "Employer";

    function __construct($user_name,$password,$email,$first_name,$last_name,$company_name){
        parent::__construct(Employer::USER_TYPE,$user_name,$password,$email,$first_name,$last_name);
        $this->company_name = $company_name;
        
        $sql = "INSERT INTO employers (user_name, company_name) VALUES (?, ?)";

        if($stmt = mysqli_prepare(($this->link), $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $param_user_name, $param_company_name);

            $param_user_name = $user_name;
            $param_company_name = $company_name;

            if(mysqli_stmt_execute($stmt)){
                
            } else{
                echo " Username: ", $param_user_name;
                echo " Company Name: ", $param_company_name;
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
            case "company_name":
                $this->company_name = $value;
                break;
            default:
                echo $name . "Not Found";
        }
        echo "Set " . $name . " to " . $value . "<br/>";
    }
}
?>