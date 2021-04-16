'use strict';
const rootEl = document.getElementById('openQuiz');
const wrongText = 'Ҷавоб нодуруст: ';
const rightText = 'Ҷавоб дуруст: ';
const yourAnswer = 'Ҷавоби Шумо: ';

var currentQuestion = 0;
let userAnswers = [];

const obj = window.openQuiz;

const table = document.createElement('TABLE');
table.id = 'myTable';
table.style.display = 'none';
table.setAttribute('border', '1');
table.setAttribute('cellspacing', '0');
table.setAttribute('cellpadding', '0');
rootEl.appendChild(table);
createTableHead();

function remove(id) {
    const result = document.getElementById(id);
    result.remove();
}

createForm(obj[currentQuestion]);

function createForm(data) {
    if (currentQuestion > 0) {
        remove('div' + (currentQuestion - 1));
    }

    const divEl = document.createElement('div');
    divEl.id = 'div' + currentQuestion;
    rootEl.appendChild(divEl);

    const pEl = document.createElement('p');
    pEl.id = 'message' + currentQuestion;
    pEl.textContent = data.text;
    pEl.className = "alert alert-secondary";
    divEl.appendChild(pEl);

    const formEl = document.createElement('form');
    formEl.id = 'test-form' + currentQuestion;
    divEl.appendChild(formEl);

    const inputEl = document.createElement('input');
    inputEl.type = 'text';
    inputEl.id = 'answer' + currentQuestion;
    inputEl.name = 'input-text';
    inputEl.className = "form-control";
    formEl.appendChild(inputEl);

    const checkButtonEl = document.createElement('button');
    checkButtonEl.name = 'checkButton' + currentQuestion;
    checkButtonEl.textContent = 'Check';
    checkButtonEl.className = "btn btn-lg btn-primary btn-block";
    checkButtonEl.style = "margin:10px 0 0 0; width:250px";

    checkButtonEl.onclick = function () {
        const val = document.getElementById('answer' + currentQuestion).value;

        if (val === data.answer) {
        } else {
        }

        userAnswers.push({
            "id": data.id,
            "answer": val
        });

        if (currentQuestion < obj.length - 1) {
            currentQuestion++;
            createForm(obj[currentQuestion]);
        } else {
            remove('div' + (currentQuestion));
            showResult();
        }
    };
    formEl.appendChild(checkButtonEl);
}

function showResult() {
    userAnswers.forEach(userAnswer => {

        let text;
        let rowColor;

        let filter = obj.filter(correctAnswer => correctAnswer.id === userAnswer.id);
        if (userAnswer.answer === filter[0].answer) {
            text = rightText + userAnswer.answer;
            rowColor = "table-success";
        } else {
            text = wrongText + userAnswer.answer;
            rowColor = "table-danger";
        }

        table.style.display = 'block';
        pushTable(filter[0].id, filter[0].text, text, rowColor, filter[0].answer);
    });
}

function createTableHead() {
    var table = document.getElementById("myTable");
    var tableClass = table.className = 'table';
    var header = table.createTHead();
    var row = header.insertRow(0);
    var numberCell = row.insertCell(0);
    var questionCell = row.insertCell(1);
    var answerCell = row.insertCell(2);
    var rightAnswerCell = row.insertCell(3);
    numberCell.className = 'table-active numberCell';
    questionCell.className = 'table-active questionCell';
    answerCell.className = 'table-active answerCell';
    rightAnswerCell.className = 'table-active rightAnswerCell';
    numberCell.innerHTML = "<b>№</b>";
    questionCell.innerHTML = "<b>Савол</b>";
    answerCell.innerHTML = "<b>Ҷавоби Шумо</b>";
    rightAnswerCell.innerHTML = "<b>Ҷавоби дуруст</b>";
}

function pushTable(id, question, text, status, answer) {

    const table = document.getElementById("myTable");
    const index = table.rows.length;
    const row = table.insertRow(index);

    const numberCell = row.insertCell(0);
    const questionCell = row.insertCell(1);
    const answerCell = row.insertCell(2);
    const rightAnswerCell = row.insertCell(3);

    numberCell.innerHTML = id;
    questionCell.innerHTML = question;
    answerCell.innerHTML = text;
    rightAnswerCell.innerHTML = answer;

    numberCell.className = status;
    questionCell.className = status;
    answerCell.className = status;
    rightAnswerCell.className = status;
}












