<?php
// Path where the file will be uploaded
session_start(); //Session starts
if(isset($_SESSION['user'])){
$user = $_SESSION['user']; //getting email of the user that logged in

$target_path = "/home/vhosts/edit-image.orgfree.com/UserImages/";
$extension   = ".jpg";
$img_name    = $user . $extension;

if (isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $temp = $file['tmp_name'];
}

if (isset($temp)) {
    if (is_uploaded_file($temp)) {
        if (getimagesize($temp) == FALSE) {
            $message = "Not an image";
            echo '<script language="javascript"> window.location.href="http://edit-image.orgfree.com/Upload/upload.html"; alert("Not an image");</script>';
        } else {
            if (move_uploaded_file($temp, $target_path . $img_name)) {
                echo "Upload successful.";
                header("Location: http://edit-image.orgfree.com/Options/options_p.php");
            } else {
                $message = "File cannot be moved to $target_path";
                  echo '<script language="javascript"> window.location.href="http://edit-image.orgfree.com/Upload/upload.html"; alert("Not an image");</script>';
            }
        }
    }
 else
{
    echo '<script language="javascript"> window.location.href="http://edit-image.orgfree.com/Upload/upload.html"; alert("No file uploaded");</script>';
}
}
else
{
    echo '<script language="javascript"> window.location.href="http://edit-image.orgfree.com/Upload/upload.html"; alert("No file uploaded");</script>';
}
}
else
{
    echo '<script language="javascript"> window.location.href="http://edit-image.orgfree.com/Login_SignUp/login_signup.html"; alert("Not logged in!");</script>';
}
?>