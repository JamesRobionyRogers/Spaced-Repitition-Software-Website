<!-- Connecting to the Database -->
<?php 

	include 'includes/dbc.php';
	include 'includes/question-backend.php';

	// echo "Score: $score  -  Question: $questionNum";
	// echo "userAnswer: " . $_POST['userAnswer']; 		// TESTING: display the users answer passes from previous page



	// Running question-backend.php code: 
	$lessonName = getLessonName($dbc, $quizID);        	// setting the lesson name
	// $quizID = $_GET['id']; 								// storing the subject id: used for generating questions 

	// Loading quiz: 	Checking if the user has started the quiz 
	if (isset($_POST['questionNum'])) {		// if the questionNum is set, quiz must be in progress 
		$score = $_POST['score'];			// storing the players score 

		// Loading the next qustion
		$currentQuestion = $questions[$questionNum]; 

	} 
	// Starting a quiz: generate questions, assign current question
	else { 
		$questions = getQuestions($quizID);					// generating the question pool using the subject id 
		$currentQuestion = $questions[$questionNum]; 		// setting first question from pool

	}
	
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
		<?php include 'includes/scripts.php'; ?>
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
				</div>

				<div class="question-container">
					<!-- Printing the current question to the page -->
					<p class="question-text"><?php echo $currentQuestion; ?></p>
				</div>
			</div>

			<?php 

				// Checking the question type 		
				$qT = checkQuestionType($currentQuestion); 	// 				

				// Multi-choice ONLY question
				if ($qT['questionType'] == 'multi') {		 
					include 'includes/multi-choice.php';
				}

				// Text-box ONLY question
				else if ($qT['questionType'] == 'text') {   
					include 'includes/text-box.php';
				}

				// Both question types 
				else {
					$randQuestionType = mt_rand(1, 2);		// generate a random number between 1 & 2

					// Assigning 1 : multi-choice and 2 : text-box
					if ($randQuestionType == 1) {include 'includes/multi-choice.php';}
					else {include 'includes/text-box.php';}
				}

				var_dump($questions);		// TESTING: 
				var_dump($questionNum);		// TESTING: 
			?>

			<div class="progress-wrapper">
				<div class="progress">
					<div class="progress-done" data-done="0"></div>
				</div>
				<!-- TODO: php for question number as a percent -->
				<p class="progress-text"></p> 

				<form name="question" id="next-question-form" action="question.php?id=<?php echo $quizID ?>" method="post">
					<input class="user-answer hidden" name="userAnswer" value="">
					<input class="next-question hidden" name="questionNum" value="<?php echo $questionNum; ?>">

					<button type="button" id="next-question" name="" value="" onClick="validateForm()">Next Question</button>
					<!-- <input id="next-question" type="submit" name="asked" value="Next Question"> -->
				</form>

				

			</div>
		</div>

		<div class="js-info">
			<div class="questions-length"><?php echo count($questions); ?></div>
			<div class="question-num"><?php echo $questionNum; ?></div>

		</div>

		<?php include 'includes/scripts.php'; ?>

	</body>
</html>