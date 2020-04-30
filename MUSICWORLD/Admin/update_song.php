<?php
	include ('dbcon.php');
	$tmp=$_GET['m_id'];
	$qry="SELECT * FROM `music` WHERE `m_id`='$tmp'";
	$qry_run=mysqli_query($t_basu,$qry);
	$data=mysqli_fetch_assoc($qry_run)
?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="add_song_header">
        Update Music Details
    </div>

    <div class="add_song_div">
      <form class="" action="update_song.php" method="post" enctype="multipart/form-data" id="frm">
        <div class="q">Song Title:-</div>
        <input type="text" class="a" id="title" name="title" value="<?php echo $data['m_title']?>">

        <div class="q">Artist Name:-</div>
        <input type="text" class="a" id="artist_name" name="artist_name" value="<?php echo $data['m_artist']?>">

        <div class="q">Album Name:-</div>
        <input type="text" class="a" id="album_name" name="album_name" value="<?php echo $data['m_album']?>">

        <div class="q">Release Year:-</div>
        <input type="text" class="a" id="release_year" name="releas_year" value="<?php echo $data['m_year']?>">

		<div class="q" id="lang">Select Lang:-</div>
		<select class="a" name="language">
		  <option value="hindi">Hindi song</option>
		  <option value="english">English song</option>
		  <option value="bengali">Bengali song</option>
		</select>
		
        <div class="q">Choose Song:-</div>
        <input type="file" name="song" id="music_file" class="fl">

        <div class="q">Choose Image:-</div>
        <input type="file" name="img" id="img_file" class="fl">

        <div class="add_song_control">
          <input type="submit" name="submit" id="save" class="save" value="Update">
          <input type="button" class="reset" value="Reset" id="reset" onclick="form_reset()">
          <input type="button" class="dashboard" value="Dashboard" id="dashboard" onclick="go_to_dsbrd()">
        </div>
		<input type="hidden" name="m_id" value="<?php echo $data['m_id']?>">
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
	$id_tmp=$_POST['m_id'];
    $title=$_POST['title'];
    $artist_name=$_POST['artist_name'];
    $album_name=$_POST['album_name'];
    $releas_year=$_POST['releas_year'];
    $language=$_POST['language'];
    $temp_song_name=$_FILES['song']['tmp_name'];
    $temp_img_name=$_FILES['img']['tmp_name'];
    move_uploaded_file($temp_song_name,"songs/$title.mp3");
    move_uploaded_file($temp_img_name,"dataimg/$album_name.jpg");
    $qry="UPDATE `music` SET `m_title`='$title',`m_artist`='$artist_name',`m_album`='$album_name',`m_year`='$releas_year',`m_catg`='$language',`m_img`='$album_name.jpg',`m_song`='$title.mp3' WHERE `m_id`='$id_tmp'";
    $run_qry=mysqli_query($t_basu,$qry);
    if($run_qry==true)
    {
      ?>
        <script type="text/javascript">
          alert("Successfully Updated!");
		  window.open("admin.php","_self");
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
