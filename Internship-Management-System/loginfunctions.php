<?php

function login(){
  require_once "config.php";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    global $username_err, $username, $password_err, $password;
    $username = $password = "";
    $username_err = $password_err = "";

      // Check if username is empty
      if(empty(trim($_POST["username"]))){
          $username_err = "Please enter username.";
      }else{
          $username = trim($_POST["username"]);
      }

      // Check if password is empty
      if(empty(trim($_POST["password"]))){
          $password_err = "Please enter your password.";
      }else{
          $password = trim($_POST["password"]);
      }

      // Validate credentials
      if(empty($username_err) && empty($password_err)){

          $sql = "SELECT userID, username, password FROM users WHERE username = ?";

          if($stmt = mysqli_prepare($link, $sql)){
              mysqli_stmt_bind_param($stmt, "s", $param_username);
              $param_username = $username;

              if(mysqli_stmt_execute($stmt)){
                  mysqli_stmt_store_result($stmt);

                  if(mysqli_stmt_num_rows($stmt) == 1){
                      mysqli_stmt_bind_result($stmt, $userID, $username, $hashed_password);

                      if(mysqli_stmt_fetch($stmt)){
                          if(SHA1($password) == $hashed_password){
                              session_start();

                              $_SESSION["loggedin"] = true;
                              $_SESSION["id"] = $userID;
                              $_SESSION["username"] = $username;

                              header("location: index.php");

                          }else{
                              $password_err = "The password you entered was not valid.";
                          }
                      }
                  }else{
                      $username_err = "No account found with that username.";
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
      $username = $_SESSION['username'];
      echo "
  		<nav>
        <ul>
        <li><img src='images/logo2.png' alt='metrostate logo' height='50' width='200'></li>
  		    <li><a href=\"index.php\">Home</a></li>
  		    <li><a href=\"application.php\">Application</a></li>
  		    <li><a href=\"logout.php\">Logout</a></li>
          <li><span class='user'>$username</span></li>
  		  </ul>
  		</nav>";

      return true;

    }elseif (isset($_SESSION['valid_admin'])) {
      $username = $_SESSION['valid_admin'];
  		echo "
  		<nav>
        <ul>
        <li><img src='images/logo2.png' alt='metrostate logo' height='50' width='200'></li>
          <li><a href=\"index.php\">Home</a></li>
          <li><a href=\"application.php\">Application</a></li>
  		    <li><a href=\"logout.php\">Logout</a></li>
  				<li><a href='adminpage.php'><div id='admin'>$username</div></a></li>
  		  </ul>
  		</nav>";

  		return true;

  	}else {
    echo "<nav>
        <ul>
        <li><img src='images/logo2.png' alt='metrostate logo' height='50' width='200'></li>
          <li><a href=\"index.php\">Home</a></li>
          <li><a href=\"application.php\">Application</a></li>
          <li><a href=\"register.php\">Register</a></li>
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
    $username = htmlspecialchars($_POST['username']);
    $password = SHA1($_POST['password']);

    global $user_err, $pass_err;
    $user_err = $pass_err = "";

    if(usernameRegex($username)){
      $selectUserQ = $link->prepare("SELECT COUNT(1) FROM users WHERE Username = ? AND admin = 1");
      $selectUserQ->bind_param("s", $username);

      if($selectUserQ->execute()){
        $selectUserQ->bind_result($count);
        $selectUserQ->fetch();
        $selectUserQ->close();

        if($count == 1){
          $selectUserPassQ = $link->prepare("SELECT COUNT(1) FROM users
          WHERE Username = ? AND Password = ? AND admin = 1");
          $selectUserPassQ->bind_param("ss", $username, $password);

          if($selectUserPassQ->execute()){
            $selectUserPassQ->bind_result($count);
            $selectUserPassQ->fetch();

            if($count == 1){
              $_SESSION['valid_admin'] = $username;
              $_SESSION['loggedin'] = true;

            }else {
              $pass_err = "Password is wrong.";
            }
          }else {
            echo $link->error();
          }
        }else {
          $user_err = "User does not exist or is not an admin.";
        }
      }else {
        echo $link->error();
      }
    }else {
      $user_err = "Invalid username.";
    }
  }
}

function isLoggedInAdmin(){
  if(isset($_SESSION['valid_admin'])) {
    $username = $_SESSION['valid_admin'];
    echo "
    <nav>
      <ul>
      <li><img src='images/logo2.png' alt='metrostate logo' height='50' width='200'></li>
        <li><a href=\"index.php\">Home</a></li>
        <li><a href=\"application.php\">Application</a></li>
        <li><a href=\"logout.php\">Logout</a></li>
        <li><a href='adminpage.php'><div id='admin'>$username</div></a></li>
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
