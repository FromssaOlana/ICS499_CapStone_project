<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/generalstylesheet.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/adminlogin.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
  
<?php require APPROOT . '/views/inc/header.php'; ?>

<h1>Admin Login</h1>
<div class="form" id = "form">
	<form action="<?php echo URLROOT; ?>/admins/adminlogin" method="post">
			<p>Please fill in your credentials to login.</p>
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
			</form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

