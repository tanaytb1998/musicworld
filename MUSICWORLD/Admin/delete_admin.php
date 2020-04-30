<?php
	include ('dbcon.php');
	$tmp=$_GET['u_id'];
	$qry_dlt="DELETE FROM `user` WHERE `u_id`='$tmp'";
	$qry_run_dlt=mysqli_query($t_basu,$qry_dlt);
	if($qry_run_dlt==true)
	{
		?>
		<script type="text/javascript">
			alert("Admin Successfully deleted!");
			window.open("view_admins.php","_self");
		</script><?php
	}
	else
	{
		?> <script type="text/javascript">
			alert("Failed to delete Admin!!!!");
			window.open("view_admins.php","_self");
		</script><?php
	}
	
	?>
	
?>

