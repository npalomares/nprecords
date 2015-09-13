<?php include('includes/header.php'); 
	
	//parse the form if they pressed the button

	if(isset( $_REQUEST['added_record']) == 1) {
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
			
			$welcome_msg .= 'You have added '.$input_artist.' - '.$input_title.' to the database. Thank You! <br />';
			if(isset($welcome_msg)) { echo $welcome_msg; }


				//Log them in

				//Who is logged in? Get the last added user_id

				//what level are they?

				//redirect to admin panel

		}else{
			//insert failed
			$shit_msg .= 'Dude, we\'re totally fucked! <br />';
			if(isset($shit_msg)) { echo $shit_msg; }		

		}	
	} //end if they pressed the button
?>

<div class="wrapper">

	<section class="record-entry">
		<div class="container">
			<h2 class="top-header">Add Record Information Here</h2>
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
						<label>Description: </label><textarea type="text" name="description" class="description"></textarea>
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
							<img class="media-object" src="<?php if(isset($input_cover_art_link)) { echo $input_cover_art_link;} ?>" class="img-responsive" />
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><span class="record-data">Artist: <?php if(isset($input_artist)) { echo $input_artist; } ?></span></h4>
						<p><span class="record-data">Description: <?php if(isset($input_description)) { echo $input_description; } ?></span></p>
						<small><span class="record-data">Year Released: <?php if(isset($input_year)) { echo $input_year; } ?></span></small> | <small><span class="record-data">Record Company: <?php if(isset($input_record_company)) { echo $input_record_company; } ?></span></small>
					</div>
				</div>				
			</div>
		</div>
	</section>

	<section class="content container">
		<div class="row">
			<main role="main" class="main col-sm-8">
				<h1 class="page-title">About the Author</h1>
				<p>A few years back I was placed in control of the family record collection. I had a nice record player and actually enjoyed placying them and having everyone over to listen. Recently I acquired the records from my grandparents who had passed away. It was really interesting to see the records that they collected throughout their life, and remember records were the only medium at that time so they had their whole collection on vinyl. There were some notes I found in some of the record sleeves of the album named and a chekmark as if they had made a previous note to actually go out and get this particular album from the music store. It is just a nice though, as we currently live in the age when if you think about something you want, you can literally have it at the moment (at least when it comes to music).</p> There are a lot of these records so it would be handy for me to database the catalouge and create an easy add form that will insert the data for me. Once in there I can organize and display them any way I see fit with custom queries. Sounds fun right!
			</main>

			<aside roles="complimentary" class="col-sm-4">
				<?php include('includes/sidebar.php'); ?>
			</aside>
		</div><!-- close row -->

	</section><!--close inner-wrapper-->
</div><!--close wrapper-->
<?php include('includes/footer.php'); ?>
