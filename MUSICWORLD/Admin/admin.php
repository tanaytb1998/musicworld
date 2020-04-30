<?php
  include ('dbcon.php');
  $qry="SELECT * FROM `music`";
  $qry_run=mysqli_query($t_basu,$qry);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
		Admin panel
    </title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="header_div">
      Welcome to Music World Admin Panel
    </div>

    <div class="admin_container">
      <div class="all_music_div">
        <?php
            while($data=mysqli_fetch_assoc($qry_run))
            {
              ?>
              <div class="music" id="music">
                <div class="music_img" id="music_img">
                  <img style="border-radius: 8px;" src="dataimg/<?php echo $data['m_img'] ?>" alt="no" width="64" height="64">
                </div>
                <div class="music_data">

                  <label class="music_title" id="music_title"><?php echo $data['m_title']; ?></label>
                  <div class="music_a_a_s">
                    <label class="music_artist" id="music_artist"><?php echo $data['m_artist']; ?></label>
                    <label class="music_album" id="music_album"><?php echo $data['m_album']; ?></label>
                    <label class="music_size" id="music_size"><?php echo $data['m_year']; ?></label>
                  </div>
                </div>

                <div class="music_play" id="music_play">
                  <audio controls class="xyz">
                    <source src="songs/<?php echo $data['m_song'] ?>" />
                  </audio>
                </div>
                <div class="music_edit" id="music_edit">
				<?php
					$m_id=$data['m_id'];
				?>
				<a href="Update_song.php?m_id=<?php echo $m_id ?>">
                    <img style="border-radius: 8px;" src="site_data/icons/edit.jpg" alt="no" width="32" height="32">
                </a>
				</div>
                <div class="music_delete" id="music_delete">
					<a href="delete_song.php?m_id=<?php echo $m_id ?>">
						<img style="border-radius: 8px;" src="site_data/icons/delete.jpg" alt="no" width="32" height="32">
					</a>
				</div>
              </div><?php
            }?>

      </div>

      <div class="control_div">
	  <br />
	  <br />
        <form class="" action="add_song.php" method="post">
			<center><input type="submit" class="add_song" id="add_song" value="Add song"></center>
        </form>
			
		<form class="" method="">
			<center><input type="button" class="add_song" id="add_song" onclick="show_add_admin()" value="Add Admin"></center>
        </form>
		
		<form class="" action="view_admins.php" method="">
			<center><input type="submit" class="add_song" id="add_song" value="View Admins"></center>
        </form>

		<form class="" action="view_feedbacks.php" method="">
			<center><input type="submit" class="add_song" id="add_song" value="View Feedbacks"></center>
        </form>
		
		<form class="" action="../Index.php" method="post">
			<center><input type="submit" class="add_song" id="add_song" value="Log out"></center>
        </form>
      </div>
	  
    </div>
	
	
	
	
	
	
<!-- Add admin slide-->
	 <div hidden class="add_admin_div" id="add_admin_div">
	 <div class="loginbox">
		<img src="site_data/icons/add_admin.jpg" class="avatar">
		<h1>Add new admin</h1>
		<form action="admin.php" method="post" enctype="multipart/form-data">
		<p>Name</p>
		<input type="text" name="fname" placeholder="Enter Name" required>
		<p>Username</p>
		<input type="text" name="uname" placeholder="Enter Username" required>
		<p>Password</p>
		<input type="password" name="pswd" placeholder="Enter Password" required>
		<input type="submit" class="add_new_btn" name="Add_Admin" value="Add Admin">
		<input type="button" class="add_new_btn" name="" onclick="hide_add_admin()" value="Cancel">
		</form>
		</div>
		<script type="text/javascript">
			function show_add_admin(){
				document.getElementById("add_admin_div").style.display="block";
			}
		
			function hide_add_admin(){
				document.getElementById("add_admin_div").style.display="none";
			}
		</script>
		<?php
			if(isset($_POST['Add_Admin'])){
			include ('dbcon.php');
			$fname=$_POST['fname'];
			$uname=$_POST['uname'];
			$pswd=$_POST['pswd'];
			$qry="INSERT INTO `user`(`u_id`, `f_name`, `u_name`, `u_pw`) VALUES (NULL,'$fname','$uname','$pswd')";
			$run_qry=mysqli_query($t_basu,$qry);
			if($run_qry==true)
			{
			?>
			<script type="text/javascript">
				alert("Successfully Added!");
			</script>
			<?php
			}
			else {
			?>
			<script type="text/javascript">
				alert("Faild to add new admin!!!!!!!");
			</script>
		<?php
    }
  }

?>	
	 </div> 
  </body>
</html>
