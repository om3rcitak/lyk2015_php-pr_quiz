<?php
require("inc/functions.php");
autoLoader();
$questions = getAllQuestions();

if(! isQuizStarted()){
    //ilk çalıştırma, oturumu başlat
    startQuiz(count($questions));
}

// cevap geldiyse
//      cevabı kontrol et, değerleri artır
if(isset( $_POST['answer'])){
    if($_POST['answer'] == $questions[$_SESSION['answeredQuestionCount']]['answer'])
        // cevap doğru, işlem yap
        $_SESSION['correctAnswerCount']++;

    $_SESSION['answeredQuestionCount']++;
}
// sıradaki soruyu seç, göster

// son soru görüntüleniyorsa
//      butonun metnini değiştir
if($_SESSION['answeredQuestionCount'] == ($_SESSION['totalQuestionCount']-1) )
    $btnText = "Testi Bitir";
else
    $btnText = "Sonraki Soru";

//  tüm sorular yanıtlandıysa
//      testi bitir, sonuca yönlendir
if($_SESSION['answeredQuestionCount'] == $_SESSION['totalQuestionCount']){
    if (empty($_SESSION['finishTime'])) {
		$_SESSION['finishTime'] = time();
	}
    header("Location: result.php");
    die();
}

$currentQuestion = $questions[$_SESSION['answeredQuestionCount']];

$testProgress = (($_SESSION['answeredQuestionCount']+1) * 100) / $_SESSION['totalQuestionCount'] ;

?>
<?php include('inc/header.php') ?>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?=$testProgress;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$testProgress;?>%;">
            <?php echo ($_SESSION['answeredQuestionCount']+1) ." / ". $_SESSION['totalQuestionCount']; ?>
        </div>
    </div>
<div class="well text-center">
    <form action="quiz.php" method="post">
    <h2><?php echo $currentQuestion['question'];?></h2>
        <div class="text-center">
        <?php
        foreach($currentQuestion['options'] as $key => $option):
            ?>
            <input type="radio" name="answer" value="<?=$key;?>" id="<?=$key;?>"><label for="<?=$key;?>"><?php echo $option; ?></label><br>
        <?php
        endforeach;
        ?>
            </div>
    <br>
    <input type="submit" value="<?=$btnText;?>" class="btn btn-primary btn-lg">
    </form>
</div>
    <a href="destroy.php" class="btn btn-xs btn-danger pull-right">Testi Yeniden Başlat</a>
<?php include('inc/footer.php'); ?>
