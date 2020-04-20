<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/generalstylesheet.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/homepage.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/register.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">

<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="header centered">
    <img src='<?php echo URLROOT; ?>/images/students.jpg'>
    <h1><?php echo $data['title']; ?></h1>
  </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>