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
                    <h1 class="title-text">Wellington</h1>
                </div>

                <div class="lesson-content">
                    <p class="body-text">Wellington is the capital city of New Zealand. It is the southern-most city on the North Island.</p>
                    <p class="body-text">Historically, the city was also named Port Nicholson, the original European name for Wellington Harbour until 1984. In Māori, the city is known as Te Whanganui-a-Tara (“the great harbour of Tara”, also in reference to Wellington Harbour); Te Upoko o te Ika a Māui (“the head of the fish of Māui”, in reference to the Māori legend of Māui fishing the North Island from the sea); and Pōneke, a transliteration of Port Nick.</p>
                    <p class="body-text">In the 1820s, when European settlement of the area began, the primary iwi (tribe) living in the area that would become Wellington City was Ngāti Ira, Rangitāne, and Muaūpoko (formerly Ngāi Tara). Many other iwi migrated southward which forced those iwi out. The arriving iwi include Ngāti Toa from Kāwhia, Ngāti Rangatahi, from near Taumarunui, and Te Atiawa, Ngāti Tama, Ngāti Mutunga, Taranaki and Ngāti Ruanui from Taranaki. Ngāti Mutunga later moved on to the Chatham Islands.</p>
                    <p class="body-text">In 1839, Colonel William Wakefield arrived to purchase land for the New Zealand Company, a British company that managed the colonisation of the new country, to sell on to British settlers. Settlement began with the arrival of an advance party on the ship Tory late that year followed by 150 settlers on the ship Aurora the following January. The first homes were built in Pito-one, later named Petone, but problems with the flood-prone swamplands prompted settlement across the harbour in Thorndon.</p>
                    <p class="body-text">Wellington was declared a city in 1840 and chosen to be the capital city in 1865, replacing Auckland as the capital. This measure was taken to prevent the more populous South Island, where goldfields were located, from forming a separate colony in the British Empire. Also, it was determined that the Royal Navy fleet could fit in the harbour.</p>
                    <p class="body-text">In 1855, the Wairarapa earthquake, likely the most powerful earthquake in recorded New Zealand history at magnitude 8.2 on the Moment scale, caused vertical movements of two to three metres over a large area. This included raising land out of the harbour; this land was reclaimed (converted for use by people) and is part of the central business district. This explains why Lambton Quay, formerly on the waterfront, is now 100 to 200 metres from the harbour.</p>
                    <p class="body-text">Every five years, a year-long slow quake occurs beneath Wellington, stretching from Kapiti to the Marlborough Sounds. It was first recorded in 2003 and reappeared in 2008 and 2013. Due to the slow nature of the quake, no damage occurs.</p>
                    <p class="body-text">Originally named Victoria University College, named for Queen Victory on her 60th jubilee, Victoria University of Wellington was established in 1897 as part of the University of New Zealand. Built on the hills of the suburb of Kelburn, the site was chosen to promote the use of the Wellington Cable Car that would be put in action starting in 1902.</p>
                </div>
	      </div>

		</div>

		<footer> <!-- Nav bar inspired by https://www.youtube.com/watch?v=PwWHL3RyQgk -->
         
			<?php include 'includes/footer.php'; ?>

      	</footer>

		<?php include 'includes/scripts.php'; ?>

	</body>
</html>