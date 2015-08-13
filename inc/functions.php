<?php

// sistem içinde ihtiyaç duyacağımız fonksiyonalrı tanımlayacağımız alan

// her şeyin başlangıcı, otomatik yükleyici
function autoLoader(){
    session_start();
    require('questions.php');
}

// quiz başlamış mı, verilen cevap sayısından kontrol et
function isQuizStarted(){
    return isset($_SESSION['answeredQuestionCount']);
}

// quiz'i başlat
function startQuiz($questionCount){
    $_SESSION['totalQuestionCount'] = $questionCount;
    $_SESSION['answeredQuestionCount'] = 0;
    $_SESSION['correctAnswerCount'] = 0;
    $_SESSION['startTime'] = time();
}

// yönlendirme kısayolu
function redirectTo($page){
    return header("Location:" . $page . ".php");
}