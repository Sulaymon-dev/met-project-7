if(window.quiz) {
(function () {
    var k = 0;

    function buildQuiz() {
        const output = [];
        myQuestions.forEach(
            (currentQuestion, questionNumber) => {
                const answers = [];
                const shufleAnswer = [];
                for (answer in currentQuestion.answers) {
                    shufleAnswer.push(currentQuestion.answers[answer]);
                }

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
                    answers.push(`
                        <label>
                          <input type="radio"
                          class="question${questionNumber}"
                          name="question${questionNumber}"
                          value="${shufleAnswers[letter].id}">
                          ${variants[letter]} : ${shufleAnswers[letter].text}
                        </label>
                        `);
                }
                output.push(
                    `<div class="slide">
                        <div class="question"> ${currentQuestion.question} </div>
                        <div class="answers" >  ${answers.join('')} </div>
                      </div>`
                );
            }
        );
        quizContainer.innerHTML = output.join('');
    }

    function showResults() {
        const answerContainers = quizContainer.querySelectorAll('.answers');
        let numCorrect = 0;
        let selector = [];
        myQuestions.forEach((currentQuestion, questionNumber) => {
            selector.push($(`input[name=question${questionNumber}]:checked`).val());
            if (selector[questionNumber] === currentQuestion.correctAnswer) {
                numCorrect++;
                answerContainers[questionNumber].style.background = 'lightgreen';
            } else {
                answerContainers[questionNumber].style.background = 'red';
            }
        });
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

    const quizContainer = document.getElementById('quiz');
    const resultsContainer = document.getElementById('results');
    const submitButton = document.getElementById('submit');

    const myQuestions = window.quiz;
    // console.log(myQuestions)
    buildQuiz();

    const previousButton = document.getElementById("previous");
    const nextButton = document.getElementById("next");
    const slides = document.querySelectorAll(".slide");
    let currentSlide = 0;

    showSlide(currentSlide);

    submitButton.addEventListener('click', showResults);
    previousButton.addEventListener("click", showPreviousSlide);
    nextButton.addEventListener("click", showNextSlide);
})();
}
