<?php

class User {
    protected $user_type;
    protected $user_name;
    protected $password;
    protected $email;
    protected $first_name;
    protected $last_name;
    public static $number_of_users = 0;
    protected $link;

    function __construct($user_type,$user_name,$password,$email,$first_name,$last_name){
        User::updateNumOfUsers();
        $this->link = User::OpenCon();
        $this->user_type = $user_type;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;

        $sql = "INSERT INTO users (user_type,user_name,password, email, first_name, last_name) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare(($this->link), $sql)){

            mysqli_stmt_bind_param($stmt, "ssssss", $param_user_type, $param_user_name, $param_password, $param_email, $param_first_name, $param_last_name);
            $param_user_type = $user_type;
            $param_user_name = $user_name;
            $param_password = SHA1($password);
			$param_email = $email;
			$param_first_name = $first_name;
			$param_last_name = $last_name;

            if($mysqli = mysqli_stmt_execute($stmt)){
                echo "User Registered!";
                header("location: login.php");
            } else{
                echo " User Type: ",$param_user_type;
                echo " Username: ",$param_user_name;
                echo " Password: ",$param_password;
                echo " Email: ",$param_email;
                echo " First Name: ",$param_first_name;
                echo " Last Name: ",$param_last_name;
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
            case "user_type":
                $this->user_type = $value;
                break;
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
            default:
                echo $name . "Not Found";
        }
        echo "Set " . $name . " to " . $value . "<br/>";
    }

    static function changePassword($user_name,$password){
        $link = User::OpenCon();
        $new_password = SHA1($password);
        $sql = "UPDATE users SET password = '$new_password' WHERE user_name = '$user_name'";

        if($stmt = mysqli_prepare($link, $sql)){

            if($mysqli = mysqli_stmt_execute($stmt)){
                echo " Password Changed";
            } else{
                echo " Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    static function OpenCon(){
        $db_host = 'localhost';
        $db_user_name = 'root';
        $db_password = '';
        $db = 'project';
    
        $conn = new mysqli($db_host,$db_user_name,$db_password,$db) or die("Connection failed: %s\n" . $conn->error);
        return $conn;
    }
    
    static function CloseCon(){
        $conn = $this->link;
        $conn->close();
    }

    static function updateNumOfUsers(){
        $link = User::OpenCon();
        $count = $link->query("SELECT Count(*) as cnt FROM users")->fetch_object()->cnt;
        User::$number_of_users += $count+1;
    }
}

?>