<?php
session_start(); //Session starts
if(isset($_SESSION['user']))
	{
		$user = $_SESSION['user']; //getting email of the user that logged in
		$extension = ".jpg";
		$img_name = $user . $extension;

		$load_url='http://edit-image.orgfree.com/UserImages/';
		$load_url =$load_url.$img_name;
        
        //Force download file
        header("Pragma: public");
        header("Expires: 0");
        
        header("Content-Type: application/force-download");
        header( "Content-Disposition: attachment; filename=".basename($load_url));
        
        header( "Content-Description: File Transfer");
        @readfile($load_url);
		

	}
	else
	{
		echo '<script language="javascript"> window.location.href="http://edit-image.orgfree.com/Login_SignUp/login_signup.html"; alert("Not logged in!");</script>';
	}
?>



?>

	