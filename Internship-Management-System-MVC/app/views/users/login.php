<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/generalstylesheet.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/login.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
  
<?php require APPROOT . '/views/inc/header.php'; ?>

<h1>Login</h1>
<div class="form">
	<form action="<?php echo URLROOT; ?>/users/login" method="post">
		<fieldset class="subform">
			<p>Please fill in your credentials to login</p>
				<div>
					<label>Username</label>
					<input type="text" name="username" value="<?php echo $data['username']; ?>" placeholder="Username" required>
					<br>
					<span class = "error"><?php echo $data['user_name_err']; ?></span>
				</div>
				<div>
					<label>Password</label>
					<input type="password" name="password" placeholder="Password" required>
					<br>
					<span class = "error"><?php echo $data['password_err']; ?></span>
				</div>
				<div>
					<input type="submit" class ="button" value="Login">
				</div>
				<p>Don't have an account? <a href="<?php echo URLROOT; ?>/users/registerstudent">Sign up now</a></p>
			</form>
		</fieldset>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
