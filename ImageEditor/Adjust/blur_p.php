<?php
	session_start(); //Session starts
	if(isset($_SESSION['user']))
	{
		$user = $_SESSION['user']; //getting email of the user that logged in
		$extension = ".jpg";
		$img_name = $user . $extension;
		
		$u = "/home/vhosts/edit-image.orgfree.com/UserImages/";
		$url =$u . $img_name;
		
		if(isset($_POST["blur-slider"]))
		{
				$blur = $_POST["blur-slider"];
				$source = imagecreatefromjpeg($url);
				for($x = 0;$x<$blur;$x++)
				{
				    if(imagefilter($source, IMG_FILTER_GAUSSIAN_BLUR))
					{
						imagejpeg($source,$url);
					}
				}
				header('Location: http://edit-image.orgfree.com/Adjust/adjust_p.php');				 
		}
	}
	else
	{
		echo '<script language="javascript"> window.location.href="http://edit-image.orgfree.com/Login_SignUp/login_signup.html"; alert("Not logged in!");</script>';
	}
	?>