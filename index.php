<?php
session_start();
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
    <p>Karşınıza <?=$_SESSION['totalQuestionCount'];?> soru gelecek ve sonuçta başarı puanınızı göreceksiniz.</p>
    <a href="quiz.php">Sınava Başla</a>
</body>
</html>