//Execute a JavaScript immediately after a page has been loaded
window.onload = function () {

    if(window.crosswordData) {
        var iterator = 0;
        //Data for terms and definitions. This can be stored in a separate .js file, in a JSON file or here in the main file
        var data = window.crosswordData;
        const countData = data.length;

        var selectedTerm = null, //to make sure none is selected onload
            selectedDef = null,
            termsContainer = document.querySelector("#terms"), //list of terms
            defsContainer = document.querySelector("#defs"); //list of definitions

        const resultsContainer = document.getElementById('results_matching');
        const nextContainer = document.getElementById('next_matching');
        const resetContainer = document.getElementById('reset_matching');
        const questionContainer = document.querySelector("#question_matching");


        //This function takes two arguments, that is one term and one def to compare if they match. It returns True or False after compairing values of the "pairs" object property.
        var score = 0;

        function isMatch(termIndex, defIndex) {
            return data[iterator].pairs[termIndex] == defIndex;
        }

        //This function adds HTML elements and content to the specified container (UL).
        function createListHTML(list, container) {
            container.innerHTML = ""; //first, clean up any existing LI elements
            for (var i = 0; i < 6; i++) {

                container.innerHTML = container.innerHTML + "<li class=\"up\" data-index='" + list[i]["id"] + "'>" + "<span>" + list[i]["text"] + "</span>" + "</li>";


                //OR shorter version: container.innerHTML += "<li class="upper" data-index='" + list[i][""id""] + "'>" + list[i]["text"] + "</li>";
            }
        }

        questionContainer.innerHTML = data[iterator].question
        createListHTML(data[iterator].terms, termsContainer);
        createListHTML(data[iterator].definitions, defsContainer);

        //listen for a "click" event on a list of Terms and store the clicked object in the target object
        termsContainer.addEventListener("click", function (e) {
            var target = e.target.parentNode;
            if ((target.className === "up score") || (target.className === "up descore"))
                return;
            var termIndex = Number(target.getAttribute("data-index"));
            //warunek na to, że tylko jedno LI może być zaznaczone
            if (selectedTerm !== null && selectedTerm !== termIndex) {
                termsContainer.querySelector("li[data-index='" + selectedTerm + "']").removeAttribute("data-selected");
            }

            //kasowanie odznaczenia
            if (target.hasAttribute("data-selected")) {
                target.removeAttribute("data-selected");
                selectedTerm = null;
            }
            //zaznaczanie na klikniecie
            else {
                target.setAttribute("data-selected", true);
                selectedTerm = termIndex;
            }

            if (selectedTerm !== null && selectedDef !== null) {
                var term = document.querySelector("#terms [data-index='" + selectedTerm + "']");
                var def = document.querySelector("#defs [data-index='" + selectedDef + "']");
                if (isMatch(selectedTerm, selectedDef)) {

                    score++;

                    resultsContainer.innerHTML = `Ҷавоби дуруст ${score} аз 6`;

                    var outlineColor = getRandomColor();
                    term.className += " score";
                    def.className += " score";


                    term.setAttribute("style", "outline: 4px solid " + outlineColor + ";");

                    def.setAttribute("style", "outline: 4px solid " + outlineColor + ";");
                } else {
                    term.className += " descore";
                    def.className += " descore";
                }

                selectedTerm = null;
                selectedDef = null;
                term.removeAttribute("data-selected");
                def.removeAttribute("data-selected");

            }
        })

        defsContainer.addEventListener("click", function (e) {


            var target = e.target.parentNode;
            if ((target.className === "up score") || (target.className === "up descore"))
                return;
            var defIndex = Number(target.getAttribute("data-index"));

            if (selectedDef !== null && selectedDef !== defIndex) {
                defsContainer.querySelector("li[data-index='" + selectedDef + "']").removeAttribute("data-selected");
            }

            if (target.hasAttribute("data-selected"))
                target.removeAttribute("data-selected");
            else
                target.setAttribute("data-selected", true);
            selectedDef = Number(target.getAttribute("data-index"));
            if (selectedTerm !== null && selectedDef !== null) {
                //var term = document.querySelector("#terms [data-index='"+selectedTerm+"']");
                var term = termsContainer.querySelector("[data-index='" + selectedTerm + "']");
                //var def = document.querySelector("#defs [data-index='"+selectedDef+"']");
                var def = defsContainer.querySelector("[data-index='" + selectedDef + "']");
                if (isMatch(selectedTerm, selectedDef)) {

                    score++;
                    // console.log(score);
                    resultsContainer.innerHTML = `Ҷавоби дуруст ${score} аз 6`;
                    var outlineColor = getRandomColor();
                    term.className += " score";
                    def.className += " score";
                    term.setAttribute("style", "outline: 4px solid " + outlineColor + ";");

                    def.setAttribute("style", "outline: 4px solid " + outlineColor + ";");
                } else {
                    term.className += " descore";
                    def.className += " descore";
                }
                selectedTerm = null; //odznacz kliknięcie
                selectedDef = null; //odznacz kliknięcie
                term.removeAttribute("data-selected");
                def.removeAttribute("data-selected");
            }
        })

        function reset() {
            var resetTerms = termsContainer.querySelectorAll("li");
            var resetDefs = defsContainer.querySelectorAll("li");
            console.log(resetTerms)
            for (var i = 0; i < resetTerms.length; i++) {
                // resetTerms[i].removeAttribute("class", "up score");
                resetTerms[i].className = 'up'
                resetTerms[i].removeAttribute("data-selected");
            }
            for (i = 0; i < resetDefs.length; i++) {
                // resetDefs[i].removeAttribute("class", "up score");
                resetTerms[i].className = 'up'
                resetDefs[i].removeAttribute("data-selected");
            }

            selectedTerm = null;
            selectedDef = null;
        }


        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }


        function shuffle() {
            randomSort(data[iterator].terms)
            randomSort(data[iterator].definitions)
            createListHTML(data[iterator].terms, termsContainer)
            createListHTML(data[iterator].definitions, defsContainer)
        }

        function randomSort(array) {
            var currentIndex = array.length,
                temporaryValue, randomIndex;

            // While there remain elements to shuffle...
            while (currentIndex !== 0) {

                // Pick a remaining element...
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;

                // And swap it with the current element. SWAP
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
            }

            return array;
        }

        shuffle();
        nextContainer.addEventListener('click', function () {
            if (iterator < countData - 1) {
                iterator++;
                questionContainer.innerHTML = data[iterator].question;
                createListHTML(data[iterator].terms, termsContainer);
                createListHTML(data[iterator].definitions, defsContainer);
            } else {
                resetContainer.style.display = 'block';
                nextContainer.style.display = 'none';
            }

        });
        resetContainer.addEventListener('click', function () {

            score = 0;
            resultsContainer.innerHTML = `Ҷавоби дуруст ${score} аз 6`;
            reset();
            // termsContainer.className += " fadeOut";
            // defsContainer.className += " fadeOut";
            // setTimeout(function () {
            shuffle();
            // termsContainer.removeAttribute("class", "fadeOut");
            // defsContainer.removeAttribute("class", "fadeOut");
            // termsContainer.setAttribute("class", "upper");
            // defsContainer.setAttribute("class", "upper");
            // }, 40)
            // shuffle();

        });
    }
}
