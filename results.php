<!-- Connecting to the Database -->
<?php include 'includes/dbc.php';?>

<?php session_start(); 
	// echo $_POST['initials'];		// TESTING: 
	// echo $_GET['lessonID'];		// TESTING:
	// var_dump($_SESSION['answerList']);	// TESTING: 

	if(isset($_POST['initials'])){
		AddHighscore(); 
		
	}

	function AddHighscore() {
		echo "<script> console.log('addHighscore Running'); </script>";		// TESTING: 
		$dbc = mysqli_connect("localhost", "root", 'admin', "srs");
		$lessonID = $_GET['lessonID'];		// passed through the GET 
		$initials = $_POST['initials'];		// passed when the user submits their initials 
		$score = $_SESSION['score']; 		// 

        $addHighscoreQuery = "CALL `AddHighscore`($score, $lessonID, '$initials');";
        $addHighscore = mysqli_query($dbc, $addHighscoreQuery);

		// Redirecting user to the highscore page after submitting score
		echo "<script> 
				var src = 'highscores.php?lessonID=$lessonID'; 
				window.location.replace(src);				
			</script>";
	}

	function getLessonName($quizID) {
        $dbc = mysqli_connect("localhost", "root", 'admin', "srs");
        // Retrieveing the lesson Name for Heading 
        $getLessonNameQuery = "CALL `GetSubjectName`($quizID)"; 
        $getLessonNameResult = mysqli_query($dbc, $getLessonNameQuery);
        $getLessonNameRecord = mysqli_fetch_assoc($getLessonNameResult);
        $lessonName = $getLessonNameRecord['subjectName'];

        return $lessonName;
    }


	if (isset($_GET['lessonID'])) {
		$lessonName = getLessonName($_GET['lessonID']);
	} else {
		$lessonName = ""; 
	}
	
?>

<!-- Start of HTML Page -->

<!DOCTYPE html>
<html lang="en">

    <!-- Constants.php should incude: Site title & other constants -->
	<?php include 'includes/constants.php'; ?>

	<head>
		<title><?php echo $title ?></title>
		<?php include 'includes/head.php'; ?>

	</head>

	<body>
		<div id="body-wrapper">

			<?php 
				include 'includes/header.php'; 

				// Checking id the session vairables are loaded: 
				if ($_SESSION['questions'] == [] || $_SESSION['answerList'] == []) {
					$_SESSION['score'] = "N/A";
					$lessonName = "";
				}
			?>
			
			<div class="title-page">
				<div id="title-container">
					<h1 class="title-text">Results</h1>
					<h2 class="lesson-name"><?php echo $lessonName ?></h2>
					<pre class="score-text"><?php echo "Score:	" . $_SESSION['score'] ?></pre>
				</div>
			</div>

			<!-- Copy and paste from results table -->
			<?php 
				if ($_SESSION['questions'] == [] || $_SESSION['answerList'] == []) {
					include 'includes/no-results.php';
					echo '<script>console.log("No Results");</script>';		// TESTING:
				} else {
					include 'includes/results-table.php';
				}
			?>

		</div>

		<?php 
		// Resetting vairbales`
		$_SESSION['answerList'] = []; 
		?>

		<footer> <!-- Nav bar inspired by https://www.youtube.com/watch?v=PwWHL3RyQgk -->
         
			<?php include 'includes/footer.php'; ?>

      	</footer>

		<?php include 'includes/scripts.php'; ?>


	</body>
</html>