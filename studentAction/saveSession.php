<?php

require_once '../config/database.php';
require_once '../classes/Database.php';
require_once '../classes/Result.php';

if(isset($_POST['numQuestion'])) $_SESSION['numQuestion'] = $_POST['numQuestion'];
if(isset($_POST['correctQuestion'])) $_SESSION['correctQuestion'] = $_POST['correctQuestion'];
if(isset($_POST['allAnswers'])) $_SESSION['allAnswers'] = $_POST['allAnswers'];
if(isset($_POST['quizId'])) $_SESSION['quizId'] = $_POST['quizId'];
if(isset($_POST['teacherId'])) $_SESSION['teacherId'] = $_POST['teacherId'];


$studentId = $_SESSION['user_id'];


$numQuesion = $_SESSION['numQuestion'] ?? 0;

$correctQuestion = $_SESSION['correctQuestion'] ?? 0;

$score = $correctQuestion/$numQuesion*100;

$quizId = $_SESSION['quizId'] ?? 0;

$teacherId = $_SESSION['teacherId'] ?? 0;



$resultObj = new Result();
$results = $resultObj->save($quizId , $studentId , $teacherId , $score , $numQuesion);