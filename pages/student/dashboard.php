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

// Vérifier que l'utilisateur est etudiant
Security::requireStudent();


// Variables pour la navigation
$currentPage = 'dashboard';
$pageTitle = 'Dashboard';

// Récupérer les données
$studentid = $_SESSION['user_id'];
$userName = $_SESSION['user_nom'];

$categoryObj = new Category();
$categories = $categoryObj->getAllForStudent();

$quizObj = new Quiz();
$quizes = $quizObj->getAll();

if(isset($_SESSION['quiz_titre'])){

    unset($_SESSION['quiz_titre']);
}
?>

<?php include '../partials/header.php'; ?>

<?php include '../partials/nav_student.php'; ?>

    <main class="container mx-auto px-4 py-8">
        <div class="mb-8 mt-12">
            <h1 class="text-3xl font-bold text-gray-900">Bonjour, <?=  $userName ?> 👋</h1>
            <p class="text-gray-600">Prêt à tester vos connaissances aujourd'hui ?</p>
        </div>
        <div>
            <div class="flex overflow-x-auto pb-4 gap-4 mb-8">
                <button data-categoryid="0" class="categoryContainer px-6 py-2 bg-indigo-600 text-white rounded-full shadow-sm hover:bg-indigo-700 transition">Tout</button>
                <?php foreach ($categories as $categorie) { ?>
                <button  data-categoryid = "<?= $categorie["id"] ?>" class="categoryContainer px-6 py-2 bg-white text-gray-700 border border-gray-200 rounded-full shadow-sm hover:bg-gray-50 transition"><?= $categorie["nom"] ?></button>
                <?php } ?>
            </div>
        </div>

        <h2 class="text-xl font-bold mb-4 border-l-4 border-indigo-500 pl-3">Quiz Disponibles</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($quizes as $quiz) { ?>
            <div data-categoryId="<?= $quiz["categorie_id"] ?>" class="quizContainer bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition p-6">
                <div class="flex justify-between items-start mb-4">
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded"><?= $quiz["nom"] ?></span>
                </div>
                <h3 class="text-xl font-bold mb-2"><?= $quiz["titre"] ?></h3>
                <p class="text-gray-600 text-sm mb-4"><?= $quiz["description"] ?></p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-sm text-gray-500"><?= $quiz["num_questions"] ?> questions</span>
                    <form action="./quizRoom.php" method="POST">
                        <input name= "teacherId" hidden value="<?=  $quiz["enseignant_id"]?>" type="text" >
                        <input name="quizId" hidden value="<?= $quiz["id"] ?>" type="text">
                        <button name="dashboardSubmit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Commencer <i class="fas fa-arrow-right ml-1"></i></button>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </main>
    <?php include '../partials/footer.php'; ?>
    <script>
        const categorySelector = document.querySelectorAll(".categoryContainer");
        const quizSelector = document.querySelectorAll(".quizContainer");

        categorySelector.forEach(category => {
            category.addEventListener("click" , ()=>{
                // alert(category.dataset.categoryid);
                if(category.dataset.categoryid == 0){
                    quizSelector.forEach(quiz => {
                        quiz.classList.remove("hidden");
                    });
                }else{
                    quizSelector.forEach(quiz => {
                        if(category.dataset.categoryid == quiz.dataset.categoryid){
                            quiz.classList.remove("hidden")
                        }else{
                            quiz.classList.add("hidden")
                        }
                    });
                }
                
            })
        });
    </script>