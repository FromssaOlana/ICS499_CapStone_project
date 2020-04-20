<nav>
  <div class="container">
      <ul>
        <li><a href="<?php echo URLROOT; ?>"><img src='<?php echo URLROOT; ?>/images/logo2.png' alt='metrostate logo' height='50' width='200'></a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/index">Home</a></li>
      <?php if(isset($_SESSION['user_id'])) : ?>
        <?php if($_SESSION['user_type'] != "Admin") : ?>
          <?php if($_SESSION['user_type'] == "Student") : ?>
            <li><a href="<?php echo URLROOT; ?>/users/application/-1">Application</a></li>
          <?php endif; ?>
            <li><a href="<?php echo URLROOT; ?>/users/manageapplications">Manage Applications</a></li>
            <li><a href="<?php echo URLROOT; ?>/users/viewuser"><div id='admin'><?php echo $_SESSION['user_name']; ?></div></a></li>
            <li><a href="<?php echo URLROOT; ?>/users/logout">Logout</a></li>
        <?php else: ?>
          <li><a href="<?php echo URLROOT; ?>/admins/manageusers">Manage Users</a></li>
          <li><a href="<?php echo URLROOT; ?>/admins/viewuser"><div id='admin'><?php echo $_SESSION['user_name']; ?></div></a></li>
          <li><a href="<?php echo URLROOT; ?>/admins/logoutAdmin">Logout</a></li>
        <?php endif; ?>
      <?php else: ?>
        <li><a href="<?php echo URLROOT; ?>/users/registerstudent">Register as Student</a></li>
        <li><a href="<?php echo URLROOT; ?>/users/registeremployer">Register as Employer</a></li>
        <li><a href="<?php echo URLROOT; ?>/users/login">Login</a></li>
      <?php endif; ?>

      </ul>
  </div>
</nav>