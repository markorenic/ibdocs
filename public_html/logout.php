<?php
include 'functions.php';
session_start();
if (isset($_SESSION['uid'])) {
session_destroy();
echo "<meta http-equiv='refresh' content='0;url=https://ibdocs.renic.xyz/index.php'>";}
?>