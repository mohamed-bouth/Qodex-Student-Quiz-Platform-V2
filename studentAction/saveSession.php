<?php
session_start();
if(isset($_POST['numQuestion'])) $_SESSION['numQuestion'] = $_POST['numQuestion'];
if(isset($_POST['correctQuestion'])) $_SESSION['correctQuestion'] = $_POST['correctQuestion'];
if(isset($_POST['allAnswers'])) $_SESSION['allAnswers'] = $_POST['allAnswers'];
?>
