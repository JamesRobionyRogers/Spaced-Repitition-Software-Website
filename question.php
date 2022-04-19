<!-- Connecting to the Database -->
<?php 

	include 'includes/dbc.php';
	include 'includes/question-backend.php';

	// Running question-backend.php code: 
	$lessonName = getLessonName($quizID);        	// setting the lesson name
	// $quizID = $_GET['id']; 								// storing the subject id: used for generating questions 

	// Loading quiz: 	Checking if the user has started the quiz 
	if (isset($_POST['questionNum'])) {		// if the questionNum is set, quiz must be in progress 
		$score = $_POST['score'];			// storing the players score 

		// Loading the next qustion
		if ($questionNum < 10) {
			$currentQuestion = $questions[$questionNum];
		} else if ($questionNum = 10) {
			$currentQuestion = $questions[$questionNum-1];
		}
		

	} 
	// Starting a quiz: generate questions, assign current question
	else { 
		$_SESSION['answerList'] = []; 						// resetting the answer list session var
		$_SESSION['score'] = 0; 							// resetting the score	
		$questions = getQuestions($quizID);					// generating the question pool using the subject id 
		$currentQuestion = $questions[$questionNum]; 		// setting first question from pool

	}
	
	// Setting session vairables
	$_SESSION['questions'] = $questions;			// setting questions array as a session vairable 

	// TESTING: Itterating through the questions array
	foreach($questions as $q) {
		$qID = GetQuestionID($q); 				// getting the questions id 
		// echo $qID . " - " . $q . "<br>";     	// printing the question with ID   
	}

	// Setting the current questions id and text 
	
?>

<!-- Start of HTML Page -->

<!DOCTYPE html>
<html lang="en">

    <!-- Constants.php should incude: Site title & other constants -->
	<?php include 'includes/constants.php'; ?>

	<head>
		<title><?php echo $title ?></title>
		<?php include 'includes/head.php'; ?>
		<?php // include 'includes/scripts.php';  	TESTING: do we need this in the head of the page? ?>
		<script type="text/javascript" src="js/progress-bar.js"></script>
	</head>

	<body>
		<div id="background-image"></div>
		<div id="body-wrapper">

			<?php include 'includes/header.php'; ?>
			

	      	<div class="title-page">
	         	<div id="title-container">
					 <!-- Printing the lesson subject name to the page -->
	            	<h1 class="lesson-title"><?php echo $lessonName; ?></h1>
					<pre class="score-text"><?php echo "Score:	" . $_SESSION['score'] ?></pre>
				</div>

			</div>

			<div class="question-content-wrapper">

				<div class="question-container">
					<!-- Printing the current question to the page -->
					<p id="question-text"><?php echo $currentQuestion; ?></p>
				</div>

				<?php 
					// Vairables: 
					$questionText = $currentQuestion; 
					$questionID = getQuestionID($currentQuestion);

					// Checking the question type 		
					$qT = checkQuestionType($currentQuestion); 	// 				

					// Multi-choice ONLY question
					if ($qT['questionType'] == 'multi') {	
						$type = $qT['questionType']; 	 
						include 'includes/multi-choice.php';
					}

					// Text-box ONLY question
					else if ($qT['questionType'] == 'text') {  
						$type = $qT['questionType'];  
						include 'includes/text-box.php';
						
					}

					// Both question types 
					else {
						$randQuestionType = mt_rand(1, 2);		// generate a random number between 1 & 2

						// Assigning 1 : multi-choice and 2 : text-box
						if ($randQuestionType == 1) {
							$type = "multi"; 
							include 'includes/multi-choice.php';
						}
						else {
							$type = "text";
							include 'includes/text-box.php';
						}
					}

					include 'includes/results-loading.php'; 
	

					// Setting data for JS-Info 
					if (!isset($randQuestionType)) {
						$randQuestionType = 0; 
					}
				?>

			</div>
			<div class="progress-wrapper-overide">

			<div class="progress-wrapper">
				<div class="progress">
					<div class="progress-done" data-done="<?php echo $progress; ?>"></div>
				</div>

				<p class="progress-text"></p> 

				<form id="next-question-form" name="question" action="question.php?id=<?php echo $quizID ?>" method="post">
					<input class="hidden user-answer" 		name="userAnswer" 		value="">
					<input class="hidden next-question" 	name="questionNum" 		value="<?php echo $questionNum; ?>">
					<input class="hidden score" 			name="score" 			value="<?php echo $score; ?>">
					<input class="hidden progress"			name="progress" 		value="<?php echo $progress; ?>">

					<button type="button" id="next-question" name="" value="" onClick="validateForm()">Next Question</button>
				</form>

				

			</div>

			</div>
		</div>

		<div class="hidden js-info" style="display: flex; flex-direction: column; align-items: center;">
			<div class="hidden lesson-id"><?php echo $quizID ?></div>
			<div class="hidden questions-length"><?php echo count($questions); ?></div>				<?php echo 'count($questions): ' . count($questions); ?>
			<div class="hidden question-num"><?php echo $questionNum; ?></div>						<?php echo '$questionsNum: ' . $questionNum; ?>
			<div class="question-type"><?php echo $type; ?></div>
			<div class="hidden correct-answers"><?php allCorrectAnswers($questionID); ?></div>

			<div class="hidden question-array"><?php foreach($questions as $q) {echo "$q~";} ?></div>
		</div>

		<?php include 'includes/scripts.php'; ?>
		<script type="text/javascript" src="js/quiz-pages.js"></script>

	</body>
</html>