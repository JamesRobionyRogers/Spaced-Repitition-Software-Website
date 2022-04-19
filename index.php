<!-- Sort out .includes -->
<!-- Delete old shit and make template --> 

<!-- Connecting to the Database -->
<?php include 'includes/dbc.php' ?>

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
		<div id="background-image"></div>
		<div id="body-wrapper">

			<?php include 'includes/header.php'; ?>


			<div class="title-page">
				<div id="title-container">
					<h1 class="title-text"><?php echo $title ?></h1>
				</div>

				<div class="container">
					<p class="body-text"><?php echo $title ?> is a website designed and developed to inform and educate the students and families of Onslow College about the College's history, its surrounding whenua (area), the people who contribute to it, and what Onslow College contributes back to the community. All done In an engaging manor using Spaced Repetition Software (SRS) developed by <?php echo $authorName ?>.</p>
				</div>
			</div>


			<div class="lesson-cards">

				<?php 

					// Setting up the query
					$dbc = mysqli_connect("localhost", "root", 'admin', "srs"); 
					$subjectsQuery = 'CALL GetSubjects()'; 
					$subjectsResult = mysqli_query($dbc, $subjectsQuery);

					// echo each Team into a drop down menu
					while($subjectsRecord = mysqli_fetch_assoc($subjectsResult)){
						// $subjectsRecord['subjectName']

						echo '<div class="card-wrapper">';
						echo 	'<div class="card-container">';
						echo		'<a class="card" href="question.php?id=' . $subjectsRecord['subjectID'] . '">';
						echo 			'<div class="card-title">';
						echo				'<img class="illustration card-top" src="imgs/lesson-card-top.svg" alt="">';
						echo				'<h1 class="card-title">' . $subjectsRecord['subjectName'] .'</h1>';
						echo			'</div>';
						echo			'<img class="illustration"  src="' . $subjectsRecord['subjectImg'] . '" alt="An illustration depicting' . $subjectsRecord['subjectName'] . ' ">';
						echo		'</a>';
						echo	'</div>';
						echo '</div>';

					}
				
				
				?>
				
	      </div>

		</div>

		<footer> <!-- Nav bar inspired by https://www.youtube.com/watch?v=PwWHL3RyQgk -->
         
			<?php include 'includes/footer.php'; ?>

      	</footer>

		<?php include 'includes/scripts.php'; ?>

	</body>
</html>