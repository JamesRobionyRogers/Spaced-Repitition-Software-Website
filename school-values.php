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
	            <h1 class="title-text">School Values</h1>
                <!-- Button taing the user to the lesson quiz -->
	         </div>

	         <div class="lesson-content">
	            <p class="body-text">Following consultation with students, staff, whanau, the community, and local iwi, Onslow College adopted a new school vision and values. These replace “the Onslow Way”, whose values were poorly-defined.</p>
            </div>

            <h2 class="lesson-subheading">Vision</h2>
            <div class="lesson-content">
                <p class="body-text">Our vision is for every ākonga (learner) to be able to come as they are to Onslow College, for them to grow as a whole person (academically, socially, artistically, culturally, sportwise) and for them to be able to thrive in their future. We will use our values to guide our behaviours and to help us support everyone to be able to grow and succeed.</p>
                <div class="lesson-content-table">
                    <div class="left">
                        <p class="table-item">Kei konei ahau</p>
                        <p class="table-item">Kia puāwai</p>
                        <p class="table-item">Haere whakamua</p>
                    </div>
                    <div class="right">
                        <p class="table-item">You bring yourself</p>
                        <p class="table-item">Grow</p>
                        <p class="table-item">Thrive in the paths you choose</p>
                    </div>
                </div>
            </div>

            <h2 class="lesson-subheading">Values</h2>
            <div class="lesson-content">                
                <p class="body-text">Our values highlight how important it is for ākonga to be able to bring who they are to the college and for them to be respected for who they are. They also show that for this to happen we need to have a community which allows diversity to be celebrated and for everyone to be able to stand on this whenua with a sense of belonging.</p>
            </div>

            <h2 class="lesson-subheading">Whānau</h2>
            <div class="lesson-content">                
                <p class="body-text">This value is about Onslow College being an extended family, a collective who care. We take the time to know each other, and we work hard to make sure that everyone feels safe. Whānau show care for each other.</p>
            </div>

            <h2 class="lesson-subheading">Whenua</h2>
            <div class="lesson-content">                
                <p class="body-text">This value is about Onslow College being a place for akōnga to find sustenance so that they can grow and strive. This means we focus on wellbeing and identity in all that we do and say to sustain growth and the ability to thrive.</p>
            </div>

            <h2 class="lesson-subheading">Whakapapa</h2>
            <div class="lesson-content">                
                <p class="body-text">This value is about the layers which make up who we are. The way these layers combine make us unique. It also identifies all that akōnga bring with them each day. The way our families and influences make us who we are and how they connect us.</p>
            </div>

            <h2 class="lesson-subheading">Diversity</h2>
            <div class="lesson-content">                
                <p class="body-text">This value is about including and accepting people of different social, socio-economic, learning styles, ethnic, genders, faith, sexual orientation, valuing diversity is inclusion.</p>
            </div>

            <h2 class="lesson-subheading">Community</h2>
            <div class="lesson-content">                
                <p class="body-text">This value highlights that Onslow College is a group of people that care about each other and feel they belong together. A group of people who balance the rights of the individual against what is best for the group.</p>
            </div>


	      </div>

		</div>

		<footer> <!-- Nav bar inspired by https://www.youtube.com/watch?v=PwWHL3RyQgk -->
         
			<?php include 'includes/footer.php'; ?>

      	</footer>

		<?php include 'includes/scripts.php'; ?>

	</body>
</html>