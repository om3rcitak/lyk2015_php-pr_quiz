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
</head>
<body>
    <h1>QUIZ</h1>
    <h3>#lyk2015 PHP - Quiz Projesi</h3>
    <p>Karşınıza <?=count($questions);?> soru gelecek ve sonuçta başarı puanınızı göreceksiniz.</p>
    <a href="quiz.php">Sınava Başla</a>
</body>
</html>