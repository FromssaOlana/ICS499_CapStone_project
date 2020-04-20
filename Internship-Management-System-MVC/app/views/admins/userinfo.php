<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/generalstylesheet.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/viewuser.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">

<?php require APPROOT . '/views/inc/header.php'; ?>
 
  <div id='top'>
      <h1><?php echo $data['username']; ?> Information</h1>
      <?php if($data['username'] != 'admin' && $data['username'] != $_SESSION['user_name']){ ?>
        <div id='centered'> <a href="<?php echo URLROOT; ?>/admins/deleteUser/<?php echo $data['username']?>">Delete User</a></div>
      <?php } ?>
  </div>

  <div id='container'>
    <table class = "usertable">
      <tr><td class = 'box'>User Type </td> <td><?php echo $data['usertype']; ?></td></tr>
      <tr><td class = 'box'>User Since </td> <td><?php echo $data['created']; ?></td></tr>
      <tr><td class = 'box'>Email </td> <td><?php echo $data['email']; ?></td></tr>
      <tr><td class = 'box'>Full Name </td> <td><?php echo $data['firstname']." ".$data['lastname']; ?></td></tr>
    </table>
  </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>
