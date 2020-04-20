<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Application</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/generalstylesheet.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/delete.css">

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

  <h1 id='delete'>Delete <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'] ?>'s Application #<?php echo $data['application_id']?> </h1>
    <form action="<?php echo URLROOT; ?>/users/deleteApplicationConfirmation/<?php echo $data['application_id']?>" method="post">
      <label>Confirm Deletion</label>
      <button type='submit' class ='button' name='delete' id='deletebut' value='Submit'>Delete</button>
    </form>

<?php require APPROOT . '/views/inc/footer.php'; ?>