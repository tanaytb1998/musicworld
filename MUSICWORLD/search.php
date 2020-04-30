<?php
  include ('dbcon.php');
?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("img/search/guitar.jpg");
  
  /* Add the blur effect */
  filter: blur(5px);
  -webkit-filter: blur(5px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  position: absolute;
  top: 80px;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 90%;
  text-align: center;
  border-radius:8px;
}
*{
      font-family: sans-serif;
     }
     .content-table{

     border-collapse: collapse;
    margin-left:auto; 
    margin-right:auto;
     font-size: 0.9em;
     min-width: 400px;
     border-radius: 5px 5px 0 0;
     overflow: hidden;
     box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);

}
.search {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: black;
  font-weight: bold;
  position: absolute;
  top: 170px;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 90%;
  height:50px;
  border-radius:8px;
  padding:10px;
}
.music_outer_div{
	background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  position: absolute;
  top: 410px;
  left: 50%;
  transform: translate(-69%, -50%);
  width: 65%;
  height:420px;
  overflow-y: scroll;
  border-radius:8px;
}

.music_play_div{
	background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  position: absolute;
  top: 410px;
  left: 50%;
  transform: translate(80%, -50%);
  width: 25%;
  height:420px;
  overflow-y: none;
  border-radius:8px;
}

input[type=text],select{
	border:none;
	padding:6.5px;
	font-size:15px;
	font-family:sans-serif;
	border-radius:10px;
	width:22%;
	background-color:rgba(0,0,0, 0.2);
	color:white;
}
input[type=submit],[type=button]{
	background-color: rgba(0,212,0, 0.2); 
	color:Black;
	border-radius:10px;
	cursor:pointer;
	font-family:sans-serif;
	border:none;
	width:16%;
	font-size:16px;
	height:31px;
	color:white;
}
label{
	border:none;
	padding:6.5px;
	font-size:15px;
	font-family:sans-serif;
	border-radius:10px;
	color:white;
}
 
</style>
	<link rel="stylesheet" href="css/load_music.css">
</head>
<body>

<div class="bg-image"></div>

<div class="bg-text">
  <h1 style="font-size:50px"> ** SEARCH** </h1>
</div>
<div class="search">
<form action="search.php" method="post" enctype="multipart/form-data" id="src" >
	<input type="text" id="search" name="search" placeholder="Search here....">
	<input type="submit" name="submit" onclick="sea()" value="Search">
	<input type="button" onclick="go_to_home()" value="Home">
	<select id="sort" name="sort" style="float:right;">
		<option value="title">Title</option>
		<option value="artist">Artist</option>
		<option value="album">Album/Movie</option>
		<option value="year">Year</option>
	</select>
	<label style="float:right;color:white;">Search by:-</label>
</form>
</div>
<div class="music_outer_div">
	<!--Search post php-->
<?php
	if(isset($_POST['submit'])){
    include ('dbcon.php');
    $key=$_POST['search'];
	$sort=$_POST['sort'];
	if($sort=="title")
	{
		$qry="SELECT * FROM `music` WHERE `m_title` LIKE '%$key%'";
		$qry_run=mysqli_query($t_basu,$qry);
		while($data=mysqli_fetch_assoc($qry_run))
		{ ?>
			<div class="music" id="<?php echo $data['m_id'];?>" onclick="play_song(this.id)">
            <div class="music_img" id="music_img">
				<img style="border-radius: 8px;" id="<?php echo $data['m_id']."m_i";?>" src="Admin/dataimg/<?php echo $data['m_img'] ?>" alt="no" width="64" height="64">
            </div>
            <div class="music_data">
				<label class="music_title" id="<?php echo $data['m_id']."m_t";?>"><?php echo $data['m_title']; ?></label>
                <div class="music_a_a_s">
                    <label class="music_artist" id="<?php echo $data['m_id']."m_ar";?>"><?php echo $data['m_artist']; ?></label>
                    <label class="music_album" id="music_album"><?php echo $data['m_album']; ?></label>
                    <label class="music_size" id="music_size"><?php echo $data['m_year']; ?></label>
                    <label hidden id="<?php echo $data['m_id']."m_p";?>">Admin/songs/<?php echo $data['m_song'] ?></label>
                    <p hidden id="<?php echo $data['m_id']."mm";?>">Admin/dataimg/<?php echo $data['m_img'] ?></p>
				</div>
            </div>	
        </div>
		<?php
		}
	}
	elseif($sort=="artist")
	{
		$qry="SELECT * FROM `music` WHERE `m_artist` LIKE '%$key%'";
		$qry_run=mysqli_query($t_basu,$qry);
		while($data=mysqli_fetch_assoc($qry_run))
		{ ?>
			<div class="music" id="<?php echo $data['m_id'];?>" onclick="play_song(this.id)">
            <div class="music_img" id="music_img">
				<img style="border-radius: 8px;" id="<?php echo $data['m_id']."m_i";?>" src="Admin/dataimg/<?php echo $data['m_img'] ?>" alt="no" width="64" height="64">
            </div>
            <div class="music_data">
				<label class="music_title" id="<?php echo $data['m_id']."m_t";?>"><?php echo $data['m_title']; ?></label>
                <div class="music_a_a_s">
                    <label class="music_artist" id="<?php echo $data['m_id']."m_ar";?>"><?php echo $data['m_artist']; ?></label>
                    <label class="music_album" id="music_album"><?php echo $data['m_album']; ?></label>
                    <label class="music_size" id="music_size"><?php echo $data['m_year']; ?></label>
                    <label hidden id="<?php echo $data['m_id']."m_p";?>">Admin/songs/<?php echo $data['m_song'] ?></label>
                    <p hidden id="<?php echo $data['m_id']."mm";?>">Admin/dataimg/<?php echo $data['m_img'] ?></p>
				</div>
            </div>	
        </div>
	<?php
		}
	}
	elseif($sort=="album")
	{
		$qry="SELECT * FROM `music` WHERE `m_album` LIKE '%$key%'";
		$qry_run=mysqli_query($t_basu,$qry);
		while($data=mysqli_fetch_assoc($qry_run))
		{ ?>
			<div class="music" id="<?php echo $data['m_id'];?>" onclick="play_song(this.id)">
            <div class="music_img" id="music_img">
				<img style="border-radius: 8px;" id="<?php echo $data['m_id']."m_i";?>" src="Admin/dataimg/<?php echo $data['m_img'] ?>" alt="no" width="64" height="64">
            </div>
            <div class="music_data">
				<label class="music_title" id="<?php echo $data['m_id']."m_t";?>"><?php echo $data['m_title']; ?></label>
                <div class="music_a_a_s">
                    <label class="music_artist" id="<?php echo $data['m_id']."m_ar";?>"><?php echo $data['m_artist']; ?></label>
                    <label class="music_album" id="music_album"><?php echo $data['m_album']; ?></label>
                    <label class="music_size" id="music_size"><?php echo $data['m_year']; ?></label>
                    <label hidden id="<?php echo $data['m_id']."m_p";?>">Admin/songs/<?php echo $data['m_song'] ?></label>
                    <p hidden id="<?php echo $data['m_id']."mm";?>">Admin/dataimg/<?php echo $data['m_img'] ?></p>
				</div>
            </div>	
        </div> 
		<?php
		}
	}
	elseif($sort=="year")
	{
		$qry="SELECT * FROM `music` WHERE `m_year` LIKE '%$key%'";
		$qry_run=mysqli_query($t_basu,$qry);
		while($data=mysqli_fetch_assoc($qry_run))
		{ ?>
			<div class="music" id="<?php echo $data['m_id'];?>" onclick="play_song(this.id)">
            <div class="music_img" id="music_img">
				<img style="border-radius: 8px;" id="<?php echo $data['m_id']."m_i";?>" src="Admin/dataimg/<?php echo $data['m_img'] ?>" alt="no" width="64" height="64">
            </div>
            <div class="music_data">
				<label class="music_title" id="<?php echo $data['m_id']."m_t";?>"><?php echo $data['m_title']; ?></label>
                <div class="music_a_a_s">
                    <label class="music_artist" id="<?php echo $data['m_id']."m_ar";?>"><?php echo $data['m_artist']; ?></label>
                    <label class="music_album" id="music_album"><?php echo $data['m_album']; ?></label>
                    <label class="music_size" id="music_size"><?php echo $data['m_year']; ?></label>
                    <label hidden id="<?php echo $data['m_id']."m_p";?>">Admin/songs/<?php echo $data['m_song'] ?></label>
                    <p hidden id="<?php echo $data['m_id']."mm";?>">Admin/dataimg/<?php echo $data['m_img'] ?></p>
				</div>
            </div>	
        </div>
		<?php
		}
	}
}
?>

	<!--end-->
</div>
<div class="music_play_div">
	<div class="playimg">
        <img hidden onclick="pause_song()" style="border-radius: 8px; margin-left:9%; margin-top:20px; margin-bottom:5px;" class="playimg" id="playimg" alt="no" width="80%" height="80%">
	</div>
	<audio hidden controls class="xyz" id="aud" style="border-radius: 8px; margin-left:9%;"></audio>
	<label id="play_music_name" class="play_music_name" style="font-size:20px;color: #fe921f; text-decoration: underline; text-align:center;"></label><br />
</div>

<script type="text/javascript">
function play_song(o) {
	
	//showing play div
	document.getElementById("aud").style.display="block";
	document.getElementById("playimg").style.display="block";
	
	var m=o;
	var song_id=o+"m_p";
	var i_id=o+"mm";
	var title_id=o+"m_t";
	var artist_id=o+"m_ar";
	
	var song_elm=document.getElementById("aud");
	var title_elm=document.getElementById("play_music_name");
	var artist_elm=document.getElementById("play_artist_name");
	var img_elm=document.getElementById("playimg");
	
	var song=document.getElementById(song_id).innerHTML;
	var title=document.getElementById(title_id).innerHTML;
	var artist=document.getElementById(artist_id).innerHTML;
	var img=document.getElementById(i_id).innerHTML;
	
	title_elm.innerHTML=title+", "+artist;
	img_elm.src=img;
	
	song_elm.src=song;
	song_elm.play();
	$.ajax({
		url:"recent.php",
		method:"post",
		data:{tny:JSON.stringify(m)},
		success:function(res){
			console.log(res);
		}
	});
}
function pause_song(){
	
	var sng=document.getElementById("aud");
	sng.pause();
}
function go_to_home(){
	window.open("index.php","_self");
}
</script>
</body>
</html>

