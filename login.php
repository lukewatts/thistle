<?php require_once( 'templates/header.php' ); ?>

<?php // TODO: To clean this up either place in a Plugin or move logging in to a controller...
  if ( Input::exists() ) {
    if ( Input::get( 'log_out' ) ) {
      User::logout();
    }
  }
?>
<?php if ( Session::exists( 'log_in') ) : ?>
  <h3><?php echo Session::flash( 'log_in' ); ?></h3>
<?php endif; ?>
<?php 
  if ( Input::exists() ) {
    if ( Token::check( Input::get( 'token' ) ) ) {
      $errorHandler = new ErrorHandler();
      $login_validation = new Validator( $errorHandler );

      $login_validation->rules = array(
        'email' => array(
          'required'  => true,
          'email'     => true,
          'maxlength' => 64
        )
      );

      $validation = $login_validation->check( $_POST );

      if ( $validation->fails() ) {
        $error = '<span style="color: red; font-weight: bold;">' . $validation->errors()->first('email') . '</span><br />';
      }
      else {

        $user = array( 'email' => Input::get( 'email' ) );

        if ( User::exists( $user ) ) {
          if ( User::login( $user) ) {
            Session::flash( 'log_in', 'You have successfully logged in.' );
            Redirect::to( get_base_url('/') . 'admin' );
          }
          else {
            $error = 'There was an error logging in.';
          }
        }
        else {
          $error = 'There is no such user in the database';
        }
      }
    }
  }
?>
<section>
  <h1>Thistle Login</h1>
  <form action="" method="post">
    <div>
      <?php if ( isset( $error ) ) echo $error; ?>
      <label for="email">Email: </label>
      <input type="text" name="email" id="email" />
    </div>
    <div>
      <input type="hidden" name="token" value="<?php echo Token::make(); ?>">
      <input type="submit" value="Login">
    </div>
  </form>
</section>

<?php require_once( $path['base'] . '/templates/footer.php' ); ?>