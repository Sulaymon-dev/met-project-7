(function () {
    var k = 0;

    // Functions
    function buildQuiz() {
        // variable to store the HTML output
        const output = [];

        // for each question...
        myQuestions.forEach(
            (currentQuestion, questionNumber) => {

                // console.log(questionNumber);

                // variable to store the list of possible answers
                const answers = [];
                const shufleAnswer = [];
                for (answer in currentQuestion.answers) {
                    //     console.log(currentQuestion.answers[answer]);
                    shufleAnswer.push(currentQuestion.answers[answer]);

                }

                // alert (shufleAnswer);

                function shuffle(a) {
                    var j, x, i;
                    for (i = a.length - 1; i > 0; i--) {
                        j = Math.floor(Math.random() * (i + 1));
                        x = a[i];
                        a[i] = a[j];
                        a[j] = x;
                    }
                    return a;
                }

                let shufleAnswers;
                shufleAnswers = shuffle(shufleAnswer);

                let variants = ['А', 'Б', 'В', 'Г'];

                for (letter in shufleAnswers) {
                    k++;
                    // ...add an HTML radio button
                    answers.push(
//                         `
// <input type="radio" id="question0" name="question0" value="apple" checked>
//     <label for="question0">Apple</label>
//
//
// `
                            `
<label>
              <input type="radio"
              name="question${questionNumber}"
              value="${letter}">
              ${variants[letter]} : ${shufleAnswers[letter].text}
            </label>
`
// <input type="radio" id="question${k + letter}" name="question" value="${shufleAnswers[letter].id}"  >
//     <label onclick="${document.getElementById(('question' + k + letter)).checked = true}" for="question${k + letter}"> ${variants[letter]} : ${shufleAnswers[letter].text}</label>

                    );
                }

                // add this question and its answers to the output
                output.push(
                    `<div class="slide">
            <div class="question"> ${currentQuestion.question} </div>
            <div class="answers" >  ${answers.join("")} </div>
          </div>`
                );
            }
        );

        // finally combine our output list into one string of HTML and put it on the page
        quizContainer.innerHTML = output.join('');
    }


    function showResults() {

        // gather answer containers from our quiz
        const answerContainers = quizContainer.querySelectorAll('.answers');

        // keep track of user's answers
        let numCorrect = 0;

        // for each question...
        myQuestions.forEach((currentQuestion, questionNumber) => {
            // find selected answer
            const answerContainer = answerContainers[questionNumber];
            const selector = `input[name=question${questionNumber}]:checked`;
            const userAnswer = (answerContainer.querySelector(selector) || {}).value;

            // alert(userAnswer);

            // if answer is correct
            if (userAnswer === currentQuestion.correctAnswer) {
                // add to the number of correct answers
                numCorrect++;

                // color the answers green
                answerContainers[questionNumber].style.background = 'lightgreen';
            }
            // if answer is wrong or blank
            else {
                // color the answers red
                answerContainers[questionNumber].style.background = 'red';
            }
        });

        // show number of correct answers out of total
        resultsContainer.innerHTML = `Ҷавоби дуруст ${numCorrect} аз ${myQuestions.length}`;
    }

    function showSlide(n) {
        slides[currentSlide].classList.remove('active-slide');
        slides[n].classList.add('active-slide');
        currentSlide = n;
        if (currentSlide === 0) {
            previousButton.style.display = 'none';
        } else {
            previousButton.style.display = 'inline-block';
        }
        if (currentSlide === slides.length - 1) {
            nextButton.style.display = 'none';
            submitButton.style.display = 'inline-block';
        } else {
            nextButton.style.display = 'inline-block';
            submitButton.style.display = 'none';
        }
    }


    function showNextSlide() {
        showSlide(currentSlide + 1);
    }

    function showPreviousSlide() {
        showSlide(currentSlide - 1);
    }

    // Variables
    const quizContainer = document.getElementById('quiz');
    const resultsContainer = document.getElementById('results');
    const submitButton = document.getElementById('submit');

    const myQuestions = window.quiz;
    console.log(myQuestions)

    // Kick things off
    buildQuiz();

    // Pagination
    const previousButton = document.getElementById("previous");
    const nextButton = document.getElementById("next");
    const slides = document.querySelectorAll(".slide");
    let currentSlide = 0;

    // Show the first slide
    showSlide(currentSlide);

    // Event listeners
    submitButton.addEventListener('click', showResults);
    previousButton.addEventListener("click", showPreviousSlide);
    nextButton.addEventListener("click", showNextSlide);
})();
