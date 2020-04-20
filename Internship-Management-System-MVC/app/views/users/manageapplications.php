<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manage Applications</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/generalstylesheet.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/manageapplications.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">

<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1>Manage Applications</h1>;

    <div id='container'>
    <?php if($data == null){ ?>
      <div id='centered'><h2>No Applications</h2></div>
    <?php }?>
        <table class = 'application'>
        <thead>
        <tr>
          <th>Application ID</th>
          <th>Student Name</th> 
          <th>Student ID</th>
          <th>Company Name</th>
          <th>Internship Evaluator Email</th>
          <th>Date Submitted</th>
          <th>Actions</th>
        </tr>
        </thead>
        <?php foreach($data as $row){ ?>
        <tr>
          <td><?php echo $row->Application_ID ?></td>
          <td><?php echo $row->Student_Name ?></td>
          <td><?php echo $row->Student_ID ?></td>
          <td><?php echo $row->Company_Name ?></td>
          <td><?php echo $row->Internship_Evaluator_Email ?></td>
          <td><?php echo $row->Submitted ?></td>
          <td><a id = "actions" href="<?php echo URLROOT; ?>/users/viewApplication/<?php echo $row->Application_ID ?>">View</a>
          <?php if($_SESSION['user_type'] == 'Student') { ?>
            <a id = "actions" href="<?php echo URLROOT; ?>/users/editApplication/<?php echo $row->Application_ID ?>">Edit</a>
            <a id = "actions" href="<?php echo URLROOT; ?>/users/deleteApplication/<?php echo $row->Application_ID ?>">Delete</a>
          <?php } ?></td>
        </tr>
        <?php }; ?>
        <tfoot>
          <tr>
          <td colspan="7">
          <div class="links"><a href="#">&laquo;</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">&raquo;</a></div>
          </td>
          </tr>
        </tfoot>
        </table>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>