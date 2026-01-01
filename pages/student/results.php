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

// Variables pour la navigation
$currentPage = 'resultats';
$pageTitle = 'Resultats';

// Récupérer les données
$teacherId = $_SESSION['user_id'];
$userName = $_SESSION['user_nom'];

?>

<?php include '../partials/header.php'; ?>

<?php include '../partials/nav_student.php'; ?>
    <div class="flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl p-8 max-w-md w-full text-center ">
            
            <div class="mb-6 relative inline-block mt-12">
                <svg class="w-32 h-32 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 mb-2">Excellent travail !</h1>
            <p class="text-gray-500 mb-6">Vous avez complété "Les bases de la POO"</p>

            <div class="bg-indigo-50 rounded-xl p-6 mb-8">
                <span class="block text-sm text-indigo-600 font-semibold uppercase tracking-wider">Votre Score</span>
                <span class="block text-5xl font-extrabold text-indigo-900 mt-2">85<span class="text-2xl text-indigo-400">/100</span></span>
            </div>

            <div class="flex justify-between text-sm text-gray-600 mb-8 px-4">
                <div class="text-center">
                    <span class="block font-bold text-gray-900">10</span>
                    <span>Questions</span>
                </div>
                <div class="text-center">
                    <span class="block font-bold text-green-600">8</span>
                    <span>Correctes</span>
                </div>
                <div class="text-center">
                    <span class="block font-bold text-red-600">2</span>
                    <span>Fausses</span>
                </div>
            </div>

            <div class="space-y-3">
                <a href="dashboard.html" class="block w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 transition">
                    Retour à l'accueil
                </a>
                <a href="history.html" class="block w-full text-indigo-600 font-medium py-3 hover:bg-indigo-50 rounded-lg transition">
                    Voir mon historique
                </a>
            </div>
        </div>
    </div>
<?php include '../partials/footer.php'; ?>