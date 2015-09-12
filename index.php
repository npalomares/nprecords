<?php include('includes/header.php'); 
	
	//parse the form if they pressed the button
	if( $_REQUEST['added_record'] == 1) {
		//clean all inputs
		$input_artist = clean_input( $_REQUEST['artist'] ); 
		$input_title = clean_input( $_REQUEST['title'] ); 
		$input_year = clean_input( $_REQUEST['year'] ); 
		$input_description = clean_input( $_REQUEST['description'] ); 
		$input_record_company = clean_input( $_REQUEST['record_company'] ); 
		$input_cover_art_link = clean_input( $_REQUEST['cover_art_link'] ); 

		//just for s&g's let's also put these into an array
		$record_data = array(
			$input_artist, 
			$input_title, 
			$input_year, 
			$input_description, 
			$input_record_company, 
			$input_cover_art_link,
		);
		//un-encrypted password


		//encrypted password and repeat password


		//validate


		//username and password meet the minimum requirements


		//run it


		//if one result found, username is already taken


		//check for valid email address

			//check DB if email is already taken

			//run it

			//if one result found, email is already taken

		//if the data is valid, GO! Add user to DB and log them in
		$query_insert = "INSERT INTO records
			(artist, title, year, description, record_company, cover_art_link)
			VALUES
			('$input_artist', '$input_title', '$input_year', '$input_description', '$input_record_company', '$input_cover_art_link' )";
		
		//run it
		$result_insert = mysql_query($query_insert);

		//make sure the query worked, give user feedback
		if( mysql_affected_rows() >= 1) {
			$welcome_msg .= 'Holy Shit Something Happend, Congrats. <br />';


				//Log them in

				//Who is logged in? Get the last added user_id

				//what level are they?

				//redirect to admin panel

		}else{
			//insert failed
			$shit_msg .= 'Dude, we\'re totally fucked! <br />';		

		}	
	} //end if they pressed the button
?>

<div class="wrapper">

	<!-- this is where the quick record entry will live -->
	<section class="record-entry">
		<div class="container">
			<div class="col-sm-6">

				<form action="" method="post" class="record-form">
					<div class="form-component">
						<label>Artist: </label><input type="text" name="artist" class="artist" />
					</div>
					<div class="form-component">
						<label>Title: </label><input type="text" name="title" class="title" />
					</div>
					<div class="form-component">
						<label>Year: </label><input type="text" name="year" maxlength="4" class="year" />
					</div>
					<div class="form-component">
						<label>Description: </label><input type="textarea" name="description" class="description" />
					</div>
					<div class="form-component">
						<label>Record Company: </label><input type="text" name="record_company" class="record_co" />
					</div>
					<div class="form-component">
						<label>Upload Image: </label><input type="text" name="cover_art_link" id="fileToUpload" />
					</div>
					<div class="form-component">
						<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Add Record" />
					</div>
					<div class="form-component">
						<input type="hidden" name="added_record" value="1" />
					</div>
				</form>

			</div>
			<div class="col-sm-6">
				<h3 class="subtitle">This is where the entry will show</h3>
				<?php 
					if(isset($welcome_msg)) {
						echo '<h5>'.$welcome_msg.'</h5>';
					}
				?>
				<?php 
					if(isset($shit_msg)) {
						echo '<h5>'.$shit_msg.'</h5>'; 
					} 
				?>
				<div class="media">
					<div class="media-left">
						<a href="#">
							<img class="media-object" src="<?php echo $_REQUEST['cover_art_link']; ?>" class="img-responsive" />
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><span class="record-data">Artist: <?php echo $_REQUEST['artist']; ?></span></h4>
						<p><span class="record-data">Description: <?php echo $_REQUEST['description']; ?></span></p>
						<small><span class="record-data">Year Released: <?php echo $_REQUEST['year']; ?></span></small> | <small><span class="record-data">Record Company: <?php echo $_REQUEST['record_company']; ?></span></small>
					</div>
				</div>				
			</div>
		</div>
	</section>

	<section class="content container">
		<div class="row">
			<main role="main" class="main col-sm-8">
				<h1 class="page-title">About the Author</h1>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.</p>
			</main>

			<aside roles="complimentary" class="col-sm-4">
				<?php include('includes/sidebar.php'); ?>
			</aside>
		</div><!-- close row -->

	</section><!--close inner-wrapper-->
</div><!--close wrapper-->
<?php include('includes/footer.php'); ?>
