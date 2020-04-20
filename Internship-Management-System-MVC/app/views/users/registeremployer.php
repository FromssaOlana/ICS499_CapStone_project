<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/generalstylesheet.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/register.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/register.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">

<?php require APPROOT . '/views/inc/header.php'; ?>

    <h1>Sign Up As an Employer</h1>
    <div class="form">
        <form action="<?php echo URLROOT; ?>/users/registeremployer" method="post">
				<p>Please create an account.</p>

				<div>
					<label>Username</label>
					<input type="text" name="username" value="<?php echo $data["username"]?>" placeholder="Username">
					<br>
					<span class="error"><?php echo $data['user_name_err']; ?></span>
				</div>
				<div>
					<label>Password</label>
					<input type="password" name="password" value="<?php echo $data["password"]?>" placeholder="Password">
					<br>
					<span class="error"><?php echo $data['password_err']; ?></span>
				</div>
				<div>
					<label>Confirm Password</label>
					<input type="password" name="confirm_password" value="<?php echo $data["confirm_password"]?>" placeholder="Password">
					<br>
					<span class="error"><?php echo $data['confirm_password_err']; ?></span>
				</div>
				<div>
					<label>Email Address</label>
					<input type="text" name="email" value="<?php echo $data["email"]?>" placeholder="Email Address">
					<br>
					<span class="error"><?php echo $data['email_err']; ?></span>
				</div>
				<div>
					<label>First Name</label>
					<input type="text" name="firstname" value="<?php echo $data["firstname"]?>" placeholder="First Name">
					<br>
					<span class="error"><?php echo $data['first_name_err']; ?></span>
				</div>
				<div>
					<label>Last Name</label>
					<input type="text" name="lastname" value="<?php echo $data["lastname"]?>" placeholder="Last Name">
					<br>
					<span class="error"><?php echo $data['last_name_err']; ?></span>
				</div>

       			<div><a href="<?php echo URLROOT; ?>/users/registerstudent"><label>Sign up as a Student</label></a></div>
				<div>
					<input type="submit" class="button" value="Submit">
					<input type="reset" class="button" value="Reset">
				</div>
				<p>Already have an account? <a href="<?php echo URLROOT; ?>/users/login">Login here</a>.</p>
        </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
