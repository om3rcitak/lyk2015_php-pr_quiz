<?php
require("inc/functions.php");
autoLoader();
if(isQuizStarted()){
   redirectTo("quiz");
}
$questions = getAllQuestions();
?>
<?php include('inc/header.php') ?>
    <div class="well text-center">
    <h1>QUIZ</h1>
    <h3>#lyk2015 PHP - Quiz Projesi</h3>
    <p>Karşınıza <span class="badge success"><?=count($questions);?></span> soru gelecek ve sonuçta başarı puanınızı göreceksiniz.</p>
    <a href="quiz.php" class="btn btn-primary btn-lg">Sınava Başla</a>
</div>
<?php include('inc/footer.php'); ?>