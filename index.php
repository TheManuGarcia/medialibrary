<?php
include("inc/functions.php");
include("inc/data.php");

$pageTitle = "Personal Media Library";
$section = null;

include("inc/header.php"); ?>
		<div class="section catalog random">

			<div class="wrapper">

				<h2>May we suggest something?</h2>

                                    <ul class="items">
										<?php

//										array_rand generates a random number from 0-4 from our $catalog variable
										$random = array_rand($catalog,4);
										foreach($random as $id) {
											echo get_item_html($id, $catalog[$id]); /* We pass our random index here */
										}
										?>
                                    </ul>

			</div>

		</div>

<?php include("inc/footer.php"); ?>