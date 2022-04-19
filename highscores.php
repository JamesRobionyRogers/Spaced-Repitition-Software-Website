<!-- Connecting to the Database -->
<?php include 'includes/dbc.php';?>

<?php session_start(); 

	if(!isset($_GET['lessonID'])) {
		$lessonID = 0; 
	} else {$lessonID = $_GET['lessonID'];}


	function getLessonName($quizID) {
        $dbc = mysqli_connect("localhost", "root", 'admin', "srs");
        // Retrieveing the lesson Name for Heading 
        $getLessonNameQuery = "CALL `GetSubjectName`($quizID)"; 
        $getLessonNameResult = mysqli_query($dbc, $getLessonNameQuery);
        $getLessonNameRecord = mysqli_fetch_assoc($getLessonNameResult);
        $lessonName = $getLessonNameRecord['subjectName'];

        return $lessonName;
    }

	if ($lessonID == 0) {$lessonName = "All Highscores";}
	else {$lessonName = getLessonName($lessonID);}
	
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

			<?php include 'includes/header.php'; ?>


			<div class="title-page">
				<div id="title-container">
					<h1 class="title-text">Highscores</h1>
					<h2 class="lesson-name"><?php echo $lessonName ?></h2>
				</div>
			</div>

			<div class="lesson-btns-wrapper">
				<div class="lesson-btns container">
					<?php  
						// Setting up the query
						$dbc = mysqli_connect("localhost", "root", 'admin', "srs"); 
						$query = 'CALL GetSubjects()'; 
						$allLessons = mysqli_query($dbc, $query);

						// Itterating through the
						foreach ($allLessons as $lesson) { 
							$lessonNameClass = str_replace(" ", "", $lesson['subjectName']); 
							$lessonName = $lesson['subjectName']; 
							$lessonID = $lesson['subjectID'];
							
							echo "<a class='lesson-btns' href='highscores.php?lessonID=$lessonID'>$lessonName</a>"; 
						}	
					?>
				</div>
			</div>

			<div class="highscore-table-wrapper">
				<div class="highscore-table-container">
					<table class="highscore-table">
						<tr class="table-titles">
							<th>Initials</th>
							<th>Highscore</th>
						</tr>
					</table>
					<?php 
						if (isset($_GET["lessonID"]) && $_GET["lessonID"] >= 1) {
							// Setting vairables 
							$lessonID = $_GET["lessonID"];			// creating array out of get string 
							// Setting up the query
							$dbc = mysqli_connect("localhost", "root", 'admin', "srs"); 
							$query = "CALL GetHighscore($lessonID)"; 
							$hsResult = mysqli_query($dbc, $query);

							// TODO: Itterate through the answer states

							// Itterating through questions into table 

							while($highscores = mysqli_fetch_assoc($hsResult)){
								// Spacer Row
								echo 	"<div class='spacer'>";
								echo 		"<div class='spacer'></div>";
								echo	"</div>";
								// Data Row 
								echo 	"<div class='row'>";
								echo 		"<div class='initials'>" . $highscores['initials'] . "</div>";
								echo 		"<div class='highscore'>" . $highscores['highscore'] . "</div>";
								echo	"</div>";
							}
						
						}

						else {
							echo 	"<div class='spacer'>";
							echo 		"<div class='spacer'></div>";
							echo	"</div>";
							// Data Row 
							echo 	"<div class='row'>";
							echo 		"<div class='initials' style='width:100%'>Select a lesson above</div>";
							echo	"</div>";
						}
						
					?>
				</div>
	      	</div>
		</div>

		<?php $_SESSION['answerList'] = []; ?>

		<footer> <!-- Nav bar inspired by https://www.youtube.com/watch?v=PwWHL3RyQgk -->
         
			<?php include 'includes/footer.php'; ?>

      	</footer>

			<?php include 'includes/scripts.php'; ?>


	</body>
</html>