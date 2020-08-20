<?php
  class Account {

      private $con;
      private $errorArray;

      public function __construct($con){
        $this->errorArray = array();
        $this->con = $con;
      }

      public function login($un, $pw) {
        $pw = md5($pw);
        $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");
        if(mysqli_num_rows($query) == 1) {
          return true;
        }
        else {
          array_push($this->errorArray, Constants::$loginFailed);
          return false;
        }
      }

      public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
        $this->validateUsername($un);
        $this->validateFirstname($fn);
        $this->validateLastname($ln);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);

        if(empty($this->errorArray)){
          //Insert into db
          return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
        }
        else {
          return false;
        }
      }

      public function getError($error){
        if(!in_array($error, $this->errorArray)){
          $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
      }

      private function insertUserDetails($un, $fn, $ln, $em, $pw){
        $encryptedPw = md5($pw);      //encrypts password using md5 hash
        $profilePic = "assets/images/profilePics/head_emerald.png";
        $date = date("Y-m-d");

        $result = mysqli_query($this->con, "INSERT INTO users VALUE('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
        return $result;
      }

      private function validateUsername($un) {

        if(strlen($un) > 25 || strlen($un) < 5) {
          array_push($this->errorArray, Constants::$userNameLength);
          return;
        }

        $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
        if(mysqli_num_rows($checkUsernameQuery) != 0) {
          array_push($this->errorArray, Constants::$usernameTaken);
          return;
        }

      }

      private function validatefirstname($fn) {
        if(strlen($fn) > 25 || strlen($fn) < 2) {
          array_push($this->errorArray, Constants::$firstNameLength);
          return;
        }
      }

      private function validatelastname($ln) {
        if(strlen($ln) > 25 || strlen($ln) < 2) {
          array_push($this->errorArray, Constants::$lastNameLength);
          return;
        }
      }

      private function validateEmails($em, $em2) {
        if($em != $em2) {
          array_push($this->errorArray, Constants::$emailsDoNotMatch);
          return;
        }
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {  //checks format of email. Email form field doesn't check for .com at the end. This does
          array_push($this->errorArray, Constants::$emailInvalid);
          return;
        }
        $checkemailQuery = mysqli_query($this->con, "SELECT username FROM users WHERE email='$em'");
        if(mysqli_num_rows($checkemailQuery) != 0) {
          array_push($this->errorArray, Constants::$emailTaken);
          return;
        }
      }

      private function validatePasswords($pw, $pw2) {
        if($pw != $pw2) {
          array_push($this->errorArray, Constants::$passwordsDoNotMatch);
          return;
        }
        if(preg_match('/[^A-Za-z0-9]/',$pw)){       //preg_match is regex, ^ is not
          array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
          return;
        }
        if(strlen($pw) > 30 || strlen($pw) < 6) {
          array_push($this->errorArray, Constants::$passwordLength);
          return;
        }
      }


  }
 ?>
