<?php
	session_start(); //Session starts
	
	
	
	function flipImage($image, $vertical, $horizontal) {
    $w = imagesx($image);
    $h = imagesy($image);
    if (!$vertical && !$horizontal) return $image;
    $flipped = imagecreatetruecolor($w, $h);
    if ($vertical) {
      for ($y=0; $y<$h; $y++) {
        imagecopy($flipped, $image, 0, $y, 0, $h - $y - 1, $w, 1);
      }
    }
    if ($horizontal) {
      if ($vertical) {
        $image = $flipped;
        $flipped = imagecreatetruecolor($w, $h);
      }
      for ($x=0; $x<$w; $x++) {
        imagecopy($flipped, $image, $x, 0, $w - $x - 1, 0, 1, $h);
      }
    }
    return $flipped;
}
	
	
	
	if(isset($_SESSION['user']))
	{
		$user = $_SESSION['user']; //getting email of the user that logged in
		$extension = ".jpg";
		$img_name = $user . $extension;
		
		$u = "/home/vhosts/edit-image.orgfree.com/UserImages/";
		$url =$u . $img_name;
		
		if(isset($_POST["options"]))
		{
				$choice = $_POST["options"];
				$source = imagecreatefromjpeg($url);
                switch($choice)
                {
                    case 1:
                          $source=flipImage($source,0,1);
                          break;
                    case 2:
                          $source=flipImage($source,1,0);
                          break;
					default:
						break;
				}
				imagejpeg($source,$url);
                imagedestroy($source);
					header('Location: http://edit-image.orgfree.com/Edit/edit_p.php');				 
		}
	}
	else
	{
		echo '<script language="javascript"> window.location.href="http://edit-image.orgfree.com/Login_SignUp/login_signup.html"; alert("Not logged in!");</script>';
	}
	?>