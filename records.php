<?php include('includes/header.php'); ?>
<?php 
	$tableName= "records";
	$targetpage = "records.php";
	$limit = 10;

	$query = "SELECT COUNT(*) as num FROM $tableName";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];

	$stages = 3;
	$page = mysql_escape_string($_GET['page']);
	
	if($page) {
		$start = ($page - 1) * $limit;
	}else{
		$start = 0;
	}

	// Query the Data
	$records_query = "SELECT * 
					  FROM records
					  ORDER BY artist ASC"; 

	$records_result = mysql_query($records_query);

	// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;
	$next = $page + 1;
	$lastpage = ceil($total_pages/$limit);
	$LastPagem1 = $lastpage - 1;

	$paginate = '';
	if($lastpage > 1)
	{

	$paginate .= "<div class='paginate'>";

	// Previous
	if ($page > 1){
	$paginate.= "<a href='$targetpage?page=$prev'>previous</a>";
	}else{
	$paginate.= "<span class='disabled'>previous</span>"; }

	// Pages
	if ($lastpage < 7 + ($stages * 2)) // Not enough pages to breaking it up
	{
	for ($counter = 1; $counter <= $lastpage; $counter++)
	{
	if ($counter == $page){
	$paginate.= "<span class='current'>$counter</span>";
	}else{
	$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
	}
	}
	elseif($lastpage > 5 + ($stages * 2)) // Enough pages to hide a few?
	{
	// Beginning only hide later pages
	if($page < 1 + ($stages * 2))
	{
	for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
	{
	if ($counter == $page){
	$paginate.= "<span class='current'>$counter</span>";
	}else{
	$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
	}
	$paginate.= "...";
	$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
	$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";
	}
	// Middle hide some front and some back
	elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
	{
	$paginate.= "<a href='$targetpage?page=1'>1</a>";
	$paginate.= "<a href='$targetpage?page=2'>2</a>";
	$paginate.= "...";
	for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
	{
	if ($counter == $page){
	$paginate.= "<span class='current'>$counter</span>";
	}else{
	$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
	}
	$paginate.= "...";
	$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
	$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";
	}
	// End only hide early pages
	else
	{
	$paginate.= "<a href='$targetpage?page=1'>1</a>";
	$paginate.= "<a href='$targetpage?page=2'>2</a>";
	$paginate.= "...";
	for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
	{
	if ($counter == $page){
	$paginate.= "<span class='current'>$counter</span>";
	}else{
	$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
	}
	}
	}

	// Next
	if ($page < $counter - 1){
	$paginate.= "<a href='$targetpage?page=$next'>next</a>";
	}else{
	$paginate.= "<span class='disabled'>next</span>";
	}

	$paginate.= "</div>";

	}
	echo $total_pages.' Results';
	// pagination
	echo $paginate;			
?>

<section class="records-wrapper">
	<div class="container">
		<div class="row">
			<h2 class="top-header">My Records</h2>

			<section class="articles col-sm-8">
				<?php 
					$records_query = "SELECT * 
									  FROM records
									  ORDER BY artist ASC"; 

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