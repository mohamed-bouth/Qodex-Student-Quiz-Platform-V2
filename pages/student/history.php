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
$currentPage = 'history';
$pageTitle = 'Histories';

// Récupérer les données
$teacherId = $_SESSION['user_id'];
$userName = $_SESSION['user_nom'];

?>

<?php include '../partials/header.php'; ?>

<?php include '../partials/nav_student.php'; ?>

    <main class="container mx-auto px-4">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden ">
            <div class="p-6 border-b border-gray-100 mt-16">
                <h2 class="text-xl font-bold text-gray-800">Historique de vos quiz</h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm uppercase tracking-wider">
                            <th class="px-6 py-4 font-semibold">Titre du Quiz</th>
                            <th class="px-6 py-4 font-semibold">Catégorie</th>
                            <th class="px-6 py-4 font-semibold">Date</th>
                            <th class="px-6 py-4 font-semibold text-center">Score</th>
                            <th class="px-6 py-4 font-semibold text-center">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-900">Les bases de la POO</td>
                            <td class="px-6 py-4 text-gray-500">PHP</td>
                            <td class="px-6 py-4 text-gray-500">29 Dec 2025</td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-block px-2 py-1 bg-green-100 text-green-800 rounded-md font-bold">85%</span>
                            </td>
                            <td class="px-6 py-4 text-center text-green-600">
                                <i class="fas fa-check-circle"></i> Terminé
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-900">Architecture MVC</td>
                            <td class="px-6 py-4 text-gray-500">Architecture</td>
                            <td class="px-6 py-4 text-gray-500">28 Dec 2025</td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-block px-2 py-1 bg-red-100 text-red-800 rounded-md font-bold">40%</span>
                            </td>
                            <td class="px-6 py-4 text-center text-gray-600">
                                <i class="fas fa-check-circle"></i> Terminé
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </main>
    <?php include '../partials/footer.php'; ?>