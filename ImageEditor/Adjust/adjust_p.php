<!DOCTYPE html>
<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
	<title>Image Editor</title>
	<link rel="stylesheet" type="text/css" href="css/normal_c.css">
	<link rel="stylesheet" href="mdl/material.min.css">
	<script src="mdl/material.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="upload/jquery.min.js" type="text/javascript"></script>

	
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

    <script>
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
	</script>
</head>
<body id="body-colour">	
<div class="se-pre-con"></div>

	<header>.</header>
	<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header  mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Image Editor</span>
	 
    </div>
	 <div class="profile">
	<!-- Accent-colored raised button with ripple -->
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onClick="location.href='http://edit-image.orgfree.com/Logout/php/logout_p.php'"> 
		Log Out
	</button>
	</div>
    <!-- Tabs -->
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
      <a href="#brightness" class="mdl-layout__tab">Brightness</a>
      <a href="#contrast" class="mdl-layout__tab">Contrast</a>
      <a href="#blur" class="mdl-layout__tab">Blur</a>
    </div>
	
	
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Image Editor</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="http://edit-image.orgfree.com/Upload/upload.html">Upload</a>
        <a href="http://edit-image.orgfree.com/Edit/edit_p.php" class="mdl-navigation__link" >Edit</a>
        <a class="mdl-navigation__link" href="http://edit-image.orgfree.com/Adjust/adjust_p.php">Adjust</a>
        <a class="mdl-navigation__link" href="http://edit-image.orgfree.com/Filters/filter_p.php">Filters</a>
		<a class="mdl-navigation__link" href="http://edit-image.orgfree.com/Save_image/save_p.php">Save</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
	
	 <section class="mdl-layout__tab-panel" id="brightness">
      <div class="page-content">
		
		<!-- Your content goes here -->
		
	<div class="slider">
		<form class="form" action="brightness_p.php" method="post"> 
	  <input class="mdl-slider mdl-js-slider" name ="brightness-slider" type="range" min="-150" max="150" value="0" tabindex="0"/>
	  <div class="adjust-button">
	    <button class="button-brightness mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
            <i class="material-icons">done</i>
        </button>
	  </div>
		</form>
	</div>
	
	
	  
	  </div>
    </section>
    <section class="mdl-layout__tab-panel" id="contrast">
      <div class="page-content">
	<div class="slider">
		<form class="form" action="contrast_p.php" method="post"> 
	  <input class="mdl-slider mdl-js-slider" name ="contrast-slider" type="range" min="-150" max="150" value="0" tabindex="0"/>
	  <div class="adjust-button">
	    <button class="button-brightness mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
            <i class="material-icons">done</i>
        </button>
	  </div>
		</form>
	</div>
	  
	  </div>
    </section>
    <section class="mdl-layout__tab-panel" id="blur">
      <div class="page-content"><!-- Your content goes here -->
	 <div class="slider">
		<form class="form" action="blur_p.php" method="post"> 
	  <input class="mdl-slider mdl-js-slider" name ="blur-slider" type="range" min="0" max="40" value="0" tabindex="0"/>
	  <div class="adjust-button">
	    <button class="button-brightness mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
            <i class="material-icons">done</i>
        </button>
	  </div>
		</form>
	</div>
	  
	  </div>
    </section>
    <div class="page-content">
		
	</div>
  </main>
</div>	
  
	<?php
	session_start(); //Session starts
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user']; //getting email of the user that logged in
		$extension = ".jpg";
		$img_name = $user . $extension;
		
		$u = "http://edit-image.orgfree.com/UserImages/";
		$url =$u . $img_name;
	}
	else
	{
    echo '<script language="javascript"> window.location.href="http://edit-image.orgfree.com/Login_SignUp/login_signup.html"; alert("Not logged in!");</script>';
	}
	?>
	
	<img class="upload_img" src="<?php echo $url ?>">
	
</body>
</html>
