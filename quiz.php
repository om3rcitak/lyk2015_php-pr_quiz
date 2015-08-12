<?php
session_start();
require("inc/questions.php");
if(! isset($_SESSION['answeredQuestionCount'])){
    //ilk çalıştırma, oturumu başlat
    $_SESSION['totalQuestionCount'] = count($questions);
    $_SESSION['answeredQuestionCount'] = 0;
    $_SESSION['correctAnswerCount'] = 0;
    $_SESSION['startTime'] = time();
}

// ilk çalıştırma mı?
//      quiz'i başlat, ilk soruyu göster

// cevap geldiyse
//      cevabı kontrol et, değerleri artır
if(isset( $_POST['answer'])){
    if($_POST['answer'] == $questions[$_SESSION['answeredQuestionCount']]['answer'])
        // cevap doğru, işlem yap
        $_SESSION['correctAnswerCount']++;

    $_SESSION['answeredQuestionCount']++;
}
echo ($_SESSION['answeredQuestionCount']+1) ." / ";
echo $_SESSION['totalQuestionCount'];
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
    $_SESSION['finishTime'] = time();
    header("Location: result.php");
    die();
}

$currentQuestion = $questions[$_SESSION['answeredQuestionCount']];

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LYK 2015 Php - Pr Quiz</title>
</head>
<body>
    <form action="quiz.php" method="post">
    <h2><?php echo $currentQuestion['question'];?></h2>
        <?php
        foreach($currentQuestion['options'] as $key => $option):
            ?>
            <input type="radio" name="answer" value="<?=$key;?>" id="<?=$key;?>"><label for="<?=$key;?>"><?php echo $option; ?></label><br>
        <?php
        endforeach;
        ?>
    <br>
    <input type="submit" value="<?=$btnText;?>">
    </form>
    <a href="destroy.php">Testi Yeniden Başlat</a>
</body>
</html>