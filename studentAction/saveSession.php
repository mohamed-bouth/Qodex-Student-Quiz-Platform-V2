<?php
session_start();
if(isset($_POST['numQuestion'])) $_SESSION['numQuestion'] = $_POST['numQuestion'];
if(isset($_POST['correctQuestion'])) $_SESSION['correctQuestion'] = $_POST['correctQuestion'];
if(isset($_POST['allAnswers'])) $_SESSION['allAnswers'] = $_POST['allAnswers'];
if(isset($_POST['quizId'])) $_SESSION['quizId'] = $_POST['quizId'];


require_once '../config/database.php';
require_once '../classes/Database.php';
require_once '../classes/Result.php';

$studentId = $_SESSION['user_id'];


$numQuesion = $_SESSION['numQuestion'] ?? 0;

$correctQuestion = $_SESSION['correctQuestion'] ?? 0;
$score = $correctQuestion/$numQuesion*100;

$quizId = $_SESSION['quizId'] ?? 0;

$resultObj = new Result();
$resultObj->save($quizId , $studentId , $score , $numQuesion);