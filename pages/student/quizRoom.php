<?php
/**
 * Page: Gestion des Catégories
 * Permet de créer, modifier et supprimer des catégories
 */

require_once '../../config/database.php';
require_once '../../classes/Database.php';
require_once '../../classes/Security.php';
require_once '../../classes/Category.php';
require_once '../../classes/Quiz.php';

// Vérifier que l'utilisateur est enseignant
Security::requireStudent();

// Récupérer les données
$teacherId = $_SESSION['user_id'];
$userName = $_SESSION['user_nom'];

if(isset($_POST['dashboardSubmit'])){
    $quizId = $_POST['quizId'];
    $teacherId = $_POST['teacherId'];
}

$quizObj = new Quiz;
$result = $quizObj->getById($quizId);
$_SESSION['quiz_titre'] = $result['titre']


?>

<?php include '../partials/header.php'; ?>

<?php include '../partials/nav_student.php'; ?>
    <main class="container mx-auto px-4 py-8 max-w-3xl">

        <div style="margin-top: 100px; border: 1px solid rgb(249 250 251 / var(--tw-bg-opacity, 1))" class="" id="errorContainer">

        </div>
        
        <form action="" method="POST" class="mt-8">
            <input type="hidden" id="quiz_id" name="quiz_id" value="<?= $quizId ?>">
            <input type="hidden" id="teacher_id" name="teacher_id" value="<?= $teacherId ?>">

            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <div class="flex items-center gap-3 mb-4">
                    <span class="bg-indigo-100 text-indigo-800 font-bold px-3 py-1 rounded-full text-sm">Q</span>
                    <h3 class="text-lg font-semibold text-gray-900 question"></h3>
                </div>
                
                <div class="space-y-3">
                    <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="q1" value="1" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 radioInput">
                        <span class="ml-3 text-gray-700 q1"></span>
                    </label>
                    <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="q1" value="2" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 radioInput">
                        <span class="ml-3 text-gray-700 q2"></span>
                    </label>
                    <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="q1" value="3" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 radioInput">
                        <span class="ml-3 text-gray-700 q3"></span>
                    </label>
                    <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="q1" value="4" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 radioInput">
                        <span class="ml-3 text-gray-700 q4"></span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button id="submitBtn" type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-indigo-700 shadow-lg transform hover:-translate-y-0.5 transition duration-200">
                    Soumettre mes réponses
                </button>
            </div>
        </form>

    </main>
    <?php include '../partials/footer.php'; ?>
    <script src="../../asset/js/quizRoom.js"></script>