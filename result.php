<?php
session_start();
if(!isset($_SESSION['finishTime'])){
    header("Location: quiz.php");
}

$totalTime = ($_SESSION['finishTime']-$_SESSION['startTime']);

$aQuestionPoint = 100 / $_SESSION['totalQuestionCount'];
$usersPoint = $aQuestionPoint * $_SESSION['correctAnswerCount'];
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LYK 2015 Php - Pr Quiz</title>
</head>
<body>
    <h1>Sonuç</h1>
    <ul>
        <li>Toplam Soru: <strong><?=$_SESSION['totalQuestionCount'];?></strong></li>
        <li>Doğru Cevap: <strong><?=$_SESSION['correctAnswerCount'];?></strong></li>
        <li>Süre: <strong><?=$totalTime;?> sn</strong></li>
        <li>Puan: <strong><?=number_format($usersPoint, 1, ',', '.');?></strong></li>
    </ul>
    <a href="destroy.php">Testi Yeniden Başlat</a>
</body>
</html>