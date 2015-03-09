<h1> Welcome <?php echo $user->first_name; ?> to the Thistle Admin Dashboard</h1>

<form action="<?php echo get_base_url('/') . 'login.php'; ?>" method="post">
  <input type="submit" name="log_out" value="Log Out">
</form>


