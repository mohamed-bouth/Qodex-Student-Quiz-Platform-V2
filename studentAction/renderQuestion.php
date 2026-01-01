<?php

require_once '../config/database.php';
require_once '../classes/Database.php';
require_once '../classes/Quiz.php';

if(isset($_POST['dashboardSubmit'])){
    $quizId = $_POST['quizId'];
    $quizObg = new Quiz();
    $result = $quizObg->getQuestions($quizId);

    $_SESSION["count"] = 0;
    $_SESSION["quizQuestions"] = $result;
    $_SESSION["quizQuestions"];

    header('Location: ../pages/student/quizRoom.php');
}



