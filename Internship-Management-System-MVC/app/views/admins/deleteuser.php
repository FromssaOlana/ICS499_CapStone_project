<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete User</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/generalstylesheet.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/delete.css">

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

  <h1 id='delete'>Delete User</h1>
    <form action="<?php echo URLROOT; ?>/admins/deleteUserFunction/<?php echo $data["username"]?>" method="post">
      <label>Confirm Deletion</label>
      <button type='submit' class ='button' name='delete' id='deletebut' value='Submit'>Delete</button>
    </form>

<?php require APPROOT . '/views/inc/footer.php'; ?>