<?php
/**
 * Page: Gestion des Catégories
 * Permet de créer, modifier et supprimer des catégories
 */

require_once '../../config/database.php';
require_once '../../classes/Database.php';
require_once '../../classes/Security.php';
require_once '../../classes/Category.php';

// Vérifier que l'utilisateur est enseignant
Security::requireStudent();

// Récupérer les données
$teacherId = $_SESSION['user_id'];
$userName = $_SESSION['user_nom'];

$_SESSION["count"];
$_SESSION["quizQuestions"];
print_r($_SESSION["quizQuestions"][$_SESSION["count"]]);
$question = $_SESSION["quizQuestions"][$_SESSION["count"]];

?>

<?php include '../partials/header.php'; ?>

<?php include '../partials/nav_student.php'; ?>
    <main class="container mx-auto px-4 py-8 max-w-3xl ">
        
        <form action="" method="POST" class="mt-16">
            <input type="hidden" name="quiz_id" value="15">

            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <div class="flex items-center gap-3 mb-4">
                    <span class="bg-indigo-100 text-indigo-800 font-bold px-3 py-1 rounded-full text-sm">Q1</span>
                    <h3 class="text-lg font-semibold text-gray-900"><?= $question  ?></h3>
                </div>
                
                <div class="space-y-3">
                    <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="q1" value="a" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                        <span class="ml-3 text-gray-700">Programmation Orientée Objet</span>
                    </label>
                    <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="q1" value="b" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                        <span class="ml-3 text-gray-700">Protocole Ouvert d'Organisation</span>
                    </label>
                    <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="q1" value="c" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                        <span class="ml-3 text-gray-700">Programmation Ordinale Organisée</span>
                    </label>
                    <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="q1" value="d" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                        <span class="ml-3 text-gray-700">Aucune de ces réponses</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-indigo-700 shadow-lg transform hover:-translate-y-0.5 transition duration-200">
                    Soumettre mes réponses
                </button>
            </div>
        </form>

    </main>
    <?php include '../partials/footer.php'; ?>