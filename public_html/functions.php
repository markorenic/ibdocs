<?php
error_reporting(E_ALL);
#connection info
$dbname = 'dbwmbsxra9qfuj';
$dbuser = 'um7bdcyp85wnp';
$dbpass = '351e)|1@$)u4';
$dbhost = 'localhost';
///creates a connection
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

function GetLogin($connect){
	// cheks if LoginSubmit is pressed 
	if (isset($_POST['loginSubmit'])) {
		$uid = $_POST['uid'];
		$pwd = $_POST['pwd'];
		$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";
		$result = $connect->query($sql);
		if (mysqli_num_rows($result) > 0){
			if ($row = $result->fetch_assoc()) {
				//sets session uid to username 
              	$_SESSION['uid'] = $uid;
              	//refreshes the page fil
				echo "<meta http-equiv='refresh' content='0;url=https://ibdocs.renic.xyz/index.php'>";
				exit();
			}
		}
		else{ echo("<p class='font1'>password or username invalid<p>");}
	}
}
function userLogout() {
	if (isset($_POST['LogoutSubmit'])) {
      	session_destroy();
      	echo("<meta http-equiv='refresh' content='1'>");
		exit();
      	}
}

function signup($connect) {
	if (isset($_POST['singupSubmit'])) {
		$username = $_POST['uid'];
		$password = $_POST['pwd'];
		$ip = $_SERVER['REMOTE_ADDR'];
		//checks if the password has all the requirments 
		//$password_exp ="/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,12}$/";
		$query = mysqli_query($connect,"SELECT uid FROM user  WHERE uid='".$username."'");
	    if (mysqli_num_rows($query) == 0){
		$sql = "INSERT INTO user (uid, pwd) VALUES ('$username', '$password')";
	    $result = $connect->query($sql);
		$sql = "INSERT INTO ip (uid, ip) VALUES ('$username', '$ip')";
	    $result = $connect->query($sql);
		header("Location: login.php?signupsuccess");
		}else{
	       echo "username already taken";
	    }
      	
	}
}
function Report($connect){
    $qn= $_SESSION["qn"];
    if (isset($_POST['ReportSubmit'])) {
    $result = mysqli_query("SELECT 'rn' FROM 'report' WHERE 'qn' = '$qn'");
    if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);

echo $row[0]; // 42


      

    }
}