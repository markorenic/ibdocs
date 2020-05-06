<?php 

session_start();

include "functions.php";

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="style/subject.css">

    <title>Chemistry</title>

</head>

<?php include "misc/header.php";?>



<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>

<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>



<body class="body">

    <div class="grid-container">

        <div class="grid-item question">

        <!-- Get Random Question -->

        Question Reference:

        <?php 

        $dir  = 'chemistry/'.$_GET["topic"];

        $questions = scandir($dir);

        $len = count ($questions);

        #print_r($questions);

        $question_name = $questions[random_int(2,$len)];

        $_SESSION["qn"] = $question_name;

        #print_r($question_name);

        $question = ("chemistry/".$_GET["topic"]."/".$question_name);

        include $question?>

        </div>



        <div class="grid-item answer">Click the corrent answer:

            <ul>

                <li class="popup"><button onclick="clickHandler('A')" class="A">A</button><span class="popuptext" id="myPopup">Correct!</span><span class="Wpopuptext" id="WmyPopup">Wrong, try again!</span></li>

                <li class="popup"><button onclick="clickHandler('B')" class="B">B</button><span class="popuptext" id="myPopup">Correct!</span><span class="Wpopuptext" id="WmyPopup">Wrong, try again!</span></li>

                <li class="popup"><button onclick="clickHandler('C')" class="C">C</button><span class="popuptext" id="myPopup">Correct!</span><span class="Wpopuptext" id="WmyPopup">Wrong, try again!</span></li>

                <li class="popup"><button onclick="clickHandler('D')" class="D">D</button><span class="popuptext" id="myPopup">Correct!</span><span class="Wpopuptext" id="WmyPopup">Wrong, try again!</span></li>

                <li class="popup"><button onClick="window.location.reload();" class="D">Skip</button><span class="popuptext" id="myPopup">Correct!</span><span class="Wpopuptext" id="WmyPopup">Wrong, try again!</span></li>

            </ul>



<?php

            echo "<form method='POST' action='".Report($connect)."'>

				<button type='submit' name='ReportSubmit'>Report Question</button></br>

                </form>";

?>

            

        </div>

        <div class="grid-item comment-section">
        <button onclick="toggleComments()">Toggle comments</button>
        <div class="comments-container" id="comments-container">

        <?php

        echo "<form method='POST' action'".Comment($connect)."'>

          <input type='hidden' name='section' value= '".$_SESSION["qn"]."'>

          <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>

          <textarea class='comment-box' name='text'></textarea><br><br>

          <button type='submit' name='commentbutton'>Comment</button>

        </form>";?>

        <?php displaycomments($connect); ?>
        </div>
        </div>

        <div class="grid-item mobile mdd"><a>Topic: <?php print_r($dir);?><br>
        Change Topic:</a>
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
        </div>

    </div>



</body>





<script>

    try{

    var answer = document.getElementById("answer");

    var letter_answer = answer.getAttribute("value");

    }

    catch(TypeError){

        location.href="chemistry.php?topic=Core";

    }

    

    function toggleshow(element){

        element.classList.toggle("show")

    }

    function clickHandler(letter) {

    if (letter == letter_answer){

        console.log("Correct answer");

        popupcorrect();

        setTimeout(function() {location.reload();},1000);

    }

    else{

        popupwrong();

        setTimeout(2000);

    }

    }



    // When the user clicks on <div>, open the popup

    function popupcorrect() {

    var popup = document.getElementById("myPopup");

    popup.classList.toggle("show");

    }

    function popupwrong() {

    var popup = document.getElementById("WmyPopup");

    popup.classList.toggle("show");

    setTimeout(function(){toggleshow(popup);},2000);

    }

    function toggleComments() {
    var x = document.getElementById("comments-container");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    }

</script>



</html>