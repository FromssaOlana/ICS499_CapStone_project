<?php
session_start();
include('loginfunctions.php');

require_once "config.php";

$username = $password = $confirm_password = $email = $firstname = $lastname = $company_name = "";
$username_err = $password_err = $confirm_password_err = $email_err = $firstname_err = $lastname_err = $company_name_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please Enter a Username.";
    } else{
        $sql = "SELECT e_user_name FROM employers WHERE e_user_name = ?";
        if($stmt = mysqli_prepare($link, $sql)){
          mysqli_stmt_bind_param($stmt, "s", $param_username);
          $param_username = trim($_POST["username"]);
          if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){
              $username_err = "This username is already taken.";
            } else{
              $username = trim($_POST["username"]);
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
    $sql = "SELECT e_email FROM employers WHERE e_email = ?";
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
        $firstname_err = "Please Enter First Name.";
  } else {
		$firstname = trim($_POST["firstname"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
			$firstname_err = "Only letters and white space are allowed";
		} else {
			$firstname = trim($_POST["firstname"]);
		}
  }
  
	//Validate lastname
	if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Please Enter Last Name.";
  } else {
		$lastname = trim($_POST["lastname"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
			$lastname_err = "Only letters and white space are allowed";
		} else {
			$lastname = trim($_POST["lastname"]);
		}
  }

  //Validate company name
	if(empty(trim($_POST["companyname"]))){
    $company_name_err = "Please Enter Company Name.";
  } else {
      $company_name = trim($_POST["companyname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$company_name)) {
      $company_name_err = "Only letters and white space are allowed";
    } else {
      $company_name = trim($_POST["companyname"]);
    }
  }


    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) 
    && empty($firstname_err) && empty($lastname_err) && empty($company_name_err)){


        $sql = "INSERT INTO employer (e_user_name, e_password, e_email, e_first_name, e_last_name, company_name) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_email, $param_firstname, $param_lastname, $param_company_name);


            $param_username = $username;
            $param_password = SHA1($password);
			      $param_email = $email;
			      $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_company_name = $company_name;

            if(mysqli_stmt_execute($stmt)){
                echo "User Registered!";
                header("location: login.php");
            } else{
                echo "Username: ",$username;
                echo "Password: ",$param_password;
                echo "Email: ",$param_email;
                echo "First Name: ",$param_firstname;
                echo "Last Name: ",$param_lastname;
                echo "Company Name: ",$param_company_name;
                echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/generalstylesheet.css">
	  <link rel="stylesheet" type="text/css" href="css/register.css">
	  <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
</head>
<body>
  <?php include('header.html');?>
  <?php if(isLoggedIn()){
    header('location:index.php');
  } ?>

    <h1>Sign Up As an Employer</h1>
    <div class="form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<p>Please create an account.</p>

				<div <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
					<label>Username</label>
					<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
					<br>
					<span class="error"><?php echo $username_err; ?></span>
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
				<div <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>>
					<label>First Name</label>
					<input type="text" name="firstname" value="<?php echo $firstname; ?>" placeholder="First Name">
					<br>
					<span class="error"><?php echo $firstname_err; ?></span>
				</div>
				<div <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>>
					<label>Last Name</label>
					<input type="text" name="lastname" value="<?php echo $lastname; ?>" placeholder="Last Name">
					<br>
					<span class="error"><?php echo $lastname_err; ?></span>
        </div>
        <div <?php echo (!empty($company_name_err)) ? 'has-error' : ''; ?>>
					<label>Company Name</label>
					<input type="text" name="companyname" value="<?php echo $company_name; ?>" placeholder="Company Name">
					<br>
					<span class="error"><?php echo $company_name_err; ?></span>
        </div>
        <div><a href="registerstudent.php"><label>Sign up as a Student</label></a></div>
				<div>
					<input type="submit" class="button" value="Submit">
					<input type="reset" class="button" value="Reset">
				</div>
				<p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>

    <?php include('footer.html');?>
</body>
</html>
