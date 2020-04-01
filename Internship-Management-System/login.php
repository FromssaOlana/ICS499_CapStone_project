<?php
session_start();
include('loginfunctions.php');
login();
global $user_name_err, $user_name, $password_err, $password;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/generalstylesheet.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>
<body>
	<div id="page-container">	
   <div id="content-wrap">

  <?php 
    if(isLoggedIn()){
      header('location:index.php');
    } else{
      include('header.html');
    } 
  ?>

  <h1>Login</h1>
<div class="form">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<fieldset class="subform">
			<p>Please fill in your credentials to login.</p>
				<div <?php echo (!empty($user_name_err)) ? 'has-error' : ''; ?>>
					<label>Username</label>
					<input type="text" name="username" value="<?php echo $user_name; ?>" placeholder="Username" required>
					<br>
					<span class = "error"><?php echo $user_name_err; ?></span>
				</div>
				<div <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
					<label>Password</label>
					<input type="password" name="password" placeholder="Password" required>
					<br>
					<span class = "error"><?php echo $password_err; ?></span>
				</div>
				<div>
					<input type="submit" class ="button" value="Login">
				</div>
				<p>Don't have an account? <a href="registerstudent.php">Sign up now</a>.</p>
			</form>
		</fieldset>
</div>
</div>
<?php include('footer.html');?>
</div>
</body>
</html>
