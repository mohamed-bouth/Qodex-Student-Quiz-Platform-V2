<?php

require_once '../config/database.php';
require_once '../classes/Database.php';
require_once '../classes/Quiz.php';
require_once '../classes/Question.php';

header('Content-Type: application/json');


$quiz_id = isset($_GET['quiz_id']) ? (int)$_GET['quiz_id'] : 1;
$index = isset($_GET['index']) ? (int)$_GET['index'] : 0;


$questionObj = new Question();
$questions = $questionObj->getAllByQuiz($quiz_id);


if (!$questions || !is_array($questions)) {
    echo json_encode([]);
    exit;
}


if (!isset($questions[$index])) {
    echo json_encode([]);
    exit;
}

$question = $questions[$index];


echo json_encode($question);







