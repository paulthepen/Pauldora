$(document).ready(function() {

  $("#hideLogin").click(function() {
    $("#loginForm").hide();
    $("#RegisterForm").show();
  });

  $("#hideRegister").click(function() {
    $("#loginForm").show();
    $("#RegisterForm").hide();
  });
});
