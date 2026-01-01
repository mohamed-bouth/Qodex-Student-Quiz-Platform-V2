let currentIndex = 0;
const questionInput = document.querySelector(".question")
const submitBtn = document.querySelector("#submitBtn")
const quizId = document.querySelector("#quiz_id").value;
const answearInput1 = document.querySelector(".q1");
const answearInput2 = document.querySelector(".q2"); 
const answearInput3 = document.querySelector(".q3"); 
const answearInput4 = document.querySelector(".q4");
const errorContainer = document.querySelector("#errorContainer");

console.log(quizId)

function  affichError() {
    errorContainer.style.marginTop = "50px"
    errorContainer.innerHTML =  `<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                <i class="fas fa-exclamation-circle mr-2"></i>Veuillez sélectionner une réponse
                                </div>`
    setTimeout(() => {
    
        errorContainer.innerHTML = ""
        errorContainer.style.marginTop = "100px"
    
    }, 2000);

}

function chekInput() {
    const radioInput = document.querySelector(".radioInput:checked")
    if(radioInput) {
        return false
    }else{
        affichError();
        return true
    }
}

function resetInput() {
    const radioInput = document.querySelectorAll(".radioInput")
    radioInput.forEach(r => r.checked = false);
}



function loadQuestion() {
    fetch(`../../studentAction/getQuestion.php?quiz_id=${quizId}&index=${currentIndex}`)
        .then(res => res.json())
        .then(data => {

            if (!data || Object.keys(data).length === 0) {
                window.location.replace("results.php");
                return;
            }

            console.log(data);
            questionInput.textContent = data.question

            answearInput1.textContent = data.option1
            answearInput2.textContent = data.option2
            answearInput3.textContent = data.option3
            answearInput4.textContent = data.option4


        })
        .catch(err => {
            console.error("error in fetching", err);
        });
}

submitBtn.addEventListener("click" , (e)=> {
    e.preventDefault();

    result = false;
    result = chekInput();
    if(result){
        return;
    }
    resetInput();


    currentIndex++;
    loadQuestion();
})


window.addEventListener("DOMContentLoaded", () => {
    loadQuestion();
});
