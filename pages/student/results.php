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


$numQuesion = $_SESSION['numQuestion'] ?? 0;

$correctQuestion = $_SESSION['correctQuestion'] ?? 0;

$resultHistory = $_SESSION['allAnswers'] ?? 0;
$allAnswers = json_decode($resultHistory, true);
// print_r($allAnswers);


?>

<?php include '../partials/header.php'; ?>

<?php include '../partials/nav_student.php'; ?>
    <div class="flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl p-8 max-w-md w-full text-center ">
            
            <?php if ($correctQuestion/$numQuesion*100 >= 50) { ?>

            <div class="mb-6 relative inline-block mt-12">
                <svg class="w-32 h-32 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 mb-2">Excellent travail !</h1>
            <p class="text-gray-500 mb-6">Vous avez complété "<?= $_SESSION['quiz_titre'] ?? '' ?>"</p>

            <?php } else { ?>

            <div class="mb-6 relative inline-block mt-12">
                <svg class="w-32 h-32 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" ></path>
                </svg>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 mb-2">La prochaine fois sera la bonne !</h1>
            <p class="text-gray-500 mb-6">Vous avez complété "<?= $_SESSION['quiz_titre'] ?? '' ?>"</p>
            
            <?php } ?>

            <div class="bg-indigo-50 rounded-xl p-6 mb-8">
                <span class="block text-sm text-indigo-600 font-semibold uppercase tracking-wider">Votre Score</span>
                <span class="block text-5xl font-extrabold text-indigo-900 mt-2"><?= $correctQuestion/$numQuesion*100 ?><span class="text-2xl text-indigo-400">/100</span></span>
            </div>

            <div class="flex justify-between text-sm text-gray-600 mb-8 px-4">
                <div class="text-center">
                    <span class="block font-bold text-gray-900"><?= $numQuesion ?></span>
                    <span>Questions</span>
                </div>
                <div class="text-center">
                    <span class="block font-bold text-green-600"><?= $correctQuestion ?></span>
                    <span>Correctes</span>
                </div>
                <div class="text-center">
                    <span class="block font-bold text-red-600"><?= $numQuesion-$correctQuestion ?></span>
                    <span>Fausses</span>
                </div>
            </div>

            <div class="space-y-3">
                <a href="./dashboard.php" class="block w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 transition">
                    Retour à l'accueil
                </a>
                <a href="./history.php" class="block w-full text-indigo-600 font-medium py-3 hover:bg-indigo-50 rounded-lg transition">
                    Voir mon historique
                </a>
            </div>

        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
            Résultats du Quiz
        </h1>

        <div class="space-y-6">
            <?php foreach($allAnswers as $index => $q): ?>
                
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <span class="text-indigo-600 mr-2">#<?= ($index+1) ?></span> 
                            <?= $q['question'] ?>
                        </h3>
                    </div>

                    <div class="p-6 space-y-3">
                        <?php for($i=1; $i<=4; $i++): ?>
                            <?php
                            $isCorrect = ($i == $q['correct_option']);
                            $userSelected = ($q['user_answer'] == $i);
                            

                            $divClass = "flex items-center justify-between p-4 rounded-lg border-2 transition-all duration-200";
                            $textClass = "text-gray-600";
                            $icon = "";

                            if($isCorrect) {

                                $divClass = "flex items-center justify-between p-4 rounded-lg border-green-500 bg-green-50 shadow-sm";
                                $textClass = "text-green-800 font-bold";
                                $icon = '<span class="flex items-center text-green-600 bg-white rounded-full p-1"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>';
                            
                            } elseif($userSelected && !$isCorrect) {

                                $divClass = "flex items-center justify-between p-4 rounded-lg border-red-500 bg-red-50 shadow-sm";
                                $textClass = "text-red-800 font-medium";
                                $icon = '<span class="flex items-center text-red-600 bg-white rounded-full p-1"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></span>';
                            
                            } else {

                                $divClass = "flex items-center justify-between p-4 rounded-lg border-gray-200 bg-white hover:bg-gray-50 opacity-70";
                            }
                            ?>
                            
                            <div class="<?= $divClass ?>">
                                <span class="<?= $textClass ?>">
                                    <?= $q['option'.$i] ?>
                                </span>
                                <?= $icon ?>
                            </div>

                        <?php endfor; ?>
                    </div>
                </div>
                <?php endforeach; ?>

        </div>
    </div>
<?php include '../partials/footer.php'; ?>