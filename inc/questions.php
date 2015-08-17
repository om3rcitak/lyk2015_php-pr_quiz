<?php

function getAllQuestions($path = ""){
    $questions = array();
    $doWeHaveData = false;
    // mysql sunucusuna bağlan
    $connection = mysql_connect("localhost", "root", "13066529015");
    if( ! $connection)
        die("MySQL sunucuna bağlanamadı");

// bağlantı üstünden utf8 standartında konuşacağımızı söylüyoruz
    mysql_set_charset("UTF8", $connection);

// çalışacağımız veritabanını seç
    if( ! mysql_select_db("quiz", $connection))
        die("Veritabanı seçilemedi");

// belirli bir tablodaki tüm verileri çek
    $questionsRS = mysql_query("SELECT * FROM  questions");


// diziye çevir, kullan
    while($question = mysql_fetch_array($questionsRS, MYSQL_ASSOC)){
        $questions[] = array(
            'question' => $question['question'],
            'options' => array(
                'a' => $question['option_a'],
                'b' => $question['option_b'],
                'c' => $question['option_c'],
                'd' => $question['option_d'],
            ),
            'answer' => $question['answer']
        );
    }

    if(count($questions)>0) $doWeHaveData = true;

// diziyi istenilen çıktı haline getir

    if(! $doWeHaveData) {
        $questionsDataFilePath = $path . "data/questions.txt";


        if (file_exists($questionsDataFilePath)) {
            $questionsDataFile = fopen($questionsDataFilePath, "r");
            $encodedQuestions = fread($questionsDataFile, filesize($questionsDataFilePath));
            fclose($questionsDataFile);

            if ($encodedQuestions) {
                //dizi yapıp ver
                $questions = json_decode($encodedQuestions, true);
                if(count($questions)>0) $doWeHaveData = true;
            }
        }
    }

    // yoksa standart diziyi gönder
    if(!$doWeHaveData) {
        $questions = array(
            array(
                'question' => "Cumhuriyet hangi yıl ilan edildi?",
                'options' => array(
                    'a' => '1919',
                    'b' => '1920',
                    'c' => '1922',
                    'd' => '1923',
                ),
                'answer' => 'd'
            ),
        );
        $doWeHaveData = true;
    }

    return $questions;
}
