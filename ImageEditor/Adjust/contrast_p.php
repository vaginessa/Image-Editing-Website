<?php
	session_start(); //Session starts
	if(isset($_SESSION['user']))
	{
		$user = $_SESSION['user']; //getting email of the user that logged in
		$extension = ".jpg";
		$img_name = $user . $extension;
		
		$u = "/home/vhosts/edit-image.orgfree.com/UserImages/";
		$url =$u . $img_name;
		
		if(isset($_POST["contrast-slider"]))
		{
				$contrast = $_POST["contrast-slider"];
				$contrast = -$contrast;
				$source = imagecreatefromjpeg($url);
				if(imagefilter($source, IMG_FILTER_CONTRAST, $contrast))
		     	{
				    imagejpeg($source,$url);
			    }
				imagedestroy($source);
				header('Location: http://edit-image.orgfree.com/Adjust/adjust_p.php');				 
		}
	}
	else
	{
		echo '<script language="javascript"> window.location.href="http://edit-image.orgfree.com/Login_SignUp/login_signup.html"; alert("Not logged in!");</script>';
	}
	?>