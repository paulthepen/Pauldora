<?php
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");

  $account = new Account($con);

  include("includes/handlers/registerhandler.php");
  include("includes/handlers/loginhandler.php");

  function getInputValue($name) {
    if(isset($_POST[$name])){
      echo $_POST[$name];
    }
  }

 ?>

<html>
  <head>
    <title>Welcome to Pauldora!</title>

    <link rel="stylesheet" type="text/css" href="assets/css/register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
  </head>
  <body>

    <?php
    if(isset($_POST['RegisterButton'])) {
        echo '<script>
              $(document).ready(function() {
                $("#loginForm").hide();
                $("#RegisterForm").show();
              });
            </script>';
    }
    else {
      echo '<script>
            $(document).ready(function() {
              $("#loginForm").show();
              $("#RegisterForm").hide();
            });
          </script>';
    }
    ?>

    <div id="background">
      <div id='loginContainer'>
        <!-- login form -->
        <div id="inputContainer">
          <form id="loginForm" action="register.php" method="POST">
            <h2>Login to Your Account</h2>
            <p>
              <?php echo $account->getError(Constants::$loginFailed); ?>
              <label for="loginusername">Username</login>
              <input id="loginusername" type="text" name="loginusername" placeholder="Enter a username" value="<?php getInputValue('loginusername') ?>" required>
            </p>
            <p>
              <label for="loginpassword">Password</login>
              <input id="loginpassword" type="password" name="loginpassword" placeholder="Your Password" required>
            </p>
            <button type="submit" name="LoginButton">LOGIN</button>
            <div class="hasAccountText">
              <span id="hideLogin">Don't have an account yet? Signup here.</span>
            </div>
          </form>

          <!-- Register form-->
          <form id="RegisterForm" action="register.php" method="post">
            <h2>Create Your Free Account</h2>
            <p>
              <?php echo $account->getError(Constants::$userNameLength); ?>
              <?php echo $account->getError(Constants::$usernameTaken); ?>
              <label for="username">Username</login>
              <input id="username" type="text" name="username" placeholder="Enter a username" value="<?php getInputValue('username') ?>" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$firstNameLength); ?>
              <label for="firstname">First Name</login>
              <input id="firstname" type="text" name="firstname" placeholder="first name" value="<?php getInputValue('firstname') ?>" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$lastNameLength); ?>
              <label for="lastname">Last Name</login>
              <input id="lastname" type="text" name="lastname" placeholder="last name" value="<?php getInputValue('lastname') ?>" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
              <?php echo $account->getError(Constants::$emailInvalid); ?>
              <?php echo $account->getError(Constants::$emailTaken); ?>
              <label for="emailaddress">E-mail Address</login>
              <input id="emailaddress" type="email" name="emailaddress" placeholder="email address" value="<?php getInputValue('emailaddress') ?>" required>
            </p>
            <p>
              <label for="email2">Confirm Email</login>
              <input id="email2" type="email" name="email2" placeholder="email address" value="<?php getInputValue('email2') ?>"required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
              <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
              <?php echo $account->getError(Constants::$passwordLength); ?>
              <label for="password">Password</login>
              <input id="password" type="password" name="password" placeholder="Your Password" required>
            </p>
            <p>
              <label for="password2">Confirm Password</login>
              <input id="password2" type="password" name="password2" placeholder="Your Password Again" required>
            </p>
            <button type="submit" name="RegisterButton">SIGN UP</button>
            <div class="hasAccountText">
              <span id="hideRegister">Already have an account? Login here.</span>
            </div>
          </form>
      </div>
      <div id="loginText">
        <h1>Music for every mood</h1>
        <h2>Listen to loads of songs for free</h2>
        <ul>
          <li>Discover music you'll fall in love with</li>
          <li>Create your own playlists</li>
          <li>Follow artists to keep up to date</li>
        </ul>
      </div>
    </div>
  </div>
  </body>
</html>
