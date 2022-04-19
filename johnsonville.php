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

	      	<!-- Including Header -->
			<!-- TODO: Check include statement -->
			<?php include 'includes/header.php'; ?>


	      <div class="title-page">
                <div id="title-container">
                    <h1 class="title-text">Johnsonville</h1>
                </div>

                <div class="lesson-content">
                    <p class="body-text">Johnsonville is a suburb in northern Wellington, New Zealand. It is located 7km north of the city centre, separated by Ngauranga Gorge on State Highway 1. Its name is commonly shortened to “J’Ville”.</p>
                    <p class="body-text">Johnsonville was settled in 1841 by, among others, Frank  Johnson, for whom the area is named. Prior to this, the area was originally the site of a Māori track from Wellington to Porirua. There was dense native forest, including Totara, Rata, Rimu, and Hinau trees; this was all cleared by Johnson who sold the timber to help build Wellington.</p>
                    <p class="body-text">In 1881, Johnsonville was declared a town district. Later in 1953, Johnsonville amalgamated with the Wellington City Council.</p>
                    <p class="body-text">A train service was added to Johnsonville in 1886 to enable people to commute to Wellington. Stockyards, where cattle were kept before being taken to the Ngauranga abbatoir, were built in Broderick Road; following complaints from residents and the area receiving the nickname “Cowtown”, the stockyards were relocated near Raroa Station in 1958.</p>
                    <p class="body-text">In 1938, an electric line replaced the earlier train to allow more commuters from the newly-built state houses to the city. After this, Johnsonville experienced rapid growth. In the 1960s, Wellington’s first shopping mall was constructed in the suburb; today, the Johnsonville Mall has been granted resource consent for redevelopment although the start date for this has been pushed back.</p>
                    <p class="body-text">Today, Johnsonville has many modern amenities such as the recently developed Waitohi public library, Keith Spry swimming pools within the Waitohi hub, adjacent community centre, two supermarkets, shopping mall, Alex Moore Park (which is planned to replace its outdated sports clubrooms with a $6 million sports centre), and several primary, intermediate, and secondary schools.</p>
                </div>
	      </div>

		</div>

		<footer> <!-- Nav bar inspired by https://www.youtube.com/watch?v=PwWHL3RyQgk -->
         
			<?php include 'includes/footer.php'; ?>

      	</footer>

		<?php include 'includes/scripts.php'; ?>

	</body>
</html>