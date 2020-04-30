<?php
	include ('dbcon.php');
	$tmp=$_GET['sl'];
	$qry_dlt="DELETE FROM `feedback` WHERE `sl`='$tmp'";
	$qry_run_dlt=mysqli_query($t_basu,$qry_dlt);
	if($qry_run_dlt==true)
	{
		?>
		<script type="text/javascript">
			alert("Feedback Successfully deleted!");
			window.open("view_feedbacks.php","_self");
		</script><?php
	}
	else
	{
		?> <script type="text/javascript">
			alert("Failed to delete Feedback!!!!");
			window.open("view_feedbacks.php","_self");
		</script><?php
	}
	
	?>
	
?>

