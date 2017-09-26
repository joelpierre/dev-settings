<!-- <?php phpinfo(); ?> -->

<!DOCTYPE html>

<html lang="en">
    <head>
    	<?php
		  $headerName = "Site Directory List"; //This is the title that will appear in the tab area
		  $metaDescription = ""; //This will be the page description (will have to remove for wordpress themes
		  include("_assets/inc/head.php"); //Include the head.php file this has all the meta data and links to stylesheets
       	?>
	</head>

	<body>
		<?php include("_assets/inc/top.php") //Contains the top menu navigation that will stay the same on all pages ?>

		<section>
		  	<div class="container">
		    	<div class="row">
		      		<div class="col-sm-12">
						<?php
							// open this directory
							$myDirectory = opendir("../");

							// get each entry
							while($entryName = readdir($myDirectory)) {
								$dirArray[] = $entryName;
							}

							// close directory
							closedir($myDirectory);

							//	count elements in array
							$indexCount	= count($dirArray);
							Print ("<h2 class='no-margin'><span class=''><strong class='btn btn-lg btn-primary'>$indexCount</strong> <small>files in this directory</small></span></h2><br>\n");

							// sort 'em
							sort($dirArray);

							// print 'em
							print("<div class='well'><table border=0 width='100%' cellpadding=5 cellspacing=0 class=whitelinks>\n");
							print("<TR><TH>File Name</TH></TR>\n");
							// loop through the array of files and print them all
							for($index=0; $index < $indexCount; $index++) {
							        if (substr("$dirArray[$index]", 0, 1) != "." && substr("$dirArray[$index]", 0, 1) != "_" && substr("$dirArray[$index]", 0, 5) != "index" && substr("$dirArray[$index]", 0, 4) != "html") { // don't list hidden files
									print("<TR><TD><a href='http://$dirArray[$index].dev'>$dirArray[$index]</a></td>");
									print("</TR>\n");
								}
							}
							print("</table></div>\n");

						?>
		      		</div>
		    	</div>
		  	</div>
		</section>

		<?php include("_assets/inc/footer.php") //Contains all footer information ?>
	</body>
</html>
