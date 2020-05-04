<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/subject.css">
    <title>Physics Paper 1 practice</title>
</head>
<?php include "misc/header.html";?>

<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

<body>
    <div class="grid-container">
        <div class="grid-item">
        <!-- Get Random Question -->
        <?php 
        $dir  = 'physics';
        $questions = scandir($dir);
        #print_r($questions);
        $question = ("physics/Core".$questions[random_int(0,877)]);
        include $question?></div>

        <div class="grid-item">Click the corrent answer:
            <ul>
                <li><button onclick="clickHandler('A')" class="A">A</button></li>
                <li><button onclick="clickHandler('B')" class="B">B</button></li>
                <li><button onclick="clickHandler('C')" class="C">C</button></li>
                <li><button onclick="clickHandler('D')" class="D">D</button></li>
            </ul>
        </div>
        <div class="grid-item">3</div>
    </div>    
</body>
<script>
    var answer = document.getElementById("answer");
    var letter_answer = answer.getAttribute("value");
    function clickHandler(letter) {
    if (letter == letter_answer){
        console.log("Correct answer");
        alert("Right asnwer you dummy.")
        setTimeout(1000)
        location.reload();
    }
    else{
        alert("Wrong asnwer you dummy.")
    }
    }
</script>
</html>