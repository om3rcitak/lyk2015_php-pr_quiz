<?php

$questions = array(
    array(
        'question' => "1 Cumhuriyet hangi yıl ilan edildi?",
        'options' => array(
            'a' => '1919',
            'b' => '1920',
            'c' => '1922',
            'd' => '1923',
        ),
        'answer' => 'd'
    ),
    array(
        'question' => "2 Cumhuriyet hangi yıl ilan edildi?",
        'options' => array(
            'a' => '1919',
            'b' => '1920',
            'c' => '1922',
            'd' => '1923',
        ),
        'answer' => 'd'
    ),
    array(
        'question' => "3 Cumhuriyet hangi yıl ilan edildi?",
        'options' => array(
            'a' => '1919',
            'b' => '1920',
            'c' => '1922',
            'd' => '1923',
        ),
        'answer' => 'd'
    ),
);

session_start();

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
echo $_SESSION['correctAnswerCount'] ." / ";
echo $_SESSION['answeredQuestionCount'];
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
</body>
</html>