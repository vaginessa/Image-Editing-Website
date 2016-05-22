<?php
	session_start(); //Session starts
	if(isset($_SESSION['user']))
	{
		$user = $_SESSION['user']; //getting email of the user that logged in
		$extension = ".jpg";
		$img_name = $user . $extension;
		
		$u = "/home/vhosts/edit-image.orgfree.com/UserImages/";
		$url =$u . $img_name;
		
		if(isset($_POST["resize-slider"]))
		{
				$val = $_POST["resize-slider"];
				$percent = $val/100.0;

                list($width, $height) = getimagesize($url);
                $newwidth = $width * $percent;
                $newheight = $height * $percent;
                
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                $source = imagecreatefromjpeg($url);

                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        
                imagejpeg($thumb,$url);
                imagedestroy($source);
				header('Location: http://edit-image.orgfree.com/Edit/edit_p.php');				 
		}
	}
	else
	{
		echo '<script language="javascript"> window.location.href="http://edit-image.orgfree.com/Login_SignUp/login_signup.html"; alert("Not logged in!");</script>';
	}
	?>