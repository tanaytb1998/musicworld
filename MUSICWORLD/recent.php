<?php
	include ('dbcon.php');
	$m=json_decode($_POST['tny']);
	for($i=4;$i>=1;$i--)
	{
		$qry1="SELECT * FROM `resent` WHERE `sl`= '$i'";
		$qry_run1=mysqli_query($t_basu,$qry1);
		$data=mysqli_fetch_assoc($qry_run1);
		$d=$data['m_id'];
		print_r($d);
		$j=$i+1;
		$qry2="UPDATE `resent` SET `m_id`='$d' WHERE `sl`='$j'";
		$qry_run2=mysqli_query($t_basu,$qry2);
	}

	$qry3="UPDATE `resent` SET `m_id`='$m' WHERE `sl`='1'";
	$qry_run3=mysqli_query($t_basu,$qry3);
?>