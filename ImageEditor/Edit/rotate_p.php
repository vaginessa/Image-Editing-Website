<?php
	session_start(); //Session starts
	if(isset($_SESSION['user']))
	{
		$user = $_SESSION['user']; //getting email of the user that logged in
		$extension = ".jpg";
		$img_name = $user . $extension;
		
		$u = "/home/vhosts/edit-image.orgfree.com/UserImages/";
		$url =$u . $img_name;
		
		if(isset($_POST["rotate-slider"]))
		{
				$rotate = $_POST["rotate-slider"];
				
				$degrees = ($rotate>=0)?$rotate:(360+$rotate);
				
				$source = imagecreatefromjpeg($url);
                $im_rotate = imagerotate($source, $degrees, 0);
                imagejpeg($im_rotate,$url);
                imagedestroy($source);
				header('Location: http://edit-image.orgfree.com/Edit/edit_p.php');				 
		}
	}
	else
	{
		echo '<script language="javascript"> window.location.href="http://edit-image.orgfree.com/Login_SignUp/login_signup.html"; alert("Not logged in!");</script>';
	}
	?>