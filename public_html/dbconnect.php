<?php
#connection info
$dbname = 'dbwmbsxra9qfuj';
$dbuser = 'um7bdcyp85wnp';
$dbpass = '351e)|1@$)u4';
$dbhost = 'localhost';
///creates a connection
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

function connect(){
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
    mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

    $test_query = "SHOW TABLES FROM $dbname";
    $result = mysqli_query($link, $test_query);

    $tblCnt = 0;
    while($tbl = mysqli_fetch_array($result)) {
    $tblCnt++;
    #echo $tbl[0]."<br />\n";
    }

    if (!$tblCnt) {
    echo "There are no tables<br />\n";
    } else {
    echo "There are $tblCnt tables<br />\n";
    } 
}

?>