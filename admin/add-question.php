<?php
// soru formu göstereceğim
// bunu bir sayfaya post edeceğim
// gelen veri geçerliyse kaydedeceğim
if($_POST){
    require("../inc/questions.php");
    // veriyi yazacağımız dosya yolu
    $questionsDataFilePath = "../data/questions.txt";
    $message = "Soru eklenemedi";

    // eski sorulara yenisini ekliyoruz
    array_push($questions, $_POST);

    // yeni soru eklenmiş haliyle sorular değişkeni
    $encodedQuestions = json_encode($questions);

    // dosya bulunmuyorsa oluşturuyoruz
    if( ! file_exists($questionsDataFilePath))
        touch($questionsDataFilePath);

    // dosyayı açıp veriyi yazıp kapatıyoruz
    $questionsDataFile = fopen($questionsDataFilePath, "w");
    if(fwrite($questionsDataFile, $encodedQuestions))
        $message = "Soru eklendi.";
    fclose($questionsDataFile);
}
?>
<meta charset="UTF-8">
<?php
if(isset($message)) echo $message."<hr>";
?>
<form action="" method="post">
    Soru: <input type="text" name="question"><br>
    <?php
    for($i="a"; $i<="d"; $i++):
        ?>
        <?=($i)?> <input type="text" name="options[<?=$i?>]">&nbsp;<input type="radio" name="answer" value="<?=$i;?>" <?if($i=="a") echo "checked"; ?>><br>
    <?php
    endfor;
    ?>
    <input type="submit" value="Soru Ekle">
</form>
