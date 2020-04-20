
      <a href="<?php echo URLROOT; ?>"><img src='<?php echo URLROOT; ?>/images/logo2.png' alt='metrostate logo' height='100' width='300'></a>
      <ul>
        <li><h4>Links</h4></li>
      
        <li><a href="<?php echo URLROOT; ?>/pages/index">Home</a></li>
        <li><a href="<?php echo URLROOT; ?>/pages/about">About</a></li>
        <li><a href='<?php echo URLROOT?>/pages/guidelines'>Internship Guidelines</a></li>

        <?php if(isset($_SESSION['user_id'])) : ?>
          <?php if($_SESSION['user_type'] != "Admin") : ?>
            <li><a href="<?php echo URLROOT; ?>/users/login">Login</a></li>
          <?php else: ?>
            <li><a href="<?php echo URLROOT; ?>/admins/adminlogin">Admin</a></li>
          <?php endif; ?>
        <?php else : ?>
          <li><a href="<?php echo URLROOT; ?>/users/registerstudent">Register as Student</a></li>
          <li><a href="<?php echo URLROOT; ?>/users/registeremployer">Register as Employer</a></li>
          <li><a href="<?php echo URLROOT; ?>/users/login">Login</a></li>
          <li><a href="<?php echo URLROOT; ?>/admins/adminlogin">Admin</a></li>
        <?php endif; ?>
      </ul>
