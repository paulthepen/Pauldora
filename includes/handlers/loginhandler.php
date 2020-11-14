<?php

if(isset($_POST['LoginButton'])) {
  //Login button pressed
  $username = $_POST['loginusername'];
  $password = $_POST['loginpassword'];

  //Login function
  $result = $account->login($username, $password);
  if($result) {
    $_SESSION['userLoggedIn'] = $username;
    header("Location: index.php");
    setcookie("loggedInTracker", $_SESSION['userLoggedIn'], time()+(86400 * 30));
  }
}
?>
