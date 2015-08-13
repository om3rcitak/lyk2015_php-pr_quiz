<?php
session_start();
if(isset($_SESSION['answeredQuestionCount'])){
   header("Location: quiz.php");
}
require("inc/questions.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LYK 2015 Php - Pr Quiz</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
<div class="container text-center">
    <br>
    <div class="well">
    <h1>QUIZ</h1>
    <h3>#lyk2015 PHP - Quiz Projesi</h3>
    <p>Karşınıza <span class="badge success"><?=count($questions);?></span> soru gelecek ve sonuçta başarı puanınızı göreceksiniz.</p>
    <a href="quiz.php" class="btn btn-primary btn-lg">Sınava Başla</a>
</div>
</div>
</body>
</html>