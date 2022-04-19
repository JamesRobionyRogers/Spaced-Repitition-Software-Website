<?php

function loadQuiz()
{
    /**
     * Loads the quiz. If one is in progress, it continues that quiz.
     * Otherwise, it loads a new one.
     */

    // Loading in questions from a PHP dictionary.
    // FIXME: you should load the initial questions from MySQL instead.
    // Also, ideally you would load question IDs rather than whole questions.
    // After all, you can load the actual question and answer text later.
    include('questions.php');

    // Check if the 'asked' GET variable has been declared. If so,
    // then a quiz is in progress and we should continue it.
    // If not, then start a new quiz.
    if (isset($_GET['asked'])) {
        $numberAsked = $_GET['asked'];
        $score = $_GET['score'];

        // If this is the start of the quiz, load all questions. Otherwise, just the ones left.
        // FIXME: this is inefficient as it loads ALL questions regardless. You should maintain
        // your own array of question IDs to pull from the database one at a time.
        $sessionQuestions = array_slice($allQuestions, $numberAsked);

        loadNextQuestion($sessionQuestions, $numberAsked, $score);
    } else {
        // Start a new quiz.
        $sessionQuestions = $allQuestions;
        shuffle($sessionQuestions);
        loadNextQuestion($sessionQuestions, 0, 0);
    }
}

function loadNextQuestion($questions, $numberAsked, $score)
{
    /**
     * Loads the next question into the web page.
     */
    switch (count($questions) == 0) {
        case true:
            createResultsHTML($score, $numberAsked);
            break;
        default:
            foreach ($questions as $question) {
                echo $question['question'] . ' • ';
            }

            createQuestionHTML($questions, $numberAsked, $score);
            break;
    }
}

function createQuestionHTML($sessionQuestions, $numberAsked, $score)
{
    /**
     * Loads in information about the current question, its answers,
     * and formats them nicely on the page.
     */
    $currentQuestion = $sessionQuestions[0];
    $questionText = $currentQuestion["question"];
    $answer = $currentQuestion["answer"];
    $wrongAnswers = $currentQuestion["wrong_answers"];
    $allAnswers = array_merge([$answer], $wrongAnswers);
    shuffle($allAnswers);

    // Put all the question/answer information into the text fields/DIVs
    echo '<h1>Question #' . ($numberAsked + 1) . '</h1>';
    echo '<h2>' . $questionText . '</h2>';
    echo '<div id="answers">';
    foreach (range(0, count($allAnswers) - 1) as $index) {
        $currentAnswer = $allAnswers[$index];

        // Prepare a URL for each answer to load. If the answer is correct, also increase the score.
        // FIXME: this solution uses GET rather than PUT, so the number of asked questions and the
        // score is easily manipulatable from the browser's address bar.
        $url = 'quiz.php?asked=' . ($numberAsked + 1);
        $url = $url . '&score=' . ($score + ($currentAnswer == $answer ? 1 : 0));

        echo '<div class="answer"><a href="' . $url . '">' . $allAnswers[$index] . '</a></div>';
    }
    echo '</div>';
}

function createResultsHTML($score, $numberAsked)
{
    echo '<h1>Results</h1>';
    echo '<p>You scored ' . $score . ' out of ' . $numberAsked . '</p>';
    echo '<div class="answer"><a href="quiz.php">Restart</a></div>';
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php loadQuiz(); ?>
</body>

</html>