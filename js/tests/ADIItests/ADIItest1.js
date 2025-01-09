const quiz = {
    JS: [
        {
            "id": 1,
            "question": "Education stakeholders are considered more important to a school when they ……",
            "options": { "a": "Use of their power in support of the school", "b": "Raise legitimate issues about teaching", "c": "Express themselves eloquently", "d": "Emphasize the urgency of their issues" },
            "answer": "Use of their power in support of the school",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 2,
            "question": "Which of the following are the main priorities of the Ghana Education Reform Agenda?",
            "options": { "a": "Improve learning outcomes", "b": "Enhanced accountability", "c": "Equity", "d": "All of the above" },
            "answer": "All of the above",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 3,
            "question": "What is the purpose of conducting research?",
            "options": { "a": "To provide solutions to problems", "b": "To identify a problem needing solution", "c": "To add to or contribute to knowledge", "d": "All of the above" },
            "answer": "All of the above",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 4,
            "question": "In which year was the Pre-Tertiary Education Act (1049) enacted?",
            "options": { "a": "2017", "b": "2018", "c": "2019", "d": "2020" },
            "answer": "2020",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 5,
            "question": "Which of the following key qualities are required of a public officer?",
            "options": { "a": "Leadership Skills", "b": "Communication Skills", "c": "Patience and resilience", "d": "All of the above" },
            "answer": "All of the above",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 6,
            "question": "The degree to which a person identifies with his or her job, actively participates in it, and considers their performance important to self-worth is referred to as job…",
            "options": { "a": "Stability", "b": "Satisfaction", "c": "Involvement", "d": "Commitment" },
            "answer": "Involvement",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 7,
            "question": "Which of the following best describes Ama’s action after being yelled at by her boss?",
            "options": { "a": "An emotion", "b": "An effect", "c": "A thought", "d": "Mood" },
            "answer": "An emotion",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 8,
            "question": "Which of the following best describes the behavior of Ama’s boss?",
            "options": { "a": "Rude", "b": "Impolite", "c": "Disrespectful", "d": "Authoritarian" },
            "answer": "Impolite",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 9,
            "question": "When decision making is delegated as far down the chain of command as possible in an education system, the system is said to be…",
            "options": { "a": "Flexible", "b": "Decentralized", "c": "Creative", "d": "Centralized" },
            "answer": "Decentralized",
            "score": 0,
            "selectedOption": null
        },
        {
            "id": 10,
            "question": "Which of the following is not a characteristic of a well-constructed goal for educational organizations?",
            "options": { "a": "They are the results of a group decision process", "b": "They are precise and measurable", "c": "They are challenging but realistic", "d": "They address critical issues" },
            "answer": "They are the results of a group decision process",
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
            <div class="question-wrapper">
                <p class="question-text">
                    <span class="question-number">${i + 1}.</span> ${question.question}
                </p>
                <div class="options-container">
                    ${Object.entries(question.options)
                        .map(
                            ([key, value]) => `
                        <div class="option">
                            <input 
                                type="radio" 
                                id="option${key}-${i}" 
                                value="${value}" 
                                name="option${i}" 
                                class="option-input" 
                                ${question.selectedOption === value ? 'checked' : ''}
                            >
                            <label for="option${key}-${i}" class="option-label">${value}</label>
                        </div>
                    `
                        )
                        .join('')}
                </div>
            </div>
        `;
        questionContainer.innerHTML += questionHTML;
    }

    // Add event listeners for the options
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