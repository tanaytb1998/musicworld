<?php
	include ('dbcon.php');
	$tmp=$_GET['m_id'];
	$qry_fetch="SELECT * FROM `music` WHERE `m_id`='$tmp'";
	$qry_dlt="DELETE FROM `music` WHERE `m_id`='$tmp'";
	$qry_run_fetch=mysqli_query($t_basu,$qry_fetch);
	$data=mysqli_fetch_assoc($qry_run_fetch);
	$ab=$data['m_song'];
	$qry_run_dlt=mysqli_query($t_basu,$qry_dlt);
	if(file_exists("songs/$ab"))
	{
		unlink("songs/$ab"); ?>
		<script type="text/javascript">
			alert("Song Successfully deleted!");
			window.open("admin.php","_self");
		</script><?php
	}
	else
	{
		?> <script type="text/javascript">
			alert("Failed to delete the song!!!!");
			window.open("admin.php","_self");
		</script><?php
	}
	
	?>
	
?>

