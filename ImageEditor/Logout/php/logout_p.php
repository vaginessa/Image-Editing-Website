<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: http://edit-image.orgfree.com/Login_SignUp/login_signup.html"); // Redirecting To Home Page
}
?>