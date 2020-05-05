<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/subject.css">
    <title>Physics</title>
</head>
<?php include "misc/header.php";?>

<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

<body>
    <div class="grid-container">
        <div class="grid-item question">
        <!-- Get Random Question -->
        Question Reference:
        <?php 
        $dir  = 'physics/'.$_GET["topic"];
        $questions = scandir($dir);
        $len = count ($questions);
        #print_r($questions);
        $question_name = $questions[random_int(2,$len)];
        #print_r($question_name);
        $question = ("physics/".$_GET["topic"]."/".$question_name);
        include $question?>
        </div>

        <div class="grid-item">Click the corrent answer:
            <ul>
                <li class="popup"><button onclick="clickHandler('A')" class="A">A</button><span class="popuptext" id="myPopup">Correct!</span><span class="Wpopuptext" id="WmyPopup">Wrong, try again!</span></li>
                <li class="popup"><button onclick="clickHandler('B')" class="B">B</button><span class="popuptext" id="myPopup">Correct!</span><span class="Wpopuptext" id="WmyPopup">Wrong, try again!</span></li>
                <li class="popup"><button onclick="clickHandler('C')" class="C">C</button><span class="popuptext" id="myPopup">Correct!</span><span class="Wpopuptext" id="WmyPopup">Wrong, try again!</span></li>
                <li class="popup"><button onclick="clickHandler('D')" class="D">D</button><span class="popuptext" id="myPopup">Correct!</span><span class="Wpopuptext" id="WmyPopup">Wrong, try again!</span></li>
            </ul>
            <a href="report.php?">Report Question</a><br><br>
        </div>
        <div class="grid-item">Comments:</div>
        <div class="grid-item mobile mdd"><a>Topic: <?php print_r($dir);?><br>
        Change Topic:</a>
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
        </div>
    </div>

</body>


<script>
    try{
    var answer = document.getElementById("answer");
    var letter_answer = answer.getAttribute("value");
    }
    catch(TypeError){
        location.href="physics.php?topic=Core";
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
</script>

</html>