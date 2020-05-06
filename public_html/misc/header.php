<?php

error_reporting(E_ALL);

if (empty($_SESSION['uid'])) {

    echo "<meta http-equiv='refresh' content='0;url=https://ibdocs.renic.xyz/login.php'>";

}

?>

<!DOCTYPE html>

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="description" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../style/header.css">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">

        <link rel="shortcut icon" type="image/png" href="resources/logo.png">

    </head>

    <body>

        <div class="header">

        <header>

            <a class="logo" href="https://www.ibdocuments.com/"><img src="../resources/logo.png" alt="logo"></a>

            <nav role="navigation">

                <ul class="nav__links">

                    <li><a href="index.php">Homepage</a></li>

                    <li><a href="">Physics</a>

                        <ul class="dropdown">

                            <li><a href="physics.php?topic=Core">All</a></li>

                            <li><a href="physics.php?topic=Topic1">Topic 1</a></li>

                            <li><a href="physics.php?topic=Topic2">Topic 2</a></li>

                            <li><a href="physics.php?topic=Topic3">Topic 3</a></li>

                            <li><a href="physics.php?topic=Topic4">Topic 4</a></li>

                            <li><a href="physics.php?topic=Topic5">Topic 5</a></li>

                            <li><a href="physics.php?topic=Topic6">Topic 6</a></li>

                            <li><a href="physics.php?topic=Topic7">Topic 7</a></li>

                            <li><a href="physics.php?topic=Topic8">Topic 8</a></li>

                            <li><a href="physics.php?topic=Topic9">Topic 9</a></li>

                            <li><a href="physics.php?topic=Topic10">Topic 10</a></li>

                            <li><a href="physics.php?topic=Topic11">Topic 11</a></li>

                            <li><a href="physics.php?topic=Topic12">Topic 12</a></li>

                          </ul>

                    </li>

                    <li><a href="">chemistry</a>

                        <ul class="dropdown">

                            <li><a href="chemistry.php?topic=Core">All</a></li>

                            <li><a href="chemistry.php?topic=Topic1">Topic 1</a></li>

                            <li><a href="chemistry.php?topic=Topic2">Topic 2</a></li>

                            <li><a href="chemistry.php?topic=Topic3">Topic 3</a></li>

                            <li><a href="chemistry.php?topic=Topic4">Topic 4</a></li>

                            <li><a href="chemistry.php?topic=Topic5">Topic 5</a></li>

                            <li><a href="chemistry.php?topic=Topic6">Topic 6</a></li>

                            <li><a href="chemistry.php?topic=Topic7">Topic 7</a></li>

                            <li><a href="chemistry.php?topic=Topic8">Topic 8</a></li>

                            <li><a href="chemistry.php?topic=Topic9">Topic 9</a></li>

                            <li><a href="chemistry.php?topic=Topic10">Topic 10</a></li>

                            <li><a href="chemistry.php?topic=Topic11">Topic 11</a></li>

                            <li><a href="chemistry.php?topic=Topic12">Topic 12</a></li>

                          </ul>

                    </li>

                    <li><a href="https://github.com/markorenic/ibdocs/">About</a></li>

                </ul>

            </nav>

<?php

if (isset($_SESSION['uid'])) {

    echo"<a class='cta' href='logout.php'>Logout</a>";

}else{

    echo"<a class='cta' href='login.php'>Login</a>";

}

?>

            

            <p onclick="openNav()" class="menu cta">Menu</p>

        

        <div id="mobile__menu" class="overlay">

            <a class="close" onclick="closeNav()">&times;</a>

            <div class="overlay__content">

                <a href="index.php">Homepage</a>

                <a href="physics.php?topic=Core">Physics</a>
                <a href="chemistry.php?topic=Core">chemistry</a>

                <a href="https://github.com/markorenic/ibdocs/">About</a>

            </div>

        </div>

        <script type="text/javascript" src="scripts/mobile.js"/></script>

        </div>

    </header>

    </body>