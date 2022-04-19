<?php 
    echo "<div class='hidden'>question-backup.php loaded</div>";

    // Creating session to use the stored $_SESSION[] vairabes  
    session_start();
    if(! isset($_SESSION['answerList'])){
        $_SESSION['answerList'] = [];
    }

    

    // Setting global dbc
    $dbc = mysqli_connect("localhost", "root", 'admin', "srs");

    if( isset($_SESSION['questions']) ) {
        $questions = $_SESSION['questions']; 
    }

    if (isset($_POST['score'])) {           // score: the score of the player 
        $score = $_POST['score'];           // assigning the score from previous page
        $_SESSION['score'] = $score;        // assinging the score to the session 

        // Setting up answerList
        $answerList = $_SESSION['answerList'];
        array_push($answerList, $_POST['userAnswer']);  // adding the current answerstate to the list
        $_SESSION['answerList'] = $answerList;          // updating the sesson var
        // var_dump($_SESSION['answerList']); // TESTING: 
    }           
    else { $score = 0; }

    // Setting all $_GET[] and $_POST[] vairbales to
	if (isset($_GET['id'])) { $quizID = $_GET['id']; }                  // id: subject ID, used for getting questions
    else { $quizID = 1; }


    if(isset($_POST['progress'])) { $progress = $_POST['progress']; }   // progress: the progress through the quiz
    else { $progress = -10; }

    if (isset($_POST['questionNum'])) {                         // questionNum: the number of the question
        $questionNum = $_POST['questionNum'];                   // used to check if the user has run through all questions 
        $questionNum += 1;                                      // increment the num by 1 each time
    } 
    else {$questionNum = 0;}


    function getLessonName($quizID) {
        global $dbc;
        // Retrieveing the lesson Name for Heading 
        $getLessonNameQuery = "CALL `GetSubjectName`($quizID)"; 
        $getLessonNameResult = mysqli_query($dbc, $getLessonNameQuery);
        $getLessonNameRecord = mysqli_fetch_assoc($getLessonNameResult);
        $lessonName = $getLessonNameRecord['subjectName'];

        return $lessonName;
    }

    function getQuestions($quizID) {
        $dbc = mysqli_connect("localhost", "root", 'admin', "srs");   

        // Retrieving the qustions 
        $getTenQuestionsQuery = "CALL `GetTenQuestions`($quizID)"; 
        $getTenQuestionsResult = mysqli_query($dbc, $getTenQuestionsQuery);
        // $getTenQuestionsRecord = mysqli_fetch_assoc($getTenQuestionsResult);
          
        foreach($getTenQuestionsResult as $q) {
            $questions[] = $q['questionText']; 
            // echo $q['questionID'] . " - " . $q['questionText'] . "<br>";        // TESTING: itterating the questions generated
        }

        return $questions; 
    }

    function checkQuestionType($question) {
        $dbc = mysqli_connect("localhost", "root", 'admin', "srs");
        
        // Retrieving the qustions 
        $checkTypeQuery = 'CALL `CheckQuestionType`("' . $question . '")';
        $checkTypeResult = mysqli_query($dbc, $checkTypeQuery);
        $questionType = mysqli_fetch_assoc($checkTypeResult);
        
        return $questionType; 
    }

    function GetQuestionID($questionText) {
        $dbc = mysqli_connect("localhost", "root", 'admin', "srs");  

        $getQuestionIDQuery = 'CALL `GetQuestionID`("' . $questionText . '")'; 
        $getQuestionIDResult = mysqli_query($dbc, $getQuestionIDQuery);
        $questionID = mysqli_fetch_assoc($getQuestionIDResult);
        
        return $questionID['questionID']; 
    }

    function getCorrectAnswer($questionID) {
        $dbc = mysqli_connect("localhost", "root", 'admin', "srs");

        $getCorrectAnswerQuery = "CALL `GetCorrectAnswers`($questionID)";
        $getCorrectAnswerResult = mysqli_query($dbc, $getCorrectAnswerQuery);
        $correctAnswer = mysqli_fetch_assoc($getCorrectAnswerResult); 

        return $correctAnswer['correctAnswer'];
    }

    function allCorrectAnswers($questionID) {
        $dbc = mysqli_connect("localhost", "root", 'admin', "srs");

        $allCorrectAnswersQuery = "CALL `GetAllCorrectAnswers`($questionID)";
        $allCorrectAnswersResult = mysqli_query($dbc, $allCorrectAnswersQuery);

        foreach($allCorrectAnswersResult as $cA) {
            $correctAnswers[] = $cA['correctAnswer']; 
            echo $cA['correctAnswer'] . ", ";        // TESTING: itterating the questions generated
        }
    }

    function getIncorrectAnswer($questionID) {
        $dbc = mysqli_connect("localhost", "root", 'admin', "srs");

        $getIncorrectAnswerQuery = "CALL `GetIncorrectAnswers`($questionID)";
        $getIncorrectAnswerResult = mysqli_query($dbc, $getIncorrectAnswerQuery);
        
        foreach($getIncorrectAnswerResult as $i) {
            $incorrectAnswers[] = $i['incorrectAnswer']; 
        }   

        return $incorrectAnswers; 

    }

    function getAnswers($questionID) {
        $correctAnswer = getCorrectAnswer($questionID); 
        $incorrectAnswers = getIncorrectAnswer($questionID); 
        
        try {
            foreach($incorrectAnswers as $i) { 
                $answerPool[] = $i; 
            }
        } catch(Exception $e){}
        
        $answerPool[] = $correctAnswer; 

        shuffle($answerPool);

        return $answerPool; 
    }

?>