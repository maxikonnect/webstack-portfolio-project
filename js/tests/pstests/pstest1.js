const quiz = {
    JS: [
        {
            "id": 1,
            "question": "What is 2 * 2",
            "options": { "a": "4", "b": "6", "c": "8", "d": "10" },
            "answer": "4",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 2,
            "question": "What is 4 * 2",
            "options": { "a": "4", "b": "6", "c": "7", "d": "8" },
            "answer": "8",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 3,
            "question": "What is 10 * 2",
            "options": { "a": "5", "b": "10", "c": "20", "d": "30" },
            "answer": "20",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 4,
            "question": "What is 5 + 5",
            "options": { "a": "5", "b": "10", "c": "15", "d": "20" },
            "answer": "10",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 5,
            "question": "What is 10 - 5",
            "options": { "a": "2", "b": "3", "c": "4", "d": "5" },
            "answer": "5",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 6,
            "question": "What is 3 * 3",
            "options": { "a": "6", "b": "9", "c": "12", "d": "15" },
            "answer": "9",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 7,
            "question": "What is 15 / 3",
            "options": { "a": "3", "b": "4", "c": "5", "d": "6" },
            "answer": "5",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 8,
            "question": "What is 7 + 8",
            "options": { "a": "14", "b": "15", "c": "16", "d": "17" },
            "answer": "15",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 9,
            "question": "What is 20 - 4",
            "options": { "a": "15", "b": "16", "c": "17", "d": "18" },
            "answer": "16",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 10,
            "question": "What is 6 * 6",
            "options": { "a": "30", "b": "32", "c": "36", "d": "40" },
            "answer": "36",
            "score": 0,
            "selectedOption": null
        }
    ]
};


// TOTAL QUIZ QUESTIONS
const totalQuestionsContainer = document.querySelector(".totalQuestionsContainer");
const entireQuestions = totalQuestionsContainer.querySelector(".totalQuestions");
entireQuestions.textContent = quiz.JS.length;


//HTML SELECTORS
const quizContainer = document.querySelector(".quizContainer");
const questionContainer = document.querySelector(".questionContainer");
const before = document.querySelector(".before");
const next = document.querySelector(".next");
const submitNotice = document.querySelector(".submitNotice");
const result = document.querySelector(".result");

//QUESTION PAGES
const totalQuestions = quiz.JS.length;
const questionsPerPage = 5;
const totalPages = Math.ceil(totalQuestions / questionsPerPage);
let currentPage = 0;

 

 // Render questions for the current page
 function setQuestions() {
     questionContainer.innerHTML = '';
     const startIndex = currentPage * questionsPerPage;
     const endIndex = Math.min(startIndex + questionsPerPage, totalQuestions);

     for (let i = startIndex; i < endIndex; i++) {
         const question = quiz.JS[i];
         const questionHTML = `
             <div>
                 <p><span>${i + 1}.</span> ${question.question}</p>
                 ${Object.entries(question.options).map(([key, value]) => `
                     <div>
                         <input type="radio" id="option${key}-${i}" value="${value}" name="option${i}" 
                             ${question.selectedOption === value ? 'checked' : ''}>
                         <label for="option${key}-${i}">${value}</label>
                     </div>
                 `).join('')}
             </div>
         `;
         questionContainer.innerHTML += questionHTML;
     }

     // Add event listeners for radio buttons
     quiz.JS.slice(startIndex, endIndex).forEach((question, index) => {
         const questionIndex = startIndex + index;
         document.querySelectorAll(`input[name="option${questionIndex}"]`).forEach((radio) => {
             radio.addEventListener('change', function () {
                 quiz.JS[questionIndex].selectedOption = this.value;
                 quiz.JS[questionIndex].score = this.value === question.answer ? 1 : 0;

                 // Save answers to localStorage
                 savedAnswers[questionIndex] = this.value;
                 localStorage.setItem('userAnswers', JSON.stringify(savedAnswers));
             });
         });
     });

     updateNavigationButtons();
     addSubmitButton();
 }

 // Update navigation button states
 function updateNavigationButtons() {
     before.disabled = currentPage === 0;
     next.disabled = currentPage === totalPages - 1;
 }

 // Add navigation functionality
 before.addEventListener('click', () => {
     if (currentPage > 0) {
         currentPage--;
         setQuestions();
     }
 });

 next.addEventListener('click', () => {
     if (currentPage < totalPages - 1) {
         currentPage++;
         setQuestions();
     }
 });

 // Add the "Submit Test" button
 function addSubmitButton() {
     result.innerHTML = '';
     submitNotice.innerHTML = '';

     let submitText = document.createElement('p');
     submitText.textContent = 'Finished With Test. View Results';
     submitNotice.appendChild(submitText);

     let submit = document.createElement('button');
     submit.textContent = 'View Results';
     submit.addEventListener('click', validateAndShowScore);
     result.appendChild(submit);
 }

 // Validate and show score
 function validateAndShowScore() {
     const unansweredQuestions = [];
     quiz.JS.forEach((q, index) => {
         if (q.selectedOption === null) {
             unansweredQuestions.push(`Question ${index + 1}`);
         }
     });

     if (unansweredQuestions.length > 0) {
         alert(`Please answer the following questions before submitting:\n${unansweredQuestions.join('\n')}`);
         return;
     }

     showScore();
 }

 // Show the score and store results in localStorage
 function showScore() {
     const totalScore = quiz.JS.reduce((total, question) => total + question.score, 0);
     const correctAnswers = quiz.JS.filter(q => q.score === 1).length;
     const wrongAnswers = quiz.JS.filter(q => q.score === 0).length;

     const results = {
         totalScore: totalScore,
         correctAnswers: correctAnswers,
         wrongAnswers: wrongAnswers,
         details: quiz.JS.map(q => ({
             question: q.question,
             selectedOption: q.selectedOption,
             correctAnswer: q.answer,
             isCorrect: q.score === 1
         }))
     };

     localStorage.setItem('quizResults', JSON.stringify(results));
     window.location.href = './result1.html'; // Navigate to the results page
 }

 // Initialize the quiz
 setQuestions();