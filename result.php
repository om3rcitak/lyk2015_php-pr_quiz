<?php
session_start();
if(!isset($_SESSION['finishTime'])){
    header("Location: quiz.php");
}

$totalTime = ($_SESSION['finishTime']-$_SESSION['startTime']);

$aQuestionPoint = 100 / $_SESSION['totalQuestionCount'];
$usersPoint = $aQuestionPoint * $_SESSION['correctAnswerCount'];
?>
<?php include('inc/header.php') ?>
    <div class="well text-center">
    <h1>Sonuç</h1>
    <ul class="list-group list-unstyled">
        <li>Toplam Soru: <strong><?=$_SESSION['totalQuestionCount'];?></strong></li>
        <li>Doğru Cevap: <strong><?=$_SESSION['correctAnswerCount'];?></strong></li>
        <li>Süre: <strong><?=$totalTime;?> sn</strong></li>
        <li>Puan: <strong><?=number_format($usersPoint, 1, ',', '.');?></strong></li>
    </ul>
    <a href="destroy.php" class="btn btn-primary">Testi Yeniden Başlat</a>
    </div>
<?php include('inc/footer.php'); ?>