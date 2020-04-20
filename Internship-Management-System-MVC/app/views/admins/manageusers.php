<!DOCTYPE html>
<html lang="en">
<head>
<title>Manage Users</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/generalstylesheet.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/manageusers.css">

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>
  <h1>Manage Users</h1>;
      <div id='admin-link'>
        <ul>
        <li><a href="<?php echo URLROOT; ?>/admins/createUser/Admin">Create Admin</a><li>
        <li><a href="<?php echo URLROOT; ?>/admins/createUser/Student">Create Student</a><li>
        <li><a href="<?php echo URLROOT; ?>/admins/createUser/Employer">Create Employer</a><li>
        <li><a href="<?php echo URLROOT; ?>/admins/createUser/Dean">Create Dean</a><li>
        <li><a href="<?php echo URLROOT; ?>/admins/createUser/FacultyLiaison">Create Faculty Liaison</a><li>
        <li><a href="<?php echo URLROOT; ?>/admins/createUser/InternshipCoordinator">Create Internship Coordinator</a><li>
        </ul>
      </div>

      <div id='container'>
      <h2>Users</h2>
      <?php foreach($data as $row){ ?>
          <div class='user-row'>
            <div class='content'>
              <h3><?php echo $row->User_Type ?> - <?php echo $row->User_Name ?></h3>
              <a href="<?php echo URLROOT; ?>/admins/viewAUser/<?php echo $row->User_Name ?>">View</a>
              <div class='created-date'>User Since <?php echo $row->Created ?></div>
              <!-- <a href="<?php echo URLROOT; ?>/admins/viewAUser/<?php echo $row->User_Name ?>">View</a> -->
            </div>
          </div>
        <?php }; ?>
      </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
