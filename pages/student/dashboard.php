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


// Variables pour la navigation
$currentPage = 'dashboard';
$pageTitle = 'Dashboard';

// Récupérer les données
$teacherId = $_SESSION['user_id'];
$userName = $_SESSION['user_nom'];


?>

<?php include '../partials/header.php'; ?>

<?php include '../partials/nav_student.php'; ?>

    <main class="container mx-auto px-4 py-8">
        <div class="mb-8 mt-12">
            <h1 class="text-3xl font-bold text-gray-900">Bonjour, Ahmed 👋</h1>
            <p class="text-gray-600">Prêt à tester vos connaissances aujourd'hui ?</p>
        </div>

        <div class="flex overflow-x-auto pb-4 gap-4 mb-8">
            <button class="px-6 py-2 bg-indigo-600 text-white rounded-full shadow-sm hover:bg-indigo-700 transition">Tout</button>
            <button class="px-6 py-2 bg-white text-gray-700 border border-gray-200 rounded-full shadow-sm hover:bg-gray-50 transition">Développement Web</button>
            <button class="px-6 py-2 bg-white text-gray-700 border border-gray-200 rounded-full shadow-sm hover:bg-gray-50 transition">Base de données</button>
            <button class="px-6 py-2 bg-white text-gray-700 border border-gray-200 rounded-full shadow-sm hover:bg-gray-50 transition">Réseau</button>
        </div>

        <h2 class="text-xl font-bold mb-4 border-l-4 border-indigo-500 pl-3">Quiz Disponibles</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition p-6">
                <div class="flex justify-between items-start mb-4">
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">PHP / POO</span>
                    <span class="text-gray-400 text-sm"><i class="far fa-clock"></i> 15 min</span>
                </div>
                <h3 class="text-xl font-bold mb-2">Les bases de la POO</h3>
                <p class="text-gray-600 text-sm mb-4">Testez vos connaissances sur les classes, objets et l'héritage en PHP.</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-sm text-gray-500">10 Questions</span>
                    <a href="quiz-room.html" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Commencer <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition p-6">
                <div class="flex justify-between items-start mb-4">
                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">SQL</span>
                    <span class="text-gray-400 text-sm"><i class="far fa-clock"></i> 10 min</span>
                </div>
                <h3 class="text-xl font-bold mb-2">Requêtes complexes</h3>
                <p class="text-gray-600 text-sm mb-4">Maîtrisez-vous les JOINS et les sous-requêtes ?</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-sm text-gray-500">8 Questions</span>
                    <a href="quiz-room.html" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Commencer <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>

            <div class="bg-gray-50 rounded-xl border border-gray-200 p-6 opacity-75">
                <div class="flex justify-between items-start mb-4">
                    <span class="bg-gray-200 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded">HTML/CSS</span>
                    <span class="text-green-600 text-sm font-bold"><i class="fas fa-check-circle"></i> Fait</span>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-500">Flexbox Mastery</h3>
                <p class="text-gray-500 text-sm mb-4">Quiz déjà complété. Score : 8/10</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-sm text-gray-400">10 Questions</span>
                    <button disabled class="bg-gray-300 text-gray-500 px-4 py-2 rounded-lg cursor-not-allowed">Déjà passé</button>
                </div>
            </div>

        </div>
    </main>
</body>
</html>