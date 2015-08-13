<?php
// soru formu göstereceğim
// bunu bir sayfaya post edeceğim
// gelen veri geçerliyse kaydedeceğim
if($_POST){
    require("../inc/functions.php");
    autoLoader();
    $questions = getAllQuestions();
    // veriyi yazacağımız dosya yolu
    $questionsDataFilePath = "../data/questions.txt";
    //$message = "Soru eklenemedi";

    // eski sorulara yenisini ekliyoruz
    if((!empty($_POST["question"]))or(!empty($_POST["options"]["a"]))or(!empty($_POST["options"]["b"]))or(!empty($_POST["options"]["c"]))or(!empty($_POST["options"]["d"]))){
              array_push($questions, $_POST);
        $message = "Soru eklendi.";
          }else{
        $message = "Soru eklenemedi!!";

    }
    // yeni soru eklenmiş haliyle sorular değişkeni
    $encodedQuestions = json_encode($questions);

    // dosya bulunmuyorsa oluşturuyoruz
    if( ! file_exists($questionsDataFilePath))
        touch($questionsDataFilePath);

    // dosyayı açıp veriyi yazıp kapatıyoruz
    $questionsDataFile = fopen($questionsDataFilePath, "w");
    if(fwrite($questionsDataFile, $encodedQuestions))

    fclose($questionsDataFile);
}
?>
<?php include("../inc/header.php"); ?>
<?php
if(isset($message)) echo $message."<hr>";

?>
<form action="" method="post" class="questions"><br>
    SORU : <input type="text" name="question"><br>
    <?php

    for($i="a"; $i<="d"; $i++):
        ?>
        <?=($i)?> <input type="text" name="options[<?=$i?>]">&nbsp;<input type="radio" name="answer" value="<?=$i;?>" <?if($i=="a") echo "checked"; ?><br>
    <?php
    endfor;
    ?>
    <input type="submit" name="ekle" value="Soru Ekle">
</form>
<?php include("../inc/footer.php"); ?>
