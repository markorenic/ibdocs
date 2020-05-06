<?php

//sets timezone to chicago 

    date_default_timezone_get('America/Chicago');

    include 'functions.php';

//starts the seesion meaning all the session variables are active

    session_start();		



 // checks if user is already looged in 

		if (isset($_SESSION['uid'])) {

		echo "<h1 class='font1'>Welcome</h1>";

		echo "<h1 class='font1'>Logged in as:<span class='spanclass'>" .$_SESSION['uid']. "</span></h1>";

		//displays a logout button if pressed the function userLogut is run

		echo "<form class='logoutdiv' method='POST' action='".userLogout($connect)."'>

				<button type='submit' name='LogoutSubmit'>Logout</button>

		</form>";

		}else {

			// if user isnt logged in it displays the login form

			//echo "Not Logged in";

			//login form is displayed wich uses the function getLogin 

			echo "

<head>

    <meta charset='UTF-8'>

    <link rel='stylesheet' href='style/login/style/login.css'>

		<meta name='viewport' content='width=device-width, initial-scale=1'>

<!--===============================================================================================-->	

	<link rel='icon' type='image/png' href='style/login/images/icons/favicon.ico'/>

<!--===============================================================================================-->

	<link rel='stylesheet' type='text/css' href='style/login/vendor/bootstrap/css/bootstrap.min.css'>

<!--===============================================================================================-->

	<link rel='stylesheet' type='text/css' href='style/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css'>

<!--===============================================================================================-->

	<link rel='stylesheet' type='text/css' href='style/login/fonts/iconic/css/material-design-iconic-font.min.css'>

<!--===============================================================================================-->

	<link rel='stylesheet' type='text/css' href='style/login/vendor/animate/animate.css'>

<!--===============================================================================================-->	

	<link rel='stylesheet' type='text/css' href='style/login/vendor/css-hamburgers/hamburgers.min.css'>

<!--===============================================================================================-->

	<link rel='stylesheet' type='text/css' href='style/login/vendor/animsition/css/animsition.min.css'>

<!--===============================================================================================-->

	<link rel='stylesheet' type='text/css' href='style/login/vendor/select2/select2.min.css'>

<!--===============================================================================================-->	

	<link rel='stylesheet' type='text/css' href='style/login/vendor/daterangepicker/daterangepicker.css'>

<!--===============================================================================================-->

	<link rel='stylesheet' type='text/css' href='style/login/css/util.css'>

	<link rel='stylesheet' type='text/css' href='style/login/css/main.css'>

<!--===============================================================================================-->

    <title>Physics</title>

</head>

<body>

	<div class='limiter'>

		<div class='container-login100'>

			<div class='wrap-login100 p-t-85 p-b-20'>

				<form class='login100-form validate-form logindiv' method='POST' action='".getLogin($connect)."'>

					<span class='login100-form-title p-b-70'>

						Welcome

					</span>

					<span class='login100-form-avatar'>

						<img src='resources/logo.png' alt='AVATAR'>

					</span>



					<div class='wrap-input100 validate-input m-t-85 m-b-35' data-validate = 'Enter username'>

						<input class='input100'  type='text' name='uid' placeholder='Username'>

						<span class='focus-input100' data-placeholder='Username'></span>

					</div>



					<div class='wrap-input100 validate-input m-b-50' data-validate='Enter password'>

						<input class='input100' type='password'  name='pwd' placeholder='password'>

						<span class='focus-input100' data-placeholder='Password'></span>

					</div>



					<div class='container-login100-form-btn'>

						<button class='login100-form-btn'  type='submit' name='loginSubmit'>

							Login

						</button>

					</div>



					<ul class='login-more'>

						<li class='m-b-8'>

							<span class='txt1'>

								CBA to make an account? Use Username: guest , Password: guest
							</span>



							<a href='#' class='txt2'></a>

						</li>



						<li>

							<span class='txt1'>

								Don’t have an account?

							</span>



							<a href='signup.php' class='txt2'>

								Sign up

							</a>

						</li>

					</ul>

				</form>

			</div>

		</div>

	</div>

	



	<div id='dropDownSelect1'></div>

	

<!--===============================================================================================-->

	<script src='style/login/vendor/jquery/jquery-3.2.1.min.js'></script>

<!--===============================================================================================-->

	<script src='style/login/vendor/animsition/js/animsition.min.js'></script>

<!--===============================================================================================-->

	<script src='style/login/vendor/bootstrap/js/popper.js'></script>

	<script src='style/login/vendor/bootstrap/js/bootstrap.min.js'></script>

<!--===============================================================================================-->

	<script src='style/login/vendor/select2/select2.min.js'></script>

<!--===============================================================================================-->

	<script src='style/login/vendor/daterangepicker/moment.min.js'></script>

	<script src='style/login/vendor/daterangepicker/daterangepicker.js'></script>

<!--===============================================================================================-->

	<script src='style/login/vendor/countdowntime/countdowntime.js'></script>

<!--===============================================================================================-->

	<script src='style/login/js/main.js'></script>



</body>";

}

?>