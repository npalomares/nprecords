<?php include('includes/header.php'); ?>

<section class="records-wrapper">
	<div class="container">
		<div class="row">
			<h2 class="top-header">My Records</h2>

			<section class="articles col-sm-8">
				<?php 
					$records_query = "SELECT * 
									  FROM records 
									  ORDER BY record_id DESC";

					$records_result = mysql_query($records_query);
					while( $row_latest = mysql_fetch_array($records_result)) {
				?>
				<div class="media">
					<div class="media-left">
						<a href="#">
							<img class="media-object pull-left" src="<?php echo $row_latest['cover_art_link']; ?>" class="img-responsive" />
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><span class="record-data"><?php echo $row_latest['artist']; ?></span></h4>
						<h6 class="media-heading"><strong><span class="record-data"><?php echo $row_latest['title']; ?></span></strong></h6>
						<p><span class="record-data"><?php echo $row_latest['description']; ?></span></p>
						<small><span class="record-data"> <?php echo $row_latest['year']; ?></span></small> | <small><span class="record-data"><?php echo $row_latest['record_company']; ?></span></small>
					</div>
				</div><!-- close media -->
			<?php }	?>
			</section>

			<aside roles="complimentary" class="col-sm-4">
				<?php include('includes/sidebar.php'); ?>
			</aside>
		</div><!-- close row -->
	</div>
</section>