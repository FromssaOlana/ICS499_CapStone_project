<?php
session_start();
include('loginfunctions.php');

require_once "config.php";
require_once "Dean.php";

$user_name = $password = $confirm_password = $email = $first_name = $last_name = "";
$user_name_err = $password_err = $confirm_password_err = $email_err = $first_name_err = $last_name_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Validate username
    if(empty(trim($_POST["username"]))){
        $user_name_err = "Please Enter a Username.";
    } else{
        $sql = "SELECT User_Name FROM users WHERE User_Name = ?";
        if($stmt = mysqli_prepare($link, $sql)){
          mysqli_stmt_bind_param($stmt, "s", $param_username);
          $param_username = trim($_POST["username"]);
          if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){
              $user_name_err = "This username is already taken.";
            } else{
              $user_name = trim($_POST["username"]);
            }
          } else{
            echo "Error. Please try again later.";
          }
          mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please Enter a Password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please Confirm Password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Passwords did not match.";
        }
    }

  // Validate email
  if(empty(trim($_POST["email"]))){
    $email_err = "Please Enter an Email Address.";
  } else{
    $sql = "SELECT Email FROM users WHERE Email = ?";
    if($stmt = mysqli_prepare($link, $sql)){
      mysqli_stmt_bind_param($stmt, "s", $param_email);
      $param_email = trim($_POST["email"]);
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1){
          $email_err = "This Email Address is associated with an existing account.";
        } else{
          $email = trim($_POST["email"]);
	      	if(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format.";
          } else{
            $email = trim($_POST["email"]);
          }
        }
      } else{
        echo "Error. Please try again later.";
      }
      mysqli_stmt_close($stmt);
    }
  }

	//Validate firstname
	if(empty(trim($_POST["firstname"]))){
        $first_name_err = "Please Enter First Name.";
  } else {
		$first_name = trim($_POST["firstname"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
			$first_name_err = "Only letters and white space are allowed";
		} else {
			$first_name = trim($_POST["firstname"]);
		}
  }
  
	//Validate lastname
	if(empty(trim($_POST["lastname"]))){
        $last_name_err = "Please Enter Last Name.";
  } else {
		$last_name = trim($_POST["lastname"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
			$last_name_err = "Only letters and white space are allowed";
		} else {
			$last_name = trim($_POST["lastname"]);
		}
  }

    if(empty($user_name_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) 
    && empty($first_name_err) && empty($last_name_err)){
      new Dean($user_name,$password,$email,$first_name,$last_name);
      echo "<script type='text/javascript'>alert('Dean User successfully created!');</script>";
      header( "refresh:.5;url=manageusers.php" );
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Dean User</title>
    <link rel="stylesheet" type="text/css" href="css/generalstylesheet.css">
	  <link rel="stylesheet" type="text/css" href="css/register.css">
	  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>
<body>
  <div id="page-container">
   <div id="content-wrap">
  <?php if(isLoggedInAdmin()){
       include('header.html');} ?>

    <h1>Create A Dean User</h1>
    <div class="form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div <?php echo (!empty($user_name_err)) ? 'has-error' : ''; ?>>
					<label>Username</label>
					<input type="text" name="username" value="<?php echo $user_name; ?>" placeholder="Username">
					<br>
					<span class="error"><?php echo $user_name_err; ?></span>
				</div>
				<div <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
					<label>Password</label>
					<input type="password" name="password" value="<?php echo $password; ?>" placeholder="Password">
					<br>
					<span class="error"><?php echo $password_err; ?></span>
				</div>
				<div <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>>
					<label>Confirm Password</label>
					<input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" placeholder="Password">
					<br>
					<span class="error"><?php echo $confirm_password_err; ?></span>
				</div>
				<div <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>>
					<label>Email Address</label>
					<input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email Address">
					<br>
					<span class="error"><?php echo $email_err; ?></span>
				</div>
				<div <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>>
					<label>First Name</label>
					<input type="text" name="firstname" value="<?php echo $first_name; ?>" placeholder="First Name">
					<br>
					<span class="error"><?php echo $first_name_err; ?></span>
				</div>
				<div <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>>
					<label>Last Name</label>
					<input type="text" name="lastname" value="<?php echo $last_name; ?>" placeholder="Last Name">
					<br>
					<span class="error"><?php echo $last_name_err; ?></span>
        </div>
				<div>
					<input type="submit" class="button" value="Submit">
					<input type="reset" class="button" value="Reset">
				</div>
        </form>
    </div>
    </div>
    <?php include('footer.html');?>
    </div>
</body>
</html>