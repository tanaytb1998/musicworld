<?php
  include ('dbcon.php');
  $qry="SELECT * FROM `feedback`";
  $qry_run=mysqli_query($t_basu,$qry);
?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="add_song_header">
        USER FEEDBACKS
    </div>

    <div class="add_song_div">
	<center><input type="button" value="DASHBOARD" onclick="go_to_dsbrd()" class="admin_view_dsbrd_btn"></center>
	
		<table class="content-table">
			<thread>
				<tr>
					<th>USER NAME</th>
					<th>USER EMAIL ID</th> 
					<th>PHONE NO</th> 
					<th>MESSAGE</th> 
					<th>DELETE</th>
				</tr>
			</thread>
		<tbody>
			<?php
            while($data=mysqli_fetch_assoc($qry_run))
            { ?>
				<tr class="active-row">
				<td><?php echo $data['name'] ?></td>
				<td><?php echo $data['email'] ?></td>
				<td><?php echo $data['phn'] ?></td>
				<td><?php echo $data['msg'] ?></td>
				<td>
					<a href="delete_feedback.php?sl=<?php echo $data['sl'] ?>">
						<img style="border-radius: 8px;" src="site_data/icons/delete.jpg" alt="no" width="32" height="32">
					</a>
				</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
    </div>
  </body>
</html>

<script type="text/javascript">
	function go_to_dsbrd()
	{
		window.open("admin.php","_self");
	}
</script>