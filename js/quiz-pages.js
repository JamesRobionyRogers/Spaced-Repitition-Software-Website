// Checking if the answer is correct/incorrect
function checkAnswer(userAnswer) {
    // Title Case Function: Sourced from:   https://www.codegrepper.com/code-examples/javascript/title+case+array+of+strings
    function titleCase(s) { return s.replace(/\w\S*/g, function (t) { return t.charAt(0).toUpperCase() + t.substr(1).toLowerCase(); }); }

    // Setting vairables
    userAnswer = titleCase(userAnswer.trim());                   // Title casing and trimming the users answer
    let answerString = $('.js-info .correct-answers').text();   // storing the correct answers 
    answerString = titleCase(answerString);

    // Processing answerString sepperating with "," then adding to array 
    let answerArray = answerString.split(", ");     // splitting string by ", " but leaves an empty string in last index
    answerArray.pop();                              // removes the last index of the array 

    if (answerArray.includes(userAnswer)) {
        console.log("Correct"); // TESTING:
        return true;        // returning true means the user has got the answer correct
    }

    console.log("Incorrect"); // TESTING:
}

// Multi-choice answer assigning 
function checkCardClick() {
    console.log("CheckCardClick Running");
    // Defining vairables
    const quizCards = $('.quiz-card-container');        // defining element
    let answerSelected = "";                            // storing the users multi-choice answer
    let returnAns;                                      // storing the user answer that is returned 

    // Assigning what happens on click of a multi-choice answer 
    quizCards.click(function () {
        $('.selected').removeClass('selected');     // removing '.selected' from all elements
        $(this).addClass('selected');               // adding '.selected' to the element clicked

        answerSelected = $(this).text();                        // storing the text of the clicked answer card 
        $('input.user-answer').attr('value', answerSelected);   // assigning the answer to the value attr of the submit form 
        globalMultiAns = answerSelected;                   
    })

    // Retrieving the set answer and returning it 
    returnAns = $('input.user-answer').attr('value');           // retrieing answer from the next-question form
    return returnAns;
}

// Combineing the two answer together to
function combineAnswers(multiAns, txtAns) {
    // Defining varables used 
    let combined = "";          // storing the combined answer 

    console.log("combineAnswers (multi): " + multiAns);         // TESTING: 
    console.log("combineAnswers (txt): " + txtAns);             // TESTING: 
    
    // Checking if eiyther of the answers provided are null and setting thoes to ""
    if (multiAns == null) {
        multiAns = "";
    }
    if (txtAns == null) {
        txtAns = "";
    }

    // Once both set to strings concat them 
    combined = multiAns.concat(txtAns);

    return combined;

}

// General validating of the next question form (both types of questions) 
function validateForm() {

    console.log('ValidateForm Running');    // TESTING: 

    // Keepig the screen static 
    $(".body-wrapper").addClass("static-element"); 

    // Defining the vairables used in the function
    let alertPause = 1800;                              // storing the length of time in ms the page will puse before reloading
    let scoreSet = $('#next-question-form .score');     // stroing the score set input obj
    let score = Number(scoreSet.attr('value'));         // storing the players score out of 100;
    let pass = false;                                   // storing the pass status: default if false
    let correct = false;                                // storing the state of the answer: correct/incorrect         
    var textAnswer = $('input#answer').val();           // storing the users text-box answer
    var multiAnswer = checkCardClick();                 // storing the users multi-choice answer

    // Setting null answers to ""
    userAnswer = combineAnswers(multiAnswer, textAnswer).trim(); 
    
    // Check if the user has provided an answer
    if (userAnswer == "") {
        // Alert the user that there is no choice 
        Swal.fire({
            icon: 'error',
            title: 'Oops... No answer provided',
            text: 'Please provide an answer and submit again.'
        })

        pass = false;       // pass stays false 
    } 
    // Else there is an valid input, so check for correct/incorrect  
    else {
        // Check state of answer: Correct/Incorrect
        correct = checkAnswer(userAnswer);          // returns the true/false for state of user answer
        pass = true;                                // answer can either be correct/incorrect, either way: move on

        // If user answer is correct: 
        if (correct) {
            // Allert the user they have gotten the answer correct and move on 
            Swal.fire({
                position: 'bottom-end',
                icon: 'success',
                title: 'Correct',
                width: 400,
                showConfirmButton: false,
                allowOutsideClick: false,
                timer: 1500
            })
            
            // Adding to the player score
            score += 10; 
            $('.user-answer').attr('value', "Correct");         // Setting user answer in post form
        } 
        // Else the user has gotten the answer incorrect
        else {
            // Allert the user they have gotten the answer incorrect and move on
            Swal.fire({
                position: 'bottom-end',
                icon: 'error',
                title: 'Incorrect',
                width: 400,
                showConfirmButton: false,
                allowOutsideClick: false,
                timer: 1500
            })

            $('.user-answer').attr('value', "Incorrect");       // Setting user answer in post form
        }

        // Setting the score value in the form 
        $('#next-question-form .score').attr('value', score);
        console.log("Score: " + score); // TESTING: 

        // Removing static elemetns 
        $(".body-wrapper").removeClass('static-elements'); 

    }

    // Pause loading the action until the allert finishes (2000 ms)
    setTimeout(function () {
        // submit form if pass  
        if (pass) {
            $('#next-question-form').submit();      // posting the values to the question.php page 
        }

    }, alertPause);       // sleep for alertPause ms

    

}

function setProgressBar(maxQuestions) {
    // Setting vairables 
    const progress = $('.progress-done');                   // storing the moveable progress obj
    const progressText = $('p.progress-text');              // storing the text of the progress bar
    let prcntIncreace = 100 / maxQuestions;              // dividing the length my 100% to get percentege increase
    let currentValue = Number(progress.attr('data-done'));  //

    let progressDone = currentValue + prcntIncreace;            // storing the new progress value 
    if(progressDone > 100) {progressDone = 100;}

    console.log("Current Progress Value: " + currentValue); // TESTING:
    console.log("Percentage Increase: " + prcntIncreace); // TESTING:
    console.log("New Progress Value: " + progressDone); // TESTING:

    // Setting elemets on page 
    progress.attr('data-done', progressDone);                           // setting the data-done attr to new progress
    progressText.text(progressDone + "%");                              // setting the progress text 
    $('#next-question-form .progress').attr('value', progressDone);     // setting the forms attr to be posted 

    // Setting css of the bar 
    progress.css('width', progressDone + "%");
    progress.css('opacity', 1);
    

}

$(document).ready(function () {
    // $('html').css('overflow', 'hidden');

    const MAX_QUESTIONS = Number($('.js-info .questions-length').text());       // casting the text of the length of questions array to a number
    const LEEWAY = 1;   // TESTING:                                             // minus 1 due to the fact question one starts on index of 0
    
    let resultsHide = $('.quiz-cards, .quiz-textbox, .progress-wrapper, #title-container, .question-container');  // 
    let resultsQuestions = $('.js-info .question-array').text();

    // Checking if the user is on the last question
    const questionNumDiv = $('.js-info .question-num')          // storing the question-num div 
    let questionNumValue = Number(questionNumDiv.text());       // storing the question number and casting to Number

    console.log("questionNumValue: " + questionNumValue);

    // Redrecting the user to the results page 
    if (questionNumValue > (MAX_QUESTIONS - LEEWAY)) {              // -1 due to the fact question one starts on index of 0
        
        resultsHide.addClass('hidden');                         // hiding all elements on page 
        $('.results-container').removeClass('hidden');          // displaying results loading page    
        $('html').addClass('static');
        questionNumDiv.text(0);    
        srs =   "results.php?lessonID=" + $('.js-info .lesson-id').text() + 
                "&score=" + $('#next-question-form .score').attr('value');                             // resetting the question-num div to 0 to prevent infinate loop on results page
        $(location).attr('href', srs);   
        $('html').css('overflow', 'initial');                          // directing the user to the results page
    }

    // if ($('html').hasClass('swal2-shown')) {
    //     $('.progress-wrapper').css('bottom', '-20%');
    // } else {
    //     $('.progress-wrapper').css('bottom', '2%');
    // }


    // On document ready
    checkCardClick();                               //  make clickable cards
    setProgressBar(MAX_QUESTIONS)                   // setting progress bar

    // Clicking enter will trigger the next question button  
    $(window).keydown(function (event) {
        if (event.keyCode == 13) {

            event.preventDefault();                  // prevents the text-box form from being submitted 
            $('button#next-question').click();      // Click the button to validateForm
        }
    });

    // Preventing submitting the form used for the text box 
    $('input#answer').submit(function (event) {
        event.preventDefault();     
    })

    // Styling the quiz content 
    var qType = $('.js-info .question-type').text(); 
    var qCntWrapper = $('.question-content-wrapper');
    if (qType == 'text') {
        qCntWrapper.css('height', 'initial');
        qCntWrapper.addClass('center-question-wrapper');
    }

    if (qType == 'multi') {
        qCntWrapper.removeClass('center-question-wrapper');
        qCntWrapper.css('height', '40%'); 
    }
    

});
