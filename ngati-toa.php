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
	            <h1 class="title-text">Ngati Toa</h1>
	         </div>

	         <div class="lesson-content">
	            <p class="body-text">Ngāti Toa, or Ngāti Toa Rangatira in full, is a Māori iwi (tribe) based in the southern North Island and in the northern South Island of New Zealand. The rohe pōtae (tribal boundaries) includes the Johnsonville area. It has four marae: on the North Island, Hongoeka Marae in Plimmerton and Takapuwahia Marae in Porirua; on the South Island, Wairau Marae in Spring Creek (Marlborough) and Whakatū Marae in Nelson</p>
				<p class="body-text">Originally, Ngāti Toa lived around Kāwhia (south-west of Hamilton) but conflicts with the neighbouring Waikato and Ngāti Maniapoto iwi forced them to withdraw from their homeland. Those who remained in Kāwhia became Ngāti Mahuta. Eventually, Ngāti Toa migrated southward; first through Taranaki, then the Horowhenua, on and around Kapiti Island, and on either side of the Cook Strait.</p>
				<p class="body-text">Tupahau, descendent of Hoturua, captain of the Tainui canoe that travelled to what is now called Aotearoa/New Zealand from the ancestral homeland of Hawaiki, led 300 warriors against an army of 2,000 led by Tamure, a priest of Tainui. Tupahau was the victor but spared his foe, leading Tamure to have cried out “Tenā koe, Tupahau, te toa rangatira!” which means “Hail Tupahau, the noble champion!”. Tupahau’s daughter-in-law bore a son who received the name Toarangatira, and Ngāti Toa traces its ancestry to, and subsequently is named for, him.</p>
				<p class="body-text">A major figure in Ngāti Toa history is the war leader Te Rauparaha (1760s–1849), whose best-known legacy to people outside of the iwi is the “Ka mate” haka (a ceremonial performance, mistakenly called a war dance in the past), well-known for being performed by the All Blacks. It was actually composed as a celebration of Te Rauparaha’s escape from Ngāti Maniapoto and Waikato enemies.</p>
				<p class="body-text">In modern times, Ngāti Toa is affiliated with the pan-tribal Māori radio station “Te Upoko O Te Ika” and also runs Atiawa Toa FM, alongside the Te Āti Awa iwi. Amongst its many operations, the iwi operates Ora Toa health services in the Porirua and Wellington regions including a free gym for iwi members, provides education and apprenticeships for children and young adults, runs the Paekakariki Holiday Park, and an ITM in Tawa.</p>
	         </div>
	      </div>

		</div>

		<footer> <!-- Nav bar inspired by https://www.youtube.com/watch?v=PwWHL3RyQgk -->
         
			<?php include 'includes/footer.php'; ?>

      	</footer>

		<?php include 'includes/scripts.php'; ?>

	</body>
</html>