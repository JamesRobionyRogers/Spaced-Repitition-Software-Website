<?php
    $dbc = mysqli_connect("localhost", "root", 'admin', "srs");    

	if(!$dbc){
		echo "Could not connect";
	} /* else {
		echo "Connected";
	} */
	
	// Catch if clicked from nav bar meaning nothing is in the 
	
	if(isset($_POST['standards'])){
		$standard_id = $_POST['standards']; 
	} else {
		$standard_id = "AS91878";
	}


// PAGE SPICIFIC QUERYS 
	
	// The query should return the StandardID, StandardName and StandardCredits of the standard being searched for
	$standard_name_query = "SELECT StandardID, StandardName, StandardCredits FROM Standards WHERE StandardID = '" . $standard_id . "'";
	// run the quary on the database 
	$standard_name_result = mysqli_query($dbc, $standard_name_query);
	// $standard_name_record = mysqli_fetch_assoc($standard_name_result);


	// 
	$students_query = "SELECT Students.StudentID, FirstName, LastName, Grade
						FROM Students, Standards, StudentGrades
						WHERE Standards.StandardID = '" . $standard_id . "'
						AND Students.StudentID = StudentGrades.StudentID
						AND Standards.StandardID = StudentGrades.StandardID
						ORDER BY FIELD(Grade, 'N', 'A', 'M', 'E') ASC";
	// run the quary on the database 
	$students_result = mysqli_query($dbc, $students_query);

// FORM QUERYS

	// The query should return the FirstName, LastName and Grade of each of the students enrolled in the pitular standard that was selected
	$dropdown_students_query = "SELECT FirstName, LastName, StudentID FROM Students ORDER BY StudentID ASC";
	// run the quary on the database 
	$dropdown_students_result = mysqli_query($dbc, $dropdown_students_query);


	// The query will search for a Student using FirstName, LastName and/or StudentID, then, pull up all of the Standards (StandardID and StandardName) along with the Grades that the student is enrolled
	$dropdown_standards_query = "SELECT StandardID, StandardName FROM Standards";
	// run the quary on the database 
	$dropdown_standards_result = mysqli_query($dbc, $dropdown_standards_query);
?>



<!DOCTYPE html>  
<html lang="en">
	<head> 
		<title> OC Tracking Students NCEA Results </title>
		<meta charset="utf-8">
		<link rel='stylesheet' type='text/css' href="CSS/styles.css">
		<link rel="icon" href="IMG/NZQA-OC-Tab-Logo.png">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	</head>
	<body>
		<header>
			<nav>
				<ul class="nav-links">
					<!-- Change names and href for navigation -->
                	<li><a class="link" href="index.php">Home</a></li>  <!-- Consult the teacher for some useful links -->
                	<li><a class="link" href="students.php">Student Lookup Page</a></li>
               		<li><a id="logo-top" href="index.php"><img alt="Logo" src="IMG/NZQA-OC-Lookup-Logo-New.png"></a></li>
                	<li><a class="link" href="standards.php">Standard Lookup Page</a></li>
                	<li><a class="link" href="https://www.nzqa.govt.nz/ncea/ncea-rules-and-procedures/" target="_blank">NCEA Rules & Procedures</a></li>  <!-- MR Fairhall said NZQA website for NCEA conditions for an assessment  -->
            	</ul>
			</nav>
		</header>
		
			<?php
			
		// HTML Header bit
				echo "<div class='main'>";
					echo "<div id='dark-layer'> ";
						echo '<img id="main-img" alt="Assorted Colour of School Lockers" src="IMG\unsplash-lockers.jpg">';  // https://images.unsplash.com/photo-1504275107627-0c2ba7a43dba?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1934&q=80
					echo "</div>";
					echo "<div id='text'>";
						echo "<h1 id='standard-name'>" . $standard_name_record['StandardName'] . "</h1>";
						echo "<h2 id='standardid'><strong>Standard ID:</strong> " . $standard_id . "</h2>";
						echo "<h2 id='standard-credits'><strong>Credits:</strong> " . $standard_name_record['StandardCredits'] . "</h2>";
					echo "</div>";
				echo '</div>';
			
		// echo out infomation 
				
				echo "<div id='infomation'>";
					echo "<h2>Students Enrolled in Standard:</h2>";
					// Itterate through standards and the grade
					echo "<table id='standards-table'>";
						echo "<tr>";
							echo "<th id='table-top-left'>Student ID </th>";
							echo "<th>Student Name</th>";
							echo "<th id='table-top-right'>Grade</th>";
						echo "</tr>";
					while($students_record = mysqli_fetch_assoc($students_result)){
	
						echo "<tr>";
							echo "<td>" . $students_record['StudentID'] . "</td>";
							echo "<td>" . $students_record['FirstName'] . $students_record['LastName'] . "</td>";
							echo "<td>" . $students_record['Grade'] . "</td>";
						echo "</tr>";
					}
					echo "</table>";
				echo "</div>";
			?>
			
		
		<div id="standards-form_div">
			<form name="student_lookup" id="student_lookup" action="students.php" method="post">
			<!-- Teams Dropdown -->
				<select id="students" name="students">
					<option selected disabled>-- select student below --</option>
					<?php
						// echo each Team into a drop down menu
						while($dropdown_students_record = mysqli_fetch_assoc($dropdown_students_result)){

							echo "<option value='" . $dropdown_students_record['StudentID'] . "'>" . $dropdown_students_record["StudentID"] . ' - ' . $dropdown_students_record['FirstName'] . $dropdown_students_record['LastName'] .  "</option>";
						}
					?>
				</select>
				<!-- Teams Lookup Button -->
				<input type="submit" name="order" id="order" value="Lookup Student">
			</form>
			<br>
			<form name="standard_lookup" id="standard_lookup" action="standards.php" method="post">
				<!-- Players Dropdown -->
				<select id="standards" name="standards">
					<option id='temp-value' selected disabled>-- select standard below --</option>
					<?php
						// echo each Players into a drop down menu
						while($dropdown_standards_record = mysqli_fetch_assoc($dropdown_standards_result)){

							echo "<option value='" . $dropdown_standards_record['StandardID'] . "'>" . $dropdown_standards_record['StandardID'] . ' - ' . $dropdown_standards_record['StandardName'] . "</option>";

						}
					?>
				</select>
				<!-- Teams Lookup Button -->
				<input type="submit" name="order" id="order" value="Lookup Standard">
			</form>
		</div>
		
	</body>
</html>