<?php
  include ('dbcon.php');
  $qry="SELECT * FROM `user`";
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
        ADMIN DETAILS
    </div>

    <div class="add_song_div">
	<center><input type="button" value="DASHBOARD" onclick="go_to_dsbrd()" class="admin_view_dsbrd_btn"></center>
	
		<table class="content-table">
			<thread>
				<tr>
					<th>NAME</th>
					<th>USER NAME</th> 
					<th>DELETE</th>
				</tr>
			</thread>
		<tbody>
			<?php
            while($data=mysqli_fetch_assoc($qry_run))
            { ?>
				<tr class="active-row">
				<td><?php echo $data['f_name'] ?></td>
				<td><?php echo $data['u_name'] ?></td>
				<td>
					<a href="delete_admin.php?u_id=<?php echo $data['u_id'] ?>">
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