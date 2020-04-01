<?php

function login(){
  require_once "config.php";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    global $user_name_err, $user_name, $password_err, $password, $user_type;
    $user_name = $password = $user_type = "";
    $user_name_err = $password_err = "";

      if(empty(trim($_POST["username"]))){
          $user_name_err = "Please enter username.";
      } else{
          $user_name = trim($_POST["username"]);
      }

      // Check if password is empty
      if(empty(trim($_POST["password"]))){
          $password_err = "Please enter your password.";
      }else{
          $password = trim($_POST["password"]);
      }

      // Validate credentials
      if(empty($user_name_err) && empty($password_err)){

          $sql = "SELECT user_name, password, user_type FROM users WHERE user_name = ? and user_type != 'Admin'";

          if($stmt = mysqli_prepare($link, $sql)){
              mysqli_stmt_bind_param($stmt, "s", $param_user_name);
              $param_user_name = $user_name;
              if(mysqli_stmt_execute($stmt)){
                  mysqli_stmt_store_result($stmt);
                  if(mysqli_stmt_num_rows($stmt) == 1){
                      mysqli_stmt_bind_result($stmt, $this_user_name, $hashed_password, $user_type);

                      if(mysqli_stmt_fetch($stmt)){
                          if(SHA1($password) == $hashed_password){
                              session_start();

                              $_SESSION["loggedin"] = true;
                              $_SESSION["username"] = $this_user_name;
                              $_SESSION["usertype"] = $user_type;

                              if($_SESSION["usertype"] === "Student"){
                                $result = $link->query("SELECT student_ID FROM students WHERE user_name = '".$_SESSION["username"]."'");
                                $student_ID = $result->fetch_object()->student_ID;
                                $_SESSION["studentid"] = $student_ID;
                              } else if($user_type === "Employer"){
                                $result = $link->query("SELECT company_name FROM employers WHERE user_name = '".$_SESSION["username"]."'");
                                $company_name = $result->fetch_object()->company_name;
                                $_SESSION["companyname"] = $company_name;
                              }

                              header("location: index.php");

                          }else{
                              $password_err = "The password you entered was not valid.";
                          }
                      }
                  } else{
                      $user_name_err = "No account found with that username.";
                  }
              }else{
                  echo "Oops! Something went wrong. Please try again later.";
              }

  		mysqli_stmt_close($stmt);
          }else{
  			       echo "Something's wrong with the query: " . mysqli_error($link);
  		      }
  		}
      mysqli_close($link);
  }
}

function isLoggedIn(){
    if(isset($_SESSION['username'])) {
      $user_name = $_SESSION['username'];
      if($_SESSION['usertype'] == "Student"){
        $user_name = $_SESSION['username'];
        echo "
        <nav>
          <ul>
            <li><a href=\"index.php\"><img src='images/logo2.png' alt='metrostate logo' height='50' width='200'></a></li>
            <li><a href=\"index.php\">Home</a></li>
            <li><a href=\"applicationform.php\">Application Form</a></li>
            <li><a href=\"manageapplications.php\">Manage Applications</a></li>
            <li><a href=\"logout.php\">Logout</a></li>
            <li><a href='viewuser.php?username=".$user_name."'><div id='admin'>$user_name</div></a></li>
          </ul>
        </nav>";
      } else{
        echo "
        <nav>
          <ul>
            <li><a href=\"index.php\"><img src='images/logo2.png' alt='metrostate logo' height='50' width='200'></a></li>
            <li><a href=\"index.php\">Home</a></li>
            <li><a href=\"manageapplications.php\">Manage Applications</a></li>
            <li><a href=\"logout.php\">Logout</a></li>
            <li><a href='viewuser.php?username=".$user_name."'><div id='admin'>$user_name</div></a></li>
          </ul>
        </nav>";
      }
      return true;

    } elseif (isset($_SESSION['valid_admin'])) {
      $user_name = $_SESSION['valid_admin'];
  		echo "
      <nav>
        <ul>
          <li><a href=\"index.php\"><img src='images/logo2.png' alt='metrostate logo' height='50' width='200'></a></li>
          <li><a href=\"index.php\">Home</a></li>
          <li><a href=\"manageusers.php\">Manage Users</a></li>
          <li><a href=\"logout.php\">Logout</a></li>
          <li><a href='viewuser.php?username=".$user_name."'><div id='admin'>$user_name</div></a></li>
        </ul>
      </nav>";
  		return true;
  	}else {
    echo "<nav>
        <ul>
          <li><a href=\"index.php\"><img src='images/logo2.png' alt='metrostate logo' height='50' width='200'></a></li>
          <li><a href=\"index.php\">Home</a></li>
          <li><a href=\"registerstudent.php\">Register</a></li>
          <li><a href=\"login.php\">Login</a></li>
        </ul>
      </nav>";

    return false;
  }
}

function isNotLoggedIn(){
  if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
  }
}

function logout(){
  if (isset($_SESSION['loggedin'])) {
  $_SESSION = array();
  session_destroy();
  }
}

/*admin login functions*/
include('functions.php');

function loginAdmin(){
  require_once "config.php";
  if (isset($_POST['username']) && isset($_POST['password']))
  {
    $user_name = htmlspecialchars($_POST['username']);
    $password = SHA1($_POST['password']);

    global $user_err, $pass_err;
    $user_err = $pass_err = "";

    if(usernameRegex($user_name)){
      $selectUserQ = $link->prepare("SELECT COUNT(1) FROM users WHERE User_Name = ? AND User_Type = 'Admin'");
      $selectUserQ->bind_param("s", $user_name);

      if($selectUserQ->execute()){
        $selectUserQ->bind_result($count);
        $selectUserQ->fetch();
        $selectUserQ->close();

        if($count == 1){
          $selectUserPassQ = $link->prepare("SELECT COUNT(1) FROM users
          WHERE User_Name = ? AND Password = ? AND User_Type = 'Admin'");
          $selectUserPassQ->bind_param("ss", $user_name, $password);

          if($selectUserPassQ->execute()){
            $selectUserPassQ->bind_result($count);
            $selectUserPassQ->fetch();

            if($count == 1){
              $_SESSION['valid_admin'] = $user_name;
              $_SESSION['loggedin'] = true;
              $_SESSION['usertype'] = 'Admin';

            }else {
              $pass_err = "Password is wrong.";
            }
          }else {
            echo $link->error;
          }
        }else {
          $user_err = "User does not exist or is not an admin.";
        }
      }else {
        echo $link->error;
      }
    }else {
      $user_err = "Invalid username.";
    }
  }
}

function isLoggedInAdmin(){
  if(isset($_SESSION['valid_admin'])) {
    $user_name = $_SESSION['valid_admin'];
    echo "
    <nav>
      <ul>
        <li><a href=\"index.php\"><img src='images/logo2.png' alt='metrostate logo' height='50' width='200'></a></li>
        <li><a href=\"index.php\">Home</a></li>
        <li><a href=\"manageusers.php\">Manage Users</a></li>
        <li><a href=\"logout.php\">Logout</a></li>
        <li><a href='viewuser.php?username=".$user_name."'><div id='admin'>$user_name</div></a></li>
      </ul>
    </nav>";

    return true;
  }
}

function isNotLoggedInAdmin() {
  if(!isset($_SESSION['valid_admin'])) {
    header('Location:index.php');
  }
}

?>
