<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="add_song_header">
        ADD MUSIC
    </div>

    <div class="add_song_div">
      <form class="" action="add_song.php" method="post" enctype="multipart/form-data" id="frm">
        <div class="q">Song Title:-</div>
        <input type="text" class="a" id="title" name="title" required>

        <div class="q">Artist Name:-</div>
        <input type="text" class="a" id="artist_name" name="artist_name" required>

        <div class="q">Album Name:-</div>
        <input type="text" class="a" id="album_name" name="album_name" required>

        <div class="q">Release Year:-</div>
        <input type="text" class="a" id="release_year" name="releas_year" required>

		<div class="q" id="lang">Select Lang:-</div>
		<select class="a" name="language">
		  <option value="hindi">Hindi song</option>
		  <option value="english">English song</option>
		  <option value="bengali">Bengali song</option>
		</select>
		
        <div class="q">Choose Song:-</div>
        <input type="file" name="song" id="music_file" class="fl" required>

        <div class="q">Choose Image:-</div>
        <input type="file" name="img" id="img_file" class="fl" required>

        <div class="add_song_control">
          <input type="submit" name="submit" id="save" class="save" value="Save">
          <input type="button" class="reset" value="Reset" id="reset" onclick="form_reset()">
          <input type="button" class="dashboard" value="Dashboard" id="dashboard" onclick="go_to_dsbrd()">
        </div>
      </form>
    </div>
  </body>
</html>

<script type="text/javascript">
	function go_to_dsbrd()
	{
		window.open("admin.php","_self");
	}
	
	function form_reset()
	{
		document.forms["frm"].elements["title"].value="";
		document.forms["frm"].elements["artist_name"].value="";
		document.forms["frm"].elements["album_name"].value="";
		document.forms["frm"].elements["release_year"].value="";
		document.forms["frm"].elements["img_file"].value="";
		document.forms["frm"].elements["music_file"].value="";
	}
</script>

<?php
  if(isset($_POST['submit'])){
    include ('dbcon.php');
    $title=$_POST['title'];
    $artist_name=$_POST['artist_name'];
    $album_name=$_POST['album_name'];
    $releas_year=$_POST['releas_year'];
    $language=$_POST['language'];
    $temp_song_name=$_FILES['song']['tmp_name'];
    $temp_img_name=$_FILES['img']['tmp_name'];
    move_uploaded_file($temp_song_name,"songs/$title.mp3");
    move_uploaded_file($temp_img_name,"dataimg/$album_name.jpg");
    $qry="INSERT INTO `music`(`m_id`, `m_title`, `m_artist`, `m_album`, `m_year`,`m_catg`,`m_img`, `m_song`) VALUES (NULL,'$title','$artist_name','$album_name','$releas_year','$language','$album_name.jpg','$title.mp3')";
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
          alert("Faild to add the song to the database!!!!!!!");
        </script>
      <?php
    }
  }

?>
