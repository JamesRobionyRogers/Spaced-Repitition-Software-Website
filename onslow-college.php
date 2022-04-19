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
                    <h1 class="title-text">Onslow College</h1>
                </div>

                <div class="lesson-content">
                    <p class="body-text">Onslow College, also known as Te Kāreti o Onslow and Te Kāreti o Waipahihi, is a state co-educational secondary school located in Johnsonville, a suburb of Wellington, New Zealand. The school was opened in 1956. The current principal is Sheena Millar.</p>
                    <p class="body-text">The college, along with many parts of Wellington, is historically linked to the former Borough of Onslow, the local government district that included some of the northern suburbs. The borough, in turn, was named after William Hillier Onslow, 4th Earl of Onslow, Governor of New Zealand from 1889 to 1892. The borough was amalgamated with Wellington City in 1919, but the historical connection remains today in many placenames around the northern suburbs.</p>
                    <p class="body-text">Onslow College sits beneath Tarikākā, also called Mount Kaukau. Tarikākā means “where kākā (parrots) rest”; prior to deforestation of the Totara forests on its slopes, the large hill was home to the native bird. Thanks to conservation efforts, both the native forest and the kākā are returning to the area. From the school, one can also see the Mount Kaukau television transmitter; standing at 122 metres tall, it is the primary television and FM radio transmitter for the Wellington metropolitan area.</p>
                    <p class="body-text">The school has one motto in two translations. The Māori translation is “Ka anga atuaku kanohi ki nga maunga”, the Latin is “Levavi oculos meos in montes”; both translate to English as “I will lift mine eyes unto the hills”. This is a Biblical verse, Psalm 121. “Kanohi/oculos” refers to the eye whilst “nga maunga/montes” refers to the hills. Poetically, the hills in question could refer to Tarikākā.</p>
                    <p class="body-text">In the 1970s, Onslow College abolished the school uniform after student protests. Today, Onslow College and Wellington High School are the only secondary schools in the Wellington region that do not mandate a school uniform.</p>
                    <p class="body-text">In 2015, a student hub was built in place of the previous school cafeteria; today, this building houses OC Cafe (the school canteen) and the Te Ara a Maui flexible learning area. In 2019, Onslow College received funding to build new classrooms to cater for an increasing roll; additional temporary classrooms were added to Table Mountain to cope with the building process that is expected to take at least 5 years. Additionally, the hall and gym roofs were recently replaced.</p>
                    <p class="body-text">In 2021, following consultation with students, staff, the community, and local iwi, Onslow College adopted a new vision statement and five new values: whenua, whanau, whakapapa, diversity, and community. <a href="school-values.php" class="body-text-link">Click here to learn about the school values</a></p>
                </div>
	      </div>

		</div>

		<footer> <!-- Nav bar inspired by https://www.youtube.com/watch?v=PwWHL3RyQgk -->
         
			<?php include 'includes/footer.php'; ?>

      	</footer>

		<?php include 'includes/scripts.php'; ?>

	</body>
</html>