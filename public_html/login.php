<?php
//sets timezone to chicago 
    date_default_timezone_get('America/Chicago');
    include 'functions.php';
//starts the seesion meaning all the session variables are active
    session_start();		
 // checks if user is already looged in 
		if (isset($_SESSION['uid'])) {
        header("index.php");
		echo "<h1 class='font1'>Welcome</h1>";
		echo "<h1 class='font1'>Logged in as:<span class='spanclass'>" .$_SESSION['uid']. "</span></h1>";
		//displays a logout button if pressed the function userLogut is run
		echo "<form class='logoutdiv' method='POST' action='".userLogout($connect)."'>
				<button type='submit' name='LogoutSubmit'>Logout</button>
		</form>";
		}else {
			// if user isnt logged in it displays the login form
			echo "Not Logged in";
			//login form is displayed wich uses the function getLogin 
			echo "<form class='logindiv' method='POST' action='".getLogin($connect)."'>
				<input type='text' name='uid' placeholder='Username'>
				<br>
				<input type='password' name='pwd' placeholder='password' class='passstyle'>
				<br>
				<button type='submit' name='loginSubmit'>Login</button>
				</form>";
		}
?>
<link href="style.css" rel="stylesheet" type="text/css">

<head>
	<body class="loginbackground">
		<!-- links to signup and index page  -->
	<a class="bt"href="signup.php">sign up </a>
	<a class="btl"href="sounds.php">HOME</a>
	</body>
</head>