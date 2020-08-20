<?php
function sanitizeFormUsername($inputText) {
  $inputText = strip_tags($inputText);            //strips any HTML tags
  $inputText = str_replace(" ", "", $inputText);  //replaces space and returns it with nothing
  return $inputText;
}

function sanitizeFormString($inputText) {
  $inputText = strip_tags($inputText);            //strips any HTML tags
  $inputText = str_replace(" ", "", $inputText);  //replaces space and returns it with nothing
  $inputText = ucfirst(strtolower($inputText));   //converts string to lower case and then upper case on the first (chaRpie to Charpie)
  return $inputText;
}

function sanitizeFormPassword($inputText) {
  $inputText = strip_tags($inputText);            //strips any HTML tags
  return $inputText;
}




if(isset($_POST['RegisterButton'])) {
  //Register button pressed
  $username = sanitizeFormUsername($_POST['username']);
  $firstname = sanitizeFormString($_POST['firstname']);
  $lastname = sanitizeFormString($_POST['lastname']);
  $emailaddress = sanitizeFormString($_POST['emailaddress']);
  $email2 = sanitizeFormString($_POST['email2']);
  $password = sanitizeFormPassword($_POST['password']);
  $password2 = sanitizeFormPassword($_POST['password2']);

  $wasSuccessful = $account->register($username, $firstname, $lastname, $emailaddress, $email2, $password, $password2);

  if ($wasSuccessful){
    $_SESSION['userLoggedIn'] = $username;
    header("Location: index.php");  //takes to index page
  }
}

 ?>
